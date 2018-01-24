<?php
$role = Session::get('role');
$user = Session::get('user');
if(Session::has('menu_data')){

    $menus = Session::get('menu_data');
}
else{
    $menus = array();
}
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($role ==1)
                    <img src="{{asset('template/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                @endif
                @if($role ==2)
                        <img src="@if(empty($user[0]->band_logo)) {{asset('template/img/user2-160x160.jpg')}} @else {{asset($user[0]->band_logo)}}@endif" class="img-circle" alt="User Image">
                    @endif
                @if($role ==3)
                        <img src="{{asset($user[0]->publisher_logo)}}" class="img-circle" alt="User Image">
                    @endif
            </div>
            <div class="pull-left info">
                @if($role ==1)
                    <p>{{$user['user_name'] or "Band Name does not set yet"}}</p>
                    @endif
                @if($role ==2)
                    <p>{{$user[0]->band_lead_name or "Band Name does not set yet"}}</p>
                @endif
                    @if($role ==3)
                        <p>{{$user[0]->publisher_full_name or "Publisher Name does not set yet"}}</p>
                    @endif
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

            <ul class="sidebar-menu">
                <li class="header">NAVIGATION</li>
                @foreach($menus as $menu)
                <li class="@if(Route::currentRouteName() == $menu['link']){{'active'}}@endif">
                    <a href="{{action($menu['link'])}}">
                        <i class="fa fa-th"></i> <span>{{$menu['title']}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
    </section>
    <!-- /.sidebar -->
</aside>