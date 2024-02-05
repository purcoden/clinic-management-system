@php $styleCss = 'style' @endphp
<div class="no-record text-center d-none">{{ __('messages.no_matching_records_found') }}</div>

@can('manage_admin_dashboard')
    <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('admin.dashboard') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa fa-digital-tachograph"></i></span>
            <span class="aside-menu-title">{{ __('messages.dashboard') }}</span>
        </a>
    </li>
@endcan

@can('manage_staff')
    <li class="nav-item {{ Request::is('admin/staffs*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('staffs.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
            <span class="aside-menu-title">{{ __('Clinic') }}</span>
        </a>
    </li>
@endcan

@role('manage_clinic')
    <li class="nav-item {{ Request::is('admin/clinics*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('clinics.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-users"></i></span>
            <span class="aside-menu-title">{{ __('messages.clinics') }}</span>
        </a>
    </li>
@endrole

@role('doctor')
    <li class="nav-item {{ Request::is('doctors/dashboard*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('doctors.dashboard') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa fa-digital-tachograph"></i></span>
            <span class="aside-menu-title">{{ __('messages.dashboard') }}</span>
        </a>
    </li>
    @can('manage_appointments')
    <li class="nav-item {{ Request::is('doctors/appointments*', 'doctors/patient*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('doctors.appointments') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-alt"></i></span>
            <span class="aside-menu-title">{{ __('messages.appointment.appointments') }}</span>
            <span class="d-none">{{ __('messages.appointments') }}</span>
            <span class="d-none">{{ __('messages.patients') }}</span>
        </a>
    </li>
    @endcan
    @can('manage_transactions')
    <li class="nav-item {{ Request::is('doctors/transactions*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('doctors.transactions') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-money-bill-wave"></i></span>
            <span class="aside-menu-title">{{ __('messages.transactions') }}</span>
        </a>
    </li>
    @endcan
    <li
        class="nav-item {{ Request::is('doctors/doctor-schedule-edit*', 'doctors/doctor-sessions/create') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ getLoginDoctorSessionUrl() }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-calendar"></i></span>
            <span class="aside-menu-title">{{ __('messages.doctor_session.my_schedule') }}</span>
        </a>
    </li>
    @can('manage_patient_visits')
    <li class="nav-item {{ Request::is('doctors/visits*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('doctors.visits.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-procedures"></i></span>
            <span class="aside-menu-title">{{ __('messages.visits') }}</span>
        </a>
    </li>
        @endcan
@endrole
@role('patient')
    <li class="nav-item {{ Request::is('patients/dashboard*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('patients.dashboard') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa fa-digital-tachograph"></i></span>
            <span class="aside-menu-title">{{ __('messages.dashboard') }}</span>
        </a>
    </li>

    <li
        class="nav-item {{ Request::is('patients/appointments*', 'patients/patient-appointments-calendar*', 'patients/doctors*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.patient-appointments-index') }}" data-turbo="false">
            <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-alt"></i></span>
            <span class="aside-menu-title">{{ __('messages.appointment.appointments') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('patients/transactions*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.transactions') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-money-bill-wave"></i></span>
            <span class="aside-menu-title">{{ __('messages.transactions') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('patients/reviews*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.reviews.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-star"></i></span>
            <span class="aside-menu-title">{{ __('messages.reviews') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('patients/patient-visits*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.patient.visits.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-procedures"></i></span>
            <span class="aside-menu-title">{{ __('messages.visits') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('patients/live-consultation*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.live-consultations.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-video"></i></span>
            <span class="aside-menu-title">{{ __('messages.live_consultations') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('patients/connect-google-calendar*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('patients.googleCalendar.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-day"></i></span>
            <span class="aside-menu-title">{{ __('messages.setting.connect_google_calendar') }}</span>
        </a>
    </li>
@endrole
@can('manage_doctors')
    <li
        class="nav-item {{ Request::is('admin/doctors*', 'doctors/doctor-sessions*', 'admin/doctor-sessions*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('doctors.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fa-solid fa-user-doctor"></i></span>
            <span class="aside-menu-title">{{ __('messages.doctors') }}</span>
            <span class="d-none">{{ __('messages.doctors') }}</span>
            <span class="d-none">{{ __('messages.doctor_sessions') }}</span>
        </a>
    </li>
@endcan
@can('manage_patients')
    <li class="nav-item {{ Request::is('admin/patients*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('patients.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-hospital-user"></i></span>
            <span class="aside-menu-title">{{ __('messages.patients') }}</span>
        </a>
    </li>
@endcan

@if (!isRole('doctor') && !isRole('patient'))
    @can('manage_appointments')
        <li
            class="nav-item {{ Request::is('admin/appointments*', 'admin/admin-appointments-calendar*', 'admin/prescriptions*', 'admin/prescription-medicine-show*') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-4" aria-current="page"
                href="{{ route('appointments.index') }}">
                <span class="aside-menu-icon pe-3"><i class="fas fa-calendar-alt"></i></span>
                <span class="aside-menu-title">{{ __('messages.appointments') }}</span>
            </a>
        </li>
    @endcan
@endif

@if (!isRole('doctor') && !isRole('patient'))
    @can('manage_transactions')
        <li class="nav-item {{ Request::is('admin/transactions*') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('transactions') }}">
                <span class="aside-menu-icon pe-3"><i class="fas fa-money-bill-wave"></i></span>
                <span class="aside-menu-title">{{ __('messages.transactions') }}</span>
            </a>
        </li>
    @endcan
@endif
@if (!isRole('doctor') && !isRole('patient'))
    @can('manage_patient_visits')
        <li class="nav-item {{ Request::is('admin/visits*') ? 'active' : '' }}">
            <a class="nav-link d-flex align-items-center py-4" aria-current="page" href="{{ route('visits.index') }}">
                <span class="aside-menu-icon pe-3"><i class="fas fa-procedures"></i></span>
                <span class="aside-menu-title">{{ __('messages.visits') }}</span>
            </a>
        </li>
    @endcan
@endif

@can('manage_specialities')
    <li class="nav-item {{ Request::is('admin/specializations*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-4" aria-current="page"
            href="{{ route('specializations.index') }}">
            <span class="aside-menu-icon pe-3"><i class="fas fa-user-shield"></i></span>
            <span class="aside-menu-title">{{ __('messages.specializations') }}</span>
        </a>
    </li>
@endcan


