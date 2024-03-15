@extends('layout.admin-sidenav-layout')
@section('content')
    @include('components.admin-components.admin-blog.blogs-post')
     @include('components.admin-components.admin-blog.blogPost-update')
    @include('components.admin-components.admin-blog.blogPost-delete')
    @include('components.admin-components.admin-blog.blogPost-create')
@endsection
