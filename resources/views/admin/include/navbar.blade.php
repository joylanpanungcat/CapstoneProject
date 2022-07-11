

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
     <link rel="stylesheet" href="{{ asset('js/autocomplete/jquery-ui.css') }}">

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
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}"> --}}
{{-- datapicker --}}
<link rel="stylesheet" type="text/css" href="{{ asset('js/datepicker/datetimepicker.css') }}">

<link rel="stylesheet" href="{{ asset('js/nprogress/nprogress.css') }}">
<link rel="stylesheet" href="{{ asset('js/print/print.css') }}">

{{-- map --}}

{{-- <script src="{{ asset('js/leaflet/leaflet-1.7.1.js') }}"></script> --}}
   {{-- <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=LAx0wIuGORRKAYko5EV2n17VGGARYcDv"></script>
   <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=LAx0wIuGORRKAYko5EV2n17VGGARYcDv"></script> --}}
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
.separate{
  border-bottom: 3px solid #1ABB9C;
  margin-top: -1px;
  width: 80%;
  margin-left:5% ;
}

  </style>

  <div class="container body">
    <div class="main_container">

    <div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
             <div class="navbar nav_title2" style="border: 0;">
              <a href="{{'DashboardAdmin'}}" class="site_title"><img src="{{url('images/logo.png')}}" class="logo"><br><span><strong>BFP</strong> <b >  PANABO</b> </span></a>
            </div>

            <hr class="separate">
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
                  <li><a href="{{ route('DashboardAdmin') }}"><i class="fa fa-dashboard"></i> Dashboard </a>
                  </li>

                  <li><a href="{{ route('map') }}"><i class="fa fa-map"></i> Susceptibility Map </a>
                  </li>
                  <li><a href="{{ route('applicationAdmin') }}" class="noti_app"><i class="fa fa-list-ol"></i> Application <span class="badge bg-danger" id="count_application"></span> </a>
                     <li><a href="{{ route('schedule') }}"><i class="fa fa-calendar"></i>Schedule List</a>

                  </li>
                  </li>
                  <li><a href="{{ route('notification') }}" class="noti_em"><i class="fa fa-bell"></i>
                    SMS/Push Notification<span class="badge bg-danger" id="count"></span> </a>

                   </li>
                  <li><a href="{{ route('renewal_application_main') }}" class="noti_renewal"><i class="fa fa-refresh"></i> Renewal  <span class="badge bg-danger" id="count_renewal"></span></a>

                  </li>
                   <li><a href="{{ route('payment') }}"><i class="fa fa-money"></i> Payment </a>

                  </li>
                  <li><a href="{{ route('assessmentSearch', ['name' => 'blank']) }}"><i class="fa fa-credit-card"></i> Assessment </a>

                  </li>
                  <li><a href="{{ route('maintenance') }}"><i class="fa fa-wrench"></i> Maintenance </a>

                  </li>
                  <!--  <li><a><i class="fa fa-tasks"></i> Process </a>
                  </li> -->
                  <li><a><i class="fa fa-users"></i> Account <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('account') }}" class="noti_applicant">Applicant<span class="badge bg-danger" id="count_applicant"></span></a></li>
                      <li><a href="{{ route('inspector') }}">Inspector</a></li>

                    </ul>
                  </li>
                    <li><a href="{{ route('emergency_page') }}" class="noti_em"><i class="fa fa-fire"></i>
                   Emergency<span class="badge bg-danger" id="count"></span> </a>

                  </li>
                  <li><a href="{{ route('archive') }}" class="noti_em"><i class="fa fa-archive"></i>
                   Archived<span class="badge bg-danger" id="count"></span> </a>

                  </li>
                   {{-- <li><a><i class="fa fa-file"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a  href="{{ route('approved_application') }}" class="">Approved Application<span class="badge bg-danger" id="count_applicant"></span></a></li>
                      <li><a href="{{ route('rejected_application') }}">Reinspection Application</a></li>
                      <li><a href="{{ route('renewal_application') }}">Application for Renewal</a></li>

                    </ul>
                  </li>

                   <li><a><i class="fa fa-print"></i> Print Certificate <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><span class="fa fa-chevron-down"></span><a>Fire Safety Inspection Certificate</a>
                          <ul class="nav child_menu">
                            <li><a href="{{ route('fsic_occupancy_report') }}">FSIC for Occupancy </a></li>
                            <li><a href="{{ route('fsic_business_report') }}">FSIC for Business </a></li>
                          </ul>
                      </li>
                      <li><a href="{{ route('fsec_report') }}">Fire Safety Evaluation Clearance </a></li>

                    </ul>
                  </li> --}}



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
                          <li style="float:left">  <h4 class="bfp_panabo"><strong >BFP PANABO</strong></h4></li>


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
                            <a class="dropdown-item"  href="{{ route('logoutAdmin') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
  {{-- <script type="text/javascript" src="{{ asset('js/jquery/jquery-3.6.0.min.js') }}"></script> --}}

  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script type="text/javascript" src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

