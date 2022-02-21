
@extends('admin/include.navbar')
@section('title','Archived')
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
.actionButton2 i {
border-radius: 50%;
border:1px solid  #696767;
padding: 10px;
color: #696767;
margin-left: -20px;
}
.actionButton2:focus {

outline: none !important;
box-shadow: none !important;
}
.actionButton2 i:hover{
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

</style>
<div class="right_col" role="main" >
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h3>Archived </h3>
        </div>

     
    </div>
    <hr class="separate2">

                    
        <div class="clearfix"></div>
                 <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                                <div class="x_title">
                                    <h2>Archived <small></small></h2>

                                   
                                    <div class="clearfix"></div>
                                    <div id="show"></div>
                                </div>
                               
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Application</a>
                          </li>
                           <li role="presentation" class="active"><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Applicant Account </a>
                          </li>
                            <li role="presentation" class="active"><a href="#tab_content3" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Inspector Account </a>
                            </li>
                            <li role="presentation" class="active"><a href="#tab_content4" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Schedules </a>
                            </li>
                            <li role="presentation" class="active"><a href="#tab_content5" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Fees </a>
                            </li>
                        
                        </ul>
                         
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <div id='showDelete'></div>
                         <div class='container'>   
                           <div class="x_content">
                                    <br />
                                       <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                     <table class="table table-striped table-bordered" id="archiveApplication"  style="width:100%;">
                              <thead>
                                     <tr>
                                  <th>#</th>
                                  <th>Owner's Name</th>
                                  <th>Type of Application</th>
                                     <th>Control #</th>
                                  <th>Business Name</th>
                                    <th >Action</th>
                                   
                                </tr>
                              </thead>
                              <tbody >
                            
                            
                                  
                                    
                                  </tbody>
                 
                                  </table>

                        </div>
                        </div>

                             </div>
                           
                                  
                              
                              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="row">
                                  <div class="x_content">
                                    <br />
                                       <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                     <table class="table table-striped table-bordered" id="archiveData_account" style="width:100%;">
                              <thead>
                                <tr>
                                  <!-- <th>Select</th> -->
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Contact No.</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                    <th >Action</th>

                                </tr>
                              </thead>
                              
                 
                                  </table>

                        </div>
                        </div>
                        </div>

                          {{-- content 3 --}}
                          <div role="tabpanel" class="tab-pane  " id="tab_content3" aria-labelledby="home-tab">
                         <div class='container'>   
                           <div class="x_content">
                                    <br />
                                       <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                     <table class="table table-striped table-bordered" id="inspector_fetch"  style="width:100%;">
                              <thead>
                                     <tr>
                                  <th>#</th>
                                  <th>Inspector's name</th>
                                  <th>Position</th>
                                     <th>Username</th>
                                  <th>Password</th>
                                    <th >Action</th>
                                   
                                </tr>
                              </thead>
                              <tbody >
                            
                            
                                  
                                    
                                  </tbody>
                 
                                  </table>

                        </div>
                        </div>

                             </div>

                             <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                              <div class="row">
                                <div class="x_content">
                                  <br />
                                     <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                   <table class="table table-striped table-bordered" id="scheduleArchive" style="width:100%;">
                            <thead>
                              <tr>
                                <!-- <th>Select</th> -->
                                <th>#</th>
                                <th>Business Name</th>
                                <th>Type of application</th>
                                <th>Date Apply</th>
                                <th>Date of Inspection</th>
                                  <th >Action</th>

                              </tr>
                            </thead>
                            
               
                                </table>

                      </div>
                      </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                        <div class="row">
                          <div class="x_content">
                            <br />
                               <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                             <table class="table table-striped table-bordered" id="feesArchive" style="width:100%;">
                      <thead>
                        <tr>
                          <!-- <th>Select</th> -->
                          <th>#</th>
                          <th>Nature of payment</th>
                          <th>Account Code</th>
                          <th>Assessment total</th>
                          <th>Date Deleted</th>
                            <th >Action</th>


                        </tr>
                      </thead>
                      
         
                          </table>

                </div>
                </div>
                </div>
                        </div>

                        
                        
                               </div>
                              </div>
       
        </div>

       </div>

       <div class="modal fade" id="modalViewAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Applicant Account Details</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="" class="form-control" id="accountFname" readonly>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="" class="form-control" id="accountLname" readonly>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="" class="form-control" id="accountUsername" readonly>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="" class="form-control" id="accountPassword"  readonly>
            </div>
            <div class="form-group">
              <label>Date Deleted</label>
              <input type="text" name="" class="form-control" id="deleted_at_account"  readonly>
          </div>
                <input type="hidden" name="" class="form-control" id="accountAccountId" readonly>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="restore_account"><i class="fa fa-refresh"> Restore</i></button>
            </div>
          </div>
        </div>
      </div>
      {{-- modal inspector --}}
      <div class="modal fade" id="modal_inspector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Applicant Account Details</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="" class="form-control" id="inspectorFname" readonly>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="" class="form-control" id="inspectorLname" readonly>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="" class="form-control" id="inspectorUsername" readonly>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="" class="form-control" id="inspectorPassword"  readonly>
            </div>
            <div class="form-group">
              <label>Date Deleted</label>
              <input type="text" name="" class="form-control" id="deleted_at_inspector"  readonly>
          </div>
                <input type="hidden" name="" class="form-control" id="inspectorId" readonly>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="restore_inspector"><i class="fa fa-refresh"> Restore</i></button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modalViewApplication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Application Details</h5>
            </div>
            <div class="modal-body">
              <div class="x_panel">
								<div class="x_content">
									<br />
									<form class="form-horizontal form-label-left">

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
											<label class="control-label col-md-3 col-sm-3 ">Date Deleted</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control" placeholder="Default Input" id="deleted_at" readonly>
											</div>
										</div>
                 
									</form>
								</div>
							</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="restore_application"><i class="fa fa-refresh"> Restore</i></button>
          </div>
        </div>
      </div>
      </div>
<script type="text/javascript">
  $(document).ready(function(){
    var adminPass='{{Session::get('adminID')['password']}}';
      $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
    var dataTableApplication = $('#archiveApplication').DataTable(
      {
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
          ajax: "{{ route('fetchApplication') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'name',name:'name'},
        {data:'type_application',name:'type_application'},
        {data:'control_number',name:'control_number'},
        {data:'business_name',name:'business_name'},
        {data:'actions',name:'actions'}
        ]

     });
    
     var dataTable= $('#archiveData_account').DataTable({
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
          ajax: "{{ route('archivedFetch') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'Fname',name:'Fname'},
        {data:'contact_num',name:'contact_num'},
        {data:'username',name:'username'},
        {data:'password',name:'password'},
        {data:'actions',name:'actions'}
        ]

     });
     var dataTableInspector= $('#inspector_fetch').DataTable({
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
          ajax: "{{ route('inspector_fetch_achived') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'name',name:'name'},
        {data:'Position',name:'Position'},
        {data:'username',name:'username'},
        {data:'password',name:'password'},
        {data:'actions',name:'actions'}
        ]

     });

     var dataTableSchedule= $('#scheduleArchive').DataTable({
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
          ajax: "{{ route('schedule_fetch_archived') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'type_application',name:'type_application'},
        {data:'business_name',name:'business_name'},
        {data:'date_apply',name:'date_apply'},
        {data:'date_inspection',name:'date_inspection'},
        {data:'actions',name:'actions'}
        ]

     });
     var dataTableFees= $('#feesArchive').DataTable({
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
          ajax: "{{ route('fees_fetch_archived') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'natureof_payment',name:'natureof_payment'},
        {data:'account_code',name:'account_code'},
        {data:'assessment_total',name:'assessment_total'},
        {data:'deleted_at',name:'deleted_at'},
        {data:'actions',name:'actions'}
        ]

     });
     
     

     $(document).on('click','.actionButton',function(e){
       e.preventDefault();
      var accountId =$(this).attr('id');

      $.ajax({
        type:'post',
        url:"{{ route('view_account_archived') }}",
        data:{
          accountId:accountId
        },
        dataType: 'json',
        success:function(data){
      $('#modalViewAccount').modal('show');

      $.each(data.data, function(key, value){
          $('#accountFname').val(value['Fname']);
          $('#accountLname').val(value['Lname']);
          $('#accountUsername').val(value['username']);
          $('#accountPassword').val(value['password']);
          $('#accountAccountId').val(value['accountId']);
          $('#deleted_at_account').val(value['deleted_at']);
      })
      

        }
      })


     });
     $(document).on('click','.view_inspector',function(e){
       e.preventDefault();
      var inspectorId =$(this).attr('id');

      $.ajax({
        type:'post',
        url:"{{ route('view_inspector_arhived') }}",
        data:{
          inspectorId:inspectorId
        },
        dataType: 'json',
        success:function(data){
      $('#modal_inspector').modal('show');

      $.each(data.data, function(key, value){
          $('#inspectorFname').val(value['Fname']);
          $('#inspectorLname').val(value['Lname']);
          $('#inspectorUsername').val(value['username']);
          $('#inspectorPassword').val(value['password']);
          $('#inspectorId').val(value['inspectorId']);
          $('#deleted_at_inspector').val(value['deleted_at']);
      })
      
        }
      })

     });

     
     $(document).on('click','.restoreSchedule',function(e){
    e.preventDefault();
    var scheduleId = $(this).attr('id');

    Swal.fire({
         title:"Restore Schedule",
           titleFontColor:'success',
         iconHtml: '<i class="fa fa-refresh"></i>',
         iconColor: '#169F85',
             showCancelButton: true,
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
           $('#modalViewAccount').modal('hide');
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
                    
                     confirmButtonColor: '#3085d6',
                     confirmButtonText:
                       '<i class="fa fa-check"></i> Confirm',
                   
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
                             $.ajax({
                               type: 'post',
                               url:'{{ route('restore_schedule') }}',
                               data:{
                                scheduleId:scheduleId
                               },
                               dataType: 'json',
                               success:function(data){
                                 toastr.success(data.msg);
                                 dataTableSchedule.ajax.reload();
                               }
                             })
                        
                       }
                     },
                      backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
             });

             },
              backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
       
               }) 

  });
  $('#restore_account').on('click',function(e){
    e.preventDefault();
    var accountId= $('#accountAccountId').val();

    Swal.fire({
         title:"Restore Account",
           titleFontColor:'success',
         iconHtml: '<i class="fa fa-refresh"></i>',
         iconColor: '#169F85',
             showCancelButton: true,
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
           $('#modalViewAccount').modal('hide');
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
                    
                     confirmButtonColor: '#3085d6',
                     confirmButtonText:
                       '<i class="fa fa-check"></i> Confirm',
                   
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
                             $.ajax({
                               type: 'post',
                               url:'{{ route('restore_account_user') }}',
                               data:{
                                accountId:accountId
                               },
                               dataType: 'json',
                               success:function(data){
                                 toastr.success(data.msg);
                                 dataTable.ajax.reload();
                               }
                             })
                        
                       }
                     },
                      backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
             });

             },
              backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
       
               }) 

  });

  $(document).on('click','.view_application',function(e){
    e.preventDefault();
    var applicationId =$(this).attr('id');

    $.ajax({
      type: 'post',
      url: '{{ route('view_applicationAdmin') }}',
      data:{
        applicationId:applicationId
      },
      dataType: 'json',
      success:function(data){
        $('#modalViewApplication').modal('show');
        $.each(data.data,function(key, value){
          $('#applicationId').val(value['applicationId']);
          $('#type_application').val(value['type_application']);
          $('#control_number').val(value['control_number']);
          $('#type_occupancy').val(value['type_occupancy']);
          $('#nature_business').val(value['nature_business']);
          $('#business_name').val(value['business_name']);
          $('#date_apply').val(value['date_apply']);
          $('#deleted_at').val(value['deleted_at']);
        })
      }
    })

  });

