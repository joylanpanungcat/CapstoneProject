@extends('inspector/include.navbar')
@section('title','Inspection')
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
 .separate{
  border-bottom: 3px solid #1ABB9C;
  width: 80%;
}
.swal2-title{
    color: #ffff;
}
  </style>
 <div class="right_col" role="main" >
     @php 
        foreach($data as $data){
            $type_application = $data['type_application'];
            $nature_business = $data['nature_business'];
            $business_name = $data['business_name'];
            $date_apply = $data['date_apply'];
            $type_occupancy = $data['type_occupancy'];

            $Fname = $data['Fname'];
            $Lname = $data['Lname'];
            $Mname = $data['Mname'];

            $purok = $data['purok'];
            $barangay = $data['barangay'];
            $city = $data['city'];

            $applicationId= $data['applicationId'];

            $beams= $data['beams'];
            $exterior= $data['exterior'];
            $main_stair= $data['main_stair'];
            $main_door= $data['main_door'];
            $colums= $data['colums'];
            $corridor_walls= $data['corridor_walls'];
            $windows= $data['windows'];
            $trussess= $data['trussess'];
            $flooring= $data['flooring'];
            $room_partitions= $data['room_partitions'];
            $ceiling= $data['ceiling'];
            $roof= $data['roof'];
            $sectional_occupancy= $data['sectional_occupancy'];
            $emergency_lights= $data['emergency_lights'];
            $no_stinguisher= $data['no_stinguisher'];
            $fire_alarm= $data['fire_alarm'];
            $defects= $data['defects'];
            $location_panel= $data['location_panel'];
            $recommendation= $data['recommendation'];
            $date_inspect= $data['date_inspect'];
            $status= $data['status'];

          

            
            
        }
     @endphp

    <div class="">
        <div class="page-title">
            
            
           
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

                    <h2>Inspected Application Information</h2>
                 
                    <hr class="separate"> 

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left">
                                  <div class="form-group row ">
                                    <h2><strong>Business Information</strong></h2>
                                  </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Application</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_application }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Occupancy</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_occupancy }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nature of Business</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$nature_business }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$business_name }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Date Apply</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$date_apply }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <h2><strong>Applicant's Information</strong></h2>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Applicant's Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Fname.' '.$Mname.' '.$Lname }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Address</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$purok.' '.$barangay.' '.$city }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <h2><strong>Inspection Information</strong></h2>
                                    </div>
                                    <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Beams</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Beams" value="{{ $beams }}" id="beams">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Exterior Walls</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Exterior Walls" value="{{ $exterior }}" id="exterior">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Main Stair</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Main Stairs" value="{{ $main_stair }}" id="main_stair">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Main Door</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Main Door" value="{{ $main_door }}" id="main_door">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Columns</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Columns" value="{{ $colums }}" id="colums">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Corridor Walls</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Curridor Walls" value="{{ $corridor_walls }}" id="corridor_walls">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Windows</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Default Input" value="{{ $windows }}" id="windows">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Trussess</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Trussess" value="{{ $trussess }}" id="trussess">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Flooring</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Flooring" value="{{ $flooring }}" id="flooring">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Room Partitions</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="room_partitions" value="{{ $room_partitions }}" id="room_partitions">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Ceiling</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Ceiling" value="{{ $ceiling }}" id="ceiling">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Roof</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Roof" value="{{ $roof }}" id="roof">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Sectional Occupancy</label>
                                      <div class="col-md-9 col-sm-9 ">
                                         <textarea name="" id="sectional_occupancy" cols="30" rows="5"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <h2><strong>Fire Protection Equipment</strong></h2>
                                  </div>
                                  
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Emergency Lights Provide</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <select name="" id="emergency_lights" class="form-control"><option value="{{ $emergency_lights }}">{{ $emergency_lights }}</option><option value="yes">Yes</option><option value="no">No</option></select>
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Number of Fire Stinguisher</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="No. Stinguisher" value="{{ $no_stinguisher }}" id="no_stinguisher">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Equiped with fire alarm? </label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <select name="" id="fire_alarm" class="form-control"><option value="{{ $fire_alarm }}">{{ $emergency_lights }}</option><option value="yes">Yes</option><option value="no">No</option></select>
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Location of Control Panel</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Location of contorl panel" value="{{ $location_panel }}" id="location_panel">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Defect</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <textarea name="" id="defects" cols="30" rows="5">{{ $defects }}</textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Recommendation</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <textarea name="" id="recommendation" cols="30" rows="5">{{ $recommendation }}</textarea>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">Status </label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <select name="" id="status" class="form-control"><option value="approved">Approved</option><option value="reinspection">Reinspection</option></select>
                                      </div>
                                  </div>

                                    <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 "> Date Inspected</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Default Input" value="{{$date_inspect }} " readonly>
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Inspection Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                      <select class="form-control" id="inspection_status">
                                        <option value="{{ $status }}" id="inspection_status">{{ $status }}</option>
                                        <option value="reinspection">reinspection</option>
                                        <option value="approved">approved</option>
                                      </select>
                                    </div>
                                </div>
                      
                                            <input type="hidden" class="form-control" placeholder="Default Input" id="applicationId" value="{{ $applicationId }}">
                                    
                                    
                                    <div class="form-group" style="float: right">
										<button type="button" class="btn btn-success" id="update_inspected"><i class="fa fa-edit "></i>  Update</button>
                                        
                                    </div>
                                </form>

                  </div>
         </div>

   </div>
 </div>




