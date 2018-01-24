<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
        <!-- MAP & BOX PANE -->

        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Band</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 New Members</span>
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($band_publisher['band'] as $band)
                            <li>
                                <img src="@if(empty($band->band_logo)){{asset('template/img/user2-160x160.jpg')}} @else {{asset($band->band_logo)}} @endif" alt="User Image">
                                <a class="users-list-name" href="#">@if(empty($band->band_name)){{'not set'}} @else{{$band->band_name}}@endif</a>
                                <span class="users-list-date">{{$band->created_at}}</span>
                            </li>
                            @endforeach

                        </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript::" class="uppercase">View All Band</a>
                    </div><!-- /.box-footer -->
                </div><!--/.box -->
            </div><!-- /.col --><div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Publisher</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 New Members</span>
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($band_publisher['publisher'] as $publisher)
                            <li>
                                <img src="@if(empty($publisher->publisher_logo)) {{asset('template/img/user2-160x160.jpg')}} @else {{asset($publisher->publisher_logo)}} @endif" alt="User Image">
                                <a class="users-list-name" href="#">@if(empty($publisher->publisher_full_name)) {{'Not set'}} @else {{$publisher->publisher_full_name}}@endif</a>
                                <span class="users-list-date">{{$publisher->created_at}}</span>
                            </li>
                            @endforeach

                        </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript::" class="uppercase">View All Publisher</a>
                    </div><!-- /.box-footer -->
                </div><!--/.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Purchased Album</h3>
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
                            <th>Album Name</th>
                            <th>Band Name</th>
                            <th>Purchase Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchased_album as $albums)
                        <tr>
                            <td>{{$albums->album_name}}</td>
                            <td>{{$albums->band_name}}</td>
                            <td>{{$albums->purchased_date}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.box-body -->
            <div class="box-footer clearfix" style="display: block;">

                <a href="javascript::" class="btn btn-sm btn-default btn-flat pull-right">View All Sales Album</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->

    <div class="col-md-4">
        <!-- Info Boxes Style 2 -->
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Album</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <ul class="products-list product-list-in-box">
                    @foreach($album_name as $album_Name)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{asset('template/img/music_cd.png')}}" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a href="javascript::" class="product-title">{{$album_Name->album_name}} <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          {{$album_Name->album_name}}
                        </span>
                        </div>
                    </li><!-- /.item -->
                   @endforeach

                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer text-center" style="display: block;">
                <a href="javascript::" class="uppercase">View All  Album</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>