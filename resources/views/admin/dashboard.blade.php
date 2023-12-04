@extends('layouts.app')
@section('title') Hospital Management System @endsection
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row text-center" style="display: inline-block;" >
          <div class="tile_count">
          <div class="col-md-2 col-sm-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i></i> Total patients</span>
              <div class="count green ">1987</div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-calendar"></i> Today Appointments</span>
              <div class="count green">1780</div>

              </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"> <i class="fa fa-male"></i> Total Patients (Male)</span>
              <div class="count blue">535</div>

            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-female"></i>Total Patients (Female)</span>
              <div class="count purple">520</div>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-check-circle"></i> Completed Ap.</span>
              <div class="count blue ">1055</div>

            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-spinner"></i> Coming Ap.</span>
              <div class="count red">725</div>

            </div>
          </div>
</div>
      <div class="row">
          <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                      <h2>Average vital numbers </h2>
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
                      <h4>According to the Vital Types</h4>
                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>Temp</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                      <span class="sr-only">60% Complete</span>
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
                              <span>Suger</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                      <span class="sr-only">60% Complete</span>
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
                              <span>Pressure Blood</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                      <span class="sr-only">60% Complete</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>23k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>April</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                      <span class="sr-only">60% Complete</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>3k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <div class="widget_summary">
                          <div class="w_left w_25">
                              <span>May</span>
                          </div>
                          <div class="w_center w_55">
                              <div class="progress">
                                  <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                      <span class="sr-only">60% Complete</span>
                                  </div>
                              </div>
                          </div>
                          <div class="w_right w_20">
                              <span>1k</span>
                          </div>
                          <div class="clearfix"></div>
                      </div>

                  </div>
              </div>
          </div>

          <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile overflow_hidden">
                  <div class="x_title">
                      <h2>PercentagPatients by neighborhood</h2>
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
                                          <p><i class="fa fa-square blue"></i>AlBander </p>
                                      </td>
                                      <td>50%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square green"></i>AlAqiq </p>
                                      </td>
                                      <td>10%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square purple"></i>AlAmoudi </p>
                                      </td>
                                      <td>20%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square aero"></i>AlMoroj </p>
                                      </td>
                                      <td>15%</td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <p><i class="fa fa-square red"></i>Others </p>
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
                      <h2>Quick Links</h2>
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
                              <li><a href="#/plus-square"><i class="fa fa-plus-square"></i> Create a doctor</a>
                              </li>
                              <li><a href="#/list-ul"><i class="fa fa-list-ul"></i> View Appointments</a>
                              </li>
                              <li><a href="#/wheelchair"><i class="fa fa-wheelchair"></i> View patients</a> </li>
                              <li><a href="#/user-md"><i class="fa fa-user-md"></i> View doctors</a>
                              </li>


                              <li><a href="#/sign-out"><i class="fa fa-sign-out"></i> Logout</a>
                              </li>
                          </ul>

                          <div class="sidebar-widget">
                              <h4>Appointments Confirmation</h4>
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
                    labels: ["AlBander", "AlAqiq", "AlAmoudi", "AlMoroj", "Other"],
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
