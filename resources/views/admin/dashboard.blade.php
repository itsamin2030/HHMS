@extends('layouts.app')
@section('title') HHMS @endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row text-center" style="display: inline-block;" >
          <div class="tile_count">
          <div class="col-md-2 col-sm-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i></i> @lang('admin_menu.total_patients')</span>
              <div class="count green ">1987</div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar"></i> @lang('admin_menu.today_appointment')</span>
              <div class="count green">1780</div>

              </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"> <i class="fa fa-male"></i> @lang('admin_menu.total_patients_m')</span>
              <div class="count blue">535</div>

            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-female"></i>@lang('admin_menu.total_patients_f')</span>
              <div class="count purple">520</div>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-check-circle"></i> @lang('admin_menu.completed_ap')</span>
              <div class="count blue ">1055</div>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-spinner"></i> @lang('admin_menu.coming_ap')</span>
              <div class="count red">725</div>

            </div>
          </div>
</div>
      <div class="row">
          <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                      <h2>@lang('admin_menu.avg_vn') </h2>
                      <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <h4>@lang('admin_menu.according_vt')</h4>
                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>@lang('admin_menu.temp')</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                      <span class="sr-only">60% @lang('admin_menu.complete')</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>65k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>

                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>@lang('admin_menu.suger')</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                      <span class="sr-only">60% @lang('admin_menu.complete')</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>53k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>@lang('admin_menu.pressure_blood')</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                      <span class="sr-only">60% @lang('admin_menu.complete')</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>23k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>

                  </div>
              </div>
          </div>

          <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile overflow_hidden">
                  <div class="x_title">
                      <h2>@lang('admin_menu.percentage_pat_dist')</h2>
                      <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="" style="width:90%">

                          <td>
                              <canvas class="canvasDoughnut" id="canvasDoughnut" height="" width="" style="margin: 15px 10px 10px 0"></canvas>
                          </td>
                          <td>
                              <table class="tile_info">
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square blue"></i>البندر </p>
                                      </td>
                                      <td>50%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square green"></i>العقيق </p>
                                      </td>
                                      <td>10%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square purple"></i>العامودي </p>
                                      </td>
                                      <td>20%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square aero"></i>المروج </p>
                                      </td>
                                      <td>15%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square red"></i>@lang('admin_menu.others') </p>
                                      </td>
                                      <td>30%</td>
                                  </tr>
                              </table>
                          </td>
                          </tr>
                      </table>
                  </div>
              </div>
          </div>

          <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                      <h2>@lang('admin_menu.quick_links')</h2>
                      <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                              </div>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="dashboard-widget-content">
                          <ul class="quick-list">
                              <li><a href="#/plus-square"><i class="fa fa-plus-square"></i> @lang('admin_menu.link_c_doc')</a>
                              </li>
                              <li><a href="#/list-ul"><i class="fa fa-list-ul"></i> @lang('admin_menu.appointment_list')</a>
                              </li>
                              <li><a href="#/wheelchair"><i class="fa fa-wheelchair"></i> @lang('admin_menu.patients_list')</a> </li>
                              <li><a href="#/user-md"><i class="fa fa-user-md"></i> @lang('admin_menu.doctor_list')</a>
                              </li>


                              <li><a href="#/sign-out"><i class="fa fa-sign-out"></i> @lang('admin_menu.logout')</a>
                              </li>
                          </ul>

                          <div class="sidebar-widget">
                              <h4>@lang('admin_menu.apps_confirmation')</h4>
                              <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                              <div class="goal-wrapper">
                                  <span id="gauge-text" class="gauge-value pull-left">0</span>
                                  <span class="gauge-value pull-left">%</span>
                                  <span id="goal-text" class="goal-value pull-right">100%</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>


          </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript">
            const ctx = document.getElementById('canvasDoughnut');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["البندر", "العقيق", "العامودي", "المروج", "@lang('admin_menu.others')"],
                    datasets: [{
                        data: [15, 20, 30, 10, 30],
                        backgroundColor: ["#BDC3C7", "#9B59B6", "#E74C3C", "#26B99A", "#3498DB"],
                        hoverBackgroundColor: ["#CFD4D8", "#B370CF", "#E95E4F", "#36CAAB", "#49A9EA"]
                    }]
                },
                options: {
                    legend: !1,
                    responsive: !1
                }
            });
        </script>

        <!-- /page content -->
@endsection
