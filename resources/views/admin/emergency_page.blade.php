@extends('admin/include.navbar')
@section('title','Emergency List')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
{{-- <link rel="stylesheet" href="{{ asset('css/leaflet/leaflet-1.7.1.css') }}"> --}}
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<link rel="stylesheet" href="{{ asset('css/leaflet/geocoder.css') }}" />
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script> --}}
<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
  <style type="text/css">

      .title_right button{
        float: right;
      }
      .modal input:hover{
         border: 1px solid #0687d6;
      }
     #user_data tr.removeRow
            {
                background-color: #b5b5b5;
            }




 .swal2-title {
  color: #FFF;
}
.my-validation-message{
    background-color: transparent;
}
.modal-dialog{
    width: 1200px;
}
button.close-modal{

 width: 40px;
    height: 40px;
    line-height: 40px;
    display: block;
    font-size: 30px;
    color: #000;
    margin: 0 auto 10px auto;
    padding: 2px;
}
button.close-modal:hover{

 width: 40px;
    height: 40px;
    line-height: 40px;
    display: block;
    font-size: 30px;
    color: #ffffff;
    background: #2A3F54;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
    border: none;
}
#fieldset1 .input_fieldset1.error2{
     border-bottom: 2px solid red;
}
.panel-requirements{
    border: 2px solid #000;
         height: 200px;
}
.addFiles{
        padding: 5px;
    background-color: #E9ECEF;
    border: none;
    font-size: 20px;
    border-radius: 20%;
    height: 30px;
    /* text-align: center; */
    object-fit: cover;
    line-height: 1px;
}
.dropzoneDragArea {
            background-color: #fbfdff;
            border: 1px dashed #c0ccda;
            border-radius: 6px;
            cursor: pointer;

        }


        .dz-progress{
            display: none;
        }
.icon i{
        font-size: 3em;
    background-color: black;
    height: 100px;
    width: 100px;
    text-align: center;
    border-radius: 50%;
    background-color: #696767;
    color: #fff;
    padding: 25px 20px;
}
.scroll {
    width: 100%;
    height: 300px;
    overflow: scroll;
}

/* .actionButton {

  width: 10px;
  height: 10px;


} */
/* .actionButton i {
  margin-top: -5px;
  margin-left: -5px;
  width: 10px;
  height: 10px;
  position: absolute;

} */
.actionButton i {
  border-radius: 50%;
  border:1px solid  #696767;
  padding: 10px;
  color: #696767;
  margin-left: -20px;
}
.actionButton:focus {

    outline: none !important;
    box-shadow: none !important;
}
.actionButton i:hover{
   color: #1ABB9C;
  border:1px solid  #1ABB9C;

}
.dataTable tbody td{
  padding: 0px;
  color: #000;
  font-size: 13px;
  font-weight: 500;
  word-break: break-word;
  text-align: center;
  vertical-align: middle;
}
.addApplicantionTooltip:focus {

    outline: none !important;
    box-shadow: none !important;
}
.my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.separate2{
  border-bottom: 3px solid #1ABB9C;
  margin-top: 60px;
}
.input-daterange input{
 float: right;
 cursor: pointer;
}
.sort_select{
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}
.sort_select select {
  vertical-align: middle;
  margin-left: 10px;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
  cursor: pointer;
}
.dataTables_wrapper  .dataTables_paginate  .paginate_button  {
  margin: 5px 3px;

}

.dataTables_wrapper  .dataTables_paginate  .paginate_button .page-item{
  border-radius: 40px !important;
  color: rgb(255, 255, 255) !important;
  background-color: #1ABB9C !important;

}
.dataTables_wrapper  .dataTables_paginate  .paginate_button .page-link{
  border-radius: 40px !important;

}

.dataTables_wrapper  .dataTables_paginate  .paginate_button.active .page-link{

  background-color: #1ABB9C !important;

}

.addApplication .modal-content{
  height: 90vh;

}


.addApplication .modal-content .input-form{
  /* background-color: #0687d6; */
  height: 70vmin;
  position: absolute;
}

