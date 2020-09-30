@extends('backend.layouts.master')

@push('styles')
  <link href="{{asset('backend/assets/vendor/DataTables/datatables.css')}}" rel="stylesheet" />
  <style type="text/css" media="screen">
    .button-group{
      text-align: right;
    }
    input[type="text"] {
        height:2.3rem;
    }
    #thumbnail2{
        margin-top:12px;
    }
    .input-group{
        margin-bottom: 0;
    }
    .addTitle, .addSubtitle{
        float:right;
    }
    @media (min-width: 768px) {
        .modal-xl {
            width: 90%;
            max-width:1200px;
        }
    }

  </style>
@endpush
@section('page_header')
{{__('datatables.pages.sliders.header') }}
@endsection

@section('content')
<div class="col-md-12">
  <div class="card ">
    <div class="card-body ">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered responsive" id="slidersdatatable-table">

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


@include('backend.modals.slidersdatatable')
@include('backend.scripts.slidersdatatable')

@endsection
