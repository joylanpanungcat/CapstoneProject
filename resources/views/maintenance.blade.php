@extends('include.navbar')
@section('title','Maintenance')
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

.panel_default{
    height: 400px;
    overflow-y: auto;
}

</style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Maintenance </h3>
            </div>

         
        </div>
        <hr class="separate2">
                    
                    
        <div class="clearfix"></div>
       

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel ">
                           
                                <div class="x_content ">
                                    <div class="col-md-6 ">
                                        <div class="x_panel panel_default">
                                            <div class="x_title">
                                                <h2>Default Fees</h2>
                                                <ul class="nav navbar-right panel_toolbox" style="float: right">
                                <button type="button"  class="btn btn-defualt btn-xs actionButton add_main_fee" ><i class="fa fa-plus"></i></button>
                                                    
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content" id="content">
                                                   
            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="x_panel panel_default">
                                            <div class="x_title">
                                                <h2>Other Fees</h2>
                                                <ul class="nav navbar-right panel_toolbox" style="float: right">
                                                    <button type="button"  class="btn btn-defualt btn-xs actionButton add_other_fees" ><i class="fa fa-plus"></i></button>
                                                                        
                                                                    </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content" id="content2">
                                                   
            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="x_panel panel_default">
                                            <div class="x_title">
                                                <h2>Authority</h2>
                                              
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content" id="content3">
                                                   
            
                                            </div>
                                        </div>
                                    </div>
                              

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Default_fees_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Fees</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
        
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nature of Payment</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                    
                              <input type="hidden" class="form-control" placeholder="Default Input" id="fees_id" >
                              <input type="text" class="form-control" placeholder="Default Input" id="natureof_payment" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Account Code</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="account_code" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Assessment Total</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="assessment_total" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <textarea name="" id="description" cols="50" rows="10" style="width: 100%"></textarea>
                                                    </div>
                                                </div>
                         
                                            </form>
                                        </div>
                                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="Update_Defaul_fees"><i class="fa fa-pencil"> Update</i></button>
                  </div>
                </div>
              </div>
              </div>

              <div class="modal fade" id="other_fees_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Other Fees</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
        
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nature of Payment</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                    
                              <input type="hidden" class="form-control" placeholder="Default Input" id="fees_id_other" >
                              <input type="text" class="form-control" placeholder="Default Input" id="natureof_payment_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Account Code</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="account_code_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Assessment Total</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="assessment_total_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <textarea name="" id="description_other" cols="50" rows="10" style="width: 100%"></textarea>
                                                    </div>
                                                </div>
                         
                                            </form>
                                        </div>
                                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="Update__other_fees"><i class="fa fa-pencil"> Update</i></button>
                  </div>
                </div>
              </div>
              </div>   
              
              <div class="modal fade" id="authority_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Names</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
        
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Marshal</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                    
                              <input type="hidden" class="form-control" placeholder="Default Input" id="authorityId" >
                              <input type="text" class="form-control" placeholder="Default Input" id="authority_of" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Fee Assessor</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="fee_assessor" >
                                                    </div>
                                                </div>
                            
                         
                                            </form>
                                        </div>
                                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="update_authority"><i class="fa fa-pencil"> Update</i></button>
                  </div>
                </div>
              </div>
              </div> 

              <div class="modal fade" id="add_main_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Default Fees</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
        
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nature of Payment</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                    
                              <input type="hidden" class="form-control" placeholder="Default Input" id="fees_id_add" >
                              <input type="text" class="form-control" placeholder="Default Input" id="natureof_payment_add" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Account Code</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="account_code_add" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Assessment Total</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="assessment_total_add" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <textarea name="" id="description_add" cols="50" rows="10" style="width: 100%"></textarea>
                                                    </div>
                                                </div>
                         
                                            </form>
                                        </div>
                                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="add_main_fee_action"><i class="fa fa-pencil"> Add</i></button>
                  </div>
                </div>
              </div>
              </div>  

              <div class="modal fade" id="add_other_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Other Fees</h5>
                    </div>
                    <div class="modal-body">
                      <div class="x_panel">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left">
        
                                                <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Nature of Payment</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                    
                              <input type="hidden" class="form-control" placeholder="Default Input" id="fees_id_add_other" >
                              <input type="text" class="form-control" placeholder="Default Input" id="natureof_payment_add_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Account Code</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="account_code_add_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Assessment Total</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="text" class="form-control" placeholder="Default Input" id="assessment_total_add_other" >
                                                    </div>
                                                </div>
                            <div class="form-group row ">
                                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <textarea name="" id="description_add_other" cols="50" rows="10" style="width: 100%"></textarea>
                                                    </div>
                                                </div>
                         
                                            </form>
                                        </div>
                                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="add_other_fee_action"><i class="fa fa-pencil"> Add</i></button>
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
 fetch();
function fetch(){
        $.ajax({
                    type:'get',
                    url: '{{ route('fetch_default_fees') }}',
                    dataType:  'json',
                    success:function(data){
                        $('#content').html(data.output);
                        $('#content2').html(data.output2);
                        $('#content3').html(data.output3);
                    }
                })
        }
  $(document).on('click','.default_fee',function(e){
    e.preventDefault();
    var fees_id = $(this).attr('id');
   
    $.ajax({
        type:'post',
        url:'{{ route('view_main_fees') }}',
        data:{
            fees_id:fees_id
        },
        success:function(data){
          $('#Default_fees_modal').modal('show');
          $.each(data.data,function(key, value){
            $('#fees_id').val(value['fees_id']);
            $('#natureof_payment').val(value['natureof_payment']);
            $('#account_code').val(value['account_code']);
            $('#assessment_total').val(value['assessment_total']);
            $('#description').val(value['description']);
            $('#category').val(value['category']);
          })

        }
    })
})