.table_header{
  color: #0687d6;
  width: 10px !important;
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
        <div class="page-title">
            <div class="title_left">
                <h3>Emergency List </h3>
            </div>
            <div class="title_right">
                <button class="btn btn-success" id="viewMapButton" style="margin-top: 10px;">View Map</button>
            </div>


        </div>

        <hr class="separate2">


        <div class="clearfix"></div>


                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
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
                          </div>
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>

                                <div class="x_content">
                                    <br />

                                    <br><br>

                            <table class="table table-striped table-bordered " id="applicationData2" style="width: 100%"  >
                              <thead >


                                  <!-- <th>Select</th> -->
                                  <th> #</th>
                                  <th>Businnes Name</th>
                                  <th>Address</th>
                                  <th>Emergency Date</th>
                                  <th>Conctact Number</th>
                                  <th>ACTION</th>



                              </thead>

                                  </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="show_schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Scedule Information</h5>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Owner's Name</label>
                          <input type="text" class="form-control" id="ownersName"  readonly>
                          <input type="hidden" class="form-control" id="scheduleId"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Type of Application</label>
                          <input type="text" class="form-control" id="type_application_schedule" readonly >
                        </div>
                        <div class="form-group">
                          <label for="name">Address</label>
                          <input type="text" class="form-control" id="address_schedule" readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Inspector</label>
                          <input type="text" class="form-control" id="inspector_schedule" readonly >
                        </div>
                        <div class="form-group">
                          <label for="name">Date Of Application</label>
                          <input type="Date" class="form-control" id="date_applied_schedule">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_schedule"><i class="fa fa-edit"></i> Save changes</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="view_emergency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Emergency Information</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group row ">
                                                    <h2><strong>Business Details</strong></h2>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Type Of Application</label>
                                                    <div class="col-md-9 col-sm-9 ">

                              <input type="hidden" class="form-control" placeholder="Default Input" id="applicationId" readonly>
                              <input type="text" class="form-control" placeholder="Default Input" id="type_application" readonly>
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Control Number</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="control_number" readonly>
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Type of Occupancy</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="type_occupancy" readonly>
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nature Of Business</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="nature_business" readonly>
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="business_name" readonly>
                                                    </div>
                                                </div>
                                             <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Date Apply</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="date_apply" readonly >
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <h2><strong>Applicant's Details</strong></h2>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">First Name</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="Fname" readonly >
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Middle Name</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="Mname" readonly >
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Last Name</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="Lname" readonly >
                                                    </div>
                                                </div>



                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success view_map" ><i class="fa fa-map"> View Map</i></button>
                                </div>
                </div>
              </div>
              </div>
              <div id="viewMap" class="modal" >
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title">Map</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div id="mySidenav" class="sidenav">
                                <div>
                                  <div class="header">
                                    <button class="btn " onclick="closeNav()" id="closeNav-button"><i class="fa fa-bars"></i></button>
                                    <div class="btn-group mr-2  " role="group" aria-label="First group">
                                      <input type="text" name="" placeholder="Business Name" id="search_application">
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
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

<script>

</script>
<script>
  $(document).ready(function(){
    var adminPass='{{Session::get('adminID')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
      $('.input-daterange').datepicker({
          todayBtn:'linked',
          format:'yyyy-mm-dd',
          autoclose:true
        });
        fetch_data();
        function fetch_data(category = '', from_date = '', to_date = '')
        {
     var dataTable= $('#applicationData2').DataTable({
        processing:true,
        info:true,
        "ordering": false,
        'sorting':false,
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
          scrollX:true,
          ajax: {
            url:"{{ route('get_emergency') }}",
            data: {category:category,
                   from_date:from_date,
                  to_date:to_date
            }

          },

        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex', class: 'table_header'},
        {data:'business_name',name:'business_name'},
        {data:'address',name:'address'},
        {data:'emergency_date',name:'emergency_date'},
        {data:'contact_num',name:'contact_num'},
        {data:'actions',name:'actions'},
        ]
     });
    }
    $('#category_filter').change(function(){
      var category_id = $('#category_filter').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      $('#applicationData2').DataTable().destroy();
      fetch_data(category_id , from_date,to_date);
 });
 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var category_id = $('#category_filter').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#applicationData2').DataTable().destroy();
   fetch_data(category_id,from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });
 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#applicationData2').DataTable().destroy();
  fetch_data();
 });

 $(document).on('click','.view_emergency',function(e){
     e.preventDefault();
    var applicationId= $(this).attr('id');

    $.ajax({
        type:'post',
        url:'{{ route('view_emergency') }}',
        data:{
            applicationId:applicationId
        },
        dataType: 'json',
        success:function(data){
            $('#view_emergency').modal('show');

            $.each(data.data,function(key,value){
                $('#type_application').val(value['type_application']);
                $('#control_number').val(value['control_number']);
                $('#type_occupancy').val(value['type_occupancy']);
                $('#nature_business').val(value['nature_business']);
                $('#business_name').val(value['business_name']);
                $('#date_apply').val(value['date_apply']);
                $('#Fname').val(value['Fname']);
                $('#Mname').val(value['Mname']);
                $('#Lname').val(value['Lname']);
                $('.view_map').attr('id',value['applicationId']);

            })


        }
    })


 })

  })
  function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script>
 $(document).ready(function(){
L.mapquest.key = 'qFoy4md7DfqXkUzLUvOn0yQHd8wdackb';
var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}&',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
});

var Terrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}&',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

