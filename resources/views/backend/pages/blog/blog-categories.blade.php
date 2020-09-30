@extends('backend.layouts.master')

@push('styles')
  <link href="{{asset('backend/assets/vendor/DataTables/datatables.css')}}" rel="stylesheet" />
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
    @media (min-width: 768px) {
        .modal-xl {
            width: 90%;
            max-width:1200px;
            font-align:left;
        }
    }
  </style>
<script src="{{asset('backend/assets/vendor/slim-select/dist/slimselect.min.js')}}"></script>
<link href="{{asset('backend/assets/vendor/slim-select/dist/slimselect.css')}}" rel="stylesheet"></link>
<link href="{{asset('backend/assets/vendor/animate.css')}}" rel="stylesheet"></link>
@endpush
@section('page_header')
{{__('datatables.pages.blog-categories.header') }}
@endsection

@section('content')
<div class="col-md-12">
  <div class="card ">

    <div class="card-body ">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered responsive" id="datatable-table">


          </table>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('backend/assets/vendor/DataTables/datatables.js')}}"></script>
<script src="{{asset('backend/assets/vendor/DataTables/buttons.server-side.js')}}"></script>


@include('backend.modals.contentsdatatable')
@include('backend.scripts.contentsdatatable')

@endsection
