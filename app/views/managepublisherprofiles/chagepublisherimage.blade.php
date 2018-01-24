@extends('mudidashboard.master')
@section('content-header')
    <h1>
        {{ $page_title or "Change Password" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="{{route('managepublisherprofiles.index')}}"><i class="fa fa-dashboard"></i> Manage Profile</a></li>
        <li class="active">Change Password</li>
    </ol>

@stop

@section('main')
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ Former::horizonal_open()->action(route('actionpublisherimage',[$changepass->publisher_id]))->method('PUT')}}
                    @if(Session::has('error'))
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">�</button>
                            <h4>Warning!</h4>
                            <?php $error = Session::get('error');?>
                            <p>{{$error['massage']}}</p>


                        </div>
                    @endif
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Current Password</label>
                        <div class="col-lg-8">
                            <input value="" type="password" name="old_pass" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">New Password</label>
                        <div class="col-lg-8">
                            <input value="" type="password" name="new_pass" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Retype Password</label>
                        <div class="col-lg-8">
                            <input value="" type="password" name="retype_new_pass" class="form-control" id="inputEmail">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {{Former::close()}}
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>

@stop