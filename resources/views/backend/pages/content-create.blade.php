@extends('backend.layouts.master')

@push('styles')
    <style type="text/css" media="screen">
        .button-group{
            text-align: right;
        }
        .custom-switch {
            display:flex;align-items:center;
        }
        .add-extra{
            display:flex;justify-content:flex-start;align-items:center;
        }
        #add-button,#remove-button{
            cursor:pointer;
            margin:0;
        }
        input[type="text"] {
            height:2.3rem;
        }
        #parent_id{
            min-height:1.3rem;
        }
        .input-group{
            margin-bottom: 0;
        }
        @media (min-width: 768px) {
            .modal-xl {
                width: 90%;
                max-width:1200px;
                font-align:left;
            }
        }
        .card label{
            font-size: 1em;
            color:#676767;
        }
    </style>
    <script src="{{asset('backend/assets/vendor/slim-select/dist/slimselect.min.js')}}"></script>
    <link href="{{asset('backend/assets/vendor/slim-select/dist/slimselect.css')}}" rel="stylesheet"></link>
@endpush
@section('page_header')
    {{__('datatables.pages.'.$type.'.header') }}
@endsection

@section('content')
    <div class="col-md-12">

        <div class="card">
            <div class="card-title" style="padding:5px 25px;display:flex;justify-content: space-between;align-items: center">
                <h4 style="margin:0;">@if(isset($content->name)) {{__('datatables.pages.'.$type.'.form.editing')}} @else {{__('datatables.pages.'.$type.'.form.create-title')}} @endif </h4>
                <a href="{{route('admin.'.$type.'.index')}}" class="btn btn-warning btn-sm"><i class="nc-icon nc-minimal-left mr-2"></i>{{__('datatables.pages.'.$type.'.form.back')}}</a>
            </div>
            @include('backend.partials.errors')
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.modals.create-content')
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-block btn-primary" id="sendForm">@if(isset($content->name)) {{__('datatables.pages.'.$type.'.form.edit-button')}} @else {{__('datatables.pages.'.$type.'.form.add-button')}} @endif</button>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
    @include('backend.scripts.content_create_datatable')
@endsection
