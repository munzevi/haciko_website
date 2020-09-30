@extends('backend.layouts.master')
@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}">
    <style>
        .nav-pills .nav-item:first-child .nav-links {

            margin: 0;
        }
        .nav-pills .nav-item.active .nav-links, .nav-pills .nav-item.active .nav-link:focus, .nav-pills .nav-item.active .nav-link:hover {
            background-color: #66615b;
            color: #fff;
        }
       .nav-links{
            border:0;
            height:4rem;
            width:100%;
            display:flex;
            align-items: center;
            padding:10px 15px;
        }
        .navbar .navbar-collapse .nav-item a {
            font-size: 12px;
        }
    </style>
@endpush
@section('page_header')
    Dosya Yöneticisi
@endsection
@section('content')
    @include('backend.contents.filemanager')
@endsection

@section('scripts')
    @include('backend.scripts.files')
@endsection
