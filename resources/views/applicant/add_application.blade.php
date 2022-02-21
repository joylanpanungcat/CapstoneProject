@extends('applicant.include.navbar')
@section('title','Add Application')
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
              <a class="btn btn-default" href="{{ route('application') }}"><i class="fa fa-arrow-left">  Back</i></a>
            </div>
            
           
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

                    <h3>Add Application</h3>
                 
                    <hr class="separate col-md-12" > 
                    

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left" id="add_application">
                                    <div class="form-group row ">
                                        <h2><strong>Applicant Details</strong></h2> 
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">First Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="First Name" id="Fname" name="Fname">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Last Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Last Name" id="Lname" name="Lname" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Middle Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Middle Name" id="Mname" name="Mname">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Contact Number</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Contact Number" id="contact_num" name="contact_num">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <h5> Address</h5> 
                                  </div>
                                  <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Purok</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Purok" id="applicant_purok" name="applicant_purok">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                  <label class="control-label col-md-3 col-sm-3 ">Barangay</label>
                                  <div class="col-md-9 col-sm-9 ">
                                      <input type="text" class="form-control" placeholder="Barangay" id="applicant_barangay" name="applicant_barangay">
                                  </div>
                              </div>
                              <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">City</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="City" id="applicant_city" name="applicant_city" >
                                </div>
                            </div>
                                    <div class="form-group row ">
                                      <h2><strong>Business Details</strong></h2> 
                                  </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Application</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="select_status form-control" id="type_application" name="type_application" >
                                                <option value="Fire Safety Inspection Certificate">Fire Safety Inspection Certificate</option>
                                                <option value="Fire Safery Evaluation Clearance">Fire Safery Evaluation Clearance</option>
                                                <option value="Fire Safety Inspection Certificate for Business">Fire Safety Inspection Certificate for Business</option>
                                                <option value="Fire Safety Inspection Certificate for Occupancy">Fire Safety Inspection Certificate for Occupancy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Occupancy (eg. Mercantile, Business)</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Type of Occupancy" id="type_occupancy" name="type_occupancy" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nature of Business (e.g Sari-sari)</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Nature Of Business" id="nature_business" name="nature_business" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Business Name" id="business_name" name="business_name" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <h5> Address</h5> 
                                  </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Purok</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Purok" id="purok" name="purok">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Barangay</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="barangay" id="barangay" name="barangay">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 ">City</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" value="Panabo" readonly >
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                    <h2><strong>Application Requirements</strong></h2> 
                                </div>
                                <div class="form-group row ">
                                  <label class="control-label col-md-3 col-sm-3 "></label>
                                  <div class="col-md-9 col-sm-9 ">
                                      <input type="file" class="form-control" name="file[]" readonly multiple>
                                  </div>
                              </div>
                                  
                                    
                      
                                    <div class="form-group" style="float: right">
										<button type="submit" class="btn btn-success" ><i class="fa fa-edit "></i>  Add </button>
                                        
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
    var adminPass='{{Session::get('accountId')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
 
  })

  $('#add_application').on('submit',function(e){
    e.preventDefault();

    Swal.fire({
          title: 'Application Confirmation',
          text: "Click yes to Apply",
          icon: 'warning',
            background: 'rgb(0,0,0,.9)',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
            
          confirmButtonText: 'Yes',
          customClass : {
              title: 'swal2-title',
              text:'swal2-title'
            },
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
      type: 'post',
      url:'{{ route('add_appllication_action') }}',
      data: new FormData(this),
      contentType: false,
      processData: false,
      dataType: 'json',
      success:function(data){
        Swal.fire({
              title:"Successfully Applied",
              icon:'success',
                  showConfirmButton:true,
                  focusConfirm: false,
                  background: 'rgb(0,0,0,.9)',
                  customClass : {
                      title: 'swal2-title'
                  }, 
              background: 'rgb(0,0,0,.9)',
              confirmButtonColor: '#1ABB9C',
              confirmButtonText: 'login',
          }).then((result) => {
              window.location.href = "application";
          })
      }
    })
          }
        })

  });
  })
</script>

  @endsection 