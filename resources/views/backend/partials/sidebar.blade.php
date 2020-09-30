<div class="sidebar" data-color="white" data-active-color="danger" >

    <div class="logo">

        <a href="#" class="simple-text logo-normal" style="display:flex;align-items:center;justify-content: center;">
            <i class="nc-icon nc-layout-11" style="font-size:18;"></i> <span style="margin:0 10px;">{{\App\Models\Setting::where('key','Site Adı')->first()->value}} </span>

        </a>
    </div>
    <div class="sidebar-wrapper" style="overflow-x: hidden;">
        <ul class="nav">
            <li @if(\Request::is("*home")) class="active" @else class="" @endif >
                <a href="{{route('admin.home')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{__('sidebar.home')}}</p>
                </a>
            </li>
            <li @if(\Request::is("*pages*")) class="active" @else class="" @endif >
                <a href="{{route('admin.pages.index')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{__('sidebar.contents')}}</p>
                </a>
            </li>
            <li @if(\Request::is('*blog*')) class="active" @else class="" @endif>
                <a data-toggle="collapse" href="#blog"  @if(\Request::is('*blog*')) aria-expanded="true" @endif>
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p>
                        {{__('sidebar.blog')}}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(\Request::is('*blog*')) show @endif " id="blog">
                    <ul class="nav">
                        <li @if(\Request::is('*posts*')) class="active" @else class="" @endif>
                            <a href="{{route('admin.posts.index')}}">
                                <span class="nc-icon nc-paper sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.blog_post')}} </span>
                            </a>
                        </li>
                        <li @if(\Request::is('*blog-categories')) class="active" @else class="" @endif>
                            <a href="{{route('admin.blog-categories.index')}}">
                                <span class="nc-icon nc-box-2 sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.blog_category')}} </span>
                            </a>
                        </li>

                        <li @if(Request::is('*tags*')) class="active" @else class="" @endif>

                            <a href="{{route('admin.tags.index')}}">
                                <span class="nc-icon nc-book-bookmark sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.tags')}} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if(\Request::is("*filemanager")) class="active" @else class="" @endif >
                <a href="{{route('admin.filemanager')}}">
                    <i class="nc-icon nc-camera-compact"></i>
                    <p>{{__('sidebar.filemanager')}}</p>
                </a>
            </li>
            <li @if(\Request::is("*sliders*")) class="active" @else class="" @endif >
                <a href="{{route('admin.sliders.index')}}">
                    <i class="nc-icon nc-palette"></i>
                    <p>{{__('sidebar.sliders')}}</p>
                </a>
            </li>
            <li @if(\Request::is('*management*')) class="active" @else class="" @endif>
                <a data-toggle="collapse" href="#usersmanagement"  @if(\Request::is('*management*')) aria-expanded="true" @endif>
                    <i class="nc-icon nc-badge"></i>
                    <p>
                        {{__('sidebar.management')}}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(\Request::is('*management*')) show @endif " id="usersmanagement">
                    <ul class="nav">
                        <li @if(\Request::is('*users*')) class="active" @else class="" @endif>
                            <a href="{{route('admin.users.index')}}">
                                <span class="nc-icon nc-single-02 sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.users')}} </span>
                            </a>
                        </li>
                        <li @if(\Request::is('*permissions*')) class="active" @else class="" @endif>
                            <a href="{{route('admin.permissions.index')}}">
                                <span class="nc-icon nc-key-25 sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.permissions')}} </span>
                            </a>
                        </li>

                        <li @if(Request::is('*roles*')) class="active" @else class="" @endif>

                            <a href="{{route('admin.roles.index')}}">
                                <span class="nc-icon nc-lock-circle-open sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.roles')}} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if(\Request::is("*settings*")) class="active" @else class="" @endif >
                <a data-toggle="collapse" href="#settings" @if(\Request::is('*management*')) aria-expanded="true" @endif>
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p>{{__('sidebar.settings')}}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(\Request::is('*settings*')) show @endif " id="settings">
                    <ul class="nav">
                        <li @if(\Request::is('*settings')) class="active" @else class="" @endif>
                            <a href="{{route('admin.settings.index')}}">
                                <span class="nc-icon nc-bullet-list-67 sidebar-mini-icon"></span>
                                <span class="sidebar-normal"> {{__('sidebar.settings')}} </span>
                            </a>
                        </li>
                        <li @if(\Request::is("*languages")) class="active" @else class="" @endif >
                            <a href="{{route('admin.languages.index')}}">
                                <span class="nc-icon nc-world-2  sidebar-mini-icon"></span>
                                <span class="sidebar-normal">{{__('sidebar.languages')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

    </div>
</div>
