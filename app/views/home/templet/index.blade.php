<!doctype html>
<html class="no-js" lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SITE TITLE -->
    <title>Pur Music</title>

    <!-- =========================
       Meta Information
    ============================== -->
    <meta name="description" content="KreFolio - Startup Agency Landing Page Template">
    <meta name="keywords" content="KreFolio, KreFolio html template, Free Bootstrap template, Responsive onepage template">
    <meta name="author" content="Zahidul Hossain @choyan">

    <!-- =========================
       favicon and app touch icon
    ============================== -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- =========================
       Bootstrap and animation
    ============================== -->

    

    {{ HTML::style('template/css/bootstrap.css') }}
    {{ HTML::style('template/css/animate.min.css') }}

    <!-- =========================
       Fonts, typography and icons
    ============================== -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    {{ HTML::style('template/css/font-awesome.css')}}
    {{ HTML::style('template/css/typography.css')}}

    <!-- =========================
       Carousel, lightbox and circle generator
    ============================== -->
    {{ HTML::style('template/css/owl.carousel.css')}}
    {{ HTML::style('template/css/owl.theme.css')}}
    {{ HTML::style('template/css/nivo-lightbox.css')}}
    {{ HTML::style('template/css/nivo-lightbox-default.css')}}
    {{ HTML::style('template/css/jquery.circliful.css')}}

    <!-- ***** Custom Stylesheet ***** -->
    {{ HTML::style('template/css/main.css')}}

    <!-- ***** Responsive fixes ***** -->
    {{ HTML::style('template/css/responsive.css')}}

    <!-- Header scripts -->
    {{HTML::script('template/js/vendor/modernizr-2.8.3.min.js')}}
    {{HTML::script('template/js/queryloader2.min.js')}}

    <!-- =========================
       Preloader
    ============================== -->
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            "use strict";
            new QueryLoader2(document.querySelector("body"), {
                barColor: "#e74c3c",
                backgroundColor: "#111",
                percentage: true,
                barHeight: 1,
                minimumTime: 200,
                fadeOutTime: 1000
            });
        });
    </script>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- =========================
       Fullscreen menu
    ============================== -->
    <div class="mobilenav">
        <ul>
            <li data-rel="#header">
                <span class="nav-label">Home</span>
            </li>
            <li data-rel="#about-us">
                <span class="nav-label">About Us</span>
            </li>
            <li data-rel="#why-choose-us">
                <span class="nav-label">Why Choose Us</span>
            </li>
            <li data-rel="#our-team">
                <span class="nav-label">Our Team</span>
            </li>
            <li data-rel="#testimonial">
                <span class="nav-label">Testimonial</span>
            </li>
            <li data-rel="#map">
                <span class="nav-label">Contact Us</span>
            </li>
        </ul>
    </div>  <!-- *** end Full Screen Menu *** -->

    <!-- *****  hamburger icon ***** -->
    <a href="javascript:void(0)" class="menu-trigger">
       <div class="hamburger">
         <div class="menui top-menu"></div>
         <div class="menui mid-menu"></div>
         <div class="menui bottom-menu"></div>
       </div>
    </a>


    <!-- =========================
       Header
    ============================== -->
    <header id="header">
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            {{--language bar--}}
            @include('home.templet.language')
            <!-- Wrapper for Slides -->
            <div class="carousel-inner">

                <!-- *****  Logo ***** -->
                <div class="logo-container">
                    <a href="{{url('')}}">
                        <img src="{{asset('template/img/logo-header.jpg')}}"  width="50%" alt="">
                    </a>
                </div>
                <div class="login-container">
                    <a href="{{url('login')}}">Login here</a>&nbsp;
                    <a href="{{url('howmudiworks')}}">Know how to</a>
                </div>

                <!-- =========================
                   Header item 1
                ============================== -->
                <div class="item active">

                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('{{asset('template/img/slider/slider-9.jpg')}}');">
                    </div>
                    <div class="carousel-caption">

                        <h1 class="light mab-none">This is <strong class="bold-text">PuR Music</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">Are you a <strong class="bold-text">band or publisher</strong></h1>
                        <p class="light margin-bottom-medium">Please Register on mudi</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="{{route('bands.create')}}" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Band</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="{{route('publishers.create')}}" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Publisher</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 2
                ============================== -->
                <div class="item">

                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('{{asset('template/img/slider/slider-1.jpg')}}');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">PuR Music</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">Are you a <strong class="bold-text">band or publisher</strong></h1>
                        <p class="light margin-bottom-medium">Please Register on mudi</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="{{route('bands.create')}}" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Band</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="{{route('publishers.create')}}" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Publisher</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 3
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('{{asset('template/img/slider/slider-2.jpg')}}');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">PuR Music</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">Are you a <strong class="bold-text">band or publisher</strong></h1>
                        <p class="light margin-bottom-medium">Please Register on mudi</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="{{route('bands.create')}}" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Band</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="{{route('publishers.create')}}" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Publisher</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 4
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('{{asset('template/img/slider/slider-3.jpg')}}');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">PuR Music</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">Are you a <strong class="bold-text">band or publisher</strong></h1>
                        <p class="light margin-bottom-medium">Please Register on mudi</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="{{route('bands.create')}}" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Band</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="{{route('publishers.create')}}" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Publisher</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 5
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('{{asset('template/img/slider/slider-4.jpg')}});"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">PuR Music</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">Are you a <strong class="bold-text">band or publisher</strong></h1>
                        <p class="light margin-bottom-medium">Please Register on mudi</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="{{route('bands.create')}}" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Band</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="{{route('publishers.create')}}" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Publisher</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div> <!-- *** end wrapper *** -->

            <!-- Carousel Controls -->
            <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
                <span class="icon-prev icon-arrow-left"></span>
            </a>
            <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
                <span class="icon-next icon-arrow-right"></span>
            </a>
        </div>
    </header> <!-- *** end Header *** -->


    <!-- =========================
       Call to action
    ============================== -->
    <section id="call-to-action" class="call-to-action main-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 wow slideInLeft animated">
                    <p class="light-text">Like What You See? We are Just Getting Started</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 button-container wow slideInRight animated">
                    <a href="#portfolio" class="button light internal-link pull-left hvr-grow" data-rel="#why-choose-us">Why choose Us</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section> <!-- *** end call-to-action *** -->


    <!-- =========================
       About Us
    ============================== -->
    <section id="about-us" class="about-us">
        <div class="overlay">
            <div class="container padding-top-large">
                <h2>
                    <strong class="bold-text">About</strong>
                    <span class="light-text main-color">US</span>
                </h2>
                <div class="line main-bg"></div>
                <div class="row margin-bottom-medium">
                    <div class="col-md-7">
                        <div class="jumbo-text light-text margin-top-medium wow slideInLeft" data-wow-duration="2s">
                            PuR Music, An agency <strong class="bold-text">serve Digital score.</strong>
                            PuR Music aim to reduce the use of score sheet and PDF. We connect between the musical score sheet creator
                            and the Band user.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('template/img/about-side-side.png')}}" alt="About Us Big Image" class="center-block img-responsive">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <p class="margin-bottom-medium wow slideInUp">Now, today’s technology allows us to embrace
                    not only “green” living by providing digital, downloadable sheet music, but also
                    gives us a place to share our voice to music lovers everywhere..</p>
                <div class="row margin-top-large">
                    <div class="col-md-8">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <!-- =========================
                               Collapsible Panel 1
                            ============================== -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="panel-title">
                                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="state"><strong>-</strong></span>
                                            <strong>Compose Score And Publish for sell</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        Publisher find the score from the digital score sheet composer then
                                        publisher publish their score into our site for selling score.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 2
                            ============================== -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="state"><strong>+</strong></span>
                                            <strong>Buy Score and Make Music</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        After purchasing score your score will be appear on your android application (MuDI) then
                                        you can play it, edit it. Play MuDi and make music.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 3
                            ============================== -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="state"><strong>+</strong></span>
                                            <strong> Share your score into your band.</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        After purchasing score you can share your
                                        score within your musician using your PuR Music android application (MuDi).
                                        Your band can perform on the stage.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->
                        </div> <!-- *** end panel-group *** -->
                    </div> <!-- *** end col-md-8 *** -->
                    <div class="col-md-4">
                        <img src="{{asset('template/img/case-studdy-people.png')}}" class="center-block img-responsive" alt="Case Study">
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end About Us *** -->


    <!-- =========================
       Case Study
    ============================== -->
    <section id="case-study" class="case-study">
        <div class="row mar-none mat-none">

            <!-- *****  Case Study Left ***** -->
            <div class="col-md-6 case-study-left wow slideInLeft">
                <div class="overlay padding-large text-right">
                    <div class="description">
                        <h3 class="margin-bottom-small light-text">Publish Your Score And Get the Value</h3>
                        <p>Publish your score into PuR Music, get it it's perfect value. Your score will be safe in our highly secured server.</p>
                    </div>
                </div>
            </div>

            <!-- *****  Case Study Right ***** -->
            <div class="col-md-6 case-study-right wow slideInRight">
                <div class="overlay padding-large">
                    <div class="description">
                        <h3 class="margin-bottom-small light-text">Get standard score and make music</h3>
                        <p>Get the score anywhere any place and make music and perform on live stage using MuDi android application.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Case Study *** -->


    <!-- =========================
       Why Coose Us
    ============================== -->
    <section id="why-choose-us" class="why-choose-us">
        <div class="container margin-top-large">
            <h2>
                Why
                <strong class="bold-text">Choose</strong>
                <span class="light-text main-color">Us</span>
            </h2>
            <div class="line main-bg margin-bottom-large"></div>

            <div class="row text-center">

                <!-- *****  Service Single ***** -->
                <div class="col-md-4">
                    <div class="service wow slideInLeft">
                        <div class="icon"><i class="icon-idea"></i></div>
                        <h4>Easy <strong>To publish </strong></h4>
                        <p>If you registered as a publisher and have digital score sheet it is very easy to publish and sell to the band </p>
                    </div>
                </div>

                <!-- *****  Service Single ***** -->
                <div class="col-md-4">
                    <div class="service wow fadeInUp">
                        <div class="icon"><i class="icon-heart"></i></div>
                        <h4>Your <strong>Score will be encrypted</strong></h4>
                        <p>We promise that your score will be safe, secure and encrypted.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service wow slideInRight">
                        <div class="icon"><i class="icon-office"></i></div>
                        <h4><strong>Sell</strong> Your score easily  </h4>
                        <p>We have lots of registered band who can buy your score.
                            So, you don't need to worry about the marketing of your score.

                        </p>
                    </div>
                </div>

                <!-- *****  Service Single ***** -->
                <div class="col-md-4">
                    <div class="service wow slideInLeft">
                        <div class="icon"><i class="icon-mobile"></i></div>
                        <h4><strong>Get</strong> Scores Easily</h4>
                        <p>For Band, we have lots of score in our store, so you can buy scores from us.
                        </p>
                    </div>
                </div>

                <!-- *****  Service Single ***** -->
                <div class="col-md-4">
                    <div class="service wow fadeInUp">
                        <div class="icon"><i class="icon-code"></i></div>
                        <h4><strong>Get</strong> Score anywhere</h4>
                        <p>You can synchronise your score from anywhere.
                        </p>
                    </div>
                </div>

                <!-- *****  Service Single ***** -->
                <div class="col-md-4">
                    <div class="service wow slideInRight">
                        <div class="icon"><i class="icon-web-browser"></i></div>
                        <h4><strong>Share</strong> Score among your musician</h4>
                        <p>Suppose, You have a Band. Your band have guitarist, Drammer and other musician.
                        You can share score according their instrument.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- *** end row *** -->
        </div> <!-- *** end container *** -->
    </section> <!-- *** end Why Choose Us *** -->


    <!-- =========================
       Our Skills
    ============================== -->

    <!-- =========================
       Processes
    ============================== -->
    <section id="processes" class="processes">
        <div class="overlay">
            <div class="container padding-large">
                <div class="row">
                    <div class="col-md-5 text-center process-interactive wow fadeInLeft" data-wow-duration="2s">
                        <div class="process-bar main-bg discussion">
                            <i class="icon-discussion"></i>
                        </div>
                        <div class="process-bar right check">
                            <i class="icon-check"></i>
                        </div>
                        <div class="lines"></div>
                        <div class="process-bar main-bg idea">
                            <i class="icon-idea"></i>
                        </div>
                        <div class="process-bar right office">
                            <i class="icon-office"></i>
                        </div>
                    </div> <!-- *** end col-md-5 *** -->
                    <div class="col-md-7">

                        <!-- *****  Single feature ***** -->
                        <div class="feature wow fadeInUp" data-wow-delay=".2s">
                            <div class="icon-container pull-left">
                                <span class="icon-discussion"></span>
                            </div>
                            <div class="description text-left pull-right">
                                <h4><strong>Compose Score</strong></h4>
                                <p>
                                    Compose score in a digital way and publish them on our site.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- *****  Single feature ***** -->
                        <div class="feature wow fadeInUp" data-wow-delay=".3s">
                            <div class="icon-container pull-left">
                                <span class="icon-idea "></span>
                            </div>
                            <div class="description text-left pull-right">
                                <h4><strong>Make Money</strong></h4>
                                <p>
                                    Composing score you can make money from PuR Music.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- *****  Single feature ***** -->
                        <div class="feature wow fadeInUp" data-wow-delay=".4s">
                            <div class="icon-container pull-left">
                                <span class="icon-office "></span>
                            </div>
                            <div class="description text-left pull-right">
                                <h4><strong>Make Music</strong></h4>
                                <p>
                                    Get the score from ours and make music.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div> <!-- *** end col-md-7 *** -->
                </div>
            </div>
        </div>
    </section> <!-- *** end Processes *** -->


    <!-- =========================
       Our Team
    ============================== -->
    <section id="our-team" class="our-team">
        <div class="container padding-top-large">
            <h2 class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".5s">
                Our
                <span class="light-text main-color">Team</span>
            </h2>
            <div class="line main-bg margin-bottom-medium"></div>

            <p class="margin-bottom-medium wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            </p>
            <div class="row">
                <!-- ***** Team member 1 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="{{asset('template/img/team/team-member-1.jpg')}}" class="img-responsive" alt="Jack Smith">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Jack Smith</strong></h3>
                                <p>CEO/Founder</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-1">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-1 *** -->
                    <!-- Team Member-1 Modal -->
                    <div class="modal fade contact-form" id="team-member-1" tabindex="-1" role="dialog" aria-labelledby="team-member-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="{{public_path('template/img/team/big/team-member-1.jpg')}}" alt="Jack Smith">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Jack Smith</strong></h3>
                                                <div class="light-text">CEO/Founder</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-1" class="member-skill" data-dimension="100" data-text="PHP" data-width="10" data-fontsize="16" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-2" class="member-skill" data-dimension="100" data-text="Python" data-width="10" data-fontsize="16" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-3" class="member-skill" data-dimension="100" data-text="Laravel" data-width="10" data-fontsize="16" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-4" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="16" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 1 section *** -->
                <!-- ***** Team member 2 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-2 ***** -->
                    <div class="team-member center-block wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="{{asset('template/img/team/team-member-2.jpg')}}" class="img-responsive" alt="John Doe">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>John Doe</strong></h3>
                                <p>Back-end Developer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-2">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-1 *** -->
                    <!-- Team Member-2 Modal -->
                    <div class="modal fade contact-form" id="team-member-2" tabindex="-1" role="dialog" aria-labelledby="team-member-2" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="{{asset('template/img/team/big/team-member-2.jpg')}}" alt="John Doe">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">John Doe</strong></h3>
                                                <div class="light-text">Back-end Developer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-5" class="member-skill" data-dimension="100" data-text="Django" data-width="10" data-fontsize="16" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-6" class="member-skill" data-dimension="100" data-text="Laravel" data-width="10" data-fontsize="16" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-7" class="member-skill" data-dimension="100" data-text="NodeJS" data-width="10" data-fontsize="16" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-8" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="16" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 2 section *** -->
                <!-- ***** Team member 3 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="{{asset('template/img/team/team-member-3.jpg')}}" class="img-responsive" alt="Jack Sparrow">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Jack Sparrow</strong></h3>
                                <p>Front-end Developer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-3">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-3 *** -->
                    <!-- Team Member-3 Modal -->
                    <div class="modal fade contact-form" id="team-member-3" tabindex="-1" role="dialog" aria-labelledby="team-member-3" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="{{asset('template/img/team/big/team-member-3.jpg')}}" alt="">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Jack Sparrow</strong></h3>
                                                <div class="light-text">Front-end Developer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-9" class="member-skill" data-dimension="100" data-text="HTML" data-width="10" data-fontsize="13" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-10" class="member-skill" data-dimension="100" data-text="CSS" data-width="10" data-fontsize="13" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-11" class="member-skill" data-dimension="100" data-text="jQuery" data-width="10" data-fontsize="13" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-12" class="member-skill" data-dimension="100" data-text="AngularJS" data-width="10" data-fontsize="13" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 3 section *** -->
                <!-- ***** Team member 4 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="{{asset('template/img/team/team-member-4.jpg')}}" class="img-responsive" alt="George Wyne">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>George Wyne</strong></h3>
                                <p>UI/UX Designer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-4">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-4 *** -->
                    <!-- Team Member-4 Modal -->
                    <div class="modal fade contact-form" id="team-member-4" tabindex="-1" role="dialog" aria-labelledby="team-member-4" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="{{asset('template/img/team/big/team-member-4.jpg')}}" alt="">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">George Wyne</strong></h3>
                                                <div class="light-text">UI/UX Designer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-13" class="member-skill" data-dimension="100" data-text="AI" data-width="10" data-fontsize="24" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-14" class="member-skill" data-dimension="100" data-text="PS" data-width="10" data-fontsize="24" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-15" class="member-skill" data-dimension="100" data-text="AF" data-width="10" data-fontsize="24" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-16" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="24" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 4 section *** -->
            </div>
        </div>
    </section> <!-- *** end Our Team *** -->


    <!-- =========================
       Testimonial
    ============================== -->
    <section id="testimonial" class="testimonial padding-large white-color text-center">
        <div class="container">
            <div class="row">
                <h2 class="margin-bottom-medium">What Our <strong class="bold-text">Customer</strong> Said</h2>
                <div class="col-md-10 col-md-offset-1">

                    <!-- *****  Carousel start ***** -->
                    <div id="testimonial-carousel" class="owl-carousel owl-theme testimonial-carousel">

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item margin-bottom-small"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium clearfix">
                                <img src="{{asset('template/img/testimonial/testimonial-1.jpg')}}" height="50" width="50" alt="Client Image">
                                <ul class="client-info main-color">
                                    <li><strong>John Doe</strong></li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="{{asset('template/img/testimonial/testimonial-2.jpg')}}" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="{{asset('template/img/testimonial/testimonial-1.jpg')}}" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="{{asset('template/img/testimonial/testimonial-2.jpg')}}" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="{{asset('template/img/testimonial/testimonial-1.jpg')}}" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Testimonial *** -->



    <!-- =========================
       Twitter
    ============================== -->
    <section id="twitter" class="twitter">
        <div class="overlay">
            <div class="container padding-large text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon hvr-grow">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="tweet-text" id="tweets">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Twitter *** -->


    <!-- =========================
       Map
    ============================== -->
    <section id="map" class="map">
        <div id="map-container">

        </div>
    </section> <!-- *** end Map Container *** -->


    <!-- =========================
       Send Message
    ============================== -->
    <section id="send-message" class="send-message main-bg white-color text-center">
        <div class="send-icon" data-toggle="modal" data-target="#contact-form">
            <i class="fa fa-paper-plane"></i>
        </div>
        <p class="light-text">Have any <span class="bold-text">Score</span>? knock <span class="bold-text">us</span ></p>

        <!-- Contact Form Modal -->
        <div class="modal fade contact-form" id="contact-form" tabindex="-1" role="dialog" aria-labelledby="contact-form" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-body">

                        <!-- *****  Contact form ***** -->
                        <form class="form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="first-name" placeholder="First name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="last-name" placeholder="Last name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email address">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="project-name" placeholder="Project name">
                                </div>
                                <div class="form-group col-md-12 mab-none">
                                    <textarea rows="6" class="form-control" id="description" placeholder="Your project details and description ..."></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="button bold-text main-bg"><i class="fa fa-paper-plane"></i></div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- *** end modal-body *** -->
                </div> <!-- *** end modal-content *** -->
            </div> <!-- *** end modal-dialog *** -->
        </div> <!-- *** end Contact Form modal *** -->
    </section> <!-- *** end Send Message *** -->


    <!-- =========================
       Footer
    ============================== -->
    <footer id="footer" class="footer">
        <div class="container padding-large text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <figure class="margin-bottom-medium">
                        <img src="{{asset('template/img/logo-header.jpg')}}" width="25%" class="footer-logo" alt="Krefolio">
                    </figure>
                    <p class="margin-bottom-medium">PuR Music is the world-wide industry standard in music
                        notation software. Anywhere music appears on your mobile,
                        PuR Music likely created those digital score. PuR Music helps the choir to sing,
                        the band to march, the students to learn,
                        and the orchestra to raise the excitement level in the latest blockbuster album.</p>

                    <!-- =========================
                       Social icons
                    ============================== -->
                    <ul class="social margin-bottom-medium">
                        <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="g-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li class="dribbble hvr-pulse"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                    <p class="copyright">
                        &copy; Copyright 2015 PuR Music - All Rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer> <!-- *** end Footer *** -->

    <!-- =========================
       Back to top button
    ============================== -->
    <div class="back-to-top" data-rel="header">
        <i class="icon-up"></i>
    </div>

    <!-- =========================
     JavaScripts
    ============================== -->
    {{HTML::script('template/js/vendor/jquery-1.11.1.js')}}
    {{HTML::script('template/js/vendor/jquery-migrate-1.2.1.min.js')}}
    
    {{HTML::script('template/js/twitterFetcher_min.js')}}
    {{HTML::script('template/js/vendor/bootstrap.js')}}
    {{HTML::script('template/js/wow.min.js')}}
    {{HTML::script('template/js/imagesloaded.pkgd.min.js')}}
    {{HTML::script('template/js/jquery.easing.min.js')}}
    {{HTML::script('template/js/appear.js')}}
    {{HTML::script('template/js/jquery.circliful.min.js')}}
    {{HTML::script('template/js/owl.carousel.min.js')}}
    {{HTML::script('template/js/nivo-lightbox.min.js')}}
    {{HTML::script('template/js/isotope.pkgd.min.js')}}
    {{HTML::script('template/js/main.js')}}
<script>
    //changing language
    $("#language_change").on('click',function(event){
        event.preventDefault();
        var $input = $( this );


       var languageLink =  $input.attr( "href" );

            $.ajax({url: languageLink,
                success: function(result){

                    location.reload();
            }
            });

    });
</script>
</body>
</html>
