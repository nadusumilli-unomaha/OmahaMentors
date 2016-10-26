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
                        <<li class="page-scroll">
                            <a href="{{ url('/#portfolio') }}">Portfolio</a>
                        </li>
                        <!--<li class="page-scroll">
                            <a href="{{ url('/#about') }}">About</a>
                        </li>-->
                        <li class="page-scroll">
                            <a href="{{ url('/#contact') }}">Contact</a>
                        </li>
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li><a href="{{ url('/logout') }}"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"> Logout</a>
                                                 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    </li>

                        <li><a href="{{ url('/resetPassword') }}">Reset Password</a></li>
                            <!--<li class="dropdown-submenu">
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
                            </li>-->
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
                            <h2>Super Awesome Company</h2>
                            <hr class="star-primary">
                            <img src="http://gdurl.com/94Oo" class="img-responsive img-centered" alt="">
                            <p>Super Awesome Team is a group of young individuals pursuing their graduate career at the University of Nebraska, Omaha. Super Awesome Team is known for delivering excellent website designs and accomplishing requirement. Super Awesome Team puts client's needs first and goes 'above and beyond' to bring value to the clients.</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong>Omaha Mentor For Kids</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong>December 2016</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong>Web Development</a>
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
                            <h2>Omaha Mentor For Kids</h2>
                            <hr class="star-primary">
                            <br>
                            <img src="http://gdurl.com/ck2h" class="img-responsive img-centered" alt="" height="400" width="400">
                            <br>
                            <p>Omaha Mentors for Kids Inc is a fictitious not-for-profit organization in Omaha Nebraska. It provides mentoring for at-risk students in the Omaha Public Schools. When OMK approached Super Awesome Company, their system managed over 800 students and mentors through spreadsheets. Super Awesome Team built this robust, simple, yet, efficient website for them. This website simplifies their tracking & reporting system, this website is compatible on mobile devices.</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong>Omaha Mentor For Kids</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong>December 2016</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong>Web Development</a>
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
                            <h2>University of Nebraska, Omaha</h2>
                            <hr class="star-primary">
                            <img src="data:image/jpeg;base64,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" class="img-responsive img-centered" alt="">
                            <p>For more than 100 years, the University of Nebraska Omaha (UNO) has served as the point of access for excellence in higher education.The administration of UNO is dedicated to student-centered leadership and proud to work with distinguished faculty drawn from the nation's leading graduate institutions.</p>
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
                            <h2>College of Information Science and Technology (IS&T)</h2>
                            <hr class="star-primary">
                            <img src="data:image/jpeg;base64,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" class="img-responsive img-centered" alt="">
                            <p>In the College of Information Science and Technology (IS&T), no student will go unassisted or unchallenged. IS&T creates capable technology leaders who will thrive in a globally competitive environment.Students will benefit from the college’s commitment to balance emerging disciplines with the bedrock fundamentals of information technology. The surroundings of a metropolitan campus in an emerging city offer chances to research and grow through associations with industry partners in technology.</p>
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
                            <h2>Management of Software Development (ISQA 8210)</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="" height="400" width="400">
                            <p>This course will integrate concepts and techniques from software engineering, management science, psychology, organization behavior, and organization change to identify, understand, and propose solutions to the problems of software project management. The purpose of the course is to prepare the student for leadership positions in software development and software maintenance.</p>
                            
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
                            <h2>Mentor: Dr.George Royce</h2>
                            <hr class="star-primary">
                            <img src="http://roycesite.com/img/royce.jpg" class="img-responsive img-centered" alt="">
                            <p> Dr. Royce is a lecturer in information technology and business at the University of Nebraska at Omaha in Omaha Nebraska. He retired from Mutual of Omaha after 29 years in IT in 2013. During 29 years he held a number of positions including Vice President of Enterprise Architecture (CTO) and Security (CISO). He also taught graduate and undergraduate classes in general project management and software project management. He has run many IT projects and has been the sponsor/product owner of additional projects.
</p>
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