$('#Update_Defaul_fees').on('click',function(e){
    e.preventDefault();
    var fees_id =  $('#fees_id').val();
    var natureof_payment =  $('#natureof_payment').val();
    var account_code =  $('#account_code').val();
    var assessment_total =  $('#assessment_total').val();
    var description =  $('#description').val();


    Swal.fire({
         title:"Save Payment",
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
                $('#Default_fees_modal').modal('hide');
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
                                 url:'{{ route('update_main_fees') }}',
                                 data:{
                                    fees_id:fees_id,
                                    natureof_payment:natureof_payment,
                                    account_code:account_code,
                                    assessment_total:assessment_total,
                                    description:description,

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     fetch()
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

$(document).on('click','.other_fees',function(e){
    e.preventDefault();
    var fees_id = $(this).attr('id');

    $.ajax({
        type: 'post',
        url:'{{ route('view_other_fees') }}',
        data:{
            fees_id:fees_id
        },
        dataType: 'json',
        success:function(data){
            $('#other_fees_modal').modal('show');
            $.each(data.data,function(key, value){
            $('#fees_id_other').val(value['fees_id']);
            $('#natureof_payment_other').val(value['natureof_payment']);
            $('#account_code_other').val(value['account_code']);
            $('#assessment_total_other').val(value['assessment_total']);
            $('#description_other').val(value['description']);
            $('#category_other').val(value['category']);
          })
        }
    })

});

$('#Update__other_fees').on('click',function(e){
    e.preventDefault();
    var fees_id =  $('#fees_id_other').val();
    var natureof_payment =  $('#natureof_payment_other').val();
    var account_code =  $('#account_code_other').val();
    var assessment_total =  $('#assessment_total_other').val();
    var description =  $('#description_other').val();


    Swal.fire({
         title:"Save Payment",
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
                $('#other_fees_modal').modal('hide');
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
                                 url:'{{ route('update_other_fees') }}',
                                 data:{
                                    fees_id:fees_id,
                                    natureof_payment:natureof_payment,
                                    account_code:account_code,
                                    assessment_total:assessment_total,
                                    description:description,

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     fetch();
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

$(document).on('click','.authority_view',function(e){
    e.preventDefault();
    
    var id = $(this).attr('id');
    fetch();

    function fetch(){
    $.ajax({
        type: 'post',
        url:'{{ route('view_authority') }}',
        data:{
            id:id
        },
        dataType: 'json',
        success:function(data){
            $.each(data.data,function(key, value){
                $('#authorityId').val(value['id']);
                $('#authority_of').val(value['authority_of']);
                $('#fee_assessor').val(value['fee_assessor']);
            });
            $('#authority_modal').modal('show');
        }
    })
  }
   

});

$('#update_authority').on('click',function(e){
    e.preventDefault();
    var id =$('#authorityId').val();
    var authority_of =  $('#authority_of').val();
    var fee_assessor =  $('#fee_assessor').val();
   

    Swal.fire({
         title:"Save Payment",
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
                $('#authority_modal').modal('hide');
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
                                 url:'{{ route('update_authority') }}',
                                 data:{
                                    id:id,
                                    authority_of:authority_of,
                                    fee_assessor:fee_assessor,

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     fetch();
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
$('.add_main_fee').on('click',function(e){
    e.preventDefault();

    $('#add_main_modal').modal('show');
});
$('#add_main_fee_action').on('click',function(e){
    e.preventDefault();
    var natureof_payment =  $('#natureof_payment_add').val();
    var account_code =  $('#account_code_add').val();
    var assessment_total =  $('#assessment_total_add').val();
    var description =  $('#description_add').val();

    Swal.fire({
         title:"Add Default Fee",
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
                $('#add_main_modal').modal('hide');
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
                                 url:'{{ route('add_main_fee') }}',
                                 data:{
                                    natureof_payment:natureof_payment,
                                    account_code:account_code,
                                    assessment_total:assessment_total,
                                    description:description,

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     fetch()
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

$('.add_other_fees').on('click',function(e){
    e.preventDefault();

    $('#add_other_modal').modal('show');
});

$('#add_other_fee_action').on('click',function(e){
    e.preventDefault();
    var natureof_payment =  $('#natureof_payment_add_other').val();
    var account_code =  $('#natureof_payment_add_other').val();
    var assessment_total =  $('#natureof_payment_add_other').val();
    var description =  $('#natureof_payment_add_other').val();

    Swal.fire({
         title:"Add Other Fee",
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
                $('#add_other_modal').modal('hide');
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
                                 url:'{{ route('add_other_fee') }}',
                                 data:{
                                    natureof_payment:natureof_payment,
                                    account_code:account_code,
                                    assessment_total:assessment_total,
                                    description:description,

                                 },
                                 dataType: 'json',
                                 success:function(data){
                                     toastr.success(data.msg);
                                     swal.close();
                                     fetch()
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

$(document).on('click','.other_fees_delete',function(e){
  e.preventDefault();
 var fees_id  = $(this).attr('id');

  Swal.fire({
         title:"Archive Fee?",
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
                           url: '{{ route('delete_fees') }}',
                           data:{
                            fees_id:fees_id
                           },
                           dataType: 'json',
                           success:function(data){
                             toastr.success(data.msg);
                             fetch();
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