@extends('include.navbar')
@section('title','applicant account')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/appcss/wizardForm.css') }}">
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
 table tr td{
    height: 20px;
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
}
  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Applicant Account</h3>
            </div>

            <div class="title_right">
             
                <button class="btn btn-default"><i class="fa fa-user-plus fa-lg"  data-toggle="modal" data-target="#addApplication"></i></button>
            </div>
        </div>

                    
                    
        <div class="clearfix"></div>
       

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                           
                                <div class="x_content">
                                    <br />
                                    
                                           <label><b> Sort:</b></label>
                                       <select class="select_status">
                                           <option>Status</option>
                                           <option>approved</option>
                                           <option>reinspection</option>
                                           <option>renewal</option>
                                       </select><br><br>
                            <table class="table table-striped table-bordered" id="data"  style="width:100%;">
                              <thead>
                                <tr>
                                  <!-- <th>Select</th> -->
                                  <th>#</th>
                                  <th>Type of Application</th>
                                  <th>Control #</th>
                                  <th>Applicant's name</th>
                                    <th>Status</th>
                                  <th>Remarks</th>
                                    <th style="width:200px;">Action</th>

                                </tr>
                              </thead>
                              <tbody id="user_data">
                            
                                  
                                    
                                  </tbody>
                 
                                  </table>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!-- modal edit -->


                          <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" >
                        
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5  id="exampleModalLabel ">Edit Applicant <small id="owners2"></small></h5>


                            <div id="connect"></div>

                          

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div id="showModalUpdate"></div>
                            <form method="post" id="editForm">
                               <h5> Personal Information</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                             <th>Firstname</th>
                                            <th>Last Name</th>
                                            <th>Contact number</th>
                                               <th>Purok</th>
                                            <th>Barangay</th>
                                            <th>City</th>

                                           
                                          

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <td><input type="text" name="" id="Fname" class="form-control" ></td>

                                            <td><input type="text" name="" id="Lname" class="form-control" ></td>
                                             <td><input type="text" name="" id="contact_num" class="form-control" ></td>
                                          
                                             <td><input type="text" name="" id="purok" class="form-control" ></td>
                                             <td><input type="text" name="" id="barangay" class="form-control"></td>
                                              <td><input type="text" name="" id="city" class="form-control" readonly=""></td>

                                            
                                        </tr>
                                    </tbody>
                                </table><br>
                                 <h5> Business Information</h5>
                                   <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                              <th>Type of Application</th>
                                              <th>Control Number</th>
                                            <th>Type of Occupancy</th>
                                            <th>Nature of Business</th>
                                        <th>Business Name</th>
                                         


                                        </tr>
                                    </thead>
                                     <tbody>
                                         <tr>
                                            
                                               <td><input type="text" name="" id="type_application" class="form-control" ></td>
                                               <td><input type="text" name="" id="control_number" class="form-control" readonly="" ></td>
                                            <td><input type="text" name="" id="type_occupancy" class="form-control" ></td>
                                             <td><input type="text" name="" id="nature_business" class="form-control"  ></td>
                                             <td><input type="text" name="" id="business_name" class="form-control"  ></td>
