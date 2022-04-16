
@extends('admin/include.navbar')
@section('title','applicant account')
@section('content')

<div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

        </div>



        <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">

                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Account Profile  <small></small></h2>



                                    <div class="clearfix"></div>
                                </div>
                              <div class="col-md-12 applicant-account">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div id="showDetail"></div>

                                    </div>



                            <div class="col-md-4 " style="margin-top: 3%;" >



                                <img src="../assets/images/" class="profile2">
                                <h5 class="Applicant">{{$account_details['Fname']}} {{$account_details['Lname']}}</h5>

                            </div>

                              <!--   <div class="buttons">
                                  <button class="btn btn-secondary buttons" id="compose" ><i class="fa fa-envelope-o"></i></button>
                                  <button class="btn btn-secondary buttons" ><i class="fa fa-phone"></i></button>
                                </div> -->
                                <div class="col-md-4 ">
                                 <form method="post">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="" id="contact_numDetails" class="form-control" value="{{$account_details['contact_num']}}">
                                </div>
                                 <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="" id="passwordDetails" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="" id="contact_numDetails" class="form-control" value="" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Date Register</label>
                                    <input type="text" name="" id="date_registerDetails" class="form-control" value="" readonly>
                                </div>
                                   </div>
                                <div class="col-md-4">
                                <h4>Address</h4>
                                     <div class="form-group">
                                        <label>Purok</label>
                                        <input type="text" name="" class="form-control" id="purokDetails" value="" >
                                    </div>
                                     <div class="form-group">
                                        <label>Barangay</label>
                                        <input type="text" name="" class="form-control" id="barangayDetails" value="">
                                    </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="" class="form-control" id="cityDetails" value="" readonly>
                                </div>
                                  <div class="form-group">
                                    <button type="submit" name="" class="btn btn-secondary updateDetails" id="">Update</button>
                                </div>
                                </div>
                                   </form>

                         </div>
                         <div class="col-md-12">
                              {{-- <hr class="separate"> --}}
                                <div class="x_title">
                                    <h2>Transaction  <small></small></h2>


                                    <div class="clearfix"></div>
                                </div>
                         </div>

                            <div class="col-md-12">

                      <!-- <div class="profile_title"> -->
                      <!--   <div class="col-md-6">
                          <h2>Login Record</h2>
                           <div id="chart" style="width:700px"></div>
                        </div> -->

                      <!-- </div> -->
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Application</a>
                          </li>
                           <li role="presentation" class="active"><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Uploaded Documents</a>
                          </li>
                          <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Invoices</a>
                          </li> -->
                           <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Payment History</a>
                          </li>
                           <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Inspection report</a>
                          </li>
                             <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Certificate</a>
                          </li>

                        </ul>

                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <div id='showDelete'></div>
                         <div class='container'>
                            <table class='table table-bordered table'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type of application</th>
                                        <th>Control Number</th>
                                        <th>Business Name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($account_details->application as $application)

                                      <tr>
                                             <td>{{$application['type_application']}}</td>
                                      </tr>
                                @empty
                                 <tr>
                                        <td align='center' colspan='6' style="color: red;"><i class='fa fa-warning'></i>No Application</td>

                                        <tr>"

                                  @endforelse


                                  </tbody>

                            </table>
                        </div>
                             </div>
                                  <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                   <div id="GFG" >
                           </div>
                                  </div>
                              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                <h1>This is payment content</h1>

                          </div>
                              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="row">
                                </div>
                              </div>
                               <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                <div class="x_title">

                                </div>
                            </div>
                                </div>
                               </div>
                               <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                            </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade " id="view_evaluation" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalTitle">Evaluation Reports</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <div class="x_panel">

                    <div class="x_content">
                        <form class="form-horizontal form-label-left">
                            <h6><b>Business Details</b></h6>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Type of Application</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Fire Safety Evaluation Clearance" readonly="">
                            </div>
                        </div>
                         <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Control Number</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="070321-0003" readonly="">
                            </div>
                        </div>
                         <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="joylan's store" readonly="">
                            </div>
                        </div>
                         <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Owner's Name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Joylan Panungcat" readonly="">
                            </div>
                        </div>
                         <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Location</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Prk2, San francisco Panabo City" readonly="">
                            </div>
                        </div><br>
                        <h6><b>Inspection Information</b></h6>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Inspector Name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Joylan Panungcat" readonly="">
                            </div>
                             <label class="control-label col-md-3 col-sm-3 ">Emergency Light</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Yes" readonly="">
                            </div>
                               <label class="control-label col-md-3 col-sm-3 ">No Fire extinguisher</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="1" readonly="">
                            </div>

                               <label class="control-label col-md-3 col-sm-3 ">Building Equipped with fire alarms</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Yes" readonly="">
                            </div>
                               <label class="control-label col-md-3 col-sm-3 ">Vulnerable to hazzard marterials</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="Yes" readonly="">
                            </div>
                               <label class="control-label col-md-3 col-sm-3 ">Number of flamables materials</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="1" readonly="">
                            </div>
                             <label class="control-label col-md-3 col-sm-3 ">Defects</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="N/A" readonly="">
                            </div>
                              <label class="control-label col-md-3 col-sm-3 ">Recommendation</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="N/A" readonly="">
                            </div>
                              <label class="control-label col-md-3 col-sm-3 ">Inspection Status</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" value="approved" readonly="">
                            </div>


                        </div>



                    </form>
                    </div>
                            </div>

                                <center>
          <button class="btn btn-primary" data-dismiss="modal" ><i class="fa fa-arrow-left"></i> Back</button></center>

        </div>






      </div>
    </div>
  </div>


  <div class="modal fade" id="payment_success" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Payment Send Successfully</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form method="post">

        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>

        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- View Payment -->

   <div class="modal fade" id="view_payment" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Payment Information</small></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form method="post">
        <div class="modal-body">
          <div class="form-group">
              <div class="form-group">
                  <label>Type of Application</label>
                  <input type="text" name="" readonly="" id="" class="form-control" value="Fire Safety Evaluation Clearance">
              </div>
              <div class="form-group">
                  <label>Type of Occupancy</label>
                  <input type="text" name="" readonly="" id="" class="form-control" value="Mercantile">
              </div>
              <div class="form-group">
                  <label>Total Payment</label>
                  <input type="text" name="" readonly="" id="" class="form-control" value="500">



              </div>
              <div class="form-group">
                  <label>Amount</label>
                  <input type="text" name=""  id="" class="form-control" readonly="" value="500">
              </div>
             <div class="form-group">
                  <label>Date Paid</label>
                  <input type="text" name=""  id="" class="form-control" value="07/04/2021 13:04:45 PM" >
              </div>
              <input type="hidden" name="" id="application_id_payment">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

        </div>
    </form>
      </div>
    </div>
  </div>
