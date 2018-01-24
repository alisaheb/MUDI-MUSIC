@extends('mudidashboard.master')
@section('content-header')
    <h1>
        {{ $page_title or "Dashboard " }}
        <small>{{ 'control panel' }}</small>
    </h1>
    <!-- You can dynamically generate breadcrumbs here -->
    {{--<ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>--}}
@stop

@section('main')

@include('mudiadmins.counting')
@include('mudiadmins.report')
@stop
