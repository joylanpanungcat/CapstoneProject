@extends('include.navbar')
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
               <div class="icon"><i class="fa fa-tasks"></i>
               </div>
               <div class="count">2</div>

               <h3><a href="{{ route('application') }}">Application</a></h3>
               <p>Old and New Application.</p>
             </div>
           </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-check"></i>
               </div>
               <div class="count">2</div>

               <h3><a href="{{ route('approved_application') }}">Approved </a></h3>
               <p>Aprrove Application.</p>
             </div>
           </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-ban"></i>
               </div>
               <div class="count">2</div>

               <h3><a href="{{ route('rejected_application') }}">Reinspection </a></h3>
               <p>Denied  or status for reinspection</p>
             </div>
           </div> 
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-refresh"></i>
               </div>
               <div class="count">2</div>

               <h3><a href="{{ route('renewal_application_main') }}">Renewal</a></h3>
               <p>renewal of application</p>
             </div>
           </div>
         </div>

 <div class="row">
   <div class="col-md-12">
     <div class="x_panel">
       <div class="x_title">
         <h2>Annual Application Summary </h2>
          <ul class="nav navbar-right panel_toolbox">
                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                 </li>
                 
               </ul>
         
         <div class="clearfix"></div>
       </div>
       <div class="x_content">
         <div class="col-md-9 col-sm-12 ">
           <div style="height:400px">
             <div id="chart" ></div>
           </div>
         

         </div>


         <div class="col-md-3  ">
          
               <h2>Legend</h2>
              
               <hr class="separate2">
             
             <div class="legend-group">
                 <div class="legend-group FSEC">
                 
                   <div class="legend-body">
                   <span class="legend-color FSEC"></span>

                     <h4 class="FSEC">Fire Safety Evaluation Clearance</h4>
                   </div>
                 </div>
                 <div class="legend-group">
               
                   <div class="legend-body">
                   <span class="legend-color FSIC_OCCU"></span>

                     <h4 class="FSIC_OCCU">Fire Safety Inspection Certificate for Occupancy</h4>
                   </div>
                 </div>
                 

                 <div class="legend-group">
               
                   <div class="legend-body">
                    <span class="legend-color FSIC_new" ></span>
                    <h4 class="FSIC_new">FSIC for New Business</h4>
                   </div>
                   
                 </div>
                 <div class="legend-grou2">
                  
                   <div class="legend-body">
                   <span class="legend-color FSIC_Business"></span>
                     <h4 class="FSIC_Business">Fire Safety Inspection Certificate for Business Renewal</h4>
                   </div>
                 </div>
               </div>
           </div>

           </div>
         </div>

       </div>
     </div>
   </div>
 </div>




</div>  
       
     </div>
 </div>

 <script type="text/javascript">

  Morris.Line({
    element: 'chart',
    
    data: [
      { month: '2021-01', FSEC: 3 },
      { month: '2021-01', renew: 1 },
      { month: '2021-01', FSIC_B: 3 },
      { month: '2021-01', FSIC_OCCU: 4},
      { month: '2021-02', FSEC: 6},
      { month: '2021-02', renew: 4},
      { month: '2021-02', FSIC_B: 4},
      { month: '2021-02', FSIC_OCCU: 3},
      { month: '2021-03', FSEC: 7},
      { month: '2021-03', renew: 2},
      { month: '2021-03', FSIC_B: 1},
      { month: '2021-03', FSIC_OCCU: 4},
      { month: '2021-04', FSEC: 3},
      { month: '2021-04', renew: 4},
      { month: '2021-04', FSIC_B: 2},
      { month: '2021-04', FSIC_OCCU: 6},
      { month: '2021-05', FSEC: 2},
      { month: '2021-05', renew: 2},
      { month: '2021-05', FSIC_B: 2},
      { month: '2021-05', FSIC_OCCU: 2},
      { month: '2021-06', FSEC: 5},
      { month: '2021-06', renew: 2},
      { month: '2021-06', FSIC_B: 2},
      { month: '2021-06', FSIC_OCCU: 3},
      { month: '2021-07', FSEC: 6 },
      { month: '2021-07', renew: 3 },
      { month: '2021-07', FSIC_B: 3},
      { month: '2021-07', FSIC_OCCU: 4 },
      { month: '2021-08', FSEC: 4 },
      { month: '2021-08', renew: 3 },
      { month: '2021-08', FSIC_B: 2},
      { month: '2021-08', FSIC_OCCU: 3 },
      { month: '2021-09', FSEC: 7 },
      { month: '2021-09', renew: 3 },
      { month: '2021-09', FSIC_B: 6},
      { month: '2021-09', FSIC_OCCU: 5 },
      { month: '2021-10', FSEC: 3},
      { month: '2021-10', renew: 4},
      { month: '2021-10', FSIC_B: 5},
      { month: '2021-10', FSIC_OCCU: 3},
      { month: '2021-11', FSEC: 2 },
      { month: '2021-11', renew: 5 },
      { month: '2021-11', FSIC_B: 4},
      { month: '2021-11', FSIC_OCCU: 5 },
      { month: '2021-12', FSEC: 8},
      { month: '2021-12', renew: 4},
      { month: '2021-12', FSIC_B: 3},
      { month: '2021-12', FSIC_OCCU: 6}
    ],
    xkey: 'month',
    ykeys: ['renew','FSEC','FSIC_B','FSIC_OCCU'],
    hideHover: 'auto',
    lineWidth: '4px',
    labels: ['Business Renewal','FSEC','FSIC for Business','FSIC for Occupancy']
  });
    </script>
     



  @endsection 