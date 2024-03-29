<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends AppBaseController
{
    /* @var DashboardRepository */
    private $dashboardRepository;

    /**
     * DashboardController constructor.
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $data = $this->dashboardRepository->getData();
        $appointmentChartData = $this->dashboardRepository->getAppointmentChartData($request->all());
        if ($request->ajax()) {
            $appointmentFilterChartData = $this->dashboardRepository->getAppointmentChartData($request->all());

            return $this->sendResponse($appointmentFilterChartData, __('messages.filter_success'));
        }

        return view('dashboard.index', compact('data', 'appointmentChartData'));
    }

    /**
     * @param  Request  $request  *
     */
    public function getPatientList(Request $request)
    {
        $input = $request->all();

        $data['patients'] = $this->dashboardRepository->patientData($input);

        return $this->sendResponse($data, __('messages.flash.patients_retrieve'));
    }

    /**
     * @return Application|Factory|View
     */
    public function doctorDashboard(): \Illuminate\View\View
    {
        $appointments = $this->dashboardRepository->getDoctorData();

        return view('doctor_dashboard.index', compact('appointments'));
    }

    public function getDoctorAppointment(Request $request): JsonResponse
    {
        $input = $request->all();
        $data['patients'] = $this->dashboardRepository->doctorAppointment($input);

        return $this->sendResponse($data, __('messages.flash.patients_retrieve'));
    }

    /**
     * @return Application|Factory|View
     */
    public function patientDashboard(): \Illuminate\View\View
    {
        $data = $this->dashboardRepository->getPatientData();

        return view('patient_dashboard.index', compact('data'));
    }
}
