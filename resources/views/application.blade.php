@extends('include.navbar')
@section('title','applicant account')
@section('content')

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

.actionButton {

  width: 10px;
  height: 10px;
}
.actionButton i {
  margin-top: -5px;
  margin-left: -5px;
  width: 10px;
  height: 10px;
  position: absolute;

}

.actionButton:focus {
 
    outline: none !important;
    box-shadow: none !important;
}
.actionButton i:hover{
   color: #1ABB9C;
}
.addApplicantionTooltip:focus {
 
    outline: none !important;
    box-shadow: none !important;
}

  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Applicant Account</h3>
            </div>

            <div class="title_right">
             
                <button class="btn btn-default addApplicantionTooltip " data-toggle="modal" data-target="#addApplication" ><i class="fa fa-user-plus fa-lg tags"   data-toggle="tooltip" data-placement="bottom" title="Add Application"></i></button>
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
                            <table class="table table-striped table-bordered" id="applicationData"  style="width:100%;">
                              <thead>
                                <tr>
                                  <!-- <th>Select</th> -->
                                  <th>#</th>
                                  <th>Type of Application</th>
                                  <th>Control #</th>
                                  <th>Applicant's name</th>
                                    <th>Status</th>
                                  <th>Remarks</th>
                                    <th style="width:20%;">Action</th>

                                </tr>
                              </thead>
                           
                 
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
                               <h5> Applicant Information</h5>
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
                                               <td><input type="text" name="control_number" id="control_number" class="form-control" readonly="" ></td>
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
                              <div class="modal fade" id="addApplication" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl addApplication" > 
                        <div class="modal-content">
                         
                          <div class="modal-body">
                              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" class="">
                              <span >&times;</span>
                            </button>
                            <div class="panel panel-default addApplicationPanel">
                                    <div class="panel-body">
                                        
                                 
                            <div id="showModalUpdate"></div>
                            <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       {{--  <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> --}}
        <div class="col-md-8 text-center ">
            <div class="card">
                <h2><strong>Add Application</strong></h2>
                <p>Fill all the inputs correctly </p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="{{ route('storeData') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- progressbar -->
                          
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Applicant</strong></li>
                                <li id="personal"><strong>Business</strong></li>
                                <li id="payment"><strong>Requirements</strong></li>
                                <li id="confirm"><strong>Preview</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset  class="fieldset">
                                <div class="form-card col-md-12">
                                    <h2 class="fs-title">Applicant Information</h2> <br>
                                    <div class="form-group col-md-4"> 
                                    
                                      <input type="text" class="form-control has-feedback-left input_fieldset1 " id="FnameAdd" name="FnameAdd" placeholder="First Name" onchange="myFunction()" >
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="form-group col-md-4"> 
                                  
                                      <input type="text" class="form-control has-feedback-left input_fieldset1 " id="LnameAdd" name="LnameAdd" placeholder="Last Name" onchange="myFunction()" >
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                     </div>
                                   <div class="form-group col-md-4"> 
                               

                                     <input type="text" class="form-control has-feedback-left input_fieldset1" id="middleAdd" name="middleAdd" placeholder="Middle Name " onchange="myFunction()" >
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                               </div>
                               <div class="form-group col-md-4"> 
                                  
                                    <input type="text" class="form-control has-feedback-left input_fieldset1" id="contactAdd" name="contactAdd"  onchange="myFunction()" placeholder="Contact No.">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                               </div>
                                 <div class="form-group col-md-4"> 
                                   

                                     <input type="text" class="form-control has-feedback-left input_fieldset1" id="alcontactAdd" name="alcontactAdd"  onchange="myFunction()" placeholder="Alternative Contact" >
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                   
                                    <br>    
                                    <div class="form-group col-md-12 "> <h5>Address</h5>
                                    </div>

                                     <div class="form-group col-md-4"> 
                                  
                                   <input type="text" class="form-control has-feedback-left input_fieldset1" id="purokAdd" name="purokAdd" placeholder="Purok" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4"> 
                               

                                   <input type="text" class="form-control has-feedback-left input_fieldset1" id="barangayAdd" name="barangayAdd" placeholder="Barangay" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                 
                                    <input type="text" class="form-control has-feedback-left input_fieldset1" id="cityAdd" name="cityAdd" placeholder="City" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>

                               </div>
                                </div>
                                <button type="button" name="next" class="btn next2 action-button"  value="Next" />Next <i class="fa fa-arrow-right"></i></button>
                            </fieldset>
                        
                            <fieldset class="fieldset">
                                <div class="form-card col-md-12">
                                    <h2 class="fs-title">Business Information</h2> 
                                    <div class="form-group col-md-6 "> 
                                  <select class="form-control" id="type_application2" onchange="myFunction()">
                                    <option value="">Type Of Application</option>
                                        <option value="Fire Safety Evaluation Clearance " >Fire Safety Evaluation Clearance </option>
                                        <option value="FSIC for Occupancy " >FSIC for Occupancy </option>
                                        <option  value="FSIC for Business">FSIC for Business </option>
                                      
                                                </select>
                                      </div>
                                    
                                          
                                      <div class="form-group col-md-6"> 
                               {{--    <input type="hidden" name="" id="control_numberAdd" class="form-control" > --}}
                                
                                    <input type="text" class="form-control has-feedback-left input_fieldset1" id="type_occupancy2Add" name="type_occupancy2Add" placeholder="Type of Occupancy" onchange="myFunction()">
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                     </div>
                                   <div class="form-group col-md-6"> 
                                  

                                        <input type="text" class="form-control has-feedback-left input_fieldset1" id="nature_businessAdd" name="nature_businessAdd" placeholder="Nature of Business" onchange="myFunction()">
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                               </div>
                               <div class="form-group col-md-6"> 
                                  
                                       <input type="text" class="form-control has-feedback-left input_fieldset1" id="business_nameAdd" name="business_nameAdd" placeholder="Business Name" onchange="myFunction()">
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                               </div>

                            <div class="form-group col-md-4"> 
                                  

                                        <input type="text" class="form-control has-feedback-left input_fieldset1" id="control_number2" name="control_number2" placeholder="Control Number " onchange="myFunction()">
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                               </div>
                               <div class="form-group col-md-4"> 
                               

                                       <input type="text" class="form-control has-feedback-left input_fieldset1" id="BinAdd" name="BinAdd" placeholder="Bin" onchange="myFunction()">
                                            <span class="fa fa-building-o   form-control-feedback left" aria-hidden="true"></span>

                                    </div>
                                    <br>    
                                     <div class="form-group col-md-4"> 
                                 
                                      <input type="text" class="form-control has-feedback-left input_fieldset1" id="BP_numAdd" name="BP_numAdd" placeholder="BP Number" onchange="myFunction()">
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4"> 
                               

                                      <input type="text" class="form-control has-feedback-left input_fieldset1" id="OR_numAdd" name="OR_numAdd" onchange="myFunction()" placeholder="OR Number" >
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>

                               </div>
                                <div class="form-group col-md-4"> 
                               

                                      <input type="date" class="form-control has-feedback-left input_fieldset1" id="date_apply" name="date_apply" onchange="myFunction()" onclick="this.type='date'" onblur="this.type='text'" placeholder="Date Applied" >
                                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>

                               </div>
                                <div class="form-group col-md-4"> 
                                  <select class="form-control" id="remarks" onchange="myFunction()">
                                    <option value="">Remarks</option>
                                        <option value="Old">Old </option>
                                        <option value="New">New</option>
                                        
                                    </select>
                                      </div>
                                <div class="form-group col-md-12 "> <h5>Address</h5>
                                    </div>

                                     <div class="form-group col-md-4"> 
                                  
                                   <input type="text" class="form-control has-feedback-left input_fieldset1" id="purokAddBus" name="purokAddBus" placeholder="Purok" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4"> 
                               

                                   <input type="text" class="form-control has-feedback-left input_fieldset1" id="barangayBus" name="barangayBus" placeholder="Barangay" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                 
                                    <input type="text" class="form-control has-feedback-left input_fieldset1" id="cityBus" name="cityBus" placeholder="City" onchange="myFunction()">
                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>

                               </div>

                                    <div class="form-group col-md-4">
                                   <input type="hidden" name="" class="form-control" id="statusAdd" value="pending" readonly="" onchange="myFunction()"> 

                               </div>
                                </div><button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button><button type="button" name="next" class="btn next2 action-button" value="Next Step" />Next <i class="fa fa-arrow-right"></i></button>
                            </fieldset>
                           
            <fieldset class="fieldset">
                <div class="form-card">
                    <h2 class="fs-title">Requirements</h2>
                   <div class="panel-group">
                    <div class="panel panel-default">
                    
                      <div class="panel-body">
                             <div class="input-group xpress control-group lst increment">
                             <div class=" input-group xpress control-group lst  col-md-8" >
                                <button type="button" class="btn btn-default addFiles"  data-toggle="dropzone">
                                  <label for="file">
                                   <i class="fa fa-file"></i>
                                  </label>
                                  {{--   <input type="file" name="filenames[]" class="myfrm form-control" id="file" multiple="" style="display:none;"> --}}
                                </button>

                                </div>
                                
                        </div>
                     
                      </div>
                    </div>
                    
                        
      
                         <div class="dropzone dropzoneDragArea " id="dropzoneDragArea" >

                            <div  class="dz-message">
                                <div class="icon">
                                    <i class="fa fa-upload"></i>
                                   
                                </div>
                                 <h2>You can drag and drop files to add</h2>
                            </div>
                         
                            
                           
                        </div>

                            <p>Only JPG, PNG, PDF, DOC (Word) and  XLS (Excel) files types are supported. Maximum file size is 25MB, maximun attachments:3.</p>
                          
                     
                  
                    
                  </div>
                     
           
                 
                        
                  
                    
                </div> <button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button><button type="button" name="next" class="btn next2 action-button" value="Next Step" />Next <i class="fa fa-arrow-right"></i></button>
            </fieldset>
                            <fieldset class="fieldset">
                                <div class="form-card">
                                   <div class="scroll">
                                         <h2><strong>Applicant Information</strong></h2>
                                         <div class="row">
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>First Name:</label>
                                                 </div>
                                                 <strong><Label id="FnamePrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Last Name:</label>
                                             </div>
                                                 <strong><Label id="LnameAddPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Middle Name:</label>
                                                </div>
                                                 <strong><Label id="middleAddPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Contact Number:</label>
                                             </div>
                                                  <strong><Label id="contactPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Alternative Contact:</label>
                                             </div>
                                                  <strong><Label id="alcontactAddPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Purok:</label>
                                             </div>
                                                  <strong><Label id="purokPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Barangay:</label></div>
                                                  <strong><Label id="barangayPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                              <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>City:</label>
                                             </div>
                                                  <strong><Label id="cityPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                         </div>
                                            
                                                  <h2><strong>Business Information</strong></h2>
                                             
                                              <div class="row">
                                                  <div class="col-md-6"><div class="col-md-6">
                                         <label>Type Of Application:</label></div>
                                         <strong><Label id="type_application2Prev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>

                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Remarks:</label></div>
                                                <strong><Label id="remarksPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Control Number:</label>
                                             </div>
                                                  <strong><Label id="control_numberPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Type of Occupancy:</label>
                                             </div>
                                                 <strong><Label id="type_occupancy2AddPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                            <div class="col-md-6">
                                                 <label>Nature of Business:</label>
                                             </div>
                                                  <strong><Label id="nature_businessPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Business Name:</label></div>
                                                 <strong><Label id="business_namePrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>Bin:</label>
                                             </div>
                                                  <strong><Label id="BinPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6">
                                                 <label>BP Number:</label>
                                             </div>
                                                  <strong><Label id="BP_numPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="col-md-6"> <label>OR Number:</label></div>
                                                 <strong><Label id="OR_numPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                               <div class="col-md-6">
                                                 <div class="col-md-6"><label>Date Applied</label></div>
                                                 <strong><Label id="date_applyPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="col-md-6"><label>Purok</label></div>
                                                 <strong><Label id="purokAddBusPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="col-md-6"><label>Barangay</label></div>
                                                 <strong><Label id="barangayBusPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="col-md-6"><label>City</label></div>
                                                 <strong><Label id="cityBusPrev" style="color: #2A3F54;    font-size: 14px;"></Label></strong>
                                             </div>

                                             
                                        </div>
                                         <h2><strong>Requirements</strong></h2>
                                         <div class="row">
                                             
                                         </div>

                                       
                                   </div>
                                </div>
