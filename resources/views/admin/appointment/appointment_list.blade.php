@extends('layouts.app')
@section('title') @lang('admin_menu.appointment') | HHMS @endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>@lang('admin_menu.appointment')</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">@lang('admin_menu.add_appointment')</button>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>@lang('admin_menu.appointment_list')</h2>
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
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>@lang('admin_menu.patient_name')</th>
                        <th>@lang('admin_menu.guardian_phone')</th>
                        <th>@lang('admin_menu.district')</th>
                        <th>@lang('admin_menu.schedule')</th>
                        <th>@lang('admin_menu.statue')</th>
                        <th>@lang('admin_menu.actions')
                          <form method="get" id="success" action="{{url('appointment.success')}}">
                            <input type="hidden" readonly name="status" id="status">
                            <button id="success" type="submit" hidden></button>
                          </form>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($appointments as $appointment)
                      <tr>
                        <td>{{$appointment->id}}</td>
                        <td>@php $patient=collect($patients)->where('pat_id',$appointment->pat_id)->first() @endphp
                          {{$patient->pat_name}}
                        </td>
                        <td>{{$patient->pat_grPhone}}</td>
                        <td>
                          {{$patient->district}}</td>
                        <td id="ldatetime" get-id="{{$appointment->id}}">{{$appointment->app_datetime}}</td>
                        <td>@if($appointment->statue=='hold')
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                              @lang('admin_menu.app_hold')
                            </button>
                            <div class="dropdown-menu">
                              <button class="dropdown-item" id="status" data="confirmed" get_id="{{$appointment->id}}">@lang('admin_menu.app_confirm')</button>
                              <button class="dropdown-item" id="status" data="rejected" get_id="{{$appointment->id}}">@lang('admin_menu.app_reject')</button>
                            </div>
                          </div>

                          @elseif($appointment->statue=='confirmed')
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                              @lang('admin_menu.app_confirm')
                            </button>
                            <div class="dropdown-menu">
                              <button class="dropdown-item" id="status" data="hold" get_id="{{$appointment->id}}">@lang('admin_menu.app_hold')</button>
                              <button class="dropdown-item" id="status" data="rejected" get_id="{{$appointment->id}}">@lang('admin_menu.app_reject')</button>
                            </div>
                          </div>
                          @else
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
                                @lang('admin_menu.app_reject')
                            </button>
                            <div class="dropdown-menu">
                              <button class="dropdown-item" id="status" data="hold" get_id="{{$appointment->id}}">@lang('admin_menu.app_hold')</button>
                              <button class="dropdown-item" id="status" data="confirmed" get_id="{{$appointment->id}}">@lang('admin_menu.app_confirm')</button>
                            </div>
                          </div>
                          @endif
                        </td>
                        <td>
                          <button class='show btn btn-outline-primary btn-sm' data-toggle='modal' data-target='#showModal' data="{{$appointment->id}}"><i class="fa fa-eye"></i></button>
                          <button class="btn btn-outline-danger btn-sm delete" data="{{$appointment->id}}"><i class="fa fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Insert Modal -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form id="form" method="post">
      <div class="modal-content">
      <div class="modal-header" style="background-color:  #808080; height: 60px;">
	               	<h5 class="modal-title" style="color: white;">@lang('admin_menu.add_appointment')</h5>
	             	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	               	<span aria-hidden="true" style="color: white;">&times;</span></button>
	           	</div>
        <div class="modal-body">
          <div class="row">

            <div class="col-md-8">
              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <label for="app_pat_id"><b>@lang('admin_menu.patient')</b></label>
                  <div>
                    <select class="form-control" id="app_pat_id" name="app_pat_id">
                      <option selected hidden>-----Choose Patient-----</option>
                      @foreach($patients as $patient)
                      <option value="{{$patient->pat_id}}">{{$patient->pat_name}} ({{$patient->pat_nid}})</option>
                      @endforeach
                    </select>
                    <span id="app_patient"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="pat_age"><b>@lang('admin_menu.age')</b></label>
                  <div>
                    <input type="text" readonly class="form-control" id="pat_age" placeholder="@lang('admin_menu.age')" />
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="pat_GrPhone"><b>@lang('admin_menu.guardian_phone')</b></label>
                  <div>
                    <input class="form-control" readonly type="text" id="pat_GrPhone" placeholder="@lang('admin_menu.guardian_phone')" />
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <label for="app_patStatue"><b>@lang('admin_menu.pat_statue')</b></label>
                  <div>
                    <textarea rows="2" class="form-control" id="app_patStatue" placeholder="@lang('admin_menu.pat_statue')" name="app_patStatue"></textarea>
                    <span id="app_message_error"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <label for="app_recommand"><b>@lang('admin_menu.pat_recommand')</b></label>
                  <div>
                    <textarea rows="2" class="form-control" id="app_recommand" placeholder="@lang('admin_menu.pat_recommand')" name="app_recomand"></textarea>
                    <span id="app_message_error"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4" style="background: #f4f4f4;">
              <div class="form-group col-md-12">
                <label for="app_datetime"><b>@lang('admin_menu.app_date')</b></label>
                <div>
                  <input class="form-control" id="app_datetime" placeholder="@lang('admin_menu.app_date')" name="app_datetime" />
                  <span id="app_date_error"></span>
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="app_dist"><b>@lang('admin_menu.district')</b></label>
                <div>
                    <input class="form-control" readonly type="text" id="app_dist" placeholder="@lang('admin_menu.district')" />
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="app_statue"><b>@lang('admin_menu.statue')</b></label>
                <div>
                  <select class="form-control" id="app_statue" name="app_statue">
                    <option value="hold">@lang('admin_menu.app_hold')</option>
                    <option value="confirmed">@lang('admin_menu.app_confirm')</option>
                    <option value="rejected">@lang('admin_menu.app_reject')</option>
                  </select>
                  <span id="app_status_error"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
        </div>
    </form>
  </div>
