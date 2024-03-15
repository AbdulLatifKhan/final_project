@extends('layout.admin-sidenav-layout')
@section('content')
    @include('components.admin-components.admin-company.companies')
    @include('components.admin-components.admin-company.company-status-update')
    @include('components.admin-components.admin-company.companies-delete')

@endsection
