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
            <a class="navbar-brand" href="#pablo">Sayfa Başlığı</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="user" style="display: flex;">
              <div class="photo" style="margin-right: 10px;">
                <img src="{{asset('backend/assets/img/faces/ayo-ogunseinde-2.jpg')}}" />
              </div>
              <div class="info">
                <a class="dropdown-toggle" href="http://example.com" id="userDropDownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>
                    {{Auth::user()->name}}
                   </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropDownMenu" style="margin-right:20px;border:1px solid #5555;">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <div class="content">
        <div class="row">
          @yield('content')
        </div>
      </div>
      @include('backend.partials.footer')
    </div>