</div>

<!-- SHOW MODAL -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:  #808080; height: 60px;">
                <h5 class="modal-title" style="color: white;">@lang('admin_menu.appointment')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">&times;</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.appointment') #</b></h6>
                    <p style="display:inline" id="mapp_id"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.schedule'):</b></h6>
                    <p style="display:inline" id="mapp_datetime"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.pat_statue'):</b></h6>
                    <p style="display:inline" id="mapp_patstatue"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.pat_recommand'):</b></h6>
                    <p style="display:inline" id="mapp_recommand"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.patient_name'):</b></h6>
                    <p style="display:inline" id="mpat_name"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.NiD'):</b></h6>
                    <p style="display:inline" id="mpat_NiD"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.guardian_name'):</b></h6>
                    <p id="mpat_grName" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.guardian_phone'):</b></h6>
                    <p style="display:inline" id="mpat_grPhone"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.age'):</b></h6>
                    <p style="display:inline" id="mpat_age"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.gender'):</b></h6>
                    <p id="mgender" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.district'):</b></h6>
                    <p id="mdistrict" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.symptoms'):</b></h6>
                    <p id="mpat_symptoms" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.note'):</b></h6>
                    <p id="mpat_note" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.location'):</b></h6>
                    <a href="#" id="mlocation" target="_blank" class="btn btn-round btn-info btn-sm">@lang('admin_menu.google_maps')</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id='writebtn' class="btn btn-primary" data-toggle='modal' data-target='#reportModal' disabled>@lang('admin_menu.app_writeReport')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- Write Report Modal -->
