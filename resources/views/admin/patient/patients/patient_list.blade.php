@extends('layouts.app')
@section('title') @lang('admin_menu.patients') | HHMS @endsection
@section('content')
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Patient list</h2>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add New</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="example" class="table table-striped table-bordered table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> @lang('admin_menu.patient')</th>
                                                <th> @lang('admin_menu.gender') </th>
                                                <th> @lang('admin_menu.age') </th>
                                                <th> @lang('admin_menu.district') </th>
                                                <th> @lang('admin_menu.statue') </th>
                                                <th> @lang('admin_menu.actions') </th>
                                            </tr>
                                        </thead>
										<tbody>
                                            @foreach($patient as $value)
											<tr>
											<td>{{ $value->pat_id }}</td>
											<td>{{ $value->pat_name }}</td>
											<td>{{ $value->gender }}</td>
											<td>{{ $value->pat_age }}</td>
											<td>{{ $value->district }}</td>
                                                @switch($value->pat_statue)
                                                    @case('Hold')
                                                        <td><span class="badge badge-warning">{{ $value->pat_statue }}</span></td>
                                                    @break
                                                    @case('Accepted')
                                                        <td><span class="badge badge-success">{{ $value->pat_statue }}</span></td>
                                                    @break
                                                    @case('Rejected')
                                                        <td><span class="badge badge-danger">{{ $value->pat_statue }}</span></td>
                                                    @break
                                                    @default
                                                        <td>{{ $value->pat_statue }}</td>
                                                @endswitch
											<td>
												<button  class='show btn btn-outline-primary btn-sm' data-toggle='modal' data-target='#showModal' data="{{$value->pat_id}}"><i class="fa fa-eye"></i></button>
                                                <a  class='btn btn-outline-secondary btn-sm' target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$value->longitude}}+{{$value->latitude}}" ><i class="fa fa-home"></i></a>
												<button  class='edit-form btn btn-outline-warning btn-sm' data-toggle='modal' data-target='#EditModal' data="{{$value->pat_id}}"><i class="fa fa-pencil"></i></button>
												<button class="btn btn-outline-danger btn-sm delete" data="{{$value->pat_id}}"><i class="fa fa-trash-alt"></i></button>
												<form method="get" id="success" action="{{url('inpatient.success')}}">
													<input type="hidden" readonly name="status" id="status">
												<button id="success" type="submit" hidden></button>
												</form>
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
	               	<h5 class="modal-title" style="color: white;">@lang('admin_menu.add_patient')</h5>
	             	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	               	<span aria-hidden="true" style="color: white;">&times;</span></button>
	           	</div>
	           	<div class="modal-body">
	           		<div class="row">
	           			<div class="col-md-8">
	           				<div class="col-md-12">
	           					<div class="form-group col-md-12">
			                        <label for="pat_name"><b>@lang('admin_menu.patient_name')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="pat_name" name="pat_name" placeholder="@lang('admin_menu.patient_name')"/>
			                            <span id="in_p_name_error"></span>
			                        </div>
			                    </div>
                            </div>

                            <div class="col-md-12">
	           					<div class="form-group col-md-8">
			                        <label for="pat_grName"><b>@lang('admin_menu.guardian_name')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="pat_grName" name="pat_grName" placeholder="@lang('admin_menu.guardian_name')"/>
			                            <span id="in_p_guardian_name_error"></span>
			                        </div>
                                </div>
                                <div class="form-group col-md-4">
			                        <label for="pat_grPhone"><b>@lang('admin_menu.guardian_phone')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="pat_grPhone" name="pat_grPhone" placeholder="@lang('admin_menu.guardian_phone')"/>
			                            <span id="in_p_guardian_phone_error"></span>
			                        </div>
			                    </div>
	           				</div>

		                    <div class="col-md-12">
		                    	<div class="form-group col-md-3">
			                        <label><b>@lang('admin_menu.gender')</b></label>
			                        <div>
			                            <div class="radio">
			                                <label>
			                                    <input type="radio" class="radio" name="gender" value="M"> @lang('admin_menu.male')
			                                </label>
			                            </div>
			                            <div class="radio">
			                                <label>
			                                    <input type="radio" class="radio" name="gender" value="F"> @lang('admin_menu.female')
			                                </label>
			                            </div>
			                            <span id="in_p_sex_error"></span>
			                        </div>
			                    </div>

			                    <div class="form-group col-md-3">
			                        <label for="in_p_age"><b>@lang('admin_menu.age')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="pat_age" name="pat_age" placeholder="@lang('admin_menu.age')" />
			                            <span id="in_p_age_error"></span>
			                        </div>
			                    </div>

			                    <div class="form-group col-md-6">
			                        <label for="in_p_phone"><b>@lang('admin_menu.birth_year')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="birth_year" name="birth_year" placeholder="@lang('admin_menu.birth_year')"/>
			                            <span id="in_p_phone_error"></span>
			                        </div>
			                    </div>
		                    </div>

		                    <div class="col-md-12">
			                    <div class="form-group col-md-12">
			                        <label for="in_p_symptoms"><b>@lang('admin_menu.symptoms')</b></label>
			                        <div>
			                            <input type="text" class="form-control" id="pat_symptoms" name="pat_symptoms" placeholder="@lang('admin_menu.symptoms')"/>
			                            <span id="in_p_symptoms_error"></span>
			                        </div>
			                    </div>
		                    </div>

		                    <div class="col-md-12">
		                    	<div class="form-group col-md-12">
			                        <label for="pat_dist"><b>@lang('admin_menu.district')</b></label>
			                        <div>
                                        <select class="form-control" id="pat_dist" name="pat_dist">
                                            @foreach($district as $dist)
                                                <option value="{{$dist->dist_id}}">{{$dist->dist_name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="in_p_address_error"></span>
			                        </div>
			                    </div>
                            </div>

                            <div class="form-group col-md-12">
		                        <label for="pat_note"><b>@lang('admin_menu.note')</b></label>
		                        <div>
		                        	<textarea rows="2" class="form-control" id="pat_note" name="pat_note" placeholder="@lang('admin_menu.note')"></textarea>
		                            <span id="in_p_note_error"></span>
		                        </div>
                            </div>

		                </div>

		                <div class="col-md-4" style="background: #f4f4f4;">
		                	<div class="form-group col-md-12">
		                        <label for="pat_admYear"><b>@lang('admin_menu.adm_year')</b></label>
		                        <div>
                                    <input id="pat_admYear" name="pat_admYear" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
		                            <span id="in_p_admission_date_error"></span>
		                        </div>
		                    </div>

                            <div class="form-group col-md-12">
		                        <label for="pat_nid"><b>@lang('admin_menu.NiD')</b></label>
		                        <div>
                                <input type="text" class="form-control" id="pat_nid" name="pat_nid" placeholder="@lang('admin_menu.NiD')"/>
			                            <span id="in_p_case_error"></span>
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
	               	<h5 class="modal-title" style="color: white;">@lang('admin_menu.patient')</h5>
	             	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	               	<span aria-hidden="true" style="color: white;">&times;</span></button>
	           	</div>
      <div class="modal-body">
	  <div>
          <h6 style="display:inline"><b>@lang('admin_menu.adm_year'):</b></h6>
          <p style="display:inline" id="mpat_admYear"></p>
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
		<div>
          <h6 style="display:inline"><b>@lang('admin_menu.statue'):</b></h6>
          <div id="mpat_statue" style="display:inline"></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="EditModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form id="editform" method="post">
            <input type="hidden" id="epat_id" name="pat_id"/>
            <div class="modal-content">
                <div class="modal-header" style="background-color:  #808080; height: 60px;">
                    <h5 class="modal-title" style="color: white;">@lang('admin_menu.edit_patient')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="pat_name"><b>@lang('admin_menu.patient_name')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="epat_name" name="pat_name" placeholder="@lang('admin_menu.patient_name')"/>
                                        <span id="in_p_name_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-8">
                                    <label for="pat_grName"><b>@lang('admin_menu.guardian_name')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="epat_grName" name="pat_grName" placeholder="@lang('admin_menu.guardian_name')"/>
                                        <span id="in_p_guardian_name_error"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pat_grPhone"><b>@lang('admin_menu.guardian_phone')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="epat_grPhone" name="pat_grPhone" placeholder="@lang('admin_menu.guardian_phone')"/>
                                        <span id="in_p_guardian_phone_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label><b>@lang('admin_menu.gender')</b></label>
                                    <div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="radio" id="epat_M" name="gender" value="M"> @lang('admin_menu.male')
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="radio" id="epat_F" name="gender" value="F"> @lang('admin_menu.female')
                                            </label>
                                        </div>
                                        <span id="in_p_sex_error"></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="in_p_age"><b>@lang('admin_menu.age')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="epat_age" name="pat_age" placeholder="@lang('admin_menu.age')"/>
                                        <span id="in_p_age_error"></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="in_p_phone"><b>@lang('admin_menu.birth_year')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="ebirth_year" name="birth_year" placeholder="@lang('admin_menu.birth_year')"/>
                                        <span id="in_p_phone_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="in_p_symptoms"><b>@lang('admin_menu.symptoms')</b></label>
                                    <div>
                                        <input type="text" class="form-control" id="epat_symptoms" name="pat_symptoms" placeholder="@lang('admin_menu.symptoms')"/>
                                        <span id="in_p_symptoms_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="pat_dist"><b>@lang('admin_menu.district')</b></label>
                                    <div>
                                        <select class="form-control" id="epat_dist" name="pat_dist">
                                            @foreach($district as $dist)
                                                <option value="{{$dist->dist_id}}">{{$dist->dist_name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="in_p_address_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="pat_note"><b>@lang('admin_menu.note')</b></label>
                                <div>
                                    <textarea rows="2" class="form-control" id="epat_note" name="pat_note" placeholder="@lang('admin_menu.note')"></textarea>
                                    <span id="in_p_note_error"></span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4" style="background: #f4f4f4;">

                            <div class="form-group col-md-12">
                                <label for="pat_nid"><b>@lang('admin_menu.NiD')</b></label>
                                <div>
                                    <input type="text" class="form-control" id="epat_nid" name="pat_nid" placeholder="@lang('admin_menu.NiD')"/>
                                    <span id="in_p_case_error"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="epat_longitude"><b>longitude</b></label>
                                <div>
                                    <input type="text" class="form-control" id="epat_longitude" name="pat_longitude" placeholder="longitude"/>
                                    <span id="in_p_case_error"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="epat_latitude"><b>latitude</b></label>
                                <div>
                                    <input type="text" class="form-control" id="epat_latitude" name="pat_latitude" placeholder="latitude"/>
                                    <span id="in_p_case_error"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="epat_statue"><b>@lang('admin_menu.statue')</b></label>
                                <div>
                                    <select class="form-control" id="epat_statue" name="pat_statue">
                                            <option value="Hold">@lang('admin_menu.hold')</option>
                                            <option value="Accepted">@lang('admin_menu.accepted')</option>
                                            <option value="Rejected">@lang('admin_menu.rejected')</option>
                                    </select>
                                    <span id="in_p_case_error"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    <a href="#" id="elocation" target="_blank" class="btn btn-dark btn-sm">@lang('admin_menu.google_maps')</a>
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


		$(document).on("submit", "#form", function(e) {
			e.preventDefault();
			var data = $(this).serializeArray();

			$.ajax({
				url     : "{{route('patient.store')}}",
				data    : data,
				type    : "post",
				dataType: "json",
				success: function(data) {
				$('#status').val('Inserted');
          		$('#success').submit();
				}, error: function(errors) {
					let error = JSON.parse(errors.responseText).errors;
			        $.each(error,function(i,message){
			            $("#"+i+"_error").html('<span class="help-block" style="color:red;">'+message+'</span>');
			        });
				}
			});
		});

		$(document).on("click", ".delete", function() {
		    var data = $(this).attr("data");

		    swal({
		      title: "@lang('admin_menu.pop_sure')",
		      text: "@lang('admin_menu.delete_msg')",
		      icon: "warning",
		      buttons: true,
		      dangerMode: true,
		    })
		    .then((willDelete) => {
		      if (willDelete) {
		        $.ajax({
		          url     : "/patient/"+data,
		          type    : "delete",
		          dataType: "json",
		          success: function(data) {
		            if (data.status==200) {
						$('#status').val('@lang("admin_menu.deleted")');
          				$('#success').submit();
		            } else {
		              toastr["error"]("@lang('admin_menu.wrong')");
		            }
		          }
		        });
		        } else {
		            // swal("Your Data is safe!");
		        }
		     });
		  });

	$(document).on('click', '.show', function() {
      var id = $(this).attr("data");
      $.ajax({
        url: "{{url('patient.show')}}",
        type: 'get',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {
          $("#mpat_admYear").text(data.patient.pat_admYear);
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
            // Statue
            switch (data.patient.pat_statue){
                case 'Hold':
                    $('#mpat_statue').html('<td><span class="badge badge-warning">Hold</span></td>');
                break;
                case 'Accepted':
                    $('#mpat_statue').html('<td><span class="badge badge-success">Accepted</span></td>');
                break;
                case 'Rejected':
                    $('#mpat_statue').html('<td><span class="badge badge-danger">Rejected</span></td>');
                break;
            }

            // End
        }
      });
    });

	});
// Edit
    $(document).on('click', '.edit-form', function() {
        var id = $(this).attr("data");
        $.ajax({
            url: "{{url('patient.show')}}",
            type: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $("#epat_id").val(data.patient.pat_id);
                $("#epat_name").val(data.patient.pat_name);
                $("#epat_nid").val(data.patient.pat_nid);
                $("#epat_grName").val(data.patient.pat_grName);
                $("#epat_grPhone").val(data.patient.pat_grPhone);
                $("#ebirth_year").val(data.patient.birth_year);
                $("#epat_age").val(data.patient.pat_age);
                $("#epat_dist").val(data.patient.pat_dist).change();
                $("#epat_symptoms").val(data.patient.pat_symptoms);
                $('#epat_note').val(data.patient.pat_note);
                $('#epat_longitude').val(data.patient.longitude);
                $('#epat_latitude').val(data.patient.latitude);
                $('#epat_statue').val(data.patient.pat_statue);
                // Google Maps
                $('#elocation').attr('href','https://www.google.com/maps/search/?api=1&query='+data.patient.longitude+','+data.patient.latitude);
                // End
                // gender
                switch (data.patient.gender){
                    case 'M':
                        $("#epat_M").attr('checked','checked');
                        break;
                    case 'F':
                        $("#epat_F").attr('checked','checked');
                        break;
                }
            }
        });
    });

    // edit submit

    $(document).on("submit", "#editform", function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();

        $.ajax({
            url     : "{{route('patient.update')}}",
            data    : data,
            type    : "patch",
            dataType: "json",
            success: function(data) {
                $('#status').val('Updated');
                $('#success').submit();
            }, error: function(errors) {
                let error = JSON.parse(errors.responseText).errors;
                $.each(error,function(i,message){
                    $("#"+i+"_error").html('<span class="help-block" style="color:red;">'+message+'</span>');
                });
            }
        });
    });


	$("#example").dataTable();

	jQuery(function($) {
        $("#in_p_admission_date").datetimepicker({
        	dateFormat: 'yy-mm-dd',
        	timeFormat: 'hh:mm:ss',
        });

        $("#birth_year").change(function(){
            let nowYear = new Date().getFullYear();
            let bYear = $("#birth_year").val();
            let age = nowYear - bYear;
            $("#pat_age").val(age);
        });
    });
</script>
@endsection
