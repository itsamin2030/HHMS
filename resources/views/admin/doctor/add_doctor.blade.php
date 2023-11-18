@extends('layouts.app')
@section('title') @lang('admin_menu.doctor') | HHMS @endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><b>Doctor</b></h3>
      </div>
    </div>
    <a href="{{url('doctor')}}">
      <button style="margin-left: 505px;" class="btn btn-round btn-primary btn-sm">@lang('admin_menu.doctor_list')</button>
    </a>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>@lang('admin_menu.add_doctor')</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <form class="form-horizontal form-label-left" method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">@lang('admin_menu.doc_name') <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                  <input id="name" class="form-control" name="doc_name" placeholder="@lang('admin_menu.doc_name')" type="text" value="{{ old('doc_name') }}">
                  <p class="text-danger">{{$errors->first('doc_name')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">@lang('admin_menu.doc_phone') <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                  <input type="text" id="number" name="doc_phone" placeholder="@lang('admin_menu.doc_phone')" class="form-control" value="{{ old('doc_phone') }}">
                  <p class="text-danger">{{$errors->first('doc_phone')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">@lang('admin_menu.address') <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                  <input type="text" id="address" name="doc_address" placeholder="@lang('admin_menu.address')" class="form-control" value="{{ old('doc_address') }}">
                  <p class="text-danger">{{$errors->first('doc_address')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label for="profile" class="col-form-label col-md-3 col-sm-3  label-align">@lang('admin_menu.doc_profile') <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input id="profile" type="text" name="doc_profile" class="form-control" placeholder="@lang('admin_menu.doc_profile')" value="{{ old('doc_profile') }}">
                  <p class="text-danger">{{$errors->first('doc_profile')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email"> @lang('admin_menu.email') <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                  <input type="email" id="email" name="doc_email" placeholder="@lang('admin_menu.email')" class="form-control" value="{{ old('doc_email') }}">
                  <p class="text-danger">{{$errors->first('doc_email')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align" for="password">@lang('admin_menu.password') <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="password" id="password" name="doc_password" placeholder="@lang('admin_menu.password')" value="{{ old('doc_password') }}">
                  <p id="pass" class="text-danger">{{$errors->first('doc_password')}}</p>
                </div>
              </div>

              <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align" for="c_password">@lang('admin_menu.c_password') <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="password" id="c_password" placeholder="@lang('admin_menu.c_password')">
                  <p id="cp"></p>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 offset-md-3">
                  <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                  <button type="submit" class="btn btn-success btn-sm submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $("#password").keyup(function() {
      var pass = $(this).val().length;

      if (pass >= 8) {
        $("#pass").html('<font color="green">Password Strong</font>');
        $(".submit").attr('disabled', true);
      } else {
        $("#pass").html('<font color="red">Password Length Must Be 8 Charecters</font>');
        $(".submit").attr('disabled', true);
      }
    });

    $("#c_password").keyup(function() {
      var con_pass = $(this).val();
      var password = $("#password").val();

      if (con_pass != '' && password != '' && con_pass == password) {
        $("#cp").html('<font color="green">Password Matched</font>');
        $(".submit").attr("disabled", false);
      } else {
        $("#cp").html('<font color="red">Password Not Matched</font>');
        $(".submit").attr("disabled", true);
      }
    });
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#previmage')
          .attr('src', e.target.result)
          .width(140)
          .height(140);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  function myFunction() {
    window.print();
  }
</script>
@endsection
