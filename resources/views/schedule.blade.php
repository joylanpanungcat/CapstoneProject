@extends('include.navbar')
@section('title','Schedule list')
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
                <h3>Schedule List </h3>
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
                                    {{-- <div class="col-md-4 sort_select">
                                      <label><b> Sort:</b></label>
                                      <select class="select_status" id="category_filter">
                                          <option value="">All</option>
                                          <option value="Fire Safety Inspection Certificate">FSIC</option>
                                          <option value="Fire Safery Evaluation Clearance">FSEC</option>
                                          <option value="Fire Safety Inspection Certificate for Business">FSIC for Business</option>
                                          <option value="FSIC for Occupancy">FSIC for Occupancy</option>
                                      </select>
                                    </div> --}}
                              
                                    {{-- <div class="col-md-8">
                                      <div class="row input-daterange" style="float: right">
                                        <div class="">
                                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly  style="margin-right:10px;"/>
                                        </div>
                                        <div class="">
                                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                                        </div>
                                        <div class="">
                                            <button type="button" name="filter" id="filter" class="btn " style="background-color: #1ABB9C;color:#FFF"><i class="fa fa-check"></i></button>
                                            <button type="button" name="refresh" id="refresh" class="btn btn-default"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                    </div> --}}
                                    <br><br>  
                                       
                            <table class="table table-striped table-bordered " id="applicationData2" style="width: 100%"  >
                              <thead >
                               

                                  <!-- <th>Select</th> -->
                                  <th> #</th>
                                  <th>Owner's Name</th>
                                  <th>TYPE OF APPLLICATION</th>
                                  <th>ADDRESS</th>
                                  <th>DATE OF APPLICATION</th>
                                  <th>ACTION</th>
                                

                                 
                              </thead>
                              
                                  </table>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="show_schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Scedule Information</h5>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Owner's Name</label>
                          <input type="text" class="form-control" id="ownersName"  readonly>
                          <input type="hidden" class="form-control" id="scheduleId"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Type of Application</label>
                          <input type="text" class="form-control" id="type_application_schedule" readonly >
                        </div>
                        <div class="form-group">
                          <label for="name">Address</label>
                          <input type="text" class="form-control" id="address_schedule" readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Inspector</label>
                          <input type="text" class="form-control" id="inspector_schedule" readonly >
                        </div>
                        <div class="form-group">
                          <label for="name">Date Of Application</label>
                          <input type="Date" class="form-control" id="date_applied_schedule">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_schedule"><i class="fa fa-edit"></i> Save changes</button>
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
            url:"{{ route('scheduleList') }}",
            data: {adminPass:adminPass
            }
          },
       
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex', class: 'table_header'},
        {data:'name',name:'name'},
        {data:'type_application',name:'type_application'},
        {data:'address',name:'address'},
        {data:'date_inspection',name:'date_inspection'},
        {data:'actions',name:'actions'},
        ]
     });
$(document).on('click','.cancel_schedule',function(e){
  e.preventDefault();
  var scheduleId = $(this).attr('id');

  Swal.fire({
         title:"Cancel Schedule?",
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
                             
                         $.ajax({
                           type: 'post',
                           url: '{{ route('cancel_schedule') }}',
                           data:{
                            scheduleId:scheduleId
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
 $(document).on('click','.view_schedule',function(e){
   e.preventDefault();
  var scheduleId = $(this).attr('id');
  
    $.ajax({
      type: 'post',
      url: '{{ route('view_schedule') }}',
      data:{
        scheduleId:scheduleId
      },
      dataType: 'json',
      success:function(data){
   $('#show_schedule').modal('show');
   $.each(data.data,function(key, value){
     $('#ownersName').val(value['Fname'] +' '+value['Mname']+' '+ value['Lname']);
     $('#type_application_schedule').val(value['type_application']);
     $('#address_schedule').val(value['purok'] +' '+value['barangay']+' '+ value['city']);
     $('#date_applied_schedule').val(value['date_inspection']);
     $('#scheduleId').val(scheduleId);
   })
   $.each(data.data2,function(key, value){
   $('#inspector_schedule').val(value['Fname']+' '+ value['Lname']);

   })
      }
      
    })
  
 });

 $('#update_schedule').on('click',function(e){
   e.preventDefault();

  var scheduleId =  $('#scheduleId').val();
  var date_inspection =  $('#date_applied_schedule').val();
   Swal.fire({
          title:"Update Schedule",
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
                '<i class="fa fa-check"></i> Confirm',
              confirmButtonAriaLabel: 'Thumbs up, great!',
              preConfirm: function(){
                  $.ajax({
                    type:'post',
                    url:'{{ route('update_schedule') }}',
                    data:{
                      scheduleId:scheduleId,
                      date_inspection:date_inspection
                    },
                    dataType:'json',
                    success:function(data){
                      toastr.success(data.msg);
                    }
                  })

             }
             
                });
 })
  })
</script>

  
  @endsection 