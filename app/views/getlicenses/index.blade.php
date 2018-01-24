@extends('mudidashboard.master')
@section('content-header')
	<h1>
		{{ $page_title or "License" }}
		<small>{{ $page_description or null }}</small>
	</h1>
	<!-- You can dynamically generate breadcrumbs here -->
	{{--<ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>--}}

@stop
@section('main')
	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<!-- Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">License Information</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
					<div class="box-body">
						<div class="alert alert-dismissible alert-success">
							<strong>Well done!</strong> You successfully generate your
							<p>Band id: <strong>{{$get_user->user_name}}</strong></p>
							<p>Band key: <strong>{{$getLicenseKey[0]->ref_band_key}}</strong></p>
						</div>
					</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div>

@stop