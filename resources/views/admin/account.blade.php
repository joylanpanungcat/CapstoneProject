@extends('admin/include.navbar')
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
                <h3>Applicant Account Sample</h3>
            </div>

            <div class="title_right">

                <button class="btn btn-default"><i class="fa fa-user-plus fa-lg"  data-toggle="modal" data-target="#Modal"></i></button>
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

                                     <table class="table table-striped table-bordered table-hover" id="accountData" style="width:100%;">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Contact Number</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th width="200px" id="action">Action</th>
                                </tr>
                              </thead>
                              <tbody >

                                {{--     <th width="200px" id="action"><button type="button" name="delete" class="btn btn-defualt btn-xs delete" i><i class='fa fa-trash'></i></button>|| <button type='button' name='update' class='btn btn-defualt btn-xs update' ><i class='fa fa-edit'></i></button>||
<input type='hidden' name='account_id2' value=".$row['account_id'].">

 <button type='submit' name='view' class='btn btn-defualt btn-xs '  ><i class='fa fa-eye'></i></button>
</th> --}}

                                  </tbody>

                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                   <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class=" form-group">
                                <form action="{{ route('add.applicant') }}" method="post" id="formAdd" >
                                  @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>First Name</b></label>
                                            <input type="text" name="" class="form-control" placeholder="First Name" id="First_Name">
                                            <span class="text-danger error-text First_Name_error"></span><br>
                                            <label><b>Username</b></label>
                                            <input type="" name="" class="form-control" placeholder="Username"  id="username">
                                             <span class="text-danger error-text username_error"></span>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Last Name</b></label>
                                            <input type="" name="" class="form-control" placeholder="Last Name"  id="Last_Name" >
                                             <span class="text-danger error-text Last_Name_error"></span><br>
                                            <label><b>Password</b></label>
                                            <input type="" name="" class="form-control" placeholder="Password"  id="password">
                                             <span class="text-danger error-text password_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Address</h5>
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Purok</b></label>
                                            <input type="" name="" class="form-control" placeholder="Purok"  id="purok">
                                             <span class="text-danger error-text purok_error"></span><br>
                                            <label><b>City</b></label>
                                            <input type="" name="" class="form-control" placeholder="Purok" readonly="" value="Panabo City"  id="city">
                                             <span class="text-danger error-text city_error"></span>

                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Barangay</b></label>
                                            <input type="" name="" class="form-control" placeholder="Barangay"  id="barangay">
                                             <span class="text-danger error-text barangay_error"></span><br>
                                            <label><b>Contact Number</b></label>
                                            <input type="" name="" class="form-control" placeholder="Contact Number" id="Contact_Number">
                                             <span class="text-danger error-text Contact_Number_error"></span>
                                              <input type="hidden" name="" class="form-control" placeholder="Contact Number" id="date_register" value="<?php echo date("Y/M/D  h:i:s")?>">


                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="add">Add</button>
                                </div>
                                </div>
                                </div>


                                </div>
                                </form>




                                <!-- modal edit -->
                                  <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md" >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Applicant Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('update.appplicant') }}" method="post" id="editForm">
                              @csrf
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
                                    <label>Username</label>
                                    <input type="text" name="" class="form-control" id="editUsername">
                                    <span class="text-danger error-text username_error2"></span>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="" class="form-control" id="editPassword">
                                    <span class="text-danger error-text password_error2"></span>
                                </div>
                                    <input type="hidden" name="" class="form-control" id="editAccount_id">




                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit">Edit</button>
                                </div>
                                </div>
                                </div>
                           </form>

                                </div>

    <script type="text/javascript">
      $(document).ready(function(){
           $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
           toastr.options =
                  {
                    "closeButton" : true

                  }
    var adminPass='{{Session::get('adminID')['password']}}';
      $('#formAdd').on('submit', function(e){
                        e.preventDefault();
                        var First_Name=$('#First_Name').val();
                        var username=$('#username').val();
                        var Last_Name=$('#Last_Name').val();
                        var password=$('#password').val();
                        var purok=$('#purok').val();
                        var city=$('#city').val();
                        var barangay=$('#barangay').val();
                        var Contact_Number=$('#Contact_Number').val();
                        var date_register=$('#date_register').val();
                        var form=this;

                   $.ajax({
                            url: $(form).attr('action'),
                            method:$(form).attr('method'),
                            data:{
                                First_Name:First_Name,
                                username:username,
                                Last_Name:Last_Name,
                                password:password,
                                purok:purok,
                                city:city,
                                barangay:barangay,
                                date_register:date_register,
                                Contact_Number:Contact_Number
                            },
                            // data: new FormData(form),
                            // processData:false,
                            // contentType: false,

                            dataType:'json',
                            beforeSend:function(data){
                              $(form).find('span.error-text').text('');
                            },
                            success: function(response){

                                // $('#Modal').modal('hide');
                                // $('#formAdd')[0].reset();
                                // load_data();
                                // text-danger error-text Fname_error
                                if(response.status==400)
                                {
                              $.each(response.errors,function(key , message){
                              $('span.'+key+'_error').text(message[0]);
                              // $(this).find('span'+key+'_error').text(message[0]);
                              });

                                }
                                else{
                                   // $('#show2').html(response.message);
                                   toastr.success(response.msg);
                                     $('#Modal').modal('hide');
                                     $('#formAdd')[0].reset();
                                      dataTable.ajax.reload();

                                }


                            }

                        });


                    });

      //fetch applicant account
     var dataTable= $('#accountData').DataTable({
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
          scrollX:true,

        ajax: "{{ route('accountFetch') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'Fname',name:'Fname'},
        {data:'contact_num',name:'contact_num'},
        {data:'username',name:'username'},
        {data:'password',name:'password'},
        {data:'actions',name:'actions'}
        ]
     });

     // get details

     $(document).on('click','.update',function(){
                    var account_id=$(this).attr('id');
                    // alert(update);
                    // $('.update').find('form')[0].reset();
                    $('.update').find('span.error-text').text('');
                 $.post('<?= route('get.appplicant.details')  ?>', {account_id:account_id},function(data){
                                $('#editFname').val(data.details.Fname);
                                $('#editLname').val(data.details.Lname);
                                $('#editUsername').val(data.details.username);
                                $('#editPassword').val(data.details.password);
                                $('#editAccount_id').val(data.details.accountId);
                               $('#ModalEdit').modal('show');
              },'json');
                });
      $(document).on('submit','#editForm',function(e){
          e.preventDefault();

          var EditAccount_id =$('#editAccount_id').val();
          var First_Name =$('#editFname').val();
          var username =$('#editUsername').val();
          var password =$('#editPassword').val();
          var Last_Name =$('#editLname').val();

            $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: {
                            EditAccount_id:EditAccount_id,
                            First_Name:First_Name,
                            username:username,
                            password:password,
                            Last_Name:Last_Name
                        },
                         beforeSend:function(data){
                              $(this).find('span.error-text').text('');
                            },
                        // success: function(data){
                        //         // $('#show2').html(data);
                        //         $('#ModalEdit').modal('hide');

                        //              // load_data();
                        //         dataTable.ajax.reload();
                        // }
                        success: function(response){


                                if(response.status==400)
                                {
                              $.each(response.errors,function(key , message){
                              $('span.'+key+'_error2').text(message[0]);
                              // $(this).find('span'+key+'_error').text(message[0]);
                              });

                                }
                                else{
                                   // $('#show2').html(response.message);
                                    $('#ModalEdit').modal('hide');
                                   toastr.success(response.msg);

                                     // $('#formAdd')[0].reset();
                                      dataTable.ajax.reload();

                                }


                            }
                    });
      });

      $(document).on('click','.sendArchive', function(e){
        e.preventDefault();
        var accountId=$(this).attr('id');
        swalDelete(accountId);
          });

      function swalDelete(accountId){

        console.log(adminPass);

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
                            type: "POST",
                            data:{accountId:accountId} ,
                            url: '{{ route('swalert') }}',
                            dataType:'json'

                          })
                          // in case of successfully understood ajax response
                            .done(function (data) {
                                swal.close();

                               toastr.success(data.msg+'  <a type="button" style="color:#000" class="restore" id='+accountId+' ><strong>   UNDO.</strong></a>');
                                dataTable.ajax.reload();
                            })
                            .fail(function (erordata) {

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
      }
      $(document).on('click','.restore',function(e){
        e.preventDefault();
        var accountId=$(this).attr('id');
       $.ajax({
        url:'{{ route('restore') }}',
        type:'post',
        data:{
            accountId:accountId
        },
        dataType:'json',
        success:function(data){
            toastr.success(data.msg);
             dataTable.ajax.reload();
        }
       })
      })

      });
    </script>
    <script type="text/javascript">
          @if(Session::has('success'))
            toastr.options =
              {
                "closeButton" : true

              }
               toastr.success("{{ session('message') }}");
            @endif
    </script>
    <!-- /compose -->








  @endsection
