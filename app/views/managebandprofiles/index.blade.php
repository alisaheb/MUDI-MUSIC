<?php $role = Session::get('role');?>
@extends('mudidashboard.master')

@section('main')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="row profile">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src=@if(empty($managebandprofiles[0]->band_logo))
								"{{asset('template/img/female_icon.png')}}"
							 @else
									 "{{asset($managebandprofiles[0]->band_logo)}}"
							 @endif
						class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							{{$managebandprofiles[0]->band_lead_name}}
						</div>
						<div class="profile-usertitle-job">
							{{$managebandprofiles[0]->band_name}}
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
								<a href="{{route('changebandimage',[$managebandprofiles[0]->band_id])}}">
								<i class="fa fa-user"></i>
									{{Lang::get('conversion.account_setting')}} </a>
							</li>
							<li>
								<a href="{{route('changebandpass',[$managebandprofiles[0]->band_id])}}" target="_blank">
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