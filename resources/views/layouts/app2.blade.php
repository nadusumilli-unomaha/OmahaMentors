<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Omaha Mentor for Kids</title>
    <link rel="icon" href="{{ asset('img/OMK.png') }}" type="image/png">

    <!-- Bootstrap Core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    {{Html::style('vendor/bootstrap/css/bootstrap.min.css')}}
    <!-- Html::style('vendor/bootstrap/css/bootstrap-switch.css')}}
    Html::style('vendor/bootstrap/css/bootstrap-switch.min.css')}} -->
    <!-- Theme CSS -->
    <!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->
    {{Html::style('css/freelancer.min.css')}}

    <!-- Custom Fonts -->
    <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    {{Html::style('vendor/font-awesome/css/font-awesome.min.css')}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Omaha Mentor for Kids</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        @if(Auth::Check())
                            <a href="{{ url('/afterLogin') }}"> <i class="glyphicon glyphicon-home"></i> Home</a>
                        @else
                            <a href="{{ url('/home') }}"> <i class="glyphicon glyphicon-home"></i> Home</a>
                        @endif
                    </li>
                    <li class="page-scroll">
                        <a href="{{ url('/#portfolio') }}">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{ url('/#about') }}">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{ url('/#contact') }}">Contact</a>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-user"></i>  {{ Auth::user()->firstName }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" style="color:black" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="glyphicon glyphicon-log-out"></i>  Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" style="color:black"  href="{{ url('/resetPassword') }}">
                                        Reset Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!-- Main Content in the center of the page.-->
    <header>
        <div class="container">
            {{ HTML::image('img/profile.png', '', array('class' => 'img-responsive')) }}
        </div>
            <!-- <img class="img-responsive" src="img/profile.png" alt=""> -->
            <div class="intro-text">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <div class="container"></div>
    </header>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-3">
                        <h3>Location</h3>
                        <p>University of Nebraska
                            <br>6001 Dodge Street
                            <br>Omaha, NE 68182</p>
                    </div>
                    <div class="footer-col col-md-3">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-3">
                        <h3>About Super Awesome</h3>
                        <p>Super Awesome is a software development company which provides sofware related service to companies.</p>
                    </div>
                    <div class="footer-col col-md-3">
                        <img class="img-responsive" src="img/SA.png" alt="">
                    </div>  
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Super Awesome 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    {{Html::script('vendor/jquery/jquery.min.js')}}

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
    {{Html::script('vendor/bootstrap/js/bootstrap.min.js')}}
    <!-- Html::script('vendor/bootstrap/js/bootstrap-switch.min.js')}}
    Html::script('vendor/bootstrap/js/bootstrap-switch.js')}} -->

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    {{Html::script('js/jqBootstrapValidation.js')}}
    <!-- <script src="js/jqBootstrapValidation.js"></script> -->
    {{Html::script('js/contact_me.js')}}
    <!-- <script src="js/contact_me.js"></script> -->

    <!-- Theme JavaScript -->
    {{Html::script('js/freelancer.min.js')}}
    <!-- <script src="js/freelancer.min.js"></script> -->
