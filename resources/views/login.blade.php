<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Login Admin </title>
   <!-- Bootstrap -->
   <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">


   <link rel="stylesheet" type="text/css" href="{{url('css/css/font-awesome.min.css')}}">
   <!-- Custome Css -->
   <link rel="stylesheet" type="text/css" href="{{url('css/custom.min.css')}}">

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

  </style>

  <body class="login">
    <div>
       

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="{{url('images/logo.png')}}">
               @if(Session::has('error'))
                 <div class='alert alert-danger alert-dismissible error'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h6><i class='icon fa fa-warning'></i> Error! <small>
                {{Session::get('error')}}
              </small></h6>
             
               </div>
              @endif
            <form action="verify" method="post">
              @csrf 
           
              <h1>Login </h1>
              <div>
                <input type="text" class="form-control" placeholder="Username"  name="username" value="{{old('username')}}" />
                @error('username')
                   <p class="error2">{{$message}}</p>
                @enderror
         

              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password"  name="password" />
                   @error('password')
                   <p class="error2">{{$message}}</p>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-secondary form-control login_button" name="login">Login</button>
            
              </div>
           
              <div class="clearfix"></div>

              <div class="separator">
               
              </div>
            </form>
          </section>
        </div>

    
      </div>
    </div>
  </body>
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
</html>
 