$('#restore_application').on('click',function(e){
  e.preventDefault();
  var applicationId = $('#applicationId').val();
  Swal.fire({
         title:"Restore Application?",
           titleFontColor:'success',
         iconHtml: '<i class="fa fa-refresh"></i>',
         iconColor: '#169F85',
             showCancelButton: true,
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
           $('#modalViewApplication').modal('hide');
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
                    
                     confirmButtonColor: '#3085d6',
                     confirmButtonText:
                       '<i class="fa fa-check"></i> Confirm',
                   
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
                             $.ajax({
                               type: 'post',
                               url:'{{ route('restoreApplication') }}',
                               data:{
                                applicationId:applicationId
                               },
                               dataType: 'json',
                               success:function(data){
                                 toastr.success(data.msg);
                                 dataTableApplication.ajax.reload();
                               }
                             })
                        
                       }
                     },
                      backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
             });

             },
              backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
       
               }) 

});

$('#restore_inspector').on('click',function(e){
  e.preventDefault();

  var inspectorId= $('#inspectorId').val();
  Swal.fire({
         title:"Restore Account",
           titleFontColor:'success',
         iconHtml: '<i class="fa fa-refresh"></i>',
         iconColor: '#169F85',
             showCancelButton: true,
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
           $('#modal_inspector').modal('hide');
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
                    
                     confirmButtonColor: '#3085d6',
                     confirmButtonText:
                       '<i class="fa fa-check"></i> Confirm',
                   
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
                             $.ajax({
                               type: 'post',
                               url:'{{ route('restorInspector') }}',
                               data:{
                                inspectorId:inspectorId
                               },
                               dataType: 'json',
                               success:function(data){
                                 toastr.success(data.msg);
                                 dataTableInspector.ajax.reload();
                               }
                             })
                        
                       }
                     },
                      backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
             });

             },
              backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
       
               }) 
 
});
$(document).on('click','.restoreFee',function(e){
  e.preventDefault();
var fees_id  = $(this).attr('id');
  var inspectorId= $('#inspectorId').val();
  Swal.fire({
         title:"Restore Fee",
           titleFontColor:'success',
         iconHtml: '<i class="fa fa-refresh"></i>',
         iconColor: '#169F85',
             showCancelButton: true,
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
           $('#modal_inspector').modal('hide');
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
                    
                     confirmButtonColor: '#3085d6',
                     confirmButtonText:
                       '<i class="fa fa-check"></i> Confirm',
                   
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
                             $.ajax({
                               type: 'post',
                               url:'{{ route('restoreFee') }}',
                               data:{
                                fees_id:fees_id
                               },
                               dataType: 'json',
                               success:function(data){
                                 toastr.success(data.msg);
                                 dataTableFees.ajax.reload();
                               }
                             })
                        
                       }
                     },
                      backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
             });

             },
              backdrop: `
             url("/images/logo2.png")
                   rgb(9 9 26 / 73%)
                   center
                   no-repeat
                 `
       
               }) 
 
});
  

  })
</script>


  @endsection 
