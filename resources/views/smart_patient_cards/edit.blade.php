@extends('layouts.app')
@section('title')
{{ __('messages.smart_patient_card.edit_patient_card') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('smart-patient-cards.index') }}">{{ __('messages.common.back') }}</a>
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                @if (isRole('doctor'))
                {{ Form::open(['route' => ['doctors.smart-patient-cards.update', $smart_patient_cards->id], 'method' => 'put','files' => 'true','id' => 'editSmartPatientCardsForm']) }}
                @endif
                @if (isRole('clinic_admin'))
                {{ Form::open(['route' => ['smart-patient-cards.update', $smart_patient_cards->id], 'method' => 'put','files' => 'true','id' => 'editSmartPatientCardsForm']) }}
                @endif


                {{ Form::hidden('is_edit', true,['id' => 'smart_patient_cardsIsEdit']) }}
                    @include('smart_patient_cards.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
