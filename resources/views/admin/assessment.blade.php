@extends('admin/include.navbar')
@section('title','Assessment')
@section('content')
  <style type="text/css">
      table tbody tr td input{
        border: none;
        background-color: transparent;
        padding: 5px;
        text-align: center;
         font-size: 16px;


      }
      table tbody tr td input:hover{
        border: 1px solid #2A3F54;


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
.panel-default{
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
  text-align: center;
  font-size: 18px;
  letter-spacing: 4px;

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

.content2 {
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
#print_payment_button{
  background-color: #2A3F54;
  color: #fff;
}
.swal2-title {
  color: #FFF;
}

#search_applicant {
   font-family: 'Times New Roman', Times, serif;
  font-size: 20px;
  padding-left: 0.5em;
}

#search_fee {
   font-family: 'Times New Roman', Times, serif;
  font-size: 15px;
  padding-left: 0.5em;
}
.tbody_searchSelect{
    padding: 9px;
}
.tbody_searchSelect h5{
    font-size: 16px;
    margin-bottom: 10px;
}
.tbody_searchSelect span > input{
    margin-right: 10px;
}
.typeAssessment .col-sm-6{
    display: flex;
    gap: 10px;
    margin-top: 2px;
}
.top-header .right{
    float: right;
}
#errorSearch{
    color: red;
    letter-spacing: 1.5px;
    opacity: 0.8;
}
  </style>


 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Assessment</h3>
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
                 <div class="top-header" role="toolbar" aria-label="Toolbar with ">
                    <div class="btn-group mr-2  " role="group" aria-label="First group">
                        <input type="text" name="" placeholder="Search.." id="search_applicant"
                        value="<?php if($Fname !=="blank") echo $Fname ?>">
                      <button type="button" class="btn btn-secondary " id="search"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="right">
                        <button class="btn btn-default add_fees_button"><i class="fa fa-plus fa-lg"  ></i> Add Fees</button>
                     </div>

                <div class="second-layer">
                    <span id="errorSearch"></span>
                </div>
              </div>







                     <br>
                     <div class="row">
                      <div class="col-md-12">
                          <div class="panel panel-default">
                              <div class="title_payment">
                              <center><h5><strong>ASSESSMENT FEE</strong></h5>
                              </center><br><br>
                            </div>
                    <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="applicant_name" name="" readonly></span></h5></div>
                     <div class="panel-heading" style="display: none"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="applicant_address" name=""></span></h5></div>
                    <div class="panel-body" id="panel-body">

                        <table class="table table-striped table-bordered" id="data"  style="width:100%;">
                              <thead>
                                <tr>
                                  <!-- <th>Select</th> -->

                                  <th>NATURE OF PAYMENT </th>
                                  {{-- <th>ACCOUNT CODE</th> --}}
                                  <th >TOTAL</th>

                                </tr>
                              </thead>
                              <tbody id="nature_payment_body">
                                <tr>
                                  <td></td>
                                  <td></td>
                                </tr>

                                  </tbody>
                                  <thead>
                                      <td>TOTAL</td>
                                      <td><input type="number" id="total_amount" class="total_amount" readonly></td>
                                  </thead>

                                  </table>
                                  <div class="typeAssessment">
                                    <div><h5>Type of Assessment:</h5></div>
                                    <div class='row'>
                                        <div class='col col-md-12'>
                                            <div class='col-sm-6'>
                                                <input type='radio' name='assessmentType' class='assessmentType' value='print certificate'>
                                                print certificate
                                            </div>
                                            <div class='col-sm-6'>
                                                <input type='radio' name='assessmentType' class='assessmentType' value='fines and pinalties '>
                                                fines and pinalties </div>
                                            <div class='col-sm-6'>
                                                <input type='radio' name='assessmentType' class='assessmentType' value='application'>
                                                application </div>
                                            <div class='col-sm-6'>
                                                <input type='radio' name='assessmentType' class='assessmentType' value='renewal'>
                                                renewal </div>
                                        </div>
                                    </div>
                                  </div>
                                  <h7 style="display: none"><b>TOTAL AMOUNT (IN WORDS):</b></h7>
                                  <input type="text" name="" class="total_amount_inwords" id="total_amount_inwords"   style="display: none" >
                                  <br><br><br>

                                <div class="form-group group2" style="display: none" >
                                  <label>Official Receipt No: </label>
                                  <input type="text" name="" class="group1" id="receipt_no"><br>
                                  <input type="text" name="" class="group1" id="applicationId"><br>


                                <br>
                                   <br><br>
                                  <div class="">
                                    <label></label><br>
                                    <label></label><br>
                                    <label></label><br>

                                  </div>

                                </div>

                                  <div class="form-group group2" style="float:right;margin-top: 30px;display: none"  >
                                    <h5><b>BY AUTHORITY OF </b><span><input type="text" name="" class="authority_name" id="authority_of" readonly style="width: 400px"></span></h5>
                                    <input type="hidden" name="" id="assessmentType">
                                    <label style="margin-left:45%">(Name of City/Municipal Fire Marshal)</label><br><br><br>
                                    <input type="text" name="" class="authority_name" id="fee_assessor" readonly>
                                    <input type="hidden" id="defaultId">
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
                                          <button type="button" class="btn  save_payment_button" id="save_payment_button" style="display: none"><i class="fa fa-save" ></i>  Save</button>
                                          {{-- <button type="button" class="btn print_payment_button"  id="print_payment_button" style="display: inline-block;"  onclick="printDiv()"><i class="fa fa-print" ></i>  Print</button> --}}
                                      </div>
                                      </form>
                                    </div>
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
<!-- Add fees -->
<div class="modal fade " id="add_fees" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md modal_assessment">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalTitle">FEES</h4>

          <div class="btn-group mr-2  " role="group" aria-label="First group">

                               <input type="text" name="" placeholder="Search fees.." id="search_fee">
                      <button type="button" class="btn btn-secondary " id="search_fee_form"><i class="fa fa-search"></i></button>


                    </div>


        </div>
        <div class="modal-body">

              <div class="row">
                <table class="table table_assessment">
                  <thead>
                     <tr>
                      <td style="width: 25px;">#</td>
                      <td>Nature of Payment</td>
                    </tr>
                     </thead>
                    <tbody class="tbody_fees" >


                  </tbody>
                  <tbody>
                    <tr >
                      <td ></td>
                       <td  class="table_other_fees">

                     </td>
                     </tr>

                  </tbody>
                  <tbody class="custom_fees"  >


                  </tbody>




                </table>
              </div>

      </div>
          <div class="modal-footer">

            <button class="btn btn-dager" data-dismiss="modal" id="okModal"><i class="fa fa-arrow-left"> </i> Back</button>
            <button type="button" class="btn  additional_fees" ><i class="fa fa-credit-card" ></i>  Add fees</button>

              </div>
    </div>
  </div>
