@extends('include.navbar')
@section('title','applicant account')
@section('content')

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
                                <li class="active" id="account"><strong>Personal</strong></li>
                                <li id="personal"><strong>Business</strong></li>
                                <li id="payment"><strong>Requirements</strong></li>
                                <li id="confirm"><strong>Preview</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset >
                                <div class="form-card col-md-12">
                                    <h2 class="fs-title">Personal Information</h2> 
                                    <div class="form-group col-md-4"> 
                                   <input type="text" name="FnameAdd" id="FnameAdd" class="form-control input_fieldset1" placeholder="First Name">
                                      </div>
                                      <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="LnameAdd" class="form-control input_fieldset1" placeholder="Last Name" >
                                     </div>
                                   <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="middleAdd" class="form-control" placeholder="Middle Name (Optional)" >
                               </div>
                               <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="contactAdd" class="form-control input_fieldset1" placeholder="Contact No." >
                               </div>
                                 <div class="form-group col-md-5"> 
                                    <input type="text" name="" id="alcontactAdd" class="form-control input_fieldset1" placeholder="Alternative Contact No.">
                                    </div>
                                    <br>    
                                    <div class="form-group col-md-12 "> <h5>Address</h5>
                                    </div>

                                     <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="purokAdd" class="form-control input_fieldset1" placeholder="Purok">
                                    </div>
                                    <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="barangayAdd" class="form-control input_fieldset1" placeholder="Barangay">
                                    </div>
                                    <div class="form-group col-md-4">
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
                               <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="BinAdd" class="form-control"  placeholder="Bin">
                                    </div>
                                    <br>    
                                     <div class="form-group col-md-4"> 
                                   <input type="text" name="" id="BP_numAdd" class="form-control" placeholder="BP Number">
                                    </div>
                                    <div class="form-group col-md-4"> 
                                   <input type="text" name="" class="form-control" id="OR_numAdd" placeholder="OR Number"></div>
                                    <div class="form-group col-md-6 col-sm-6">
                                   <input type="hidden" name="" class="form-control" id="statusAdd" value="pending" readonly=""></div>
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
<input type="hidden" class="userid" name="userid" id="userid" value="">
<input type="hidden" class="userid" name="FnameFiles" id="FnameFiles" value="">
                         <button type="button" name="previous" class="btn previous action-button-previous" value="Previous" /> <i class="fa fa-arrow-left"></i>Previous </button>
                                <button type="submit" class="btn btn-success" >Submit</button>
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



    <script type="text/javascript">


    
        Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;   
let token = $('meta[name="csrf-token"]').attr('content');


var myDropzone = new Dropzone("div#dropzoneDragArea", { 
    paramName: "file",
    url: "{{ url('/storeimgae') }}",
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: true,
 
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

            URL = $("#msform").attr('action');
            $.ajax({
                type: 'POST',
                url: URL,
                data: {Fname:Fname,
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
        });

        //Gets triggered when we submit the image.
        this.on('sending', function(file, xhr, formData){
        //fetch the user id from hidden input field and send that userid with our image
          let userid = document.getElementById('userid').value;
          let Fname = document.getElementById('FnameFiles').value;
           formData.append('userid', userid);
           formData.append('Fname', Fname);
        });
        
        this.on("success", function (file, response) {
            //reset the form
            $('#msform')[0].reset();
            //reset dropzone
            $('.dropzone-previews').empty();

            alert('upload ng image');
        });

        this.on("queuecomplete", function () {
        
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
  $('.addFiles').on('click',function(e){
        e.preventDefault();
        myDropzone.processQueue();
      });
    </script>
    
   
    
 <script type="text/javascript" src="{{ asset('js/appscript/wizardForm.js') }}"></script>

    

  
  @endsection 