<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>No Internet</title>
  <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
  <script type="text/javascript" src="{{url('js/jquery/jquery.min.js')}}"></script>
</head>
<style type="text/css">
  .legend-group{
    padding: 10px;
    display: inline;
  }
  .legend-group.FSEC{
    margin-left: -10px;
  }
  .legend-group .legend-body{
    display: inline-block;
    width: 200px;
    margin-top: 20px;

  }
  .legend-group .legend-event{
    display: inline-block;
    font-size: 20px;
    text-align: center;

  }
  .legend-group .legend-color{
    display: inline-block;
    height: 20px;
    width: 20px;

  }
  .legend-group .legend-grou2{
    margin-left: 10px;
  }
   .legend-group .legend-color.FSIC_Business{
   background-color: #0B62A4;
   float: right;
  }
  .legend-group .legend-color.FSIC_new{
   background-color: #4DA74D;
   float: right;
  }
  .legend-group .legend-color.FSIC_OCCU{
   background-color: #AFD8F8;
   float: right;
  }
  .legend-group .legend-color.FSEC{
   background-color: #7A92A3;
   float: right;
  }
  .legend-group .legend-body h4.FSEC: hover{
   color: #111;
  }
   .legend-group .legend-body h4.FSIC_OCCU:hover{
   color: #AFD8F8;
  }
 
   .legend-group .legend-body h4.FSIC_new:hover{
   color: #4DA74D;
  }
   .legend-group .legend-body h4.FSIC_Business:hover{
   color: #0B62A4;
  }
  .icon{
    color: #446587 !important;
  }
.separate2{
border-bottom: 3px solid #1ABB9C;
width: 80%;
}
.no_internet img{
  height: 40vw;
}
.retry{
border: 2px solid #0B62A4;
color: #0B62A4;
}
html,
body {
  height: 100%;
  width: 100%;
}

.container {
  align-items: center;
  display: flex;
  justify-content: center;
  height: 100%;
  width: 100%;
}

</style>
<body>

    <div class="container">
        <center>
            <div class="col-md-12 no_internet">
                <img src="{{ asset('images/no_internet.png') }}" alt="" class="img-fluid ">
                <div><h3>Connect to the internet</h3></div>
                <div><p>You're offline. Check your connection</p></div>
                <div><a href="{{ request()->fullUrl() }}" class="btn btn-default retry">Reload</a></div>
            </div>
        </center>
    </div>

    
</body>
<script type="text/javascript" src="{{url('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
</html>
 
 