<input type="hidden" name="" id="account_id1" class="form-control"  >
<input type="hidden" name="" id="account_id2" class="form-control"  >

                                            
                                        </tr>
                                       
                                    </tbody>
                                </table>
                                  <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                                
                                            <th>Inpector Name</th>
                                            <th>Bin</th>
                                            <th>BP number</th>
                                            <th>OR_num</th>
                                     <th style="width:20%;">Status</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <tr>
                                             
                                            <td><input type="text" name="" id="inpector_id" class="form-control" readonly=""></td>
                                             <td><input type="text" name="" id="Bin" class="form-control"  ></td>
                                             <td><input type="text" name="" id="BP_num" class="form-control" ></td>
                                               <td><input type="text" name="" class="form-control" id="OR_num"></td>
                                            <td>
                                                <input type="text" name="" id="status" class="form-control" readonly="" >
                                            </td>
                                            <input type="hidden" name="" id="application_id">
                                        </tr>
                                    </tbody>
                                </table>
                               
                                      <div class="button-group">
                                    <button class="btn btn-secondary application_modal_update" type="submit"><i class="fa fa-edit" ></i>Update</button>
                                   <!--  <button class="btn btn-secondary"><i class="fa fa-calendar"></i>  Add</button> -->
                                   
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                               </form>
                            </div>
                                  
                              
                          </div>
                        </div>
                      </div>
                               

    <!-- Add Application MOdal -->
                              <div class="modal fade" id="addApplication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl addApplication" >
                        
                        <div class="modal-content">
                        
                          <div class="modal-body">
                              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" class="">
                              <span >&times;</span>
                            </button>
                            <div id="showModalUpdate"></div>
                            <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       {{--  <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> --}}
        <div class="col-md-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Add Application</strong></h2>
                <p>Fill all the inputs correctly </p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="{{ route('filesUpload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Personal</strong></li>
                                <li id="personal"><strong>Business</strong></li>
                                <li id="payment"><strong>Requirements</strong></li>
                                <li id="confirm"><strong>Preview</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset >
                                <div class="form-card col-md-12">
                                    <h2 class="fs-title">Personal Information</h2> 
                                    <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="FnameAdd" class="form-control input_fieldset1" placeholder="First Name">
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="LnameAdd" class="form-control input_fieldset1" placeholder="Last Name" >
                                     </div>
                                   <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="middleAdd" class="form-control" placeholder="Middle Name (Optional)" >
                               </div>
                               <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="contactAdd" class="form-control input_fieldset1" placeholder="Contact No." >
                               </div>
                                 <div class="form-group col-md-6 col-sm-6"> 
                                    <input type="text" name="" id="alcontactAdd" class="form-control input_fieldset1" placeholder="Alternative Contact No.">
                                    </div>
                                    <br>    
                                    <div class="form-group col-md-12 "> <h5>Address</h5>
                                    </div>

                                     <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="purokAdd" class="form-control input_fieldset1" placeholder="Purok">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="barangayAdd" class="form-control input_fieldset1" placeholder="Barangay">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                   <input type="text" name="" id="cityAdd" class="form-control input_fieldset1"   placeholder="City"></div>
                                </div>
                                <button type="button" name="next" class="btn next action-button"  value="Next" />Next <i class="fa fa-arrow-right"></i></button>
                            </fieldset>
                        
                            <fieldset>
                                <div class="form-card col-md-12">
                                    <h2 class="fs-title">Business Information</h2> 
                                    <div class="form-group col-md-6 col-sm-6"> 
                                  <select class="form-control" id="type_application2">
                                        <option value="Fire Safety Evaluation Clearance " id="type_application2">Fire Safety Evaluation Clearance </option>
                                        <option value="FSIC for Occupancy " id="status">FSIC for Occupancy </option>
                                        <option  value="FSIC for Business">FSIC for Business </option>
                                        <option  value="FSIC for Business Renewal">FSIC for Business Renewal</option>
                                                </select>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6"> 
                                  <input type="hidden" name="" id="control_numberAdd" class="form-control" >
                                  <input type="text" name="" id="type_occupancy2Add" class="form-control" placeholder="Type of Occupancy">
                                     </div>
                                   <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="nature_businessAdd" class="form-control"  placeholder="Nature of Business">
                               </div>
                               <div class="form-group col-md-6 col-sm-6"> 
                                  <input type="text" name="" id="business_nameAdd" class="form-control" placeholder="Business Name">
                               </div>
                               <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="BinAdd" class="form-control"  placeholder="Bin">
                                    </div>
                                    <br>    
                                     <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" id="BP_numAdd" class="form-control" placeholder="BP Number">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6"> 
                                   <input type="text" name="" class="form-control" id="OR_numAdd" placeholder="OR Number"></div>
                                    <div class="form-group col-md-6 col-sm-6">
                                   <input type="text" name="" class="form-control" id="statusAdd" value="pending..." readonly=""></div>
                                </div><button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button><button type="button" name="next" class="btn next action-button" value="Next Step" />Next <i class="fa fa-arrow-right"></i></button>
                            </fieldset>
                           
            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title">Requirements</h2>
                   <div class="panel-group">
                    <div class="panel panel-default">
                    
                      <div class="panel-body">
                             <div class="input-group xpress control-group lst increment">
                             <div class=" input-group xpress control-group lst  col-md-8" >
                                    <input type="file" name="filenames[]" class="myfrm form-control" multiple="">
                                </div>
                                <div class="input-group-btn col-md-4">
                                    <button type="button" class="btn btn-success addfile">Add</button>
                                </div>
                        </div>
                     
                      </div>
                    </div>
                    <div class="panel panel-default panel-requirements">
                      
                      <div class="panel-body">
                         
                      </div>
                    </div>
                    
                  </div>
                     
           
                 
                        
                  
                    
                </div> <button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button><button type="button" name="next" class="btn next action-button" value="Next Step" />Next <i class="fa fa-arrow-right"></i></button>
            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>

                         <button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button>
                                <button type="submit" class="btn btn-success" >Submit</button>
                            </fieldset>
                                  
                        </form>
                    </div>
                    <form action="form_upload.html" class="dropzone"></form>
                </div>
            </div>
        </div>
    </div>
