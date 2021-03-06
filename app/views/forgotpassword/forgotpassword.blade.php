<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

    <!--------------------
    LOGIN FORM
    by: Amit Jakhu
    www.amitjakhu.com
    --------------------->

    <!--META-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login On MuDi</title>

    <!--STYLESHEETS-->
    {{HTML::style('loginform/css/style.css')}}
    {{HTML::style('assets/fontawesome/css/font-awesome.min.css')}}



            <!--SCRIPTS-->
    {{HTML::script('assets/js/jquery-1.11.3.min.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
            <!--Slider-in icons-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".username").focus(function() {
                $(".user-icon").css("left","-48px");
            });
            $(".username").blur(function() {
                $(".user-icon").css("left","0px");
            });

            $(".password").focus(function() {
                $(".pass-icon").css("left","-48px");
            });
            $(".password").blur(function() {
                $(".pass-icon").css("left","0px");
            });
        });
    </script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

    <!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

    <!--LOGIN FORM-->
    {{ Former::horizonal_open()->action(route('getuserdata'))->method('POST')->class('login-form')}}

            <!--HEADER-->
    <div class="header">
        <!--TITLE--><h1>Forgot Password</h1><!--END TITLE-->

        @if($errors->has())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
        @if(Session::has('error_msg'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                {{Session::get('error_msg')}}
            </div>

            @else
                    <!--DESCRIPTION--><span>Fill out the form below to get Your account and get your account back.</span><!--END DESCRIPTION-->
        @endif
    </div>
    <!--END HEADER-->

    <!--CONTENT-->
    <div class="content">
        <!--USERNAME--><input name="email" type="text" class="input username" value="{{Input::old('email')}}" placeholder="Email" /><!--END USERNAME-->
    </div>
    <!--END CONTENT-->

    <!--FOOTER-->
    <div class="footer">
        <!--LOGIN BUTTON--><input type="submit" name="submit" value="Search" class="button" /><!--END LOGIN BUTTON-->
        <a style=" text-decoration: none" class="register" href="{{url('login')}}">Login</a>
    </div>
    <!--END FOOTER-->

    {{Former::close()}}
            <!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>