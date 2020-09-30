<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/assets/img//apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('backend/assets/img//favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
      {{\App\Models\Setting::where('key','Site Adı')->first()->value.' | '. \App\Models\Setting::where('key','Site Sloganı')->first()->value}}

  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <script src="https://kit.fontawesome.com/236834c657.js" crossorigin="anonymous"></script>
    <style>
        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
        }
    </style>
  @include('backend.partials.metatags')
  @stack('styles')
</head>

@yield('content')

@stack('scripts')
</html>
