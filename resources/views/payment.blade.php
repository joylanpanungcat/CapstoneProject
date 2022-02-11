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
     margin-left: 800px;
    }
    .modal input:hover{
       border: 3px solid #0687d6;
    }
   #user_data tr.removeRow
          {
              background-color: #b5b5b5;
          }
    .removeRow{
      background-color: #1111;
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
.panel{
border: 1px solid #111;
padding: 20px;
}
input[type=checkbox]
{
-ms-transform: scale(2); /* IE */
-moz-transform: scale(2); /* FF */
-webkit-transform: scale(2); /* Safari and Chrome */
-o-transform: scale(2); /* Opera */
transform: scale(2);
padding: 10px;
}
#user_data tr.removeRow
          {
              background-color: #b5b5b5;
          }
.total_body{
margin-left: 80px;
float: right;
} 
.total_body2{
margin-left: 120px;
float: right;

}           
.total{
width: 200px;
height: 30px;

}
.payment_success h4{
text-align: center;
}
.separate2{
border-bottom: 3px solid #1ABB9C;
margin-top: 60px;
}
.underline{
border: none;
border-bottom: 1px solid black;
width: 80%; 
}
.total_amount_inwords{
border: none;
border-bottom: 1px solid black;
padding: 10px;
font-size: 20px;
width: 100%;
}
.group1{
 border: none;
border-bottom: 1px solid black;
}
.authority_name{
  border: none;
border-bottom: 1px solid black;
width: 300px;
}
.copy{
border: 1px solid black;
padding: 10px;
width: 400px;
}
.copy label b{  
color: red;
}
.group2{
display: inline-block;
}
.add_fees_button{
margin-left: 50vw;
}
.checkbox{
width: 10px;
margin-top: 10px;

}
.collapsible {
cursor: pointer;
background-color: #fff;
padding: 10px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 15px;
}

.content {
padding: 0 18px;
display: none;
overflow: hidden;
}
.modal_assessment{
width: 600px;
}
.modal_assessment .modal-body{
height: 400px;
overflow-y: auto;
position: relative;
}
.modal_assessment .modal-footer{
margin: 0;
margin-right: auto;
margin-left: auto;
position: relative;
}
.additional_fees{
background-color: #1ABB9C;
color: #fff;
}
.collapsible:hover{
background-color: #d3d5d8db;
} 
.custom_fee{
border-bottom: 1px solid #000;
width: 100%;
padding: 10px;
font-size: 15px;
}
#authority_of, #fee_assessor{
color: #2A3F54;
text-transform: uppercase;
text-align: center;
font-size: 22px;
font-weight: bold;
letter-spacing: 1px;
}
#applicant_name , #applicant_address{
color: #2A3F54;
text-transform: capitalize;
font-weight:bold;
letter-spacing: 1px;
}
#total_amount{
  border: none;
  text-align: center;
  font-weight: bold;
  color: #2A3F54;
  font-size: 16px;
  padding: 5px;
}
#total_amount_inwords{
  font-size: 18px;
  letter-spacing: 4px;
  text-transform: capitalize;
}
.save_payment_button{
  background-color: #1ABB9C;
  color: #fff;
}
.swal2-title {
  color: #FFF;
}
</style>