<input type="hidden" class="userid" name="userid" id="userid" value="">
<input type="hidden" class="userid" name="FnameFiles" id="FnameFiles" value="">
                         <button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button>
                                <button type="submit" class="btn btn-success  " id="submit">Submit</button>
                            </fieldset>
                                  
                        </form>
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


<script>
function myFunction() {
  var Fname = document.getElementById("FnameAdd").value;
  var control_number = document.getElementById("control_number2").value;
  var type_occupancy2Add = document.getElementById("type_occupancy2Add").value;
  var remarks = document.getElementById("remarks").value;
  var nature_business = document.getElementById("nature_businessAdd").value;
  var LnameAdd = document.getElementById("LnameAdd").value;
  var business_name = document.getElementById("business_nameAdd").value;
  var purok = document.getElementById("purokAdd").value;
  var barangay = document.getElementById("barangayAdd").value;
  var city = document.getElementById("cityAdd").value;


  var Bin = document.getElementById("BinAdd").value;
  var BP_num = document.getElementById("BP_numAdd").value;
  var OR_num = document.getElementById("OR_numAdd").value;
  var date_apply = document.getElementById("date_apply").value;
  var purokAddBus = document.getElementById("purokAddBus").value;
  var barangayBus = document.getElementById("barangayBus").value;
  var cityBus = document.getElementById("cityBus").value;


  var type_application2 = document.getElementById("type_application2").value;
  var contact_num = document.getElementById("contactAdd").value;
  var alcontactAdd = document.getElementById("alcontactAdd").value;
  var middleAdd = document.getElementById("middleAdd").value;

  document.getElementById("FnamePrev").innerHTML = Fname;
  document.getElementById("control_numberPrev").innerHTML = control_number;
  document.getElementById("type_occupancy2AddPrev").innerHTML = type_occupancy2Add;
  document.getElementById("remarksPrev").innerHTML = remarks;
  document.getElementById("nature_businessPrev").innerHTML = nature_business;
  document.getElementById("LnameAddPrev").innerHTML = LnameAdd;
  document.getElementById("middleAddPrev").innerHTML = middleAdd;
  document.getElementById("business_namePrev").innerHTML = business_name;
  document.getElementById("purokPrev").innerHTML = purok;
  document.getElementById("barangayPrev").innerHTML = barangay;
  document.getElementById("cityPrev").innerHTML = city;
  document.getElementById("BinPrev").innerHTML = Bin;
  document.getElementById("BP_numPrev").innerHTML = BP_num;
  document.getElementById("BinPrev").innerHTML = Bin;
  document.getElementById("OR_numPrev").innerHTML = OR_num;
  document.getElementById("date_applyPrev").innerHTML = date_apply;
  document.getElementById("purokAddBusPrev").innerHTML = purokAddBus;
  document.getElementById("barangayBusPrev").innerHTML = barangayBus;
  document.getElementById("cityBusPrev").innerHTML = cityBus;


  document.getElementById("contactPrev").innerHTML = contact_num;
  document.getElementById("type_application2Prev").innerHTML = type_application2;
  document.getElementById("alcontactAddPrev").innerHTML = alcontactAdd;
  document.getElementById("middleAddPrev").innerHTML = middleAdd;
 
}

