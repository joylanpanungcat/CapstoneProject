@extends('inspector/include.navbar')
@section('title','Dashboard')
@section('content')
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

  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="col-md-12 body_content">

          <div class="row">

                     
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-file"></i>
               </div>
               <div class="count" ><strong id="for_inspection_count"></strong></div>

               <h3><a href="{{ route('for_inspection') }}">For Inspection</a></h3>
               <p>Application for Inspection</p>
             </div>
           </div>
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-list"></i>
              </div>
              <div class="count"><strong id="inspected_count"></strong> </div>

              <h3><a href="{{ route('inspected_application') }}"> Inspected  </a></h3>
              <p>Inspected Application Details </p>
            </div>
          </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-history"></i>
               </div>
               <div class="count"><strong id="history_count"></strong> </div>

               <h3><a href=""> History </a></h3>
               <p>Inspection History</p>
             </div>
           </div>
           
          
         </div>

   </div>
 </div>




</div>  
       
     </div>
 </div>

 <script>
  $(document).ready(function(){
    fetch()
      function fetch(){
          $.ajax({
              type:'get',
              url:'{{ route('Dashboard_fetch_Inspector') }}',
              dataType: 'json',
              success:function(data){
                $('#for_inspection_count').html(data.data);
                $('#inspected_count').html(data.data2);
                $('#history_count').html(data.data3);
                
              }

          })
      }
  })
</script> 



  @endsection 