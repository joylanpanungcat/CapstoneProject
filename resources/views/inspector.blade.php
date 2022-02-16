@extends('include.navbar')
@section('title','Inspector')
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
                <h3>Inspector Account </h3>
            </div>
            <div class="title_right">
             
                <button class="btn btn-default  " data-toggle="modal" data-target="#addApplicant" ><i class="fa fa-user-plus fa-lg tags"   data-toggle="tooltip" data-placement="bottom" title="Add Inspector"></i></button>
            </div>

         
        </div>
        <hr class="separate2">
                    
                    
        <div class="clearfix"></div>
       

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                           
                                <div class="x_content">
                                    <br />
                                 
                                  
                                    <br><br> 
                                       
                            <table class="table table-striped table-bordered " id="applicationData2" style="width: 100%"  >
                              <thead >
                               

                                  <!-- <th>Select</th> -->
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Position</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Action</th>

                              </thead>
                              
                                  </table>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Inspector Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form  id="editForm">
                          <div class="form-group">
                              <label>First Name</label>
                              <input type="text" name="" class="form-control" id="editFname">
                              <span class="text-danger error-text First_Name_error2"></span>
                          </div>
                          <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" name="" class="form-control" id="editLname">
                              <span class="text-danger error-text Last_Name_error2"></span>
                          </div>
                          <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="" class="form-control" id="editPosition">
                            <span class="text-danger error-text Last_Name_error2"></span>
                        </div>
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="" class="form-control" id="editusername">
                              <span class="text-danger error-text username_error2"></span>
                          </div>

                          <div class="form-group">
                              <label>Password</label>
                              <input type="text" name="" class="form-control" id="editpassword">
                              <span class="text-danger error-text password_error2"></span>
                          </div>
                              <input type="hidden" name="" class="form-control" id="editinspectorId">


               
                      
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="edit">Edit</button>
                          </div>
                          </div>
                          </div>
                     </form>
                         
                          </div>

            <div class="modal fade" id="addApplicant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Inspector </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="editForm">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="" class="form-control" id="Fname">
                            <span class="text-danger error-text First_Name_error2"></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="" class="form-control" id="Lname">
                            <span class="text-danger error-text Last_Name_error2"></span>
                        </div>
                        <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="" class="form-control" id="Position">
                        <span class="text-danger error-text Last_Name_error2"></span>
                    </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="" class="form-control" id="username">
                            <span class="text-danger error-text username_error2"></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="" class="form-control" id="password">
                            <span class="text-danger error-text password_error2"></span>
                        </div>
                            <input type="hidden" name="" class="form-control" id="inspectorId">


            
                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add">Add</button>
                        </div>
                        </div>
                        </div>
                    </form>
                        
                        </div>
                          
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
   
     var dataTable= $('#applicationData2').DataTable({
        processing:true,
        info:true,
        "ordering": false,
        'sorting':false,
       
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
          scrollX:true,
          ajax: {
            url:"{{ route('inspector_fetch') }}",
           
          },
       
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex', class: 'table_header'},
        {data:'name',name:'name'},
        {data:'Position',name:'Position'},
        {data:'username',name:'username'},
        {data:'password',name:'password'},
        {data:'actions',name:'actions'},

        ]
     });

  $(document).on('click','.update',function(e){
      var inspectorId= $(this).attr('id');
    $.ajax({
        type:'post',
        url:'{{route('view_inspector')  }}',
        data:{
            inspectorId:inspectorId
        },
        dataType:'json',
        success:function(data){
            $('#editinspectorId').val(inspectorId);
            $('#ModalEdit').modal('show');

            $.each(data.data,function(key, value){
                $('#editFname').val(value['Fname']);
                $('#editLname').val(value['Lname']);
                $('#editPosition').val(value['Position']);
                $('#editusername').val(value['username']);
                $('#editpassword').val(value['password']);

            })
        }
    })



  });

  $('#edit').on('click',function(e){
      e.preventDefault();
    var inpectorId =$('#editinspectorId').val();
    var Fname= $('#editFname').val();
    var Lname=$('#editLname').val();
    var Position =$('#editPosition').val();
    var username =$('#editusername').val();
    var password = $('#editpassword').val();

      

    Swal.fire({
         title:"Update Inspector",
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
                $('#ModalEdit').modal('hide');
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
                           return new Promise(function (resolve){
                             $.ajax({
                                 type:'post',
                                 url:'{{ route('update_inspector') }}',
                                 data:{
                                    inpectorId:inpectorId,
                                    Fname:Fname,
                                    Lname:Lname,
                                    Position:Position,
                                    username:username,
                                    password:password

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     dataTable.ajax.reload();
                                 }
                             })
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
       
               });          

  });

  $('#add').on('click',function(e){
      e.preventDefault();
      var Fname =$('#Fname').val();
      var Lname =$('#Lname').val();
      var Position =$('#Position').val();
      var username =$('#username').val();
      var password =$('#password').val();

      Swal.fire({
         title:"Add Inspector",
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
                $('#addApplicant').modal('hide');
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
                           return new Promise(function (resolve){
                             $.ajax({
                                 type:'post',
                                 url:'{{ route('add_inspector') }}',
                                 data:{
                                    Fname:Fname,
                                    Lname:Lname,
                                    Position:Position,
                                    username:username,
                                    password:password

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     dataTable.ajax.reload();
                                 }
                             })
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
       
               });

      
  });

$(document).on('click','.archived',function(e){
    e.preventDefault();

    var inspectorId =$(this).attr('id');
    Swal.fire({
         title:"Send to archive?",
           titleFontColor:'red',
         iconHtml: '<i class="fa fa-archive"></i>',
         iconColor: '#d82a3a',
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
                           return new Promise(function (resolve){
                      $.ajax({
                          type:'post',
                          url: '{{ route('archive_inspector') }}',
                          data:{
                            inspectorId:inspectorId
                          },
                          dataType:'json',
                          success:function(data){
                              toastr.success(data.msg);
                              swal.close();
                              dataTable.ajax.reload();
                          }
                      })

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
})

  })
</script>

  
  @endsection 