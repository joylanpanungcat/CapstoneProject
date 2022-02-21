@extends('applicant.include.navbar')
@section('title','Rnewal Application')
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

            

            $date_inspect= $data['date_inspect'];
            $status= $data['status'];
            
            
        }
     @endphp

    <div class="">
        <div class="page-title">
            <div class="title_left">
              <a class="btn btn-default" href="{{ route('renewal') }}"><i class="fa fa-arrow-left">  Back</i></a>
            </div>
            
           
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

                    <h3> Application  Information</h3>
                 
                    <hr class="separate"> 

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Application</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_application }}" id="type_application" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Occupancy</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_occupancy }}" id="type_occupancy" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nature of Business</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$nature_business }}" id="nature_business" >
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$business_name }}" id="business_name" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Date Apply</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$date_apply }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">First Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Fname}}" id="Fname">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 "> Middle Name</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Default Input" value="{{$Mname }}" id="Mname">
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "> Last Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Default Input" value="{{$Lname }}" id="Lname" >
                                    </div>
                                </div>
                                <div class="form-group row ">
                                  <h2><strong>Business Address</strong></h2>
                                </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Purok</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$purok}}" id="purok">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                      <label class="control-label col-md-3 col-sm-3 "> Barangay</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Default Input" value="{{$barangay }}" id="barangay" >
                                      </div>
                                  </div>
                                  <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "> City</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Default Input" value="{{ $city  }}" readonly>
                                    </div>
                                </div>

                                   
                                  <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 "> Application Status</label>
                                      <div class="col-md-9 col-sm-9 ">
                                          <input type="text" class="form-control" placeholder="Default Input" value="{{$status }} " readonly>
                                      </div>
                                </div>
                      
                                            <input type="hidden" class="form-control" placeholder="Default Input" id="applicationId" value="{{ $applicationId }}">
                                    
                                    
                                    <div class="form-group" style="float: right">
                                      @if ($status == 'pending')
                                      <button type="button" class="btn btn-danger" id="cancel_application"><i class="fa fa-trash "></i>  Cancel</button>
                                      <button type="button" class="btn btn-success" id="update_application"><i class="fa fa-edit "></i>  Update</button>

                                      @endif
                                        
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
  });
  
  $('#cancel_application').on('click',function(e){
    e.preventDefault();
  var applicationId = $('#applicationId').val();

  Swal.fire({
      title:"Cancel  Application",
      iconHtml: '<i class="fa fa-warning"></i>',
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
           Swal.fire({
             input: 'password',
             
              inputPlaceholder: 'Enter your password',
             titleFontColor:'red',
              iconHtml: '<i class="fa fa-lock"></i>',
              iconColor: '#FFF',
                  showCancelButton: true,
                  focusConfirm: false,
                  background: 'rgb(0,0,0,.9)',
                  customClass : {
                  title: 'swal2-title'
                },
                allowOutsideClick: false,
                 
                  confirmButtonColor: '#42BA96',
                  confirmButtonText:
                    '<i class="fa fa-check" ></i> Confirm',
                
                  cancelButtonText:
                    '<i class="fa fa-arrow-left"></i>Cancel',
                    customClass: {
                        validationMessage: 'my-validation-message'
                      },
                preConfirm: (value) => {
                    
                    if (value !== adminPass) {
                      Swal.showValidationMessage(
                        'incorrect password'
                      )
                    }
                    if (value === adminPass) {
                        return new Promise(function (resolve){
                          $.ajax({
                            type:'post',
                            url:'{{ route('delete_application') }}',
                            data:{
                              applicationId:applicationId,
                            },
                            dataType: 'json',
                            success:function(data){
                              Swal.fire({
                                  title:"Application Canceled",
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
                                  window.location.href = "{{ route('application') }}";
                              })
                              

                            }
                          })
                        })
                    }
                  },
            
          });

          },
       
    
            });

  })
  $('#update_application').on('click',function(e){
    e.preventDefault();
  var applicationId = $('#applicationId').val();
  var type_occupancy = $('#type_occupancy').val();
  var nature_business = $('#nature_business').val();
  var business_name = $('#business_name').val();
  var Fname = $('#Fname').val();
  var Mname = $('#Mname').val();
  var Lname = $('#Lname').val();
  var purok = $('#purok').val();
  var barangay = $('#barangay').val();




  Swal.fire({
      title:"Update  Application",
      iconHtml: '<i class="fa fa-question"></i>',
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
           Swal.fire({
             input: 'password',
             
              inputPlaceholder: 'Enter your password',
             titleFontColor:'red',
              iconHtml: '<i class="fa fa-lock"></i>',
              iconColor: '#FFF',
                  showCancelButton: true,
                  focusConfirm: false,
                  background: 'rgb(0,0,0,.9)',
                  customClass : {
                  title: 'swal2-title'
                },
                allowOutsideClick: false,
                 
                  confirmButtonColor: '#42BA96',
                  confirmButtonText:
                    '<i class="fa fa-check" ></i> Confirm',
                
                  cancelButtonText:
                    '<i class="fa fa-arrow-left"></i>Cancel',
                    customClass: {
                        validationMessage: 'my-validation-message'
                      },
                preConfirm: (value) => {
                    
                    if (value !== adminPass) {
                      Swal.showValidationMessage(
                        'incorrect password'
                      )
                    }
                    if (value === adminPass) {
                        return new Promise(function (resolve){
                          $.ajax({
                            type:'post',
                            url:'{{ route('update_application') }}',
                            data:{
                              applicationId:applicationId,
                              type_occupancy:type_occupancy,
                              nature_business:nature_business,
                              business_name:business_name,
                              Fname:Fname,
                              Lname:Lname,
                              Mname:Mname,
                              purok:purok,
                              barangay:barangay,

                            },
                            dataType: 'json',
                            success:function(data){
                              swal.close();
                              toastr.success(data.msg);
                              

                            }
                          })
                        })
                    }
                  },
            
          });

          },
       
    
            });

  })
  })
</script>

  @endsection 