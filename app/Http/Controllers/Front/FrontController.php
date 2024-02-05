<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\AppBaseController;
use App\Models\ClinicSchedule;
use App\Models\Doctor;
use App\Models\DoctorSession;
use App\Models\FrontPatientTestimonial;
use App\Models\Setting;
use App\Models\State;
use App\Models\Specialization;
use App\Models\Qualification;
use App\Models\WeekDay;
use App\Models\User;
use Carbon\Carbon;
use stdClass;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function medical(): \Illuminate\View\View
    {
        $clinics = User::where('type',4)->where('status', User::ACTIVE)->orderBy('id', 'ASC')->latest()->paginate(6);
        
        return view('fronts.medicals.index', compact('clinics'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalDoctors(Doctor $doctors): \Illuminate\View\View
    {
        $doctors = Doctor::with('specializations', 'user')->whereHas('user', function (Builder $query) {
            $query->where('status', User::ACTIVE);
        })->latest()->paginate(6);
        // print_r($doctors);die;
        return view('fronts.medical_doctors', compact('doctors'));
    }

    public function searchDoctors(Request $request)
    {
        $keyword = $request->search;
        $search = Doctor::where('first_name', 'like', "%" . $keyword . "%")->paginate(6);
        // print_r($search);die;
        return view('fronts.search', compact('search'));
    }

    public function detailDoctor(Doctor $doctor)
    {
        $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $detail = Doctor::with('specializations','user')->where('id', $doctor->id)->get()->where('user.status',
                User::ACTIVE)->first();
        
        $educations = Qualification::select('qualifications.*')
            ->leftJoin('users', 'qualifications.user_id', '=', 'users.id')
            ->where('qualifications.user_id', $detail->user_id)->get();
        
        $locations = User::where('id', $detail->clinic_id)->where('type', 4)->where('status', User::ACTIVE)->first();
        $city = State::select('states.*')
            ->leftJoin('users', 'states.id', '=', 'users.city')
            ->where('states.id', $locations->city)->first();
    
        // print_r($locations->city);die;
        $schedules = WeekDay::select('session_week_days.*')
            ->leftJoin('doctors', 'session_week_days.doctor_id', '=', 'doctors.id')
            ->where('session_week_days.doctor_id', $doctor->id)->get();
        
        return view('fronts.detail_doctor', compact('detail','schedules', 'educations','city'));
    }
    public function detailClinic(User $user)
    {
        $detail = User::where('id',$user->id)->where('type',4)->where('status', User::ACTIVE)->orderBy('id', 'ASC')->first();

        $doctors = Doctor::select('doctors.*')
        ->leftJoin('users', 'doctors.clinic_id', '=', 'users.id')
        ->where('doctors.clinic_id', $user->id)->get();
        
        return view('fronts.detail_clinic', compact('detail', 'doctors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalAboutUs(): \Illuminate\View\View
    {
        $data = [];
        $data['doctorsCount'] = Doctor::with('user')->get()->where('user.status', true)->count();
        $data['patientsCount'] = Patient::get()->count();
        $data['servicesCount'] = Service::whereStatus(true)->get()->count();
        $data['specializationsCount'] = Specialization::get()->count();
        $clinicSchedules = ClinicSchedule::all();
        $setting = Setting::where('key', 'about_us_image')->first();
        $frontPatientTestimonials = FrontPatientTestimonial::with('media')->latest()->take(6)->get();
        $doctors = Doctor::with('user', 'appointments', 'specializations')->whereHas('user', function (Builder $query) {
            $query->where('status', User::ACTIVE);
        })->withCount('appointments')->orderBy('appointments_count', 'desc')->take(3)->get();

        return view('fronts.medical_about_us',
            compact('doctors', 'data', 'setting', 'clinicSchedules', 'frontPatientTestimonials'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalServices(): \Illuminate\View\View
    {
        $data = [];
        $serviceCategories = ServiceCategory::with('activatedServices')->withCount('services')->get();
        $setting = Setting::pluck('value', 'key')->toArray();
        $services = Service::with('media')->whereStatus(Service::ACTIVE)->latest()->get();
        $data['doctorsCount'] = Doctor::with('user')->get()->where('user.status', true)->count();
        $data['patientsCount'] = Patient::get()->count();
        $data['servicesCount'] = Service::whereStatus(true)->get()->count();
        $data['specializationsCount'] = Specialization::get()->count();

        return view('fronts.medical_services', compact('serviceCategories', 'setting', 'services', 'data'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalAppointment(): \Illuminate\View\View
    {
        $faqs = Faq::latest()->get();

        $appointmentDoctors = Doctor::with('user')->whereIn('id',
            DoctorSession::pluck('doctor_id')->toArray())->get()->where('user.status',
                User::ACTIVE)->pluck('user.full_name', 'id');

        return view('fronts.medical_appointment', compact('faqs', 'appointmentDoctors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalContact(): \Illuminate\View\View
    {
        $clinicSchedules = ClinicSchedule::all();

        return view('fronts.medical_contact', compact('clinicSchedules'));
    }

    /**
     * @return Application|Factory|View
     */
    public function termsCondition(): \Illuminate\View\View
    {
        $termConditions = Setting::pluck('value', 'key')->toArray();

        return view('fronts.terms_conditions', compact('termConditions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function privacyPolicy(): \Illuminate\View\View
    {
        $privacyPolicy = Setting::pluck('value', 'key')->toArray();

        return view('fronts.privacy_policy', compact('privacyPolicy'));
    }

    /**
     * @return Application|Factory|View
     */
    public function faq(): \Illuminate\View\View
    {
        $faqs = Faq::latest()->get();

        return view('fronts.faq', compact('faqs'));
    }

    /**
     * @return mixed
     */
    public function changeLanguage(Request $request)
    {
        Session::put('languageName', $request->input('languageName'));

        return $this->sendSuccess(__('messages.flash.language_change'));
    }
}
