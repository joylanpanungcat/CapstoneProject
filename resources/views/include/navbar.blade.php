

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- csrf  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  
{{-- jquery --}}
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">


   <link rel="stylesheet" type="text/css" href="{{url('css/css/font-awesome.min.css')}}">
   <!-- Custome Css -->
   <link rel="stylesheet" type="text/css" href="{{url('css/custom.min.css')}}">

   {{-- scrollbar --}}
   <link rel="stylesheet" type="text/css" href="{{url('js/scrollbar/jquery.mCustomScrollbar.min.css')}}">


<!-- Morris css -->
<link rel="stylesheet" type="text/css" href="{{url('css/morrisChart/morris.css')}}">

    <!-- Morris js -->
    <script type="text/javascript" src="{{url('js/morrisChart/morris.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/morrisChart/raphael-min.js')}}"></script>

    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="{{url('toastr/toastr.min.css')}}">

    {{-- dataTables --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">

    {{-- sweet alert --}}
   <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">

</head>
<body class="nav-md" id="main" >
    <style type="text/css">
    .logo{
      height: 45px;
    }
   #noti_number{
     background-color: #111;
     font-size: 12px;
    }
  .warning{
    color: white;
    background-color: #d9534f;
    text-align: center;
    padding: 20px;
     animation:blinkingText 1.2s infinite;

  }

  .warning a{
    color: #f0ad4e;
  }
  .warning h1{
    font-size: 100px;
  }

  #emergency_modal{
    margin-top: 10%;
  }


  </style>  

  <div class="container body">
    <div class="main_container">
 
    <div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="{{url('images/logo.png')}}" class="logo"> <span>BFP</span></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{url('images/profile.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Session::get('adminID')['username']}}</h2>
              </div>
            </div>

            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard </a>
                  </li>
               
                  <li><a href="map.php"><i class="fa fa-map"></i> Susceptibility Map </a>
                  </li>
                  <li><a href="application.php" class="noti_app"><i class="fa fa-list-ol"></i> Application <span class="badge bg-danger" id="count_application"></span> </a>
                     <li><a href="schedule.php"><i class="fa fa-calendar"></i>Schedule List</a>
                    
                  </li>
                    
                  </li>
                  <li><a href="renewal.php"><i class="fa fa-refresh"></i> Renewal </a>
                    
                  </li>
                   <li><a href="payment.php"><i class="fa fa-money"></i> Payment </a>
                    
                  </li>
                  <li><a href="assessment.php"><i class="fa fa-credit-card"></i> Assessment </a>
                    
                  </li>
                  <li><a href="maintenance.php"><i class="fa fa-wrench"></i> Maintenance </a>
                    
                  </li>
                  <!--  <li><a><i class="fa fa-tasks"></i> Process </a>
                  </li> -->
                  <li><a><i class="fa fa-users"></i> Account <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="account" class="noti_applicant">Applicant<span class="badge bg-danger" id="count_applicant"></span></a></li>
                      <li><a href="inspector.php">Inspector</a></li>
                      
                    </ul>
                  </li>
                    <li><a href="emergency.php" class="noti_em"><i class="fa fa-fire"></i>
                   Emergency<span class="badge bg-danger" id="count"></span> </a>
                    
                  </li>
                   <li><a><i class="fa fa-file"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a  href="approved_application.php" class="">Approved Application<span class="badge bg-danger" id="count_applicant"></span></a></li>
                      <li><a href="rejected_application.php">Rejected Application</a></li>
                      <li><a href="renewal_reports.php">Application for Renewal</a></li>
                      
                    </ul>
                  </li>
                
                   <li><a><i class="fa fa-print"></i> Print Certificate <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><span class="fa fa-chevron-down"></span><a>Fire Safety Inspection Certificate</a>
                          <ul class="nav child_menu">
                            <li><a href="fsic_occupancy_report.php">FSIC for Occupancy </a></li>
                            <li><a href="fsic_business_report.php">FSIC for Business </a></li>
                            <li><a href="fsic_renewal_report.php">FSIC for Business Renewal </a></li>
                          </ul>
                      </li>
                      <li><a href="fsec_report.php">Fire Safety Evaluation Clearance </a></li>
                      
                    </ul>
                  </li>
                

                
                </ul>

              </div>
             
           
          </div>
          </div>
            </div>
         <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{url('images/profile.jpg')}}" alt="">{{Session::get('adminID')['username']}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <!-- <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a> -->
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{url('images/profile.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>Joylan Panungcat</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                         Requirements for the Fire Safety Inspection Certificate.
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{url('images/profile.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>Joylan Panungcat</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                                   Requirements for the Fire Safety Inspection Certificate.

                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image">
                          <img src="{{url('images/profile.jpg')}}" />
                        </span>
                        <span>
                          <span>Joylan Panungcat</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                                  Requirements for the Fire Safety Inspection Certificate.

                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{url('images/profile.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>Joylan Panungcat</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                                Requirements for the Fire Safety Inspection Certificate.

                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      
         @yield('content')       
  
      
  </div>

</div>         

   <!-- footer content -->
        <footer>
          <div class="pull-right">
            Fire Safety Inspection Management System
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->


</body>
</html>

{{-- jquery --}}
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>

  {{-- jquery 3.6.0 --}}
  <script type="text/javascript" src="{{ asset('js/jquery/jquery-3.6.0.min.js') }}"></script>
{{-- bootstrap --}}

    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    {{-- datatable --}}
    <script type="text/javascript" src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>

    {{-- sweetaler 2 --}}
    <script type="text/javascript" src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
      toastr.options.preventDuplicates=true;

   
                        
    </script>

    {{-- custom --}}
<script type="text/javascript" src="{{url('js/custom.min.js')}}"></script>
{{-- scrollbar --}}
   <script src="{{url('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

   {{-- toastr --}}
   <script type="text/javascript" src="{{url('toastr/toastr.min.js')}}"></script>