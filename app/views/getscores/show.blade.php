@extends('mudidashboard.master')
@section('content-header')
	<h1>
		{{Lang::get('conversion.album_score')}}
		<small>{{ $page_description or null }}</small>
	</h1>
	<!-- You can dynamically generate breadcrumbs here -->
	<ol class="breadcrumb">
      <li><a href="{{route('getscores.index')}}"><i class="fa fa-dashboard"></i> {{Lang::get('conversion.album')}}</a></li>
      <li class="active">{{Lang::get('conversion.album_score')}}</li>
    </ol>

@stop

@section('main')
		{{--my code      --}}
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<!-- Box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">{{Lang::get('conversion.scores')}}</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-form table-bordered addrowtable" id="items-table">
							<thead>
							<tr class="thead">
								<th>{{Lang::get('conversion.serial')}}</th>
								<th>{{Lang::get('conversion.track_name')}}</th>
							</tr>
							</thead>

							<tbody>
							<?php $i=1; ?>
							@foreach($tracklists as $track)
								<tr>
									<td>
										{{$i}}
									</td>
									<td>
										<i class="fa fa-music"></i> &nbsp;&nbsp;{{$track->score_title}}
									</td>

								</tr>
								<?php $i++; ?>
							@endforeach
							</tbody>

						</table>

					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
		</div>
		
@stop
