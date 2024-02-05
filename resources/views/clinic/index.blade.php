@extends('layouts.app')
@section('title')
    {{__('messages.clinics')}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:clinic-table/>
        </div>
    </div>
@endsection