<div id="reportModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form id="reportform" method="post">
            <div class="modal-content">
                <div class="modal-header" style="background-color:  #808080; height: 60px;">
                    <h5 class="modal-title" style="color: white;">@lang('admin_menu.app_writeReport')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="app_id"><b>@lang('admin_menu.appointment') #</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="rapp_id" name="app_id" data-noreset='true' readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="rpat_statue"><b>@lang('admin_menu.pat_statue')</b></label>
                                    <div>
                                        <input type="text" name="patStatue" class="form-control" id="rpat_statue" placeholder="@lang('admin_menu.pat_statue')" />
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rpat_recommand"><b>@lang('admin_menu.pat_recommand')</b></label>
                                    <div>
                                        <input class="form-control" name="recommand" type="text" id="rpat_recommand" placeholder="@lang('admin_menu.pat_recommand')" />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="clearreportform()" class="btn btn-warning btn-sm" >Clear</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {

    $(document).on("change", "#app_pat_id", function() {
      var app_pat_id = $(this).val();
      $.ajax({
        url: "{{url('appointment')}}" + "/patient/" + app_pat_id,
        type: 'get',
        dataType: "json",
        success: function(data) {
          $("#pat_GrPhone").val(data.pat.pat_grPhone);
          $("#pat_age").val(data.pat.pat_age);
          $("#app_dist").val(data.district.dist_name);
        }
      });
    });


    $(document).on("submit", "#form", function(e) {
      e.preventDefault();
      var data = $(this).serializeArray();

      $.ajax({
        url: "{{route('appointment.store')}}",
        data: data,
        type: "post",
        dataType: "json",
        success: function(data) {
          $('#status').val('Inserted');
          $('#success').submit();
        },
        error: function(errors) {
          let error = JSON.parse(errors.responseText).errors;
          if(error='Have appointment at same datetime.'){
              new PNotify({
                  title: 'Warning',
                  text: 'Have appointment at same datetime.',
                  styling: 'bootstrap3'
              });
          }else{
              $.each(error, function(i, message) {
                  $("#" + i + "_error").html('<span class="help-block" style="color:red;">' + message + '</span>');
              });
          }
        }
      });
    });

    $(document).on("click", ".delete", function() {
      var data = $(this).attr("data");

      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "/appointment/" + data,
              type: "delete",
              dataType: "json",
              success: function(data) {
                if (data.status == 200) {
                  $('#status').val('Deleted');
                  $('#success').submit();
                } else {
                  toastr["error"]("Something Went Wrong");
                }
              }
            });
          } else {
            swal("Your Data is safe!");
          }
        });
    });

    $(document).on('click', '#status', function() {
      var id = $(this).attr("get_id");
      var status = $(this).attr("data");
      $.ajax({
        url: "{{url('appointment.update')}}",
        type: "get",
        data: {
          id: id,
          status: status
        },
        dataType: "json",
        success: function(data) {
          $('#success').submit();
        }
      });
    });

    $(document).on('click', '.show', function() {
      var id = $(this).attr("data");
      $.ajax({
        url: "{{url('appointment.show')}}",
        type: 'get',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {
            $("#mapp_id").text(data.appointment.id);
            $("#mapp_datetime").text(data.appointment.app_datetime);
            $("#mapp_patstatue").text(data.appointment.patStatue);
            $("#mapp_recommand").text(data.appointment.recommand);
            $("#mpat_name").text(data.patient.pat_name);
            $("#mpat_NiD").text(data.patient.pat_nid);
            $("#mpat_grName").text(data.patient.pat_grName);
            $("#mpat_grPhone").text(data.patient.pat_grPhone);
            $("#mpat_age").text(data.patient.pat_age);
            $("#mgender").text(data.patient.gender);
            $("#mdistrict").text(data.district.dist_name);
            $("#mpat_symptoms").text(data.patient.pat_symptoms);
            $('#mpat_note').text(data.patient.pat_note);
            // Google Maps
            $('#mlocation').attr('href','https://www.google.com/maps/search/?api=1&query='+data.patient.longitude+','+data.patient.latitude);
            // End
            if(data.report==1){
                $('#writebtn').attr('disabled',null);
                $('#writebtn').attr('data',data.appointment.id);
            }else{$('#writebtn').attr('disabled','disabled');}
        }
      });
    });

      $(document).on('click', '#writebtn', function() {
          var id = $(this).attr("data");
          $.ajax({
              url: "{{url('appointment.show')}}",
              type: 'get',
              data: {
                  id: id
              },
              dataType: 'json',
              success: function(data) {
                  $("#rapp_id").val(data.appointment.id);
                  $("#rpat_statue").val(data.appointment.patStatue);
                  $("#rpat_recommand").val(data.appointment.recommand);
                  if(data.report==1){
                      $('#writebtn').attr('disabled',null);
                  }else{$('#writebtn').attr('disabled','disabled');}
              }
          });
      });

      $(document).on("submit", "#reportform", function(e) {
          e.preventDefault();
          var data = $(this).serializeArray();

          $.ajax({
              url: "{{route('appointment.report')}}",
              data: data,
              type: "post",
              dataType: "json",
              success: function(data) {
                  $('#status').val('Report was Wrote.');
                  $('#success').submit();
              },
              error: function(errors) {
                  let error = JSON.parse(errors.responseText).errors;
              }
          });
      });


    // edit datetime
      $(document).on('dblclick', '#ldatetime', function() {
          var toggleDatetime = $(this).html();
          if(toggleDatetime.search("form")=="-1"){
              var id = $(this).attr("get-id");
              var ldatetime = $(this).html();
              $(this).html('<form id="ldatetimeform" method="post"><input type="hidden" id="lapp_id" value="'+id+'" ><input class="form-control" id="lapp_datetime" value="'+ldatetime+'" placeholder="@lang("admin_menu.app_date")"name="app_datetime"/> <button class="btn btn-outline-success btn-sm" type="submit"><i class="fa fa-pencil"></i></button> <button class="btn btn-outline-danger btn-sm"  id="lclose-btn" type="button"><i class="fa fa-close"></i></button> </form>'
              );
              $(document).on('click', '#lclose-btn', function(){
                  $('[get-id='+id+']').html(ldatetime);
              });
          }
      });
      $(document).on('submit', '#ldatetimeform', function (e) {
          e.preventDefault();
          var data = $(this).serializeArray();

          var app_id = $('#lapp_id').val();
          var app_datetime = $('#lapp_datetime').val();
          $.ajax({
              url: "{{url('appointment.updateDatetime')}}",
              type: "post",
              data: {
                  id: app_id,
                  app_datetime: app_datetime
              },
              dataType: "json",
              success: function (data) {
                  $('[get-id='+app_id+']').html(app_datetime);
              },
              error: function(errors) {
                  let error = JSON.parse(errors.responseText).errors;
                  if(error='Have appointment at same datetime.'){
                      new PNotify({
                          title: 'Warning',
                          text: 'Have appointment at same datetime.',
                          styling: 'bootstrap3'
                      });
                  }else{
                      $.each(error, function(i, message) {
                          $("#" + i + "_error").html('<span class="help-block" style="color:red;">' + message + '</span>');
                      });
                  }
              }
          });
      });

      $(document).on('change', '#app_datetime,#lapp_datetime', function() {
          var odatetime = $(this).val();
          const arraydt = odatetime.split(':');
          var newDatetime = arraydt[0]+":00:00";
          $(this).val(newDatetime);
          if(arraydt[1]>0){
              new PNotify({
                  title: 'Warning',
                  text: "You can't using a minutes.",
                  styling: 'bootstrap3'
              });
          }
      });
  });

  function clearreportform() {
      var fieldsToReset = document.querySelectorAll("input:not([data-noreset='true'])")
      for(var i=0;i<fieldsToReset.length;i++){
          fieldsToReset[i].value = null;
      }
  }

  $("#example").dataTable();

  jQuery(function($) {
    $("#app_datetime").datetimepicker({
      dateFormat: 'yy-mm-dd',
    });
  });

  jQuery(function($) {
    $("#lapp_datetime").datetimepicker({
      dateFormat: 'yy-mm-dd',
    });
  });
</script>
@endsection
