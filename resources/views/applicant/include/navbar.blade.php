

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">
    {{-- csrf  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
     <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
{{-- jquery --}}
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->



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
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    {{-- sweet alert --}}
   <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
   
    {{-- dropzone --}}
<link rel="stylesheet" type="text/css" href="{{ asset('dropzone/min/dropzone.min.css') }}"> 
 <script type="text/javascript" src="{{ asset('dropzone/min/dropzone.min.js') }}"></script>

{{-- wizard --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/appcss/wizardForm.css') }}">
{{-- jquery-ui --}}
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}">
{{-- datapicker --}}
<link rel="stylesheet" type="text/css" href="{{ asset('js/datepicker/datetimepicker.css') }}">


 <!-- PWA  -->
 <link rel="manifest" href="{{ asset('manifest.json') }}">
 <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
 <meta name="apple-mobile-app-status-bar" content="#6777ef">
 <meta name="theme-color" content="#6777ef">
 

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
  .bfp_panabo{
      color: #446587;
      }
      .logo{
      height: 80px;
      margin-left: 20%;
      margin-right: auto;
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
  @keyframes blinkingText{
    0%{     color: #white;   
          }
    49%{    color: #white;
    }
    60%{    color: transparent; 
    }

    100%{   color: #white;   }
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


.site_title {
  text-overflow: ellipsis;
  overflow: hidden;
  font-weight: 400;
  font-size: 22px;
  width: 100%;
  color: #ECF0F1 !important;
  margin-left: 0 !important;
  line-height: 59px;
  display: block;
  height: 120px;
  margin: 0;
  padding-left: 10px; }

.nav-sm .navbar.nav_title2 a span {
  display: none; }
  .navbar.nav_title2 a span{
     margin-left: auto;
      margin-right: auto;
      display: block;
  }

  </style>  
 
  <div class="container body">
    <div class="main_container">
 
    <div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
           

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{url('images/profile.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Session::get('accountId')['username']}}</h2>
              </div>
            </div>

            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{ route('Dashboard') }}"><i class="fa fa-home"></i> Home </a>
                  </li>
               
                  <li><a href=""><i class="fa fa-bullhorn "></i>Announcement</a>
                    <li><a href="{{ route('application') }}"><i class="fa fa-tasks"></i>Application List</a>
                  </li>
                  <li><a href="{{ route('renewal') }}" class="noti_app"><i class="fa fa-history  "></i>Renewal Application <span class="badge bg-danger" id="count_application"></span> </a>
                     <li><a href="{{ route('profile') }}" ><i class="fa fa-user"></i>Profile</a>
                    
                  </li>
                    
                  </li>
                  <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out "></i> Logout </a>
                    
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
                          <li style="float:left">  <h4 class="bfp_panabo"><strong ></h4></li>
                        
          
                          <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                              <img src="{{url('images/profile.jpg')}}" alt="">{{Session::get('accountId')['username']}}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                               
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
                                  <span class="image"><img src="../assets/images/profile.jpg" alt="Profile Image" /></span>
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
                                  <span class="image"><img src="../assets/images/profile.jpg" alt="Profile Image" /></span>
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
                                  <span class="image"><img src="../assets/images/profile.jpg" alt="Profile Image" /></span>
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
         @yield('content2')       
  
      
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

  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script type="text/javascript" src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> --}}

{{-- bootstrap --}}

    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    {{-- datatable --}}
    <script type="text/javascript" src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
   

    {{-- sweetaler 2 --}}
    <script type="text/javascript" src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- custom --}}
<script type="text/javascript" src="{{url('js/custom.min.js')}}"></script>


{{-- scrollbar --}}
   <script src="{{url('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

   {{-- toastr --}}
   <script type="text/javascript" src="{{url('toastr/toastr.min.js')}}"></script>

{{-- jquery-ui --}}
<script type="text/javascript" src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
{{-- datepicker --}}
{{-- <script src="{{ asset('js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('js/datepicker/datetimepicker.min.js') }}"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
