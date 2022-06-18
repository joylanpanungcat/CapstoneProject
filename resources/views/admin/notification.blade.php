@extends('admin/include.navbar')
@section('title','SMS/Push Notification')
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

#search_applicant {
  font-family: 'Times New Roman', Times, serif;
  font-size: 14px;
  padding-left: 0.5em;

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
                <h3>SMS/Push Notification</h3>
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
                                  <th> #</th>
                                  <th>Type of Application</th>
                                  <th>Address</th>
                                  <th>Applicant's Name</th>
                                  <th>Mobile Account</th>
                                  <th>ACTION</th>
                              </thead>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="send_sms_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Send SMS Notification</h5>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="applicationId_sms">
                      <div class="form-group">
                        <label for="">From</label>
                        <input type="text" class="form-control" readonly id="from_sms">
                      </div>
                      <div class="form-group">
                        <label for="">To</label>
                        <input type="text" class="form-control" readonly id="to_sms">
                      </div>
                      <div class="form-group">
                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control" readonly id="contact_num">
                      </div>
                      <div class="form-group">
                        <label for="">Message</label>
                      </div>
                      <textarea name="" id="message_body_sms" rows="10" style="width: 100%">
                      </textarea>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success" id="send_sms_notification"><i class="fa fa-paper-plane"> Send</i></button>
                    </div>
                  </div>
                </div>
              </div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

     var dataTable= $('#applicationData2').DataTable({
        processing:true,
        info:true,
        "ordering": false,
        'sorting':false,
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
          scrollX:true,
          ajax: {
            url:"{{ route('get_application_notification') }}",
          },

        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex', class: 'table_header'},
        {data:'type_application',name:'type_application'},
        {data:'address',name:'address'},
        {data:'name',name:'name'},
        {
          data:'accountId',name:'accountId',
          render: function(data, type, row){
            if(data === null){
                return btn = '<span class="badge badge-danger">No Account</span>';
            }else{
                return btn = '<span class="badge badge-success">Yes</span>';
            }
          }

        },
        {data:'actions',name:'actions'},
        ]
     });

    $(document).on('click','.send_sms',function(e){
        var applicationId = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: '{{ route('get_sms_details') }}',
            data:{
                applicationId:applicationId
            },
            dataType:'json',
            success:function(data){
                $('#send_sms_modal').modal('show');
                $('#from_sms').val('Bureau of Fire Protection Panabo');
                $('#to_sms').val(data.to);
                $('#contact_num').val(data.contact_num);
                $('#message_body_sms').val(data.message);
                $('#applicationId_sms').val(applicationId);
            }
        })

    });
    $('#send_sms_notification').on('click',function(e){
        e.preventDefault();
        var applicationId = $('#applicationId_sms').val();
        var contact_num = $('#contact_num').val();
        var message_body_sms = $('#message_body_sms').val();
        Swal.fire({
         title:"Send SMS Notification",
         iconHtml: '<i class="fa fa-paper-plane"></i>',
         iconColor: 'teal',
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
                    $.ajax({
                        type: 'post',
                        url: '{{ 'send_notification' }}',
                        data:{
                            applicationId:applicationId,
                            contact_num:contact_num,
                            message_body_sms:message_body_sms,
                        },
                        dataType: 'json',
                        success:function(data){
                            $('#send_sms_modal').modal('hide');
                            toastr.success(data.msg);
                        }
                    })
              },


               })




    })
    })
</script>
  @endsection
