@extends('mudidashboard.master')
@section('content-header')
	<h1>
		{{Lang::get('conversion.all_album')}}
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
						<h3 class="box-title">{{Lang::get('conversion.album')}}</h3>
						<div class="box-tools">
							<form action="{{route('uploadscores.index')}}" method="GET">
								<div class="input-group" style="width: 150px;">
									<input type="text" name="album_name" class="form-control input-sm pull-right" placeholder="{{Lang::get('conversion.album_name')}}">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-form table-bordered addrowtable" id="items-table">
							<thead>
							<tr class="thead">
								<th>{{Lang::get('conversion.serial')}}</th>
								<th>{{Lang::get('conversion.album_name')}}</th>
								<th style="width: 227px">{{Lang::get('conversion.action')}}</th>
							</tr>
							</thead>

							<tbody>
							<?php $i=1; ?>
							@foreach($uploadscores as $album)
								<tr>
									<td>
										{{$i}}
									</td>
									<td>
										{{$album->album_name}}
									</td>
									<td>
										<div class="col-md-6">
											<a data-pjax class="btn btn-info btn-xs"
											   href="{{ route('uploadscores.edit',[$album->album_id]) }}">
												<i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp; {{Lang::get('conversion.edit')}}
											</a>
										</div>
										<div class="col-md-6">
											{{Former::horizonal_open()->action(route('uploadscores.destroy',[$album->album_id]))->method('DELETE')}}
											<button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> &nbsp;&nbsp;{{Lang::get('conversion.delete')}}</button>
											{{Former::close()}}
										</div>

									</td>
								</tr>
								<?php $i++; ?>
							@endforeach
							</tbody>

						</table>
						{{ $uploadscores->links() }}
					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
		</div>
@stop