</div>  
       
     </div>
 </div>

 <script>
  $(document).ready(function(){
    var adminPass='{{Session::get('adminID')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
 
  })

  $('#update_inspected').on('click',function(e){
    e.preventDefault();
    var status = $('#inspection_status').val();
    var applicationId = $('#applicationId').val();
    var applicationId =$('#applicationId').val();
     var beams =$('#beams').val();
     var exterior =$('#exterior').val();
     var main_stair =$('#main_stair').val();
     var main_door =$('#main_door').val();
     var colums =$('#colums').val();
     var corridor_walls =$('#corridor_walls').val();
     var windows =$('#windows').val();
     var trussess =$('#trussess').val();
     var flooring =$('#flooring').val();
     var room_partitions =$('#room_partitions').val();
     var ceiling =$('#ceiling').val();
     var roof =$('#roof').val();
     var sectional_occupancy =$('#sectional_occupancy').val();
     var emergency_lights =$('#emergency_lights').val();
     var no_stinguisher =$('#no_stinguisher').val();
     var fire_alarm =$('#fire_alarm').val();
     var location_panel =$('#location_panel').val();
     var defects =$('#defects').val();
     var recommendation =$('#recommendation').val();
     var status =$('#status').val();
    Swal.fire({
      title:"Update  Inspection",
      iconHtml: '<i class="fa fa-check"></i>',
      iconColor: '#42ba96',
           showCancelButton: true,
           showConfirmButton:true,
           focusConfirm: false,
           background: 'rgb(0,0,0,.9)',
           customClass : {
           title: 'swal2-title'
         },
        allowOutsideClick: false,
         
          confirmButtonColor: '#3085d6',
          confirmButtonText:
            '<i class="fa fa-check"></i> Yes',
          confirmButtonAriaLabel: 'Thumbs up, great!',
          cancelButtonText:
            '<i class="fa fa-arrow-left"></i>Close',
          cancelButtonAriaLabel: 'Thumbs down',
          preConfirm: function(){
            $.ajax({
                           type:'post',
                           url:'{{ route('update_inspected_application') }}',
                           data:{
                            applicationId:applicationId,
                          beams:beams,
                          exterior:exterior,
                          main_stair:main_stair,
                          main_door:main_door,
                          colums:colums,
                          corridor_walls:corridor_walls,
                          windows:windows,
                          trussess:trussess,
                          flooring:flooring,
                          room_partitions:room_partitions,
                          ceiling:ceiling,
                          roof:roof,
                          sectional_occupancy:sectional_occupancy,
                          emergency_lights:emergency_lights,
                          no_stinguisher:no_stinguisher,
                          fire_alarm:fire_alarm,
                          location_panel:location_panel,
                          defects:defects,
                          recommendation:recommendation,
                            status:status
                           },
                           dataType: 'json',
                           success:function(data){
                             swal.close();
                             toastr.success(data.msg);
                           }
                         })

          },
        
            });

  });
  })
</script>

  @endsection 