</div>
                           
                            </div>
                                  
                              
                          </div>
   <script type="text/javascript">
       $(document).ready(function(){
            $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
         $(document).on("click","#addApplication_form", function(e){
        e.preventDefault();
                        var control_number=  $('#control_numberAdd').val();
                        var type_occupancy2=  $('#type_occupancy2Add').val();
                        var nature_business=  $('#nature_businessAdd').val();
                        var Fname=  $('#FnameAdd').val();
                        var Lname=  $('#LnameAdd').val();
                        var business_name=  $('#business_nameAdd').val();
                        var purok=  $('#purokAdd').val();
                        var barangay=  $('#barangayAdd').val();
                        var city=  $('#cityAdd').val();
                        var inpector_id=  $('#inpector_idAdd').val();
                        var Bin=  $('#BinAdd').val();
                        var BP_num=  $('#BP_numAdd').val();
                        var status=  $('#statusAdd').val();
                        var OR_num=  $('#OR_numAdd').val();
                        var type_application2=  $('#type_application2').val();
                        var addApplication_form=$('#addApplication_form').val();
                        var contact_num=$('#contactAdd').val();

                        console.log(type_application2);


            // $.ajax({
            //     url: "application_action.php",
            //     type:"post",
            //     data:{
            //         type_application2:type_application2,
            //         control_number:control_number,
            //         nature_business:nature_business,
            //         type_occupancy2:type_occupancy2,
            //         Fname:Fname,
            //         Lname:Lname,
            //         business_name:business_name,
            //         purok:purok,
            //         barangay:barangay,
            //         city:city,
            //         inpector_id:inpector_id,
            //         Bin:Bin,
            //         BP_num:BP_num,
            //         status:status,
            //         OR_num:OR_num,
            //         contact_num:contact_num,
            //         addApplication_form:addApplication_form
            //     },
            //     success:function(data){
            //         $('#show2').html(data);
            //         $("#addApplication").modal('hide');
            //         $("#applicationAdd")[0].reset();
                   

            //     }
            // })



     });
         $(document).on('submit','#msform',function(e){
            e.preventDefault();
          var filenames=$('input[name="filenames[]"]').val();
    var filenames = [];
     $('input[name="filenames[]"]').map(function () {
                 filenames.push(this.value);  // $(this).val()
            }).get();

            $.ajax({
                url:'{{route('filesUpload') }}',
                type: "POST",
                data:new FormData(this),
                dataType:"json",
                processData:false,
                contentType:false,
                success:function(data){
                   console.log(data.data);
                }
            })

            
         })
      $('#addApplication_form').on('click',function(e){
            e.preventDefault();
            // var filenames=$('input[name="filenames[]"]').val();
    // var filenames = [];
    //  $('input[name="filenames[]"]').map(function () {
    //              filenames.push(this.value);  // $(this).val()
    //         }).get();


            // $.ajax({
            //     url:'route('filesUpload') }}',
            //     type: "POST",
            //     data:({filenames:filenames}),
            //     // dataType:"json",
            //     success:function(data){
            //        console.log(data);
            //     }
            // })

            
         });
       
       })
   </script>
   <script type="text/javascript" src="{{ asset('js/appscript/wizardForm.js') }}"></script>
  @endsection 