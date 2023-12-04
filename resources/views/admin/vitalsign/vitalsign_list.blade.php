@extends('layouts.app')
@section('title') @lang('admin_menu.vitalsigns') | HHMS @endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>@lang('admin_menu.vitalsigns')</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">@lang('admin_menu.add_vitalsign')</button>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>@lang('admin_menu.vitalsigns_list')</h2>
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
                        <th>@lang('admin_menu.district')</th>
                        <th>@lang('admin_menu.vitalsign') #1</th>
                        <th>@lang('admin_menu.vitalsign') #2</th>
                        <th>@lang('admin_menu.vitalsign_type')</th>
                        <th>@lang('admin_menu.vitalBy')</th>
                        <th>@lang('admin_menu.vitalDate')</th>
                        <th>@lang('admin_menu.actions')
                          <form method="get" id="success" action="{{url('vitalsign.success')}}">
                            <input type="hidden" readonly name="status" id="status">
                            <button id="success" type="submit" hidden></button>
                          </form>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($vitals as $vital)
                      <tr>
                        <td>{{$vital->id}}</td>
                        <td>@php $patient=collect($patients)->where('pat_id',$vital->pat_id)->first() @endphp
                          {{$patient->pat_name}}
                        </td>
                        <td>{{$patient->district}}</td>
                        <td>{{$vital->vsNum}}</td>
                        <td>{{$vital->vsNum2}}</td>
                        <td>{{$vital->type}}</td>
                        <td>{{$vital->userBy}}</td>
                        <td>{{$vital->created_at}}</td>
                        <td>
                          <button class='show btn btn-outline-primary btn-sm' data-toggle='modal' data-target='#showModal' data="{{$vital->id}}"><i class="fa fa-eye"></i></button>
                          <button class="btn btn-outline-danger btn-sm delete" data="{{$vital->id}}"><i class="fa fa-trash-alt"></i></button>
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
	               	<h5 class="modal-title" style="color: white;">@lang('admin_menu.add_vitalsign')</h5>
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

              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label for="vsNum"><b>@lang('admin_menu.vitalsign') #1</b></label>
                  <div>
                      <input class="form-control" type="number" id="vsNum" name="vsNum" placeholder="@lang('admin_menu.vitalsign') #1" />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label for="vsNum2"><b>@lang('admin_menu.vitalsign') #2</b></label>
                  <div>
                      <input class="form-control" name="vsNum2"  type="number" id="vsNum2" value='0' placeholder="@lang('admin_menu.vitalsign') #2" />
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4" style="background: #f4f4f4;">
              <div class="form-group col-md-12">
                  <label for="vitaltype"><b>@lang('admin_menu.vitalsign_type')</b></label>
                  <div>
                      <select class="form-control" id="vitaltype" name="vitaltype">
                          <option selected hidden>-----Choose Type-----</option>
                          @foreach($options as $option)
                              <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                          @endforeach
                      </select>
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="app_dist"><b>@lang('admin_menu.district')</b></label>
                <div>
                    <input class="form-control" readonly type="text" id="app_dist" placeholder="@lang('admin_menu.district')" />
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
                <h5 class="modal-title" style="color: white;">@lang('admin_menu.vitalsign')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">&times;</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalsign') #</b></h6>
                    <p style="display:inline" id="mvital_id"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.patient_name'):</b></h6>
                    <p style="display:inline" id="mpat_name"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.district'):</b></h6>
                    <p style="display:inline" id="mpat_district"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalsign') #1:</b></h6>
                    <p style="display:inline" id="mvital_vsNum"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalsign') #2:</b></h6>
                    <p style="display:inline" id="mvital_vsNum2"></p>
                </div>

                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalsign_type'):</b></h6>
                    <p style="display:inline" id="mvital_type"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalBy'):</b></h6>
                    <p style="display:inline" id="mvital_userby"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.vitalDate'):</b></h6>
                    <p id="mvital_date" style="display:inline"></p>
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
                    <h6 style="display:inline"><b>@lang('admin_menu.symptoms'):</b></h6>
                    <p id="mpat_symptoms" style="display:inline"></p>
                </div>
                <div>
                    <h6 style="display:inline"><b>@lang('admin_menu.note'):</b></h6>
                    <p id="mpat_note" style="display:inline"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
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
        url: "{{route('vitalsign.store')}}",
        data: data,
        type: "post",
        dataType: "json",
        success: function(data) {
          $('#status').val('Inserted');
          $('#success').submit();
        },
        error: function(errors) {
          let error = JSON.parse(errors.responseText).errors;
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
              url: "/vitalsign/" + data,
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


    $(document).on('click', '.show', function() {
      var id = $(this).attr("data");
      $.ajax({
        url: "{{url('vitalsign.show')}}",
        type: 'get',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {
            $("#mvital_id").text(data.vital.id);
            $("#mpat_name").text(data.patient.pat_name);
            $("#mvital_vsNum").text(data.vital.vsNum);
            $("#mvital_vsNum2").text(data.vital.vsNum2);
            $("#mvital_type").text(data.vital.type);
            $("#mvital_userby").text(data.vital.userBy);
            $("#mvital_date").text(data.created_at);
            $("#mpat_age").text(data.patient.pat_age);
            $("#mgender").text(data.patient.gender);
            $("#mpat_district").text(data.district.dist_name);
            $("#mpat_symptoms").text(data.patient.pat_symptoms);
            $('#mpat_note').text(data.patient.pat_note);
        }
      });
    });

  $("#example").dataTable();

  });

</script>
@endsection
