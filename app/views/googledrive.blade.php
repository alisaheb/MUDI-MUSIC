@extends('mudidashboard.master')

@section('main')
	<div class="tse-form col-md-6 col-md-offset-3">

		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Upload Score</h3>
  </div>
  <div class="panel-body">
  		{{ Former::horizonal_open()->action(route('google.store'))->method('POST')->enctype('multipart/form-data') }}		  
		  <fieldset>
		    <legend>Upload Score</legend>

		   <div class="row">
			<div class="col-md-12">
			<div class="form-group">
      		  <label for="inputEmail" class="col-lg-4 control-label">Album Name</label>
		      <div class="col-lg-8">
		        <input name="score" type="file" class="form-control" id="inputEmail" placeholder="Album Name">
		      </div>
    		</div>	
			

		    {{Former::actions()
    			->large_primary_submit('Upload')
			}}
		  </fieldset>
		{{Former::close()}}
  </div>
</div>
		
@stop

