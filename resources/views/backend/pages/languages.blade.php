@extends('backend.layouts.master')

@push('styles')
  <link href="{{asset('backend/assets/vendor/DataTables/datatables.css')}}" rel="stylesheet" />
  <style type="text/css" media="screen">
    .button-group{
      text-align: right;
    }
  </style>
<script src="{{asset('backend/assets/vendor/slim-select/dist/slimselect.min.js')}}"></script>
<link href="{{asset('backend/assets/vendor/slim-select/dist/slimselect.css')}}" rel="stylesheet"></link>
@endpush
@section('page_header')
{{__('datatables.pages.languages.header') }}
@endsection

@section('content')
<div class="col-md-12">
  <div class="card ">
    <div class="card-body ">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered responsive" id="languagesdatatable-table">

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


@include('backend.modals.languagesdatatable')
@include('backend.scripts.languagesdatatable')

@endsection
