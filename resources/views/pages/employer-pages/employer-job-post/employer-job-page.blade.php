@extends('layout.employer-sidenav-layout')
@section('content')
    @include('components.employer-components.employer-job.employer-job-post')
    @include('components.employer-components.employer-job.employer-job-post-edit')
    @include('components.employer-components.employer-job.employer-job-post-delete') 
    @include('components.employer-components.employer-job.employer-job-post-create')
@endsection