<!-- Modal Payment -->
  <div class="modal fade" id="addPayment" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Add payment to>><br><small id="owners_payment"></small></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form method="post">
        <div class="modal-body">
          <div class="form-group">
              <div class="form-group">
                  <label>Type of Application</label>
                  <input type="text" name="" readonly="" id="type_application_payment" class="form-control">
              </div>
              <div class="form-group">
                  <label>Type of Occupancy</label>
                  <input type="text" name="" readonly="" id="type_occupancy_payment" class="form-control">
              </div>
              <div class="form-group">
                  <label>Total Payment</label>
                  <input type="text" name="" readonly="" id="total_payment" class="form-control" value="500">



              </div>
              <div class="form-group">
                  <label>Amount</label>
                  <input type="text" name=""  id="amount_payment" class="form-control" >
              </div>

              <input type="hidden" name="" id="application_id_payment">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning " id="payment_send" ><i class="fa fa-paper-plane-o"></i>Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- viewCetificate -->

<div class="modal fade" id="viewCertificate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" >

                        <div class="modal-content">

                           <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fire inpspection doccuments</h2>
                 <!--    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <center>
                                <img src="../assets/images/form1.jpg" class="image1">
                            </center>

                                  </div>
                                  <div class="button-group">
                                      <button type="button" class="btn btn-secondary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
                                      <button type="button" class="btn btn-primary" onclick="download()"><i class="fa fa-download"></i> Download</button>
                                  </div>
                  </div>
                </div>
              </div>
                        </div>
                      </div>
                  </div>
  <!-- viewFile -->
   <div class="modal fade" id="viewFiles_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" >

                        <div class="modal-content">

                           <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fire inpspection doccuments</h2>
                 <!--    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Upload files here..</p>
                    <form action="application.profile.php" class="dropzone"></form>
                    <br />
                    <br />
                    <br />
                    <br />
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
              </div>
                        </div>
                      </div>
                  </div>
