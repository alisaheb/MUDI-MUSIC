<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>MuDi Band Resitration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    {{HTML::style('assets/fontawesome/css/font-awesome.min.css')}}
    {{HTML::style('resistration/css/demo.css')}}
    {{HTML::style('resistration/css/style.css')}}
    {{HTML::style('resistration/css/animate-custom.css')}}
    {{HTML::script('assets/js/jquery-1.11.3.min.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
</head>
<body>
<div class="container">
    <!-- Codrops top bar -->
    <div class="codrops-top">
        <a href="">
            <strong>&laquo; Refresh Page: </strong>Click Here
        </a>
                <span class="right">
                    <a href="{{url("")}}">
                        <strong>Back To MuDi Home</strong>
                    </a>
                </span>
        <div class="clr"></div>
    </div><!--/ Codrops top bar -->
    <header>
        <h1>Registration With MuDi <span>As A Band</span></h1>

    </header>
    <section>
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    {{ Former::horizonal_open()->action(route('bands.store'))->method('POST')}}
                        <h1>Sign Up</h1>
                    @if($errors->has())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <h4>Warning!</h4>
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach

                        </div>
                    @endif
                        <p>
                            <label for="username" class="uname" data-icon="e" > Your email </label>
                            <input value="{{Input::old('band_email')}}" id="username" name="band_email" required="required" type="text" placeholder="Mail mymail@mail.com"/>
                        </p>
                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                            <input id="password" name="band_pass" required="required" type="password" placeholder="eg. X8df!90EO" />
                        </p>

                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Retype password </label>
                            <input id="password" name="band_pass_confirmation" required="required" type="password" placeholder="eg. X8df!90EO" />
                        </p>

                        <p class="login button">
                            <input type="submit" value="Sign Up" />
                        </p>
                        <p class="change_link">
                            Already Resister?
                            <a href="{{url('login')}}" class="to_register">Log In</a>
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
</body>
</html>