<body class="nav-md" id="main" >


   
     
 
 
  <div class="right_col" role="main" >
     <div class="">
         <div class="page-title">
             <div class="title_left">
                 <h3>Payment</h3>
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
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                     <div class="btn-group mr-2  " role="group" aria-label="First group">
          
                                <input type="text" name="" placeholder="Full name" id="search_applicant">
 
                       <button type="button" class="btn btn-secondary " id="search"><i class="fa fa-search"></i></button>
                       
                    
                     </div>
                
               </div>
                         
               
                                     
                 
 
 
               
                      <br>    
                      <div class="row">
                       <div class="col-md-12">
                           <div class="panel panel-default">
                               <div class="title_payment">
                               <center><h5><strong>ORDER OF PAYMENT</strong></h5>
                                 <p>(NOT VALID AS OFFICIAL RECEIPT UNLESS MACHINE VALIDATED)</p>
                               </center>
                             </div>
                     <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="applicant_name" name=""></span></h5></div>
                     
                      <div class="panel-heading"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="applicant_address" name=""></span></h5></div>
                     <div class="panel-body" id="panel-body">
                       
                         <table class="table table-striped table-bordered" id="data"  style="width:100%;">
                               <thead>
                                 <tr>
                                   <!-- <th>Select</th> -->
                                   
                                   <th>NATURE OF PAYMENT </th>
                                   <th>ACCOUNT CODE</th>
                                   <th >TOTAL</th>
 
                                 </tr>
                               </thead>
                               <tbody id="nature_payment_body">
                                 <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                 </tr>
                                 <tr>
                                   <td>TOTAL</td>
                                   <td></td>
                                   <td></td>
                                 </tr>
                                   
                                     
                                   </tbody>
                  
                                   </table>
                                   <h7><b>TOTAL AMOUNT (IN WORDS):</b></h7>
                                   <input type="text" name="" class="total_amount_inwords" id="total_amount_inwords">
                                   <br><br><br>
                                 
                                 <div class="form-group group2">
                                   <label>Offical Receipt No: </label>
                                   <input type="text" name="" class="group1" id="receipt_no"><br>
                                   <input type="hidden" id="assessmentId">
                                   <label>Amount Paid:</label>
                                   <input type="text" name="" class="group1" id="amount_paid"><br>
                                     <label>Payment Date:</label>
                                   <input type="date" name="" class="group1" id="date_paid"><br><br>
                                   <div class="copy">
                                     <label><b>Original</b>/ (Applicant/Owner's Copy)</label><br>
                                     <label><b>Duplicate</b>/ (GSB/Collecting Agent copy)</label><br>
                                     <label><b>Triplicate</b>/ (BFP copy)</label><br>
                                     
                                   </div>
 
                                 </div>
 
                                   <div class="form-group group2" style="float:right;margin-top: 30px;">
                                     <h5><b>BY AUTHORITY OF </b><span><input type="text" name="" class="authority_name" id="authority_of"></span></h5>
                                     <label style="float: right;">(Name of City/Municipal Fire Marshal)</label><br><br><br><br>
                                     
                                     
                                     <input type="text" name="" class="authority_name" id='fee_assessor'>
                                    <h5 style="margin-left:10%">Fire Code Fee Assesor</h5>
 
 
                                 </div>
 
 
                                  
                                 
 
                     </div>
                   </div>
                       </div>
                      
                      </div>  <br>
                       <div class="row">
                                     <div class="col-md-6"></div>
                                     <div class="col-md-6 ">
                                       <form>
                                   
                                      
                                       <div class="button-group total_body2 ">
                                           <button type="button" class="btn btn-secondary save_payment_button" id="save_payment_button"><i class="fa fa-save" ></i>  Save</button>
                                           <button type="button" class="btn btn-secondary " data-dismiss="modal" id="print_payment_button" style="display: inline-block;"  onclick="printDiv()"><i class="fa fa-print" ></i>  Print</button>
                                       </div>
                                       </form>
                                     </div>
                                   </div>      
                                         
                  
 
                                 
                                 </div>
                             </div>
                         </div>
                     </div>
  </div>
             <!--  payment_save_modal-->
   <div class="modal fade" id="payment_save_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header payment_success">
     
       <h4 class="modal-title" id="ModalTitle">Asssessment Successfully Saved!</h4>
 
         
       </div>
       <!-- <div class="modal-body">
     
       </div> -->
       <center>
 
         <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
 </center>
   </div>
 </div>
 </div>
 <div class="modal fade " id="search_modal" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalTitle"> Applicant's Name </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        
            <div class="row">
              <table class="table table-bordered">
                <tbody class="tbody_search">
                </tbody>
               
              </table>
            </div>
             <center>
        <button class="btn btn-dager" data-dismiss="modal" id="okModal"><i class="fa fa-arrow-left"> </i> Back</button>
        <button type="button" class="btn  " id="select_applicant" style="background-color: #1ABB9C;color:#fff;"><i class="fa fa-credit-card" ></i>Continue</button>
        
        </center>
       
    </div>
  </div>
</div>
</div>


 
  
 
     
   <script type="text/javascript">
     var coll = document.getElementsByClassName("collapsible");
     var i;
 
     for (i = 0; i < coll.length; i++) {
       coll[i].addEventListener("click", function() {
         this.classList.toggle("active");
         var content = this.nextElementSibling;
         if (content.style.display === "block") {
           content.style.display = "none";
         } else {
           content.style.display = "block";
         }
       });
     }
   </script>   
 <script>
   $(document).ready(function(){
     $('#search').on('click',function(e){
  
      $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
      var search =$('#search_applicant').val();
          if(search == ''){
          $('#search_applicant').focus();
          }else{
        
          $.ajax({
            type:'post',
            url:'{{ route('search_assessment') }}',
            data:{
              search:search
            },
            dataType: 'json',
            success:function(data){
              $('#search_modal').modal('show');
              $('.tbody_search').html(data.output);
            }
          })
          }
     });
    
     $(document).on('click','#select_applicant',function(e){
     e.preventDefault();
    var id= $('.optradio:checked').attr('id');
    
    $.ajax({
      type: 'post',
      url:'{{ route('select_assessment') }}',
      data:{
        id:id
      },
      dataType: 'json',
      success:function(data){
        $('#search_modal').modal('hide');
        $('#nature_payment_body').html(data.data);
        $.each(data.data3,function($key,$value){
          $('#applicant_name').val($value['Fname']+ ' ' +$value['Mname']+ ' '  + $value['Lname']);
          $('#applicant_address').val($value['purok']+ ', ' +$value['barangay']+ ', '  + $value['city']);
         ;
          $('#total_amount_inwords').val($value['total_amount_words']);
          $('#receipt_no').val($value['receipt_no']);
          $('#assessmentId').val($value['assessmentId']);
        });
        $.each(data.data2,function($key, $value){
          $('#defaultId').val($value['id']);
          $('#authority_of').val($value['authority_of']);
          $('#fee_assessor').val($value['fee_assessor']);
        });
        
      }
    })
  
   });
   var adminPass='{{Session::get('adminID')['password']}}';

   $('#save_payment_button').on('click',function(e){
     var assessmentId=   $('#assessmentId').val();
     var amount_paid=   $('#amount_paid').val();
     var date_paid=   $('#date_paid').val();
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
                                      url: '{{ route('save_payment') }}',
                                      data:{
                                        assessmentId:assessmentId,
                                        amount_paid:amount_paid,
                                        date_paid:date_paid
                                      },
                                      dataType: 'json',
                                      success:function(data){
                                         toastr.success(data.msg);
                                       swal.close();
                                        $('.payment_checkbox').prop( "checked", false );
                                      $('.optradio').prop( "checked", false );
                                      $('#total_amount_inwords').val('');
                                      $('#receipt_no').val('');
                                    $('#defaultId').val('');
                                    $('#nature_payment_body').html("<tr><td></td> <td></td> <td></td></tr>");
                                    $('#applicant_name').val('');
                                    $('#applicant_address').val('');
                                    $('#authority_of').val('');
                                    $('#fee_assessor').val('');
                                    $('#search_applicant').val('');
                                    $('#total_amount').val('');
                                    $('#amount_paid').val('');
                                    $('#date_paid').val('');
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


   })
   })
 </script>
 
@endsection 