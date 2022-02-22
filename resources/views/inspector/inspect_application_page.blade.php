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
    <div class="">
        <div class="page-title">
            <div class="title_left">
              <a class="btn btn-default" href="{{ route('for_inspection') }}"><i class="fa fa-arrow-left">  Back</i></a>
            </div>
            
           
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

                  <div class="col-md-12">
                    <h2>Inspection Details</h2>
                  </div>
                 
                    <hr class="separate"> 

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left">
                                    <div class="form-group row ">
                                        <h2><strong>Building Construction</strong></h2>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Beams</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Beams" value="" id="beams">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Exterior Walls</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Exterior Walls" value="" id="exterior">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Main Stair</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Main Stairs" value="" id="main_stair">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Main Door</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Main Door" value="" id="main_door">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Columns</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Columns" value="" id="colums">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Corridor Walls</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Curridor Walls" value="" id="corridor_walls">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Windows</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="" id="windows">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Trussess</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Trussess" value="" id="trussess">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Flooring</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Flooring" value="" id="flooring">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Room Partitions</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="room_partitions" value="" id="room_partitions">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Ceiling</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Ceiling" value="" id="ceiling">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Roof</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Roof" value="" id="roof">
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
                                            <select name="" id="emergency_lights" class="form-control"><option value="yes">Yes</option><option value="no">No</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Number of Fire Stinguisher</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="No. Stinguisher" value="" id="no_stinguisher">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Equiped with fire alarm? </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select name="" id="fire_alarm" class="form-control"><option value="yes">Yes</option><option value="no">No</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Location of Control Panel</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Location of contorl panel" value="" id="location_panel">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Defect</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea name="" id="defects" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Recommendation</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea name="" id="recommendation" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Status </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select name="" id="status" class="form-control"><option value="approved">Approved</option><option value="reinspection">Reinspection</option></select>
                                        </div>
                                    </div>
                                            <input type="hidden" class="form-control" placeholder="Default Input" id="applicationId" value="{{ $applicationId }}">
                                    
                                    <div class="form-group" style="float: right">
										<button type="submit" class="btn btn-success" id="inspect_application_record"><i class="fa fa-info-circle "></i>  Inspect</button>
                                        
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
    var adminPass='{{Session::get('inspectorId')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
 

 $('#inspect_application_record').on('click',function(e){
     e.preventDefault();
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
    title:"Record Inspection",
    iconHtml: '<i class="fa fa-check"></i>',
    text: 'Click save to record inspection',
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
                         url:'{{ route('inspect_application_record') }}',
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
                          status:status,
                         },
                         success:function(data){
                           swal.close();
                              Swal.fire({
                              title:"Inspection Successfully Recorded",
                              icon:'success',
                                  showConfirmButton:true,
                                  focusConfirm: false,
                                  background: 'rgb(0,0,0,.9)',
                                  customClass : {
                                      title: 'swal2-title'
                                  }, 
                              background: 'rgb(0,0,0,.9)',
                              confirmButtonColor: '#1ABB9C',
                              confirmButtonText: 'Done',
                          }).then((result) => {
                              window.location.href = "{{ route('inspected_application') }}";
                          })
                         }
                       })

        },
       
          });
 })
  })
</script>

  @endsection 