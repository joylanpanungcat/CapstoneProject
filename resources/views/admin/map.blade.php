@extends('admin/include.navbar')
@section('title','applicant account')
@section('content')



   <link rel="stylesheet" href="{{ asset('css/leaflet/geocoder.css') }}" />
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script> --}}
   <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
   <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
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

.leaflet-bottom {
  display: none;
}
.leaflet-touch .leaflet-control-geocoder-icon {
    width: 38px;
    height: 36px;
}
.leaflet-touch .leaflet-bar a {
    width: 37px;
    height: 36px;
}
.leaflet-left .leaflet-control {
    margin-left: 4px;
}
#refreshButton{
  position: absolute;
    z-index: 500;
    padding: 10px;
    background-color: #fff;
    border-radius: 16%;
    border: 1px solid #b5aaaa;
    left: 6px;
    top: 9px;
}

#refreshButton i{
  font-size: 20px;
    color: #5d5555;
}

/* side nav */

element.style {
    width: 0px;
}
.sidenav {
    height: 100%;
    width: 0;
    position: absolute;
    z-index: 504;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    background-color: #fff;
    box-shadow: 6px 1px 22px -7px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

#closeNav-button{
  margin-top: 5px;
    margin-left: 5px;
    position: absolute;
    top: 0;
    right: 0;
}
#closeNav-button i{
  color: #060606;
    font-size: 20px;
}
.header .btn-group {
  padding-top: 45px;
  margin-left: 5px;
  margin-bottom: 14px;
}
.header .btn-group input{
  width: 189px;
}
.sidenav .content-list .item{
    width: 91%;
    margin-top: 10px;
    margin-left: 7px;
    display: flex;
    padding-top: 6px;
    font-size: 28px;
    border: 1px solid;
    /* height: 39px; */
    overflow: hidden;
   
}


.sidenav .content-list .item:hover{
  background-color: #2A3F54;
  opacity: 0.7;
  color: #fff;
  cursor: pointer;
}
.sidenav .content-list .item h5 {
  width: 193px;
    font-size: 17px;
    padding-top: 2px;
    padding-left: 6px;
    line-height: 24px;
}
.sidenav .content-list{
  overflow-x: hidden;
    height: 348px;
}
.leaflet-div-icon{
  background: none;
  border: none

}

@media screen  and (max-width: 1920px){
  .leaflet-left {
    position: absolute;
    bottom: 0;
    right: 33px;
    top: 80%;
    left: 96%;
}
}
@media screen  and (max-width: 1400px){
  .leaflet-left {
    position: absolute;
    bottom: 0;
    right: 33px;
    top: 80%;
    left: 95%;
}
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
          <button type="button" class="btn  btn-sm btn_update " onclick="closeNav()"><i class="fa fa-edit fa-lg"  ></i>Update</button>
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
                      <div id="mySidenav" class="sidenav">
                        <div>
                          <div class="header">
                            <button class="btn " onclick="closeNav()" id="closeNav-button"><i class="fa fa-bars"></i></button>
                            <div class="btn-group mr-2  " role="group" aria-label="First group">
                              <input type="text" name="" placeholder="Full name" id="search_application">
                            <button type="button" class="btn btn-secondary " id="search" ><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                        <div class="content-list">
                          
                        </div>
                        </div>
                      </div>
                      <div id="map" class="col-md-12" style="height:440px;">
                        <button id="refreshButton" onclick="openNav()">
                          <i class="fa fa-solid fa-bars"></i>
                        </button></div>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
     </div>
  </div>
   </body>
   <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
       
   <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

   <script type="text/javascript">
 
 L.mapquest.key = 'LAx0wIuGORRKAYko5EV2n17VGGARYcDv';

 var mapLayer = L.mapquest.tileLayer('map');
 
    var map = L.mapquest.map('map', {
      center:[ 7.299101, 125.682612],
      layers: mapLayer,
      zoom: 18
    });

    L.control.layers({
          'Map': mapLayer,
          'Hybrid': L.mapquest.tileLayer('hybrid'),
          'Satellite': L.mapquest.tileLayer('satellite'),
          'Dark':  L.mapquest.tileLayer('dark'),
          'Light':  L.mapquest.tileLayer('light')
      }).addTo(map);

  $(document).on('click','.item',function(e){
       e.preventDefault();
      var long2 = $('.long').val();
      var lat2 =$('.lat').val();
      var start_lat =7.299101;
      var start_lng = 125.682612;
    

     var directions = L.mapquest.directions();
        directions.route({
         locations: [
            { latLng: { lat:start_lat , lng: start_lng} },
             { latLng: { lat: long2, lng:lat2 } }
          ],
          options: {
            timeOverage: 100,
            maxRoutes: 3,
          }
        },createMap);

   })
    

function createMap (err, response){
    var customLayer = L.mapquest.directionsLayer({
    // directions.setLayerOptions({
      startMarker: {
        icon: 'circle',
        draggable: false,
        iconOptions: {
          size: 'sm',
          primaryColor: '#1fc715',
          secondaryColor: '#1fc715',
          symbol: 'A'
        }
      },
      endMarker: {
        icon: 'circle',
        draggable: false,
        iconOptions: {
          size: 'sm',
          primaryColor: '#e9304f',
          secondaryColor: '#e9304f',
          symbol: 'B'
        }
      },
      routeRibbon: {
        color: "#2aa6ce",
        opacity: 1.0,
        showTraffic: false,
        draggable: false
      },
      directionsResponse: response
   });
   customLayer.addTo(map);
}
  fetchApplication();
     function fetchApplication(business_name =''){
       $.ajax({
         type:'get',
         url:'{{ route('fetch_application_map') }}',
         data:{
           business_name:business_name
         },
         dataType: 'json',
         success:function(data){
           $('.content-list').html(data.output);
         }
       
       });
     }
 
   $('#search').on('click',function(e){
     var business_name = $('#search_application').val();
     fetchApplication(business_name);
     });
 
 
     $('#search_application').on('keyup',function(e){
       var business_name = $(this).val();
       if(business_name ==''){
         fetchApplication(business_name);
       }
     });

   
   

  
   </script>

   
  
@endsection 