{{-- bootstrap --}}

    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    {{-- datatable --}}
    <script type="text/javascript" src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/nprogress/nprogress.js') }}"></script>
    {{-- sweetaler 2 --}}
    <script type="text/javascript" src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- custom --}}
<script type="text/javascript" src="{{url('js/custom.min.js')}}"></script>


{{-- scrollbar --}}
   <script src="{{url('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

   {{-- toastr --}}
   <script type="text/javascript" src="{{url('toastr/toastr.min.js')}}"></script>

{{-- jquery-ui --}}
{{-- <script type="text/javascript" src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script> --}}
<script src="{{ asset('js/autocomplete/jquery-ui.js') }}"></script>
{{-- datepicker --}}
{{-- <script src="{{ asset('js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('js/datepicker/datetimepicker.min.js') }}"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script src="{{ asset('js/print/print.min.js') }}"></script>
<script src="{{ asset('js/print/html2canvas.min.js') }}"></script>
<script>
  $(document).ready(function(){
    function set_emergency(view = ''){
      $.ajax({
        type: 'get',
        url: '{{ route('fetch_emergency') }}',
        dataType: 'json',
        success:function(data){
          if(data.dataCount > 0){
            Swal.fire({
              title:"FIRE EMERGENCY !!",
              iconHtml: '<i class="fa fa-warning"></i>',
              iconColor: '#ff2323',
                    showConfirmButton:true,
                    focusConfirm: false,
                    background: 'rgb(0,0,0,.9)',
                    customClass : {
                    title: 'swal2-title'
                  },
                allowOutsideClick: false,

                  confirmButtonColor: '#3085d6',
                  confirmButtonText:
                    '<i class="fa fa-arrow-right"></i> View Details',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                  cancelButtonText:
                    '<i class="fa fa-arrow-left"></i>Close',
                  cancelButtonAriaLabel: 'Thumbs down',

               }).then((result) => {
                            window.location.href = "{{ route('emergency_view') }}";
                        });
          }
        }
      })
    }
    set_emergency();
      setInterval(function(){
        set_emergency();
        applicationUpdateStatus();
        load_unseen_notification();
        load_unseen_renewal();
      }, 10000);

    function applicationUpdateStatus(){
        $.ajax({
            type: 'get',
            url: '{{ route('applicationUpdateStatus') }}',
            dataType: 'json',
        })
    };
    $(document).on('click', '.noti_app', function(){
    $('#count_application').html('');
    load_unseen_notification('yes');
    });
    function load_unseen_notification(view = '')
    {
    $.ajax({
    url:"{{ route('application_notif') }}",
    type:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
        // $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0)
        {
        $('#count_application').html(data.unseen_notification);
        }
    }
    });
    }
 load_unseen_notification();

 function load_unseen_renewal(view = '')
    {
    $.ajax({
    url:"{{ route('renewal_notif') }}",
    type:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
        // $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0)
        {
        $('#count_renewal').html(data.unseen_notification);
        }
    }
    });
    }
    load_unseen_renewal();
    $(document).on('click', '.noti_renewal', function(){
         load_unseen_renewal('yes');
    $('#count_renewal').html('');
    });


  })
</script>
