@extends('mudidashboard.master')

@section('main')
	<div class="tse-form col-md-6 col-md-offset-3">

		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Resister Publisher</h3>
  </div>
  <div class="panel-body">
  		{{ Former::horizonal_open()->action(route('publishers.store'))->method('POST')}}		  
		  <fieldset>
    <legend>Resister Publisher</legend>
    @if($errors->has())
      <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <h4>Warning!</h4>
          @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
          @endforeach
        
      </div>
    @endif      
	    <div class="form-group">
	      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	        <input value="{{Input::old('publisher_email')}}" type="text" name="publisher_email" class="form-control" id="inputEmail" placeholder="Email">
	      </div>
	    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" name="publisher_pass" class="form-control" id="inputPassword" placeholder="Password">        
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Retype</label>
      <div class="col-lg-10">
        <input name="publisher_pass_confirmation" type="password" class="form-control" id="inputPassword" placeholder="Password">        
      </div>
    </div>
    

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>

		{{Former::close()}}
  </div>
</div>
		
@stop