<!-- view_modal -->
  <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" >

                        <div class="modal-content">
                          <div class="modal-header">
                            <center>
                            <h2  id="exampleModalLabel " > APPLICATION INFORMATION</h2>
                            </center>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id=showEdit></div>
                            <form method="post" id="applicationAdd">
                                <h6>Personal Information</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Last Name</th>
                                            <th>Contact Number</th>
                                            <th>Purok</th>
                                            <th>Barangay</th>
                                            <th>City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                             <td><input type="text" name="" id="Fname" class="form-control" ></td>
                              <td><input type="text" name="" id="Lname" class="form-control" ></td>
                              <td><input type="text" name="" id="contact_num" class="form-control" ></td>
                              <td><input type="text" name="" id="purok" class="form-control" ></td>
                                             <td><input type="text" name="" id="barangay" class="form-control"></td>
                                             <td><input type="text" name="" id="city" class="form-control" ></td>


                                        </tr>
                                    </tbody>
                                </table><br>
                                <h6>Business Information</h6>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Type Of Application</th>
                                            <th>Control Number</th>
                                            <th>Type of Occupancy</th>
                                            <th>Nature of Business</th>
                                             <th>Business Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <!-- <td><select class="form-control" id="type_application2">
                                        <option value="Fire Safety Evaluation Clearance " id="type_application2">Fire Safety Evaluation Clearance </option>
                                        <option value="FSIC for Occupancy " id="status">FSIC for Occupancy </option>
                                        <option  value="FSIC for Business">FSIC for Business </option>
                                        <option  value="FSIC for Business Renewal">FSIC for Business Renewal</option>
                                                </select></td> -->
                            <td><input type="text" name="" id="type_application" class="form-control" ></td>
                             <td><input type="text" name="" id="control_number" class="form-control"  readonly=""></td>

                        <td><input type="text" name="" id="type_occupancy" class="form-control" ></td>
                         <td><input type="text" name="" id="nature_business" class="form-control"  ></td>
                          <td><input type="text" name="" id="business_name" class="form-control" ></td>



                                        </tr>
                                    </tbody>
                                </table>

                                  <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bin</th>
                                            <th>BP number</th>
                                            <th>Inspector Name</th>
                                             <th>OR_num</th>
                                           <th style="width:20%;">Status</th>

                                        </tr>
                                    </thead>
                                     <tbody>
                                        <tr>

                                             <td><input type="text" name="" id="Bin" class="form-control"  ></td>
                                             <td><input type="text" name="" id="BP_num" class="form-control" ></td>
                                              <td><select class="form-control" id="inpector_id">

                                              </select></td>
                                              <td><input type="text" name="" class="form-control" id="OR_num"></td>
                                     <td><input type="text" name="" class="form-control" id="status" readonly=""></td>
                                          <!--   <td><select class="form-control" id="statusAdd">
                                                    <option value="Pending" id="status"></option>
                                                    <option  value="Process">Process</option>
                                                    <option  value="Approved">Approved</option>
                                                </select></td> -->

                                        </tr>
                                    </tbody>
                                </table>
                                 <input type="hidden" name="" id="application_id">
                                  <!-- <input type="hidden" name="" id="inpector_id"> -->

                                      <div class="button-group view_button">
                                </div>
                               </form>
                            </div>


                          </div>
                        </div>
                      </div>

    <!-- Schedule_modal -->
    <div class="modal fade" id="schedule_modal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">

             <h5 class="modal-title">Add Schedule<br><small id="Fname"></small><small id="Lname"></small></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form method="post">
        <div class="modal-body">
          <div class="form-group">
              <div class="form-group">
                  <label>Type of Application</label>
                  <input type="text" name="" readonly=""  class="form-control" value="Fire Safety Evaluation Clearance">
              </div>
              <div class="form-group">
                  <label>Location</label>
                  <input type="text" name="" readonly=""  class="form-control" value="Prk2, San Francisco, Panabo City">
              </div>
              <div class="form-group">
                  <label>Business Name</label>
                  <input type="text" name="" readonly="" class="form-control" value="joylan store">
              </div>
              <div class="form-group">
                  <label>Inpector name</label>
                  <input type="text" name="" readonly="" class="form-control" id="inspector_name2">
              </div>
                 <div class="form-group">
                  <label>Date of inspection</label>
                  <input type="date" name="" class="form-control" id="date_inspection">
              </div>
              <input type="hidden" name="" id="modalId">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning " id="add_schedule2" ><i class="fa fa-calendar"></i> Add Schedule</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- success schedule -->
    <div class="modal fade" id="schedule_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header payment_success">

      <h4 class="modal-title" id="ModalTitle">Schedule Addedd Successfully!</h4>


      </div>
      <!-- <div class="modal-body">

      </div> -->
      <center>

        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
</center>
  </div>
</div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title">Send Invoice to>><br><small id="owners"></small></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form method="post">
        <div class="modal-body">
          <div class="form-group">
              <div class="form-group">
                  <label>type of Application</label>
                  <input type="text" name="" readonly="" id="modalType" class="form-control">
              </div>
              <div class="form-group">
                  <label>Total Amount</label>
                  <input type="text" name="" readonly="" id="modalTotal" class="form-control">
              </div>
              <div class="form-group">
                  <label>Payment Due</label>
                  <input type="text" name="" readonly="" id="modatlPayment" class="form-control">
              </div>
              <input type="hidden" name="" id="modalId">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning " id="invoiceSend" ><i class="fa fa-paper-plane-o"></i>Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>




 {{--  <script type="text/javascript">
      $(document).ready(function(){
           $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
        function application(){
            var account_id=$('#account_id').val();
            // console.log(account_id);
            $.ajax({
                url:"{{ route('application.record') }}",
                type:'post',
                data:{
                    account_id:account_id
                },
                success:function(response){
                   $('.table').append('<tbody><tr><td>'+ response.details.Fname+'</td></tr></tbody>');
                }
            })


        }
        application();
      })
  </script> --}}
  @endsection
