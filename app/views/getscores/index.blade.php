@extends('mudidashboard.master')
@section('content-header')
	<h1>
		{{Lang::get('conversion.get_score')}}
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
							<form action="{{route('getscores.index')}}" method="GET">
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
								<th style="width: 196px">{{Lang::get('conversion.action')}}</th>
							</tr>
							</thead>

							<tbody>
							<?php $i=1; ?>
							@foreach($albums as $album)
								<tr>
									<td>
										{{$i}}
									</td>
									<td>
										{{$album->album_name}}
									</td>
									<td>
										<a  class="btn btn-info btn-xs"
											href="{{ route('getscores.show',[$album->album_id]) }}">
											<i class="fa fa-eye-slash"></i>&nbsp;&nbsp; {{Lang::get('conversion.view')}}
										</a>
										&nbsp;&nbsp;
										<?php $isPurchase = PurchaseScore::is_in_array($band_purchase_album, 'ref_album_id', $album->album_id)?>
										@if($isPurchase == 'yes')

												<button class="btn btn-success btn-xs" disabled>
												<i class="fa fa-unlock"></i> &nbsp;&nbsp;{{Lang::get('conversion.purchased')}}
												</button>

										@else
											<a class="btn btn-warning btn-xs"
											   href="{{ route('purchasescores',[$album->album_id]) }}">
												<i class="fa fa-lock"></i> &nbsp;&nbsp;{{Lang::get('conversion.purchase')}}
											</a>
										@endif

									</td>
								</tr>
								<?php $i++; ?>
							@endforeach
							</tbody>

						</table>
						{{ $albums->links() }}
					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
		</div>
		
@stop
