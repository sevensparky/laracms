@include('admin.section.header')
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ route('panel.index') }}" class="site_title"><img src="{{ asset("images/icons/logo.png") }}" width="64" height="64"> <span>پنل کاربری</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        @if (auth()->user()->image != null)
                            <img src="{{ asset("storage/". auth()->user()->image) }}" class="profile-sidebar" /> 
                        @else
                            <img src="{{ asset("images/user.png") }}" height="128" width="128" />
                        @endif
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                @include('admin.section.sidebar')
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                               @if (auth()->user()->image != null)
                               <img src="{{ asset("storage/". auth()->user()->image) }}" class="profile-nav" height="128" width="128" /> 
                                @else
                                    <img src="{{ asset("images/user.png") }}" height="128" width="128" />
                                @endif
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ route('profile') }}"> نمایه</a></li>
                                <li>
                                    <a href="{{ route('change-password.view') }}">
                                        <span>تغییر رمز عبور</span>
                                    </a>
                                </li>
                                <li><a href="{{ route('home') }}">برگشت به صفحه اصلی</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" style="border: none;background-color: transparent;margin-right: 16px;"> خروج</button>
                                    </form> 
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->
        
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        @yield('app')
    </div>
</div>
<!-- /page content -->

@include('admin.section.footer')