</div>

 <!-- search applicant -->

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
                <div class="tbody_searchSelect"></div>
              </div>
               <center>
          <button class="btn btn-dager" data-dismiss="modal" id="okModal"><i class="fa fa-arrow-left"> </i> Back</button>
          <button type="button" class="btn  " id="select_applicant" style="background-color: #1ABB9C;color:#fff;"><i class="fa fa-credit-card" ></i>Continue</button>

          </center>

      </div>
    </div>
  </div>
</div>
<!-- save payment -->
<div class="modal fade " id="save_payment" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalTitle">Save Assessment </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Type of application</label>
              <input type="" name="" readonly="" value="Fires satety inspection certificate" class="form-control">
            </div>
            <div class="form-group">
              <label>Control Number</label>
              <input type="" name="" readonly="" class="form-control" value="07122021-0094">
            </div>

            <!-- <div class="form-group">
              <label>Date Applied</label>
              <input type="" name="" readonly="" value="June 9 2021 13:03:56 am" class="form-control">
            </div> -->

            <div class="form-group">
              <label>Total Payment</label>
              <input type="" name="" readonly="" value="600" class="form-control" id="total_payment">
            </div>

           <input type="hidden" name="" id="application_id2" readonly="" class="form-control" >
       <input type="hidden" name="" id="status" readonly="" class="form-control" >



          <center>
          <button type="button" class="btn btn-dager" data-dismiss="modal" ><i class="fa fa-arrow-left"> </i> Back</button>
          <input type="hidden" name="" id="type_applicationDelete">
          <button type="button" class="btn btn-warning save_payment" data-dismiss="modal" id="save_payment"><i class="fa fa-save" ></i> Save Assessment</button>

          </center>
          </form>
      </div>
    </div>
  </div>
