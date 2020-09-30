@extends('backend.layouts.master')
@push('styles')
  <link href="{{asset('backend/assets/vendor/DataTables/datatables.css')}}" rel="stylesheet" />
  <style type="text/css" media="screen">
    .button-group{
      text-align: right;
    }
    .top-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
    }
    .toolbar{ margin-bottom:5px; }
  </style>
<script src="{{asset('backend/assets/vendor/slim-select/dist/slimselect.min.js')}}"></script>
<link href="{{asset('backend/assets/vendor/slim-select/dist/slimselect.css')}}" rel="stylesheet"></link>
@endpush
@section('page_header')
{{__('datatables.pages.settings.header') }}
@endsection

@section('content')
<div class="col-md-12">
  <div class="card ">
    <div class="card-body ">
      <div class="row">
        <div class="col-md-12">

          <table class="table table-striped table-bordered responsive" id="settingsdatatable-table">

          </table>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="row filter-wrapper" id="filter-wrapper">
<div class="row">
  <div class="col-md-6 col-sm-12">
    <select id="dropdown1" class="form-control form-control-sm filter-segment">
      <option value="">Tüm Segmentler</option>
    @foreach(config('cms.setting_segments') as $key => $segment)
      <option value="{{$segment}}">{{$segment}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-6 col-sm-12">
    <select id="dropdown2" class="form-control form-control-sm filter-language">
      <option value="">Tüm Diller</option>
      <option value="Turkish">Turkish</option>
      <option value="English">English</option>
    </select>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('backend/assets/vendor/DataTables/datatables.js')}}"></script>
<script src="{{asset('backend/assets/vendor/DataTables/buttons.server-side.js')}}"></script>


@include('backend.modals.settingsdatatable')
@include('backend.scripts.settingsdatatable')

@endsection
