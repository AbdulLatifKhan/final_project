@extends('layout.admin-sidenav-layout')
@section('content')
    @include('components.admin-components.admin-blog.blogs-category')
    @include('components.admin-components.admin-blog.blogCategory-update')
    @include('components.admin-components.admin-blog.blogCategory-delete')
    @include('components.admin-components.admin-blog.blogCategory-create')
@endsection
