@extends('master')

@section('content')
{{ Former::horizonal_open()->action(route('users.store'))->method('POST')}}
<h1>Login Form</h1>
<div>
	<input value="{{Input::old('user_email')}}" type="text" placeholder="Email" required="" id="username" name="user_email"/>
</div>
<div>
	<input type="password" placeholder="Password" required="" id="password" name="password"/>
</div>

<div>
	<input type="submit" value="Log in" />
</div>

{{Former::close()}}
@stop