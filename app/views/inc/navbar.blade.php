<?php
 $role = Session::get('role');
 $user = Session::get('user');
 ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('')}}">MUDI</a>
    </div>
    @if($role == 2)
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="@if(Route::currentRouteName() == 'getlicenses.create'){{'active'}}@endif"><a href="{{action('getlicenses.create')}}">Get License<span class="sr-only">(current)</span></a></li>
        <li class="@if(Route::currentRouteName() == 'getscores.index'){{'active'}}@endif"><a href="{{action('getscores.index')}}">Get Score</a></li>
        <li class="@if(Route::currentRouteName() == 'managebandprofiles.index'){{'active'}}@endif"><a href="{{action('managebandprofiles.index')}}">Manage Profile</a></li>
      </ul>
      @endif
      @if($role == 3)
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="@if(Route::currentRouteName() == 'uploadscores.create'){{'active'}}@endif"><a href="{{action('uploadscores.create')}}">Upload Score<span class="sr-only">(current)</span></a></li>
        <li class="@if(Route::currentRouteName() == 'uploadscores.index'){{'active'}}@endif"><a href="{{action('uploadscores.index')}}">All Scores</a></li>
        <li class="@if(Route::currentRouteName() == 'managepublisherprofiles.index'){{'active'}}@endif"><a href="{{action('managepublisherprofiles.index')}}">Manage Profile</a></li>
      </ul>
      @endif
      @if(Session::has('role'))
      <ul class="nav navbar-nav navbar-right">
        @if($role == 3)
        <li><a href="#"><i class="fa fa-sign-out fa-1x"></i>&nbsp;{{$user[0]->publisher_full_name}}</a></li>
        @endif
        @if($role == 2)
        <li><a href="#"><i class="fa fa-sign-out fa-1x"></i>&nbsp;{{$user[0]->band_lead_name}}</a></li>
        @endif
        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-1x"></i>Logout</a></li>
      </ul>
      @endif
    </div>
  </div>
</nav>