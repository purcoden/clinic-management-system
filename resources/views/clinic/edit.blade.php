@extends('layouts.app')
@section('title')
    {{__('messages.clinic.edit_clinic')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('clinics.index') }}">{{ __('messages.common.back') }}</a>
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['clinics.update', $clinic->id], 'method' => 'put','files' => 'true','id' => 'editClinicForm']) }}
                {{ Form::hidden('is_edit', true,['id' => 'clinicIsEdit']) }}
                    @include('clinics.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
