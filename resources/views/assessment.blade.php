@extends('include.navbar')
@section('title','Assessment')
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
                 <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2  " role="group" aria-label="First group">
         
                               <input type="text" name="" placeholder="Full name">

                      <button type="button" class="btn btn-secondary " id="search"><i class="fa fa-search"></i></button>
                      
                   
                    </div>
                  <button class="btn btn-default add_fees_button"><i class="fa fa-plus fa-lg"  ></i> Add Fees</button>
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
                    <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="owners_name" name=""></span></h5></div>
                     <div class="panel-heading"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="owners_name" name=""></span></h5></div>
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
                              <tbody >
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
                                  <input type="text" name="" class="total_amount_inwords">
                                  <br><br><br>
                                
                                <div class="form-group group2">
                                  <label>Official Receipt No: </label>
                                  <input type="text" name="" class="group1"><br>
                                <br>
                                   <br><br>
                                  <div class="">
                                    <label></label><br>
                                    <label></label><br>
                                    <label></label><br>
                                    
                                  </div>

                                </div>

                                  <div class="form-group group2" style="float:right;margin-top: 30px;">
                                    <h5><b>BY AUTHORITY OF </b><span><input type="text" name="" class="authority_name"></span></h5>
                                    <label style="float: right;">(Name of City/Municipal Fire Marshal)</label><br><br><br>
                                    <input type="text" name="" class="authority_name">
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
          <h4 class="modal-title" id="ModalTitle">Fees</h4>
          <div class="btn-group mr-2  " role="group" aria-label="First group">
         
                               <input type="text" name="" placeholder="search fee">

                      <button type="button" class="btn btn-secondary " id="search"><i class="fa fa-search"></i></button>
                      
                   
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
                    <tbody >
                     <tr >
                     <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                      <td>  
                        <button type="button" class="collapsible"><b>Fire Safety Inspection Fee (For Business and Occupancy)</b></button>
                        <div class="content">
                          <p>•  Fee charged for the conduct of Fire Safety Inspection equivalent to fifteen percent (15%) of all fees charged by the Local Government Unity, but in no case shall be lower than Five Hundred Pesos.</p>
                        </div>
                    </td>
                    </tr>
                   
                    
                    
                   
                   
                     
                  
                      
                       <tr >
                     <td ></td>
                      <td>  
                        <button type="button" class="collapsible"><b>Others</b></button>
                        <div class="content">
                          <table>
                            <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                                <p>a. Appeal fee mentioned under Rule 14 of this RIRR - 1,000.00
                           </p>
                     
                          </td>
                        </tr> 
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>b. Certified True copy of Fire Safety Inspection Certificate,
Building Fire Safety Clearance, and Fire Clearance  -  350.00

                           </p>
                     
                          </td>
                        </tr> 
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>c.  Electrical Installation

                           </p>
                     
                          </td>
                        </tr>
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>d.  Filing Fee for Fire Safety Evaluation Certificate (FSEC)  - 200.00

                           </p>
                     
                          </td>
                        </tr>  
                          <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>e.  Fire Drill            - 1,000.00

                           </p>
                     
                          </td>
                        </tr> 
                       <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>f.  Fire Incident Clearance         - 350.00

                           </p>
                     
                          </td>
                        </tr> 
                       <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>g.  Fire Prevention and Safety Seminar      -   2,000.00

                           </p>
                     
                          </td>
                        </tr>
                        <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>h.  Fireworks Display         - 1,049.00

                           </p>
                     
                          </td>
                        </tr>
                       <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>i.  Fumigation/Fogging          - 350.00

                           </p>
                     
                          </td>
                        </tr>
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>j.  Open Flame            - 525.00

                           </p>
                     
                          </td>
                        </tr>
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>k.  Protest Fee mentioned under Rule 14 of this RIRR  - 500.00

                           </p>
                     
                          </td>
                        </tr>
                           <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>l.  Soundstage and Approved Production Facilities and Locations -   2,000.00

                           </p>
                     
                          </td>
                        </tr> 
                         <tr >
                           <td ><input type="checkbox" name="optradio" class="checkbox" ></td>
                            <td>  
                      
                       <p>m.  Welding, Cutting, and other Hotworks
                           </p>
                     
                          </td>
                        </tr> 
                          </table>
                         
               
                        </div>
                    </td>
                    </tr>
                      <tr >
                     <td ></td>
                      <td>  
                        <button type="button" class="collapsible"><b>Custom Fee</b></button>
                        <div class="content">
                         <input type="text" name="" class="custom_fee" placeholder="Nature of payment">
               
                        </div>
                    </td>
                    </tr>
                  </tbody>
                   
                     
                  
                 
                </table>
              </div>
        
      </div>
          <div class="modal-footer">
                
            <button class="btn btn-dager" data-dismiss="modal" id="okModal"><i class="fa fa-arrow-left"> </i> Back</button>
            <button type="button" class="btn  additional_fees" data-dismiss="modal" id=""><i class="fa fa-credit-card" ></i>  Add fees</button>
        
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
                 
                </table>
              </div>
               <center>
          <button class="btn btn-dager" data-dismiss="modal" id="okModal"><i class="fa fa-arrow-left"> </i> Back</button>
          <input type="hidden" name="" id="type_applicationDelete">
          <button type="button" class="btn btn-warning " data-dismiss="modal" id="addPayment_application"><i class="fa fa-credit-card" ></i>Continue</button>
          
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
                 
<script type="text/javascript">
    $(document).ready(function(){
      $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
    function load_fees(search = ''){
      
      $.ajax({
        method:'post',
        url: "{{ route('load_fees') }}",
        data:{
          search:search
        },
        dataType:'json',
        success:function(data){
          alert(data.data);
          // $.each(data.data, function(key, value){
          //   alert(key + ':'+ value);
          // })
        }
      })
    }
  
    $(document).on('click','.additional_fees',function(e){
      e.preventDefault();

      $('#additional').html('<h5>Additional Fees</h5><table class="table table-bordered"><tr><th>#</th><th style="width:750px">Discription</th><th style="width:200px;">Amount</th></tr><tr><td>1</td><td>Sample fee number 1</td><td>100</td></tr></table>');
          $('#total_payment').val('600');


    
    })
  $('.add_fees_button').on('click',function(e){
    e.preventDefault();
    load_fees();
    $('#add_fees').modal('show');

  })
$('.save_payment_button').on('click',function(e){
  e.preventDefault();

  $('#save_payment').modal('show');


 
})
$('.save_payment').on('click',function(e){
  e.preventDefault();

    $('#payment_save_modal').modal('show');

})
      
  $(document).on('click','#search',function(e){
        e.preventDefault();

$('#search_modal').modal('show');

      
      })

   $('#addPayment_application').on('click',function(e){
        e.preventDefault();


          $('#application_id_payment').val(1);
          $('#control_number').val("C32122");
          $('#owners_name').html("Joylan Panungcat");
          $('#dataBody').html('  <tr><td>1</td><td>FSEC</td> <td>Joylans Store</td> <td>Prk2, San Francisco</td><td>July 10 2021</td><td>500</td> </tr> ');
          $('#total_payment').val('500');

       

      
      })
           
                            
      })
  </script>

@endsection