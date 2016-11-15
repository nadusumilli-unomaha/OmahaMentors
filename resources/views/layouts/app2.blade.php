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
                        <!-- <li class="page-scroll">
                            <a href="{{ url('/#about') }}">About</a>
                        </li> -->
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
                        <div class="modal fade" id="modal-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 style="color:black;" class="modal-title">Delete User</h3>
                                    </div>
                                    <div style="color:black;" class="modal-body">
                                        Are you sure you want to delete the data?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-warning pull-right" data-dismiss="modal">Close</a>
                                        <button type="submit" style="margin: 0px 10px 0px 10px;" class="btn btn-danger" id="btnYes">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            {{ HTML::image('img/UNO.png', '', array('class' => 'img-centered img-responsive')) }}
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
                            {{ HTML::image('img/college of is&t.jpg', '', array('class' => 'img-centered img-responsive')) }}
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

                //Auto activate the tabs in each page when they are logged in.
                $('#myTab  a').click(function(e) {
                  e.preventDefault();
                  $(this).tab('show');
                });
                $("ul.nav-tabs#myTab > li > a").on("shown.bs.tab", function(e) {
                  var id = $(e.target).attr("href");
                  localStorage.setItem('selectedTab', id)
                });
                var selectedTab = localStorage.getItem('selectedTab');
                $('#myTab a[href="' + selectedTab + '"]').tab('show');
                
                //###########################################################################
                //####                      The end for JS Code.                         ####
                //###########################################################################
            });
        </script>

    </html>