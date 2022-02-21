<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register </title>
   <!-- Bootstrap -->
   <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">


   <link rel="stylesheet" type="text/css" href="{{url('css/css/font-awesome.min.css')}}">
   <!-- Custome Css -->
   <link rel="stylesheet" type="text/css" href="{{url('css/custom.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
   <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>

  </head>
  <style type="text/css">
   img{
    height: 250px;
   }
   .error2{
    margin-left: -150px;
    margin-top: -15px;
    color: red;
   }
.login_button{
  background-color: #1ABB9C;
}
.login_content label{
float: left;
}
.swal2-title{
  color: #ffff;
  
}

  </style>

  <body class="login">
    <div>
       

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="{{url('images/logo.png')}}">
              
            <form method="post" id="register">
            
           
              <h1>Register </h1>
              <div>
                <label for="">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" required  name="username" id="Fname" />
         

              </div>
              <div>
                <label for="">Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name"  name="username" id="Lname" value="{{old('username')}}"  required/>
         

              </div>
              <div>
                <label for="">Username</label>
                <input type="text" class="form-control" placeholder="Username"  name="username" id="username" value="" required />
                <p id="validate_username" ></p> 

              </div>
             
              <div>
                <label for="">Password</label>
                <input type="password" placeholder="password" class="form-control"  required value="" onkeyup="this.setAttribute('value', this.value); "
                id="txtPassword" class="password" >
                  <p id="strengthMessage"></p> 
              </div>
              <div>
                <label for="">Contact Number</label>
                <input type="text" class="form-control" placeholder="Contact Number" required name="username" id="contact_num" value="{{old('username')}}" />
              </div>
              <div>
                <label for="">Purok</label>
                <input type="text" class="form-control" placeholder="Purok"  name="username" id="purok" value="{{old('username')}}" />
              </div>
              <div>
                <label for="">Barangay</label>
                <input type="text" class="form-control" placeholder="Barangay"required  name="username" id="barangay" value="{{old('username')}}" />
              </div>
              <div>
                <label for="">City</label>
                <input type="text" class="form-control" placeholder="City"required  name="username" id="city" value="{{old('username')}}" />
              </div>
             
             
              <div>
                <button type="submit" class="btn btn-secondary form-control  login_button" name="login" >Register</button>
            
              </div>
           
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already have an aacount?
                  <a href="/" class="to_register" style="font-weight:500;color:#1ABB9C;font-size:18px">Login </a>
                </p>
              </div>
            </form>
          </section>
        </div>

    
      </div>
    </div>
  </body>

  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/script.js')}}"></script>
  <script type="text/javascript" src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>

    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
</html>
 