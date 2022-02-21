@extends('admin/include.navbar')
@section('title','applicant account')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<style type="text/css">
    table tbody tr td input{
      border: none;
      background-color: transparent;
      padding: 5px;

    }
    table tbody tr td input:hover{
      border: 3px solid #0687d6;
     

    }
    .title_right button{
      float: right;
    }
    .modal input:hover{
       border: 3px solid #0687d6;
    }
   #user_data tr.removeRow
          {
              background-color: #b5b5b5;
          }


.compose .compose-header {
  background-color: #2A3F54;
  }
.compose .compose-header .close {
text-shadow: 0 1px 0 #ffffff;
line-height: .8; 
color: #fff;
}
.compose-footer button{
  background-color:  #2A3F54;
  border: none;
}
.btn-group a:hover{
  background-color:  #2A3F54;

}
#updateRecord{
    padding: 20px;
}
#updateRecord .modal-content{
    padding: 20px;
}
.btn_update{
width: 50%;
  margin: 0% 25% 0% 25%;
  background-color: #1ABB9C;
  color: #fff;
}
.separate2{
border-bottom: 3px solid #1ABB9C;
margin-top: 60px;
}
</style>


  
     
 
 
  <div class="right_col" role="main" >
     <div class="">
        
 <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog modal-sm" >
 
                         <div class="modal-content">
                         
                          <form>
                           <center><h5><b> Update  Map Information</b></h5></center>
                            <div class="form-control">
                              <input type="file" name="">
 
                            </div>
 
                          </form><br>
                         <button type="button" class="btn  btn-sm btn_update "><i class="fa fa-edit fa-lg"  ></i>Update</button>
                         </div>
                       </div>
                     </div>
                        <div class="">
                       <div class="page-title">
                         <div class="title_left">
                             <h3>Susceptibility Map</h3>
                         </div>
 
                         <div class="title_right">
                           <button class="btn btn-default" data-toggle="modal" data-target="#updateRecord"><i class="fa fa-edit fa-lg"  ></i>Update</button>
                   
                         </div>
                     </div>
                     <hr class="separate2">
                     </div>
                     
         <div class="clearfix"></div>
                     <div class="row">
                         <div class="col-md-12  ">
                   <div class="x_panel">
                  
                     <div class="x_content">
                       <div class="dashboard-widget-content">
                         
                         <div id="map" class="col-md-12" style="height:440px;"></div>
                   
                       </div>
                     </div>
                   </div>
                         </div>
                     </div>
     </div>
  </div>
                          
                          
              
 
 
   
   </body>

 

<script type="text/javascript">
    // var map = L.map('map').setView([7.3087, 125.6841], 13);
 
    navigator.geolocation.getCurrentPosition(showPosition);
 function showPosition(position) {
 var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
 });
 osm.addTo(map)
 };
  
  </script>

@endsection 