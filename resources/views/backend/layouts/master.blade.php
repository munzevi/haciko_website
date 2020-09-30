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
            background-color: #608CEE;
        }
    </style>
  @include('backend.partials.metatags')
  @stack('styles')
</head>
<body>

  <div class="wrapper">
    @include('backend.partials.sidebar')
    <div class="main-panel" >
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round btn-danger">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">@yield('page_header')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="user" style="display: flex;align-items:center;">
              <div class="photo" style="margin-right: 10px;font-size:18px;margin-top:5px;">
                <i class="nc-icon nc-circle-10"></i>
              </div>
              <div class="info">
                <a class="dropdown-toggle" href="#" id="userDropDownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>
                    {{Auth::user()->name}}
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropDownMenu" style="margin-right:20px;border:1px solid #5555;">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <div class="content">
        <div class="row" style="display:block;">
          @yield('content')
        </div>
        @include('backend.partials.footer')
      </div>
    </div>
  </div>
  @yield('filemanager')
  <!--   Core JS Files   -->
  <script src="{{asset('backend/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{asset('backend/assets/js/paper-dashboard.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>


  @yield('scripts')
</body>

</html>
