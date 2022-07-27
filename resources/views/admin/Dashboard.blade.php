@extends('admin/include.navbar')
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
               <div class="count" id="applicationCount"></div>

               <h3><a href="{{ route('applicationAdmin') }}">Application</a></h3>
               <p>Old and New Application.</p>
             </div>
           </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-check"></i>
               </div>
               <div class="count" id="approvedCount"></div>

               <h3><a href="{{ route('approved_application') }}">Approved </a></h3>
               <p>Aprrove Application.</p>
             </div>
           </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-ban"></i>
               </div>
               <div class="count" id="reinspectionCount"></div>

               <h3><a href="{{ route('rejected_application') }}">Reinspection </a></h3>
               <p>Denied  or status for reinspection</p>
             </div>
           </div>
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-refresh"></i>
               </div>
               <div class="count" id="renewalCount"></div>

               <h3><a href="{{ route('renewal_application_main') }}">Renewal</a></h3>
               <p>renewal of application</p>
             </div>
           </div>
         </div>

 <div class="row">
   <div class="col-md-12">
     <div class="x_panel">
       <div class="x_title">
         <h2>Statistical Report</h2>
         <div class="row input-daterange" style="float: right">
            <div class="">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly  style="margin-right:10px;"/>
            </div>
            <div class="">
                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
            </div>
            <div class="">
                <button type="button" name="filter" id="filter" class="btn " style="background-color: #1ABB9C;color:#FFF"><i class="fa fa-check"></i></button>
                <button type="button" name="refresh" id="refresh" class="btn btn-default"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
          {{-- <ul class="nav navbar-right panel_toolbox">
                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                 </li>

               </ul> --}}

         <div class="clearfix"></div>
       </div>
       <div class="x_content">
     <center>
        <div class="col-md-12 col-sm-12 ">
            <div style="height:400px">
              {{-- <div id="chart" ></div> --}}
              <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
            </div>
          </div>
     </center>

{{--
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
           </div> --}}

           </div>
         </div>

       </div>
     </div>
   </div>
 </div>




</div>

     </div>
 </div>
 <script
 src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
 </script>
<script>
$(document).ready(function(){


$('.input-daterange').datepicker({
      todayBtn:'linked',
      format:'yyyy-mm-dd',
      autoclose:true
    });
})
$('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var category_id = $('#category_filter').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });
 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data('','');
 });

 fetch_data();
function fetch_data( from_date = '', to_date = '')
{
    $.ajax({
    type: 'get',
    url:'{{ 'getDashboard' }}',
    data:{
    from_date:from_date,
    to_date:to_date
    },
    dataType: 'json',
    success:function(data){

    var yValues = [ data.countApproved,  data.countRejected,data.countRenewal ];
    var barColors = ["#2A3F54","#AFD8F8","#1ABB9C"];
    new Chart("myChart", {
    type: "doughnut",
    data: {
    labels: data.labels,
    datasets: [{
    backgroundColor: barColors,
    data: yValues,
    }]
    },
    options: {
    title: {
    display: true,
    position: 'top',
    text: "Staticstical Report"
    }
    },
    });
    }
})
}


</script>
     <script>
      $(document).ready(function(){
        fetch()
          function fetch(view = ''){
              $.ajax({
                  type:'get',
                  url:'{{ route('fetch_dashboard') }}',
                  dataType: 'json',
                  success:function(data){
                    $('#applicationCount').html(data.applicationCount);
                    $('#approvedCount').html(data.approvedCount);
                    $('#reinspectionCount').html(data.reinspectionCount);
                    $('#renewalCount').html(data.renewalCount);

                  }

              })
          }

      })
  </script>





  @endsection
