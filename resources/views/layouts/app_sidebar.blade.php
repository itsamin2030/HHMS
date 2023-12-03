  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-asterisk"></i> <span>HHMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <li><a href="/"><i class="fas fa-home"></i> @lang('admin_menu.dashboard') </a>


                  <li><a><i class="fa fa-user-md"></i> @lang('admin_menu.doctor') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('doctor.create')}}">@lang('admin_menu.add_doctor')</a></li>
                      <li><a href="{{url('doctor')}}">@lang('admin_menu.doctor_list')</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fas fa-edit"></i> @lang('admin_menu.patient') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
{{--                      <li><a href="{{url('patient/new')}}">@lang('admin_menu.add_patient')</a></li>--}}
                      <li><a href="{{url('patient')}}">@lang('admin_menu.patients')</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fas fa-user-md"></i> @lang('admin_menu.appointment') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('appointment') }}">@lang('admin_menu.appointment_list')</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fas fa-pills"></i> @lang('admin_menu.medicine') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('medicine_category.index')}}">@lang('admin_menu.medicine_cat')</a></li>
                      <li><a href="{{route('medicine.index')}}">@lang('admin_menu.medicine_list')</a></li>
                      <li><a href="{{route('medicine.create')}}">@lang('admin_menu.add_medicine')</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>

            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
            </div>
          </div>
        </div>
        </div>
