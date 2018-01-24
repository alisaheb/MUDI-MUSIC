<?php $role = Session::get('role'); ?>
@extends('mudidashboard.master')
@section('content-header')
  <h1>
      {{Lang::get('conversion.dashboard')}}
    <small>{{ $page_description or null }}</small>
  </h1>
  <!-- You can dynamically generate breadcrumbs here -->
  {{--<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Manage Profile</a></li>
    <li class="active">Change Password</li>
  </ol>--}}
@stop


@section('main')
    @if($role == 2)

        <div class='row'>
          <div class='col-md-8 col-md-offset-2'>
            <!-- Box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Band Dashboard</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                  <div>
                      <a href="{{action('getlicenses.create')}}"><i class="fa fa-user"></i>&nbsp; Get License</a>
                  </div>
                  <div>
                      <a href="{{action('getscores.index')}}"><i class="fa fa-download"></i>&nbsp;Get Score</a>
                  </div>
                  <div>
                      <a href="{{action('managebandprofiles.index')}}"> <i class="fa fa-user"></i>&nbsp; Manage Profile</a>
                  </div>
              </div><!-- /.box-body -->

            </div><!-- /.box -->
          </div><!-- /.col -->
        </div>

</div>
@endif
@if($role == 3)
    {{-- start report for publisher--}}
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-ios-musical-notes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{Lang::get('conversion.number_of_score')}}</span>
                    <span class="info-box-number">{{$dashboards['scores']}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion-disc"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{Lang::get('conversion.number_of_album')}}</span>
                    <span class="info-box-number">{{$dashboards['total_album']}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{Lang::get('conversion.sales_album')}}</span>
                    <span class="info-box-number">{{$dashboards['sales_album']}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{Lang::get('conversion.album_user')}}</span>
                    <span class="info-box-number">{{$dashboards['involve_band']}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- /.col -->
    </div>
    {{-- end report for publisher--}}
    <div class='row'>
        <div class="col-md-8">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{Lang::get('conversion.latest_score')}}</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger">{{Lang::get('conversion.new_score')}}</span>
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($dashboards['latest_score'] as $latestScore)
                            <li>
                                <div class="score-style"><i class="ion-ios-musical-notes"></i></div>
                                <div>
                                <a class="users-list-name" href="#">{{$latestScore->score_title}}</a>
                                    </div>
                            </li>
                             @endforeach

                        </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript::" class="uppercase">{{Lang::get('conversion.view_all_score')}}</a>
                    </div><!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{Lang::get('conversion.latest_album')}}</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger">{{Lang::get('conversion.new_album')}}</span>
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($dashboards['latest_album'] as $latestAlbum)
                                <li>
                                    <div class="album-style">
                                        <i class="ion-disc"></i>
                                    </div>
                                    <div>
                                        <a class="users-list-name" href="#">{{$latestAlbum->album_name}}</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript::" class="uppercase">{{Lang::get('conversion.view_all_album')}}</a>
                    </div><!-- /.box-footer -->
                </div>

            </div>
            {{-- sales Report--}}


        </div>
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">{{Lang::get('conversion.latest_sales_score')}}</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-danger">{{Lang::get('conversion.new_sales_score')}}</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($dashboards['sales_score'] as $score)
                            <li>
                                <div class="album-style">
                                    <i class="ion-disc"></i>
                                </div>
                                <div>
                                    <a class="users-list-name" href="#">{{$score->score_title}}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript::" class="uppercase">{{Lang::get('conversion.view_all_sales_score')}}</a>
                </div><!-- /.box-footer -->
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{Lang::get('conversion.latest_sales_report')}}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>{{Lang::get('conversion.album_name')}}</th>
                                <th>{{Lang::get('conversion.score_title')}}</th>
                                <th>{{Lang::get('conversion.number_of_time_sales')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dashboards['sales_report'] as $report)
                                <tr>
                                    <td>{{$report->album_name}}</td>
                                    <td>{{$report->score_title}}</td>
                                    <td><span class="label label-success">{{$report->times_if_sale}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix" style="display: block;">
                    <a href="javascript::" class="btn btn-sm btn-default btn-flat pull-right">{{Lang::get('conversion.view_all_sales_report')}}</a>
                </div><!-- /.box-footer -->
            </div>
        </div>
    </div>


@endif
		
@stop