</div>




    <div class="modal fade " id="renew_success" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content modal-sm">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalTitle">Successfully Applied for renewal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


          <center>
          <button class="btn btn-success" data-dismiss="modal" id="okModal"><i class="fa fa-check"> </i> Ok</button>
          <input type="hidden" name="" id="type_applicationDelete">


          </center>
      </div>
    </div>
  </div>

<script>
      var coll = document.getElementsByClassName('collapsible');
      var i;
      for (i = 0; i < coll.length; i++) {
        coll[i].document.addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
      function printDiv() {
            var divContents = document.getElementById("panel-body").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<body > <h1>Application Payment<br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>

<script type="text/javascript">
    $(document).ready(function(){
      var adminPass='{{Session::get('adminID')['password']}}';
      $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
    var count=0;
  load_fees();
    function load_fees(search = ''){

      $.ajax({
        method:'post',
        url: "{{ route('load_fees') }}",
        data:{
          search:search
        },
        dataType:'json',
        success:function(data){
         $('.tbody_fees').html(data.data);
         $('.table_other_fees').html(data.others);
         $('.custom_fees').html(data.custom);


        }
      })
    }
    var availableTags = [];
getData();
function getData(){
    $.ajax({
        url:"{{ route('getApplicant') }}",
        type:'get',
        dataType: 'json',
        success:function(data){
           $.each(data.data, function($key , $value){
                availableTags.push($value['Fname']+' '+$value['Lname']);
           });
        }
    })
}
  loadSuggest();
    function loadSuggest(){
    $( "#search_applicant" ).autocomplete({
        source: availableTags
    });
    }
    $('.add_fees_button').on('click',function(e){
    e.preventDefault();
    $('#add_fees').modal('show');

  });
  $('#search_fee_form').on('click',function(e){
    e.preventDefault();
    var search=$('#search_fee').val();
    if(search =='' && count ==0){
      $('#search_fee').focus();
    }else{
      count +=1;
      load_fees(search);

    }
  });

  $(document).on('click','.collapsible',function(e){
    e.preventDefault();
    $id = $(this).attr('id')
    content_id = '.content2'.concat($id);
    $(content_id).slideToggle('fast');
  })

$(document).on('click','.collapsible2',function(e){
  e.preventDefault();
    content_id = '.content';
    $(content_id).slideToggle('fast');
})
$(document).on('click','.collapsible3',function(e){
  e.preventDefault();
    content_id = '.content3';
    $(content_id).slideToggle('fast');
});

  $(document).on('click','#search',function(e){
        e.preventDefault();
    var search =$('#search_applicant').val();

    if(search == ''){
      $('#search_applicant').focus();
      }else{
       $.ajax({
         type: 'post',
         url: '{{ route('search_applicant_fetch') }}',
         data:{
           search:search
         },
         dataType:'json',
         success:function(data){
           if(data.code == 400){
            $('#errorSearch').html(data.msg);
           }else{
            hideSaveButton();
            $('#errorSearch').html('');
            $.each(data.data,function($key,$value){
            $('#applicant_name').val($value['Fname']+ ' ' +$value['Mname']+ ' '  + $value['Lname']);
            $('#applicant_address').val($value['address']['purok']+ ', ' +$value['address']['barangay']+ ', '  + $value['address']['city']);
            $('#applicationId').val($value['applicationId']);
            });
            $.each(data.data2,function($key, $value){
            $('#authority_of').val($value['authority_of']);
            $('#fee_assessor').val($value['fee_assessor']);
            $('#defaultId').val($value['id']);
            });
           }
         }
       })
      }
      });
  $('.additional_fees').click(function(e){
    e.preventDefault();
    var checkbox= $('.payment_checkbox:checked');

    if(checkbox.length>0){
      var checkbox_value=[];
      $(checkbox).each(function(){
        checkbox_value.push($(this).val());
      });

      $.ajax({
        type:'post',
        url: '{{ route('select_fees') }}',
        data:{
          checkbox_value:checkbox_value
        },
        dataType: 'json',
        success:function(data){
          $('#nature_payment_body').html(data.output);
          $('#add_fees').modal('hide');
          $('#total_amount').val(data.total);
          assessment_total(data.total);
          hideSaveButton();
        }
      })
    }else{
      $('#nature_payment_body').html("<tr><td></td> <td></td> <td></td></tr>");
      $('#add_fees').modal('hide');

    }

  })
function hideSaveButton(){
    var checkbox= $('.payment_checkbox:checked');
    var checkbox2= $('.assessmentType:checked');
    var applicant_name = $('#applicant_name').val();
    if(checkbox.length>0 && checkbox2.length>0 && applicant_name != '' ){
        $('#save_payment_button').css('display','block');
    }else{
        $('#save_payment_button').css('display','none');
    }
}
$('.assessmentType').change(function(){
    hideSaveButton();
});
function assessment_total(sum_value){
    $.ajax({
    type: "POST",
    url: "{{ route('numberTowords') }}",
    data:{
    num:sum_value
    },
    dataType: 'json',
    success:function(data){
        $('#total_amount_inwords').val(data.data +' ' +  'Pesos');

    }
    })

};
  $("#save_payment_button").on('click',function(e){
    e.preventDefault();
    var checkbox= $('.payment_checkbox:checked');
    var id=$('.optradio:checked').attr('id');
    var applicationId=$('#applicationId').val();
    var total_amount =$('#total_amount').val();
    var name = $('#applicant_name').val();
    var assessmentType = $('.assessmentType:checked').val();
    console.log(assessmentType);
   var total_amount_words = $('#total_amount_inwords').val();
    var receipt_no=$('#receipt_no').val();
    var defaultId= $('#defaultId').val();
        if(checkbox.length>0){
          var checkbox_value=[];
          $(checkbox).each(function(){
            checkbox_value.push($(this).val());
          });
        }

    if(name != ''){

    Swal.fire({
         title:"Save Assessment",
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
                $.ajax({
                              type: 'post',
                              url: '{{ route('save_assessment') }}',
                              data:{
                                id:id,
                                total_amount_words:total_amount_words,
                                total_amount:total_amount,
                                applicationId:applicationId,
                                receipt_no:receipt_no,
                                defaultId:defaultId,
                                checkbox_value:checkbox_value,
                                assessmentType:assessmentType
                              },
                              dataType:'json',
                              success:function(data){
                                if(data.code !== 400){
                                            swal.close();
                                    toastr.success(data.msg);
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
                                }else{
                                    toastr.error(data.msg);
                                }

                              }
                            });

             },


               });
    }

  });
$(document).on('click','.deleteAssessment',function(e){
    var assessmentId = $(this).attr('id');
    Swal.fire({
        title:"Delete Assessment",
        icon: 'warning',
        // iconHtml: '<i class="fa fa-check"></i>',
        // iconColor: '#42ba96',
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
            $.ajax({
                type:'post',
                url: '{{ route('deleteAssessment') }}',
                data:{
                    assessmentId :assessmentId
                },
                dataType: 'json',
                success:function(data){
                    toastr.success(data.msg);
                    $('#search_modal').modal('hide');
                }
            })
        },
        });

})
  $(document).on('change','.assessment_input',function(e){
    e.preventDefault();
    var account_code =$(this).val();
    var id= $(this).attr('id');

    $.ajax({
      type: 'post',
      url: '{{ route('udpate_account_code') }}',
      data:{
        id:id,
        account_code:account_code,
      },
    dataType:'json',
    success:function(data){

    }
    })

  });
  $(document).on('change','.assessment_total',function(e){
    e.preventDefault();
    var assessment_total =$(this).val();
    var id= $(this).attr('id');

    $.ajax({
      type: 'post',
      url: '{{ route('assessment_total') }}',
      data:{
        id:id,
        assessment_total:assessment_total,
      },
    dataType:'json',
    success:function(data){

    }
    })
  })
      })
  </script>

@endsection
