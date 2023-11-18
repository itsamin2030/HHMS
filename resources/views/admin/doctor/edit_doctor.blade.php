@extends('layouts.app')
@section('title') @lang('admin_menu.doctor') | HMS @endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><b>@lang('admin_menu.doctor')</b></h3>
            </div>
        </div>
        <a href="{{url('doctor')}}">
            <button style="margin-left: 540px;" class="btn btn-round btn-primary btn-sm">@lang('admin_menu.back')</button>
        </a>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>@lang('admin_menu.edit_doc')</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form class="form-horizontal form-label-left" method="POST" action="{{route('doctor.update', $doctor->doc_id)}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">@lang('admin_menu.doc_name') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="name" class="form-control" name="doc_name" placeholder="@lang('admin_menu.doc_name')" type="text" value="{{ $doctor->doc_name }}">
                                    <p class="text-danger">{{$errors->first('doc_name')}}</p>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">@lang('admin_menu.doc_phone') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="number" name="doc_phone" placeholder="@lang('admin_menu.doc_phone')" class="form-control" value="{{ $doctor->doc_phone }}">
                                    <p class="text-danger">{{$errors->first('doc_phone')}}</p>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">@lang('admin_menu.address') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="address" name="doc_address" placeholder="@lang('admin_menu.address')" class="form-control" value="{{ $doctor->doc_address }}">
                                    <p class="text-danger">{{$errors->first('doc_address')}}</p>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label for="profile" class="col-form-label col-md-3 col-sm-3  label-align">@lang('admin_menu.doc_profile') <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="profile" type="text" name="doc_profile" class="form-control" placeholder="@lang('admin_menu.doc_profile')" value="{{ $doctor->doc_profile }}">
                                    <p class="text-danger">{{$errors->first('doc_profile')}}</p>
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


    function myFunction() {
        window.print();
    }
</script>
@endsection
