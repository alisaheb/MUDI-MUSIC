<?php
 $role = Session::get('role');
 $user = Session::get('user');
 ?>
@extends('mudidashboard.master')

@section('main')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="row profile">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="@if(empty($publisher[0]->publisher_logo)){{asset('template/img/user2-160x160.jpg')}} @else {{asset($publisher[0]->publisher_logo)}} @endif" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							@if(empty($publisher[0]->publisher_full_name))
							{{'Not set Yet'}}
								@else
								{{$publisher[0]->publisher_full_name}}
								@endif
						</div>
						<div class="profile-usertitle-job">
							Publisher
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->

					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="#">
								<i class="fa fa-home"></i>
									{{Lang::get('conversion.overview')}} </a>
							</li>
							<li>
								<a href="{{route('managepublisherprofiles.edit',[$user[0]->publisher_id])}}">
								<i class="fa fa-user"></i>
									{{Lang::get('conversion.account_setting')}} </a>
							</li>
							<li>
								<a href="{{route('changepass',[$user[0]->publisher_id])}}">
								<i class="fa fa-check"></i>
									{{Lang::get('conversion.change_pass')}} </a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-flag-o"></i>
									{{Lang::get('conversion.help')}} </a>
							</li>
						</ul>
					</div>
					<!-- END MENU -->
				</div>
		</div>


	<br>
	<br>
	</div>
</div>
		
@stop