</script>


    <script type="text/javascript">

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
     var dataTable= $('#applicationData').DataTable({
        processing:true,
        info:true,
        'pageLength': 5,
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
          "columnDefs":[
         {
          "targets":[0, 3, 4,5],
          "orderable":false,
         },
        ],
         autoWidth: false,
          scrollX:true,

        ajax: "{{ route('applicationFetch') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'type_application',name:'type_application'},
        {data:'control_number',name:'control_number'},
        {data:'name',name:'name'},
        {data:'status',name:'status'},
        {data:'remarks',name:'remarks'},
        {data:'actions',name:'actions', class : 'buttons' }
        ]
     });

  
        Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;   
let token = $('meta[name="csrf-token"]').attr('content');


var myDropzone = new Dropzone("div#dropzoneDragArea", { 
    paramName: "file",
    url: "{{ url('/storeimgae') }}",
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: true,
    clickable :['.addFiles','#dropzoneDragArea'],
    parallelUploads: 10,
    maxFiles: 10,
    params: {
        _token: token
    },
     // The setting up of the dropzone
    init: function() {
        var myDropzone = this;
        //form submission code goes here
        $(document).on('submit','#msform',function(event) {

          

            //Make sure that the form isn't actully being sent.
            event.preventDefault();
            var Fname=$('#FnameAdd').val();

            var control_number=  $('#control_number2').val();
            var type_occupancy2=  $('#type_occupancy2Add').val();
            var remarks=  $('#remarks').val();


            var nature_business=  $('#nature_businessAdd').val();
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
            var date_apply=  $('#date_apply').val();
            var purokAddBus=  $('#purokAddBus').val();
            var barangayBus=  $('#barangayBus').val();
            var cityBus=  $('#cityBus').val();


            var type_application2=  $('#type_application2').val();
            var contact_num=$('#contactAdd').val();
            var alcontactAdd=$('#alcontactAdd').val();
            var middleAdd=$('#middleAdd').val();

            URL = $("#msform").attr('action');
           

   Swal.fire({
          title:"Add application?",
            // titleFontColor:'red',
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
              backdrop: `
              url("/images/logo2.png")
                    rgb(9 9 26 / 73%)
                    center
                    no-repeat
                  `,
             
              cancelButtonAriaLabel: 'Thumbs down',
              cancelButtonText:
                '<i class="fa fa-arrow-left"></i>Close',
                  confirmButtonColor: '#3085d6',
              confirmButtonText:
                '<i class="fa fa-check"></i> Yes',
              confirmButtonAriaLabel: 'Thumbs up, great!',
              
              
              preConfirm: function(){
             
              

            $.ajax({
                type: 'POST',
                url: URL,
                data: {
                    Fname:Fname,
                    type_application2:type_application2,
                    control_number:control_number,
                    nature_business:nature_business,
                    type_occupancy2:type_occupancy2,
                    remarks:remarks,
                    Fname:Fname,
                    Lname:Lname,
                    business_name:business_name,
                    purok:purok,
                    barangay:barangay,
                    city:city,
                    inpector_id:inpector_id,
                    Bin:Bin,
                    BP_num:BP_num,
                    status:status,
                    OR_num:OR_num,
                    date_apply:date_apply,
                    purokAddBus:purokAddBus,
                    barangayBus:barangayBus,
                    cityBus:cityBus,
                    contact_num:contact_num,
                    alcontactAdd:alcontactAdd,
                    middleAdd:middleAdd,
                        _token:"{{csrf_token()}}"},
                dataType:'json',
                success: function(result){
                    if(result.status == "success"){
                        // fetch the useid 
                        var userid = result.user_id;
                        $("#userid").val(userid); // inseting userid into hidden input field
                        $("#FnameFiles").val(result.Fname);
                        
                        //process the queue
                  
                        myDropzone.processQueue();
                    }else{
                        console.log("error");
                    }
                }
            });
             }
             
        
                });

        });

        //Gets triggered when we submit the image.
        this.on('sending', function(file, xhr, formData){
        //fetch the user id from hidden input field and send that userid with our image
          let userid = $('#userid').val();
          let Fname = $('#FnameAdd').val();
          let Lname = $('#LnameAdd').val();
          let Mname = $('#middleAdd').val();
          let type_application = $('#type_application2').val();
           formData.append('userid', userid);
           formData.append('Fname', Fname);
           formData.append('Lname', Lname);
           formData.append('Mname', Mname);
           formData.append('type_application', type_application);
        });
        
        this.on("success", function (file, response) {
            //reset the form
            $('#msform')[0].reset();
            //reset dropzone
               this.removeAllFiles();
          
                   
             $('#addApplication').modal('hide');
           dataTable.ajax.reload();
       
        });

        this.on("queuecomplete", function () {

            $('#personal').removeClass('active');
            $('#payment').removeClass('active');
            $('#confirm').removeClass('active');
            $('.modal-content fieldset').css({'opacity': '0','display':'none'});
         $('.modal-content fieldset').first().css({'opacity': '1'});
            $('.modal-content fieldset').first().show();
        toastr.success('Application Added Successfully');

    


            $('#FnamePrev').html('');
            $('#control_numberPrev').html('');
            $('#type_occupancy2AddPrev').html('');
            $('#remarksPrev').html('');
            $('#nature_businessPrev').html('');
            $('#LnameAddPrev').html('');
            $('#middleAddPrev').html('');
            $('#business_namePrev').html('');
            $('#purokPrev').html('');
            $('#barangayPrev').html('');
            $('#cityPrev').html('');
            $('#BinPrev').html('');
            $('#BP_numPrev').html('');
            $('#OR_numPrev').html('');
            $('#date_applyPrev').html('');
            $('#purokAddBusPrev').html('');
            $('#barangayBusPrev').html('');
            $('#cityBusPrev').html('');
            $('#contactPrev').html('');
            $('#type_application2Prev').html('');
            $('#alcontactAddPrev').html('');
            $('#middleAddPrev').html('');
        });



        
        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
        // of the sending event because uploadMultiple is set to true.
        this.on("sendingmultiple", function() {
          // Gets triggered when the form is actually being sent.
          // Hide the success button or the complete form.
        });
        
        this.on("successmultiple", function(files, response) {
          // Gets triggered when the files have successfully been sent.
          // Redirect user or notify of success.
        });
        
        this.on("errormultiple", function(files, response) {
          // Gets triggered when there was an error sending the files.
          // Maybe show form again, and notify user of error
        });
    }
    });
$(document).on('click','.sendArchive',function(e){
    e.preventDefault();

    alert('archive');
})
 
    });
    </script>
    
   
    
 <script type="text/javascript" src="{{ asset('js/appscript/wizardForm.js') }}"></script>

    

  
  @endsection 