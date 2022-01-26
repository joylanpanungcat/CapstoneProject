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
.select2{
  display: inline-block;
}
div.from{
float: left;
  display: inline-block;

}
div.from label{
  display: inline;
}
 .title_right .from{
        float: right;
      }
.separate2{
  border-bottom: 3px solid #1ABB9C;
  margin-top: 60px;


}
  </style>

<div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Schedule List</h3>
               
            </div>
            
             <div class="title_right">
                 <div class="form-group from">
         
                  <label><b> To:</b></label>
                      <select class="form-control select2" style="width:150px;"  >
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                      </select>
              </div>
               <div class="form-group from">
         
                  <label><b> From:</b></label>
                      <select class="form-control select2" style="width:150px;"  >
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                      </select>
              </div>
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
                                        <div class="form-group from">
                                          <div id="show"></div>
         
                  <label><b> Sort:</b></label>
                      <select class="form-control select2" style="width:200px;"  >
                        <option>All</option>
                        <option>FSEC</option>
                        <option>FSIC for Business</option>
                        <option>FSIC for Occupancy</option>
                
                       
                      
                      </select>
              </div>
                       <table class="table table-striped table-bordered" id="data" style="width:100%;">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Owner's Name</th>
                               
                                  <th>Type of Application</th>
                                     <th>Location</th>
                                  <th>Inspector Name</th>
                                    <th>Date of Inspection</th>
                                    <th>Action</th>
                                   
                                </tr>
                              </thead>
                                 
                 
                                  </table>

                                </div>

                            </div>
<!-- 
              <div class="button-group">
                                      <button type="button" class="btn btn-secondary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
                                      <button type="button" class="btn btn-primary" onclick="download()"><i class="fa fa-download"></i> Download</button>
                                  </div>   -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update schedule -->
        <div class="modal fade" id="update_schedule" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">

                       <h5 class="modal-title">Update Schedule<br><small id="Fname"></small><small id="Lname"></small></h5>
                  
                  </div>
                  <form method="post">
                  <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Date of Inspection</label>
                            <input type="date" name="" id="date_schedule" class="form-control">
                        </div>
                        <input type="hidden" name="" id="schedule_id">
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning " id="update_schedule_button" ><i class="fa fa-calendar"></i> Update</button>
                  </div>

                </div>
                    </form>
              </div>
            </div>
          </div>
<!-- delete Success -->
     <div class="modal fade" id="delete_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header payment_success">
    
      <h4 class="modal-title" id="ModalTitle">Schedule deleted Successfully!</h4>

        
      </div>
      <!-- <div class="modal-body">
    
      </div> -->
      <center>

        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
</center>
  </div>
</div>
</div>



  
     
 



@endsection 