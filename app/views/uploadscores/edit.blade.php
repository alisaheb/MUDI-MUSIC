@extends('mudidashboard.master')
@section('content-header')
	<h1>
		{{Lang::get('conversion.update_album')}}
		<small>{{ $page_description or null }}</small>
	</h1>
	<!-- You can dynamically generate breadcrumbs here -->
	<ol class="breadcrumb">
      <li><a href="{{route('uploadscores.index')}}"><i class="fa fa-dashboard"></i> {{Lang::get('conversion.all_album')}}</a></li>
      <li class="active">{{Lang::get('conversion.update_album')}}</li>
    </ol>

@stop

@section('main')
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<!-- Box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">{{Lang::get('conversion.update_score')}}</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						{{ Former::horizonal_open()->action(route('uploadscores.update',[$uploadscore->album_id]))->method('PUT')->enctype('multipart/form-data') }}


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="inputEmail" class="col-lg-4 control-label">{{Lang::get('conversion.album_name')}}</label>
										<div class="col-lg-8">
											<input name="album_name" type="text" class="form-control" id="inputEmail" placeholder="Album Name" value="{{$uploadscore->album_name}}">
										</div>
									</div>
									<table class="table table-form table-bordered addrowtable" id="items-table">
										<thead>
										<tr class="thead">
											<th>{{Lang::get('conversion.track_name')}}</th>
											<th>{{Lang::get('conversion.track_file')}}</th>
											<th>{{Lang::get('conversion.action')}}</th>
										</tr>
										</thead>

										<tbody>
										@foreach($scores as $score)
											<tr>
												<td>
													<input type="hidden" class="rate" name="updateItem[{{$score->score_id}}][score_id]" value="{{$score->score_id}}">
													<input type="text" class="rate" name="updateItem[{{$score->score_id}}][score_title]" value="{{$score->score_title}}">
												</td>
												<td>
													<input type="file"  class="sales-qty quickedit" name="updateItem[{{$score->score_id}}][file_path]" value="">
												</td>
												<td>
													<button type="button" class="btn btn-warning btn-xs delete-row" data-delete="{{$score->score_id}}"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;{{Lang::get('conversion.delete')}}</button>
												</td>
											</tr>
										@endforeach

										</tbody>

									</table>
									<button type="button" class="btn btn-primary btn-xs addrow pull-right" id="add-row" >{{Lang::get('conversion.add_detail')}}</button>
								</div>
							</div>

							<button type="submit" class="btn btn-primary">{{Lang::get('conversion.update')}}</button>
						{{Former::close()}}

					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
		</div>
		<div class="hide">
			@foreach($scores as $score)
				{{Former::horizonal_open()->action(route('upladscoredetails.destroy',[$score->score_id]))->method('DELETE')->data_delete_form($score->score_id)}}
				{{Former::close()}}
			@endforeach
		</div>

		
@stop

@section('footer')
<script type="text/template" id="new-item-row">
<tr id="<%=uid%>">		
		
	<td class="full">
		<input type="text" class="rate" name="currentItem[<%= uid %>][score_title]" value="">
	</td>
	<td class="full">
		<input type="file"  class="sales-qty quickedit" name="currentItem[<%= uid %>][file_path]" value="">
	</td>	
	<td>
		<button type="button" class="btn btn-warning btn-xs delete-row">Delete</button>		
	</td>
</tr>
</script>

<script type="text/javascript">

$("#add-row").on('click', function(){
		var template = _.template($("#new-item-row").html());
		var uid = _.uniqueId('new-');
		var row = template({'uid': uid});
		$("#items-table tbody").append(row);						
	});

	$(document).on('click', '.delete-row', function(){
		var $row = $(this).parent().parent();
		$row.fadeOut().remove();		
	});


$("button[data-delete]").on('click', function(){

				// swal({   title: "Are you sure?",   
				// text: "You will not be able to recover this imaginary file!",   
				// type: "warning",   
				// showCancelButton: true,   
				// confirmButtonColor: "#DD6B55",   
				// confirmButtonText: "Yes, delete it!",   
				// closeOnConfirm: false }, 
				// function()
				// {   

				// 	swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
			 // });

				var id = $(this).attr('data-delete');
				var $form = $('form[data-delete-form='+id+']');
				var data = $form.serialize();
				var action = $form.attr('action');

				$.ajax({
					method: 'POST',
					url: action,
					data: data,
					success: function(){

						$("tr[data-delete-row="+id+"]").fadeOut('fast').remove();						
					}
						
				});
		});	




</script>
@stop