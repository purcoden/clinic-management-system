@extends('layouts.app')
@section('title')
    {{__('messages.clinic.add_clinic')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>{{ __('messages.clinic.add_clinic') }}</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('clinics.index') }}">{{ __('messages.common.back') }}</a>
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['clinics.store'], 'method' => 'POST', 'files' => true,'id'=> 'createClinicForm']) }}
                @include('clinics.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