</body>
    <script type="text/javascript">
        $(document).ready(function() {
            //###########################################################################
            //####                The Defenitions for JS Code.                       ####
            //###########################################################################
            function checkPasswordMatch() {
                var password = $("#password").val();
                var confirmPassword = $("#password-confirm").val();

                if (password != confirmPassword)
                    $('#password, #password-confirm').each(function() {
                        this.setCustomValidity("Passwords Don't Match");
                    });
                else
                    $('#password, #password-confirm').each(function() {
                        this.setCustomValidity("");
                    });
            }


            //###########################################################################
            //####    The JavaScript to Handle Employee Radio Button Event on Divs.  ####
            //###########################################################################
            $("input[name=mentorToggle]:radio").change(function () {
                if ($(this).val() == '1') {
                    $('#mentorToggle1').css('display', 'block');
                    $('#mentorToggle2').css('display', 'none');
                    $('#mentorToggle3').css('display', 'none');
                    $('#log').val('This is 1. || ');
                }
                else if($(this).val() == '2'){
                    $('#mentorToggle1').css('display', 'none');
                    $('#mentorToggle2').css('display', 'block');
                    $('#mentorToggle3').css('display', 'none');
                    $('#log').val("This is 2. || ");
                }
                else if($(this).val() == '3'){
                    $('#mentorToggle1').css('display', 'none');
                    $('#mentorToggle2').css('display', 'none');
                    $('#mentorToggle3').css('display', 'block');
                    $('#log').val("This is 3. || ");
                }
            });
            //###########################################################################
            //####                     The End of Mentor JS.                         ####
            //###########################################################################
            
            //###########################################################################
            //####    The JavaScript to Handle Employee Radio Button Event on Divs.  ####
            //###########################################################################
            $("input[name=employeeToggle]:radio").change(function () {
                if ($(this).val() == '1') {
                    $('#employeeToggle1').css('display', 'block');
                    $('#employeeToggle2').css('display', 'none');
                    $('#employeeToggle3').css('display', 'none');
                    $('#employeeToggle4').css('display', 'none');
                    $('#employeeToggle5').css('display', 'none');
                    $('#log').val('This is 1. || ');
                }
                else if($(this).val() == '2'){
                    $('#employeeToggle1').css('display', 'none'); 
                    $('#employeeToggle2').css('display', 'block');
                    $('#employeeToggle3').css('display', 'none');
                    $('#employeeToggle4').css('display', 'none');
                    $('#employeeToggle5').css('display', 'none');
                    $('#log').val("This is 2. || ");
                }
                else if($(this).val() == '3'){
                    $('#employeeToggle1').css('display', 'none');
                    $('#employeeToggle2').css('display', 'none');
                    $('#employeeToggle3').css('display', 'block');
                    $('#employeeToggle4').css('display', 'none');
                    $('#employeeToggle5').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '4'){
                    $('#employeeToggle1').css('display', 'none');
                    $('#employeeToggle2').css('display', 'none');
                    $('#employeeToggle3').css('display', 'none');
                    $('#employeeToggle4').css('display', 'block');
                    $('#employeeToggle5').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '5'){
                    $('#employeeToggle1').css('display', 'none');
                    $('#employeeToggle2').css('display', 'none');
                    $('#employeeToggle3').css('display', 'none');
                    $('#employeeToggle4').css('display', 'none');
                    $('#employeeToggle5').css('display', 'block');
                    $('#log').val("This is 3. || ");
                }
            });
            //###########################################################################
            //####                     The End of Employee JS.                       ####
            //###########################################################################
            
            //###########################################################################
            //####    The JavaScript to Handle Admin Radio Button Event on Divs.     ####
            //###########################################################################
            $("input[name=adminToggle]:radio").change(function () {
                if ($(this).val() == '1') {
                    $('#adminToggle1').css('display', 'block');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val('This is 1. || ');
                }
                else if($(this).val() == '2'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'block');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val("This is 2. || ");
                }
                else if($(this).val() == '3'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'block');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '4'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'block');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '5'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'block');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '6'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'block');
                    $('#adminToggle7').css('display', 'none');
                    $('#log').val("This is 3. || ");
                }
                else if($(this).val() == '7'){
                    $('#adminToggle1').css('display', 'none');
                    $('#adminToggle2').css('display', 'none');
                    $('#adminToggle3').css('display', 'none');
                    $('#adminToggle4').css('display', 'none');
                    $('#adminToggle5').css('display', 'none');
                    $('#adminToggle6').css('display', 'none');
                    $('#adminToggle7').css('display', 'block');
                    $('#log').val("This is 3. || ");
                }
            });
            //###########################################################################
            //####                     The End of Admin JS.                          ####
            //###########################################################################
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

</html>