var panabo = L.tileLayer('https://editor.giscloud.com/rest/1/maps/1903414/render.iframe?bound=125.16038111816408,7.144658966796868,126.09833888183596,7.531240387695306&toolbar=true&popups=true&layerlist=true" frameborder="0"');

$('#viewMapButton').on('click',function(e){
    e.preventDefault();
    $('#viewMap').modal('show');
    showMap();
});
$('.view_map').on('click',function(e){
    var applicationId = $(this).attr('id');
    $.ajax({
        type: 'post',
        url: '{{ route('view_map_get_details') }}',
        data:{
            applicationId:applicationId
        },
        dataType: 'json',
        success:function(data){
            $.each(data.data, function(key, value){
               $('#search_application').val(value['business_name']);
            })
            $('#view_emergency').modal('hide');
            $('#viewMap').modal('show');
        }
    })

})

function showMap(){
    var map = L.mapquest.map('map', {
            center:[ 7.299101, 125.682612],
            layers: googleSat,
            zoom: 18
            });

    L.control.layers({
    'Terrain': Terrain,
    'GoogleSat':googleSat,
    'osm':osm,
    'Dark':  L.mapquest.tileLayer('dark'),
    }).addTo(map);
    var myIcon = L.icon({
    iconUrl: '{{ asset('map-icons/building-solid.png') }}',
    iconSize: [20, 29],
    iconAnchor: [10, 29],
    popupAnchor: [0, -29]
    });
    var bfp = L.marker([7.299101,125.682612],{icon: myIcon}).addTo(map);
    L.mapquest.textMarker([7.299101,125.682612], {
        text: 'BFP',
        subtext: 'Beauro Of Fire Protection',
        position: 'bottom',
    }).addTo(map);

var business_name = '';
var address_map = '';
var applicantName_map = '';
var contactNumber_map = '';
var alt_number = '';


$(document).on('click','.item',function(e){
    e.preventDefault();
    var applicationId = $(this).attr('id');
    var long2 = $('.long'+applicationId+'').val();
    var lat2 =$('.lat'+applicationId+'').val();
    var start_lat =7.299101;
    var start_lng = 125.682612;


    business_name =$('.business_name_map'+applicationId+'').val();
    address_map =$('.address_map'+applicationId+'').val();
    applicantName_map =$('.applicantName_map'+applicationId+'').val();
    contactNumber_map =$('.contactNumber_map'+applicationId+'').val();
    alt_number =$('.alt_number'+applicationId+'').val();

    var directions = L.mapquest.directions();
        directions.route({
        locations: [
            { latLng: { lat:start_lat , lng: start_lng} },
            { latLng: { lat: lat2, lng:long2 } }
        ],
        options: {
            timeOverage: 100,
            maxRoutes: 3,
        }
        },createMap);

        L.mapquest.textMarker([start_lat, start_lng], {
            text: 'BFP',
            subtext: 'Beauro Of Fire Protection',
            position: 'bottom',

        }).addTo(map);

        var endText = L.mapquest.textMarker([lat2,long2], {
            text: business_name,
            subtext: 'Applicant',
            position: 'right',

        });
        endText.addTo(map);

})

function createMap (err, response){
var DirectionsLayerWithCustomMarkers = L.mapquest.DirectionsLayer.extend({
createStartMarker: function(location, stopNumber) {
var custom_icon;
var popup = '<div class="custom-popup"><div class="header-custom-popup"><h5 style="font-size: 16px;color: #0044cc;">BUREAU OF FIRE PROTECTION</h5></div><div class="content-custom-popup">Category: Government <br>Province: Davao Del Norte <br> City: Panabo City <br> Phone: (084) 822 0160 <br> Address: Salvacion, Panabo City </div></div>';
custom_icon = L.icon({
    iconUrl: '{{ asset('map-icons/building-solid.png') }}',
    iconSize: [20, 29],
    iconAnchor: [10, 29],
    popupAnchor: [0, -29]
});
return L.marker(location.latLng, {icon: custom_icon}).bindPopup(popup);
},

createWaypointMarker: function(location, stopNumber) {
return L.marker(location.latLng, {});
},

createEndMarker: function(location, stopNumber) {
var popup = '<div class="custom-popup"><div class="header-custom-popup"><h5 style="font-size: 16px;color: #0044cc;">'+business_name.toUpperCase()+'</h5></div><div class="content-custom-popup">Address: <b>'+address_map+'</b> <br> Applicant Name: <b>'+applicantName_map+'</b><br> Contact Number:<b>'+contactNumber_map+'</b><br> Alt Number: <b>'+alt_number+'</b></div></div>';
return L.marker(location.latLng, {}).bindPopup(popup);
}
});

var directionsLayer = new DirectionsLayerWithCustomMarkers({
directionsResponse: response
}).addTo(map);


}
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

 });


</script>

  @endsection
