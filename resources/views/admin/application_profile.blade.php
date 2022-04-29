
@extends('admin/include.navbar')
@section('title','applicant account')
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
.profile2{
    border-radius: 50%;
    width: 50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
    .Applicant{
    text-align: center;
    margin-top: 20px;
}
.personalInfo input{
        border: none;
        font-size: 14px;
    padding: 0;
    font-weight: bold;
    letter-spacing: 5px;
        margin-top: -10px;
    }
.view{

    outline: none !important;
    box-shadow: none !important;

}
.folder tr td{
    height: 10px;

}
.folder a{
    font-size: 14px;
        margin-top: -15px;
        height: 10px;
        horizontal-align: middle;
}
.folder a:hover{
    color: blue;
}
.my-custom-scrollbar {
position: relative;
height:90vh;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

.actionButton i {
  margin-top: -5px;
  margin-left: -5px;
  height: 10px;
   text-align: center;

}
#fileParent,#path{
    font-size: 14px;
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

.dz-message{
     flex-wrap: wrap;
  align-content: center;
}
 .dz-progress{
            display: none;
        }
.dropzoneDragArea {
    background-color: #fbfdff;
    border: 1px dashed #c0ccda;
    border-radius: 6px;
    cursor: pointer;
    height: 200px;

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


.folderItem .file-item:hover,.folderItem .file-folder:hover{
        background: #E8F0FE;
        color: black;
        box-shadow: 3px 3px #0000000f;
    }
.active2{
    background-color: #E8F0FE;
    color: #4285F4;
}
    .custom-menu {
        z-index: 1000;
        position: absolute;
        background-color: #ffffff;
        border: 1px solid #0000001c;
        border-radius: 5px;
        padding: 8px;
        min-width: 13vw;
         box-shadow: 5px 5px 5px  #888888;
}

a.custom-menu-list {
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 10px;
    width: 200px;

}
a.custom-menu-list i {
 font-size: 20px;
 margin-right: 10px;
}
a.custom-menu-list:hover {
    background: #80808024;
}
hr.solid {
  border-top: 1px solid #bbb;
}

.sidebar {
    height: 100%;
  width: 0; /* 0 width - change this with JavaScript */
  position: absolute; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  right: 0;
  background-color: #FFFFFF;
  border-left: 1px solid;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px; /* Place content 60px from the top */
  transition: 0.1s; /* 0.5 second transition effect to slide in the sidebar */
}

#main {
  transition: margin-right .5s;
}

.sidebar .closebtn {

  font-size: 18.72px;
  border: none;
  background-color: #fff;
}

.separate{
  border-top: 1px solid ;
position: relative;
margin-top: 49px;
}



.tabs-nav {
    list-style: none;
    margin-top: 20px;
    margin-left: 20px;
    padding: 0;
}

.tabs-nav .tab-active a {
    border-bottom: 3px solid #007BFF;
    color: #007BFF;
    cursor: default;
}
.tabs-nav a {
    padding: 10px;
    font-size: 14px;
    text-align: center;
    width: 110px;
    padding-left: 20px;
}
.tabs-nav li {
    float: left;
    margin-bottom: 30px;

}
.tabs-stage {
    -webkit-border-radius: 0 0 6px 6px;
    -moz-border-radius: 0 0 6px 6px;
    -ms-border-radius: 0 0 6px 6px;
    -o-border-radius: 0 0 6px 6px;
    border-radius: 0 0 6px 6px;
    border-top: 0;
    clear: both;
    margin-bottom: 20px;
    position: relative;
    top: -1px;
    height: 24vmax;
    overflow: auto;
    overflow-x: hidden;


}
.view-header{
    height: 10vmax;

}
.view-header-content{
    height: 5vmax;
}
#folder_table{
    height: 55vh;
}
.pencil{
    float: right;
    padding: 5px;
}
.pencil:hover{
    float: right;
    background-color: #E8F0FE;
    border-radius: 50%;
    padding: 5px;
    color: #000;
    }
.description{
    height: 5vmax;
    overflow: hidden;


}
.description::-webkit-scrollbar {
   display: none;
 }
 .description-view{
    background-color: white;
    border: none;
 }
 .view-modal-dialog{
            height:90vh;
            width:90vw;
        }


.view-modal-content{
    height:89vh;
}
.view-modal-body{
    height:100vh;
    overflow:auto
}
.file-folder.ui-draggable-dragging {
    background-color: green; }

.ui-state-hover{
  background: #E8F0FE;
  border: 2px solid  #4285F4;
}
.helper{
     z-index: 1000;
        position: absolute;
        background-color: #E8F0FE;
        border: 1px solid #0000001c;
        border-radius: 5px;
        padding: 10px;
        max-width: 200px;
         box-shadow: 2px 2px 2px  #888888;
         color: #4285F4;
}
 .badge {
        position: relative;
        top: -20px;
        background-color: red;

        color: #fff;
        border-radius: 50%;
       }
.dragStart{
    opacity: 0.2;
}
   /*   .custom-menu {
        z-index: 1000;
        position: absolute;
        background-color: #ffffff;
        border: 1px solid #0000001c;
        border-radius: 5px;
        padding: 8px;
        min-width: 13vw;
         box-shadow: 5px 5px 5px  #888888;
}
*/

    .custom-menu2 {
         z-index: 1000;
       position: absolute;
        background-color: #ffffff;
         box-shadow: 0 3px 10px rgb(0 0 0 / 0.6);;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      width: 30vmax;
    }
    .custom-menu2 .header-clone2{
        background-color: #F1F1F1;
        opacity: 0.8;
        margin: 0;
        padding: 10px;
        color: #777777;
        /*max-height: 70px;*/
    }
     .custom-menu2 .body-clone2{
        background-color: #fff;
        margin: 0;
        padding: 10px;
        color: #777777;
        height: 15vmax;
        overflow-y: auto;
        overflow-x: hidden;

    }
    .custom-menu2 .footer-clone2{
        margin: 0;
        border-top: 1px solid rgba(0, 0, 0, .5);
        padding: 15px;

      }
    .custom-menu2 .moveToFolderParentIdBack{
    float: left;
    padding: 10px;
    margin: 0;

    }
    .custom-menu2 .moveToFolderParentIdBack:hover{
    float: left;
        padding: 10px;
        background-color: #ccc;
        border-radius: 50%;
        color: #fff;
         cursor: pointer;
    }
   .custom-menu2 .close-clone2{
    float: right;
    padding: 10px;
    margin: 0;

    }
    .custom-menu2 .close-clone2:hover{
        float: right;
        padding: 10px;
        background-color: #ccc;
        border-radius: 50%;
        color: #fff;
         cursor: pointer;
    }
    .custom-menu2 div.moveFolderToClass{

            font-size: 16px;
            padding: 10px;
    }
     .custom-menu2 div.moveFolderToClass2{

            font-size: 16px;
            padding: 10px;
            opacity: 0.6;
    }
     .custom-menu2 div.moveFolderToClass .moveFolderViewIcon{
        padding: 5px;
    }
     .custom-menu2 div.moveFolderToClass .moveFolderViewIcon:hover{
        padding: 5px;
        border-radius: 5px;
        background-color: #ccc ;
    }
   .activeMove{
    background-color: #E8F0FE !important;
    color: #4285F4;
    }
    .moveFolderViewIconHover:hover{
          padding: 5px;
        border-radius: 5px;
        background-color: #4D90FE !important;
        color: #fff !important;
    }
    .swal2-title{
        color: #ffffff;
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
.group2{
display: inline-block;
}
.main-panel{
    width: 750px;
    border: 2px solid black;
    padding: 20px;

}
.main-panel input {
    border: none;
    border-bottom: 1px solid #000;
    background-color: #F7F7F7;
}
.certificate_content{
    height: ;

}
.certificate_content img{
    margin-top: 20px;
    width: 100%;
}
.certificate_content input{
    border:none;
    border-bottom: 1px solid #000;
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;

}
.certificate_content .top p, h2, input{
    /* text-align: center; */
    background-color: none;
}
.certificate_content h2 {
    font-weight: bold;
    color: #2A3F54;
    margin-top: -10px
}
.fsecn_no input {
    border-bottom: 2px solid red;
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
}
.fsecn_no{
    color: red;
}
.fsecn_no strong {
    font-size: 20px;
}
.fsec_mid {
    font-weight: bold;
    color:#2A3F54;
    font-size: 90em;
    text-decoration: underline;
    text-align: justify;
    width: 100%;
    margin-bottom: 20px;
}
.date_style{
    text-align: center;
    margin-bottom: 20px;
}
.date_style input {
    border-bottom: 2px solid #2A3F54;
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
}
.to_whom{
    text-align: justify;
}
.middle_design strong{
font-weight: bold;
color: #000;
}
.middle_design input{
  font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
    width: 60%;
}
.middle_design2 input{
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
    width: 100%;
}
.middle_design2 p {
    text-align: center
}
.owned input{
  font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
    width: 100%;
    margin-left: -20px;
}
.representative{
    text-align: end;
    margin-left: -20px
}
.issued_for input{
  font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
    width: 100%;
}
.issued_for2{
    width: 100%;
}
.violation{
    text-indent: 20px;
    margin-top: 10px
}
.note p{
    font-weight: bold;
    font-style: italic;
    text-align: center;
}
.paalala{
    font-weight: bolder;
    color: red;
    text-align: center
}
.moto p{
    text-align: center;
    font-size: 30px;
    color: #2A3F54;
    font-weight: thin;

}
#print_content{
  padding: 20px;
}
.button_print_cert button{
 float: right;
}
.being_issued_for{
  font-size: 18px;
    font-weight: bold;
    letter-spacing: 2px;
}

#business_info_view .business-modal-body {
    height:400px;
    overflow-y: auto;
    align-content: center;
    position: relative;
}
#business_info_view .business-modal-footer{
    position: sticky;
}
.no_user{
    align-content: center;

}
.no_user img{
width: 40%;
height: 40%;
}

</style>
<div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

        </div>


        <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">

                            @php
                            $count = $applicant_account->count();
                                foreach($applicant_account as $account){
                                    $Fname = $account['Fname'];
                                    $Lname = $account['Lname'];
                                    $username = $account['username'];
                                    $password = $account['password'];
                                    $contact_num = $account['contact_num'];
                                    $alternative_num = $account['alternative_num'];
                                    $date_register = $account['date_register'];
                                    $purok  = $account['purok'];
                                    $barangay  = $account['barangay'];
                                    $city  = $account['city'];
                                    $accountId  = $account['accountId'];
                                }

                            @endphp

                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Account Information  <small></small></h2>



                                    <div class="clearfix"></div>
                                </div>
                                @if($count >= 1)


                              <div class="col-md-12 applicant-account">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div id="showDetail"></div>

                                    </div>



                            <div class="col-md-4 img" style="margin-top: 3%;" >



                                <img src="{{ asset('images/profile/')."/".rand(1,5).".jpg" }}" class="profile2">
                                <h5 class="Applicant">

                              {{ $Fname }}  {{ $count}}



                                   </h5>

                            </div>

                              <!--   <div class="buttons">
                                  <button class="btn btn-secondary buttons" id="compose" ><i class="fa fa-envelope-o"></i></button>
                                  <button class="btn btn-secondary buttons" ><i class="fa fa-phone"></i></button>
                                </div> -->

                                 <form method="post" id="updateDetails">
                                    <div class="col-md-8 personalInfo ">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="hidden" name="" id="applicantId_info" class="form-control" value="{{ $accountId }}">
                                        <input type="text" name="" id="Fname_info" class="form-control" value="{{ $Lname }}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="" id="Mname_info" class="form-control" value="" >
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="" id="Lname_info" class="form-control" value="{{ $Lname}}" >
                                    </div><br>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="text" name="" id="contact_num_info" class="form-control" value="{{ $contact_num }}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alternative Contact</label>
                                        <input type="text" name="" id="alcontact_info" class="form-control" value="{{ $alternative_num}}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Purok</label>
                                        <input type="text" name="" id="purok_info" class="form-control" value=" {{$purok}}
                                      " >
                                    </div><br>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Barangay</label>
                                        <input type="text" name="" id="barangay_info" class="form-control" value="{{$barangay}}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="" id="city_info" class="form-control" value="{{$city}}" >
                                    </div>
                                  </div>
                                   <div class="col-md-4">


                                  <div class="form-group">
                                    <label></label>
                                    <button type="submit" name="" class="btn btn-secondary " id="">Update</button>
                                </div>
                                     </div>
                                </div>
                                   </form>
                <br><br>
                         </div>
                         @else
                         <div class="col-md-12">
                             <div class="container no_user">
                                 <center>
                                    <img src="{{ asset('images/no_user.png') }}" alt="">
                                 </center>

                             </div>
                         </div>
                         @endif

                         <div class="col-md-12">
                              {{-- <hr class="separate"> --}}
                                <div class="x_title">
                                    <h2>Business Information  <small></small></h2>


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
                                        <th>Business Name</th>
                                        <th>Address</th>
                                            <th>Date Applied</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                     @foreach ($application as $application)
                                    <tr>
                                        <td>{{$i++}}
                                        </td>
                                        <td>
                                            {{$application->type_application}}
                                        </td>
                                        <td>{{$application->business_name}}
                                        </td>
                                        <td>{{$application->purok}},{{$application->barangay}},{{$application->city}}
                                        </td>
                                        <td>{{$application->date_apply}}
                                        </td>
                                        <td>{{$application->status}}
                                        </td>

                                 <td><button type='button'  class='btn btn-defualt business_info_button' id="{{ $application->applicationId }}"
                     ><i class='fa fa-eye'></i></button>
                             </td>

                                    </tr>
                                    @endforeach


                                  </tbody>


                            </table>
                        </div>





                             </div>
                                  <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                    <div class='container'>
                                      <table class='table table-bordered table'>
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Type of application</th>
                                                  <th>Date Applied</th>
                                                  <th>Inspection Status</th>
                                                      <th>Application Status</th>
                                                  <th>Action</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($certificate as $certificate)
                                              @php
                                                  $i=1;
                                              @endphp


                                              <tr>
                                                  <td>{{$i++}}
                                                  </td>
                                                  <td>
                                                      {{$certificate->type_application}}
                                                  </td>
                                                  <td>{{$certificate->date_apply}}
                                                  </td>
                                                  <td>{{$certificate->payment_status}}
                                                  </td>
                                                  <td>{{$certificate->status}}
                                                  </td>

                                           @if ($certificate->status != 'approved')
                                             <td>Check payment and inspection details</td>
                                             @else
                                             <td>  <button type="button" class="btn btn-success  print_certificate"  id="{{ $certificate->applicationId }}" ><i class="fa fa-print"   ></i> Print</button>
                                                      </td>
                                           @endif

                                              </tr>
                                              @endforeach


                                            </tbody>


                                      </table>
                                  </div>

                                  </div>
                              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                                <div class='container'>
                                    <table class='table table-bordered table'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type of application</th>
                                                <th>Business Name</th>
                                                <th>Address</th>
                                                    <th>Payment Status</th>
                                                <th>Action</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                             @if ($assessment->count()>0)
                                               @foreach ($assessment as $application)

                                            @php
                                                $i=1;
                                            @endphp

                                            <tr>
                                                <td>{{$i++}}
                                                </td>
                                                <td>
                                                    {{$application->type_application}}
                                                </td>
                                                <td>{{$application->business_name}}
                                                </td>
                                                <td>{{$applicationId->purok}},{{$applicationId->barangay}},{{$applicationId->city}}
                                                </td>
                                                </td>
                                                <td>{{$application->payment_status}}
                                                </td>
                                                <input type="hidden" value="{{ $application->applicantId }}" id="view_payment_applicationId">
                                        <td><button type='' name='view' class='btn btn-success view view_payment_info'
                                            id="{{$application->applicationId}}"><i class='fa fa-eye'></i></button>
                                                </td>
                                            </tr>
                                                 @endforeach

                                            @else
                                            @php
                                            $i=1;
                                        @endphp
                                                 @foreach ($assessment_no_payment as $assessment)

                                            <tr>
                                                <td>{{$i++}}
                                                </td>
                                                <td>
                                                    {{$assessment->type_application}}
                                                </td>
                                                <td>{{$assessment->business_name}}
                                                </td>
                                                <td>{{$assessment->purok}},{{$assessment->barangay}},{{$assessment->city}}
                                                </td>

                                                <td>'Not Paid'
                                                </td>
                                                    <td><a href="{{ route('assessment') }}" target="_blank" type='' name='view' class='btn btn-primary view'
                                            ><i class='fa fa-plus'></i></a>
                                                    </td>

                                            </tr>
                                            @endforeach
                                            @endif
                                          </tbody>


                                    </table>
                                </div>

                          </div>
                              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="row">
                                   <table class='table table-bordered table'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type of application </th>
                                        <th>Business Name</th>
                                        <th>Address</th>
                                        <th>Date Applied</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                              <tbody>
                                @php
                                $i=1;
                              @endphp

                                        @foreach ($uploaded as $uploaded)
                                    <tr>
                                        <td>{{$i++}}
                                        </td>
                                        <td>
                                            {{$uploaded->type_application}}
                                        </td>
                                        <td>{{$uploaded->business_name}}
                                        </td>
                                        <td>{{$uploaded->purok}},{{$uploaded->barangay}},{{$uploaded->city}}
                                        </td>
                                        <td>{{$uploaded->date_apply}}
                                        </td>
                                        <td>{{$uploaded->status}}
                                        </td>
                                         <td>    <button  class="btn viewDocuments view" data-toggle="modal"><i class="fa fa-eye"></i></button>
                                        </td>

                                    </tr>
                                    @endforeach
                                  </tbody>
                            </table>

                                </div>
                              </div>
                               <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                    <div class="x_title">

                                    </div>
                                    <div class="container">
                                      <table class='table table-bordered table'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type of application</th>
                                                <th>Inspector Name</th>
                                                <th>Date inspected</th>
                                                <th>Inspection Status</th>
                                                <th>Action</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                             @if ($inspection_details->count()>0)
                                               @foreach ($inspection_details as $inspection_details)

                                            @php
                                                $i=1;
                                            @endphp


                                            <tr>
                                                <td>{{$i++}}
                                                </td>
                                                <td>
                                                    {{$inspection_details->type_application}}
                                                </td>

                                                <td>{{$inspection_details->Fname}},{{$inspection_details->Lname}}
                                                </td>
                                                <td>{{$inspection_details->date_inspect}}
                                                </td>
                                                </td>
                                                <td>{{$inspection_details->status}}
                                                </td>
                                                <input type="hidden" value="{{ $inspection_details->applicantId }}" id="view_payment_applicationId">
                                        <td><button type='' name='view' class='btn btn-success view view_inspection_report'
                                            id="{{$inspection_details->applicationId}}"><i class='fa fa-eye'></i></button>
                                                </td>

                                            </tr>
                                                 @endforeach

                                            @else

                                            @php
                                            $i=1;
                                        @endphp
                                                 @foreach ($assessment_no_payment as $assessment)

                                            <tr>
                                                <td>{{$i++}}
                                                </td>
                                                <td>
                                                    {{$assessment->type_application}}
                                                </td>
                                                <td>N/A
                                                </td>
                                                <td>N/A
                                                </td>

                                                <td>'No Inspection Report'
                                                </td>
                                                    <td>No Inspection Report
                                                    </td>

                                            </tr>
                                            @endforeach
                                            @endif
                                          </tbody>


                                    </table>
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





    <!-- Modal HTML -->
    <div id="viewDocuments" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl view-modal-dialog">
            <div class="modal-content view-modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Uploaded Documents</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body view-modal-body" id="modalViewDocuments">
                    <div  id="viewFolderModal">
                <div class="row">
                    <button class="btn btn-primary btn-sm" id="new_folder" data-toggle="modal" data-target="#addFolder"><i class="fa fa-plus" ></i> New Folder</button>
                    <button class="btn btn-primary btn-sm ml-4" id="addFileButton" data-toggle="modal" data-target="#addFile" style="display:none"><i class="fa fa-upload"></i> Upload File</button>
                </div>
                <br>
                <div class="folder2 scrollDiv">
                <div class="d-inline-block">
                     <h7><a  href='javascript:;' type="button" id="fileParent">
                        <span><i class="fa fa-folder"></i></span>
                            <b class="to_folder">Files </b>
                            </a>
                    </h7>
                </div>
                <div id="path" class="d-inline-block scrollmenu">


                </div>
                </div>

    <div id="folder_table" class="table-responsive table-wrapper-scroll-y my-custom-scrollbar "  cellspacing="0"
  width="100%"></div>

                </div>

 <div id="mySidebar" class="sidebar">
        <div class="view-header">
        <div class="col-md-10 view-header-content">
            <div class="col-md-3 folderHeader">
                 <h4 style="color: #3C4043;display:inline"><span style="margin-right: 20px;color: #3C4043;"><i class="fa fa-folder"></i></span> </h4>
            </div>
            <div class="col-md-9 ">
                  <h4 style="color: #3C4043;display:inline; text-align: center;" id="folderNameView">     </h4>
            </div>

        </div>
        <div class="col-md-2">
             <button type="reset" class="bnt btn-default closebtn" id="closeFolderDetails"><i class='fa fa-times' style="color:#7e8082;" data-toggle="tooltip" data-placement="bottom" title="Hide Details" ></i></button>

        </div>


        <div class="col-md-12">
            <ul class="tabs-nav">
                <li class=""><a href="#tab-1" >Detials</a>
                </li>
                <li class="tab-active"><a href="#tab-2">Activity</a>
                </li>
            </ul>

              {{-- <hr class="separate">    --}}
        </div>
         </div>
        <div class="tabs-stage">
            <div class="col-md-12 " id="tab-1"  >
                <h6 style="margin-bottom: 10px;color: #3C4043;"><b> System Properties</b></h6 >
                <div class="form-group">
                    <div class="col-md-4" style="color: #3C4043;"><h7>Type</h7></div>
                    <div class="col-md-8"  style="margin-bottom: 18px;color: #3C4043;"><h7>Folder</h7></div >
                </div>
                 <div class="form-group">
                    <div class="col-md-4" style="color: #3C4043;"><h7>Uploader</h7></div>
                    <div class="col-md-8"  style="margin-bottom: 18px;color: #3C4043;"><h7 id="uploader"></h7></div >
                </div>
                 <div class="form-group">
                    <div class="col-md-4" style="color: #3C4043;"><h7>Modified</h7></div>
                    <div class="col-md-8"  style="margin-bottom: 18px;color: #3C4043;"><h7 id="modifiedFolder"></h7></div >
                </div>
                 <div class="form-group">
                    <div class="col-md-4" style="color: #3C4043;"><h7>Created</h7></div>
                    <div class="col-md-8"  style="margin-bottom: 18px;color: #3C4043;"><h7 id="createdFolder"></h7></div >
                </div>
                  <div class="form-group">
                    <div class="col-md-4" style="color: #3C4043;"><h7>Description</h7></div>
                    <div class="col-md-8"  style="color: #3C4043;"><h7><i class="fa fa-pencil pencil" data-toggle="tooltip" data-placement="bottom" title="Edit description"></i></h7></div >
                </div>
                <div class="form-group">
                    <textarea class="description" disabled="true" >

                    </textarea>
                    <textarea class="descriptionOld" style="display:none" >

                    </textarea>
                    {{-- <input type="hidden" name="" id="descriptionId" > --}}



                </div>


            </div>
            <div id="tab-2" >


            </div>
        </div>


</div>
                </div>
            </div>
        </div>
    </div>


       {{-- Add folder --}}
       <div id="addFolder" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Add Folder</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addFolderForm">
                         <input type="hidden" name="" id="parentFolderId">
                        <div class="form-group">

                            <label>Folder Name</label>
                      <input type="text" name="" class="form-control" id="folderName" placeholder="Enter folder name">
                             <div id="errorFolder" style="color:red"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>






                </div>

            </div>
        </div>
    </div>

    <div id="Print_certificate" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content " id="print_content">
            <div class="main-panel ">
              <div class="row certificate_content" >
                  <div class=" col-md-12">
                      <div class="col-md-2">
                          <img src="{{ asset('images/dilg.png')  }}" alt="" style="width: 100%">
                      </div>
                      <div class="col-md-8">
                          <div class=" top">
                              <p>Republic of the Philippines
                              <br><strong>Department of the Interior and local Government</strong></p>
                              <h2 style="color:#2A3F54">BUREAU OF FIRE PROTECTION</h2>
                             <center>
                              <input type="text" name="" id="" style="width:40%">
                              <input type="text" name="" id=""  style="width:60%">
                              <input type="text" name="" id=""  style="width:80%">
                          </center>
                          </div><br><br>
                      </div>
                      <div class="col-md-2">
                          <img src="{{ asset('images/logo.png')  }}" alt="" style="width: 100%">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="col-md-6 fsecn_no">
                          <div class="col-md-6"><strong>FSEC NO . R</strong></div>
                          <div class="col-md-4"><input type="text"></div>
                      </div>
                  </div>
              </div>
              <div class="row">
               <div class="col-md-12 fsec_mid">
                      <h3><b>FIRE SAFETY EVALUATION CLEARANCE</b></h3>
               </div>
          </div>
              <div class="row date_style">
                  <div class="col-md-8"></div>
                  <div class="col-md-4"><input type="text"><br><span>Date</span></div>
              </div>
              <div class="row to_whom">
                          <h2><strong >TO WHOM IT MAY CONCERN</strong></h2>
                  <div class="row">
                      <div class="col-md-12 middle_design">
                      <p>By virtue of the provisions of RA 9514 otherwise known as the Fire Code of the Philippines of 2008 the application for</p>
                              <strong >FIRE SAFETY EVALUATION CLEARANCE OF </strong><span><input type="text" name="" id="business_name_print" ></span>
                              <div class="col-md-6"></div>
                              <div class="col-md-6"><p>(Name of Building/ Structure Facility)</p></div>
                          </p>
                      </div>
                      <div class="col-md-12 middle_design2">
                          <div class="col-md-12">
                              <input type="text" name="" id="address_print">
                          </div>
                          <div class="col-md-12">
                              <p>to be constructed / renovated / altered / modified / change of occupancy located at</p>
                          </div>
                          <div class="col-md-12">
                              <input type="text" name="" id="">
                          </div>
                          <div class="col-md-12">
                              <p>(Address)</p>
                          </div>
                      </div>
                      <div class="col-md-12 owned">
                          <div class="col-md-12">
                              <div class="col-md-2">owned by</div>
                              <div class="col-md-4"><input type="text" name="" id="applicant_name"></div>
                              <div class="col-md-6"> <p>is hereby <strong>GRANTED</strong> after the building plans and</p></div>

                              <div class="col-md-12 representative">
                                  <div class="col-md-6"><p>(Name of Owners/Representative)</p></div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="col-md-12">
                              <p>other documents conform to the safety and life safety requirements of the Fire Code of the Philippines of 2008 and its IRR <br>
                                  and that the recommendations in the Fire Safety Checklist (FSC) will be adopted.</p>
                              </div>
                              </div>
                      </div>
                      {{-- <div class="row being_issued_for ">
                          <div class="col-md-12">
                              <div class="col-md-12">
                                  <p>This clearance is being issued for <span><input type="text" name="" id="" style="width: 350px"></span></p>
                              </div>
                              <div class="col-md-12">
                                  <input type="text" name="" id="" style="width:100%">
                              </div>
                              </div>
                      </div> --}}


                      <div class="row">
                          <div class="col-md-12">
                              <div class="col-md-12 violation">
                                  <p>Violation of Fire Code provisions shall ipso facto cause this certificate null and void, and shall hold the owner of the
                                      building liable to the penalties provided for by the said Fire code.
                                      </p>
                              </div>
                          </div>
                      </div>
                      <div class="row fire_code">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <div class="col-md-12">
                                      <label for=""><b>Fire Code Fees</b></label>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="col-md-6">
                                          <label for="">Amount Paid:</label>
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text"  style="width: 100%" id="amount_paid">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="col-md-6">
                                          <label for="">O.R. Number:</label>
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text" id="OR_num_print">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="col-md-6">
                                          <label for="">Date:</label>
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text" id="payment_date">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                  <div class="col-md-12">
                                      <p>RECOMMEND APPROVAL</p>
                                  </div>
                                  <div class="col-md-12">
                                      <input type="text" id="chief" style="font-size: 16px;text-align:center;font-weight:bold"><br>
                                      <p style="text-align: center">CHIEF, FSES</p>
                                  </div>
                                  <div class="col-md-12">
                                      <p><strong>APPROVED :</strong></p>
                                  </div>
                                  <div class="col-md-12">
                                      <input type="text" name="" id="marshal" style="font-size: 16px;text-align:center;font-weight:bold"><br>
                                      <p>CITY/MUNICIPAL FIRE MARSHAL</p>
                                  </div>
                              </div>

                              <div class="row note">
                                  <div class="col-md-12">
                                  <p><b>NOTE :  “This Clearance is accompanied by Fire safety Checklist and does not take the place of any license required by
                                      law and is not transferable. Any change or alteration in the design and specification during construction shall require a
                                      new clearance”</b></p>
                                  </div>
                              </div>
                              <div class="row paalala">
                                  <div class="col-md-12">
                                  <p>PAALALA: “MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION SA MGA KAWANI NITO ANG
                                      MAGBENTA O MAGREKOMENDA NG ANUMANG BRAND NG FIRE EXTINGUISHER”</p>
                                  </div>
                              </div>
                              <div class="row moto">
                                  <div class="col-md-12 ">
                                  <p><strong>"FIRE SAFETY IS OUR MAIN CONCERN"</strong></p>
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
          <div class="button_print_cert" >
            <button type="button" class="btn btn-primary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">close</button>
          </div>
          </div>

      </div>
  </div>


    {{-- Add file --}}
       <div id="addFile" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Add File</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addFileForm" enctype="multipart/form-data" >
                         <input type="hidden" name="" id="parentFolderId2">
                         <input type="hidden" value="<?php   echo $applicationId->applicationId ?>" id='applicationId' >
                          <button type="button" class="btn btn-default addFiles"  data-toggle="dropzone">
                                  <label for="file">
                                   <i class="fa fa-file"></i>
                                  </label>

                                </button>
                        <div class="form-group ">


                         <div class="dropzone dropzoneDragArea my-custom-scrollbar " id="dropzoneDragArea" >

                            <div  class="dz-message">
                                <div class="icon">
                                    <i class="fa fa-upload"></i>

                                </div>
                                 <h2>You can drag and drop files to add</h2>
                            </div>



                        </div>

                            <p>Only JPG, PNG, PDF, DOC (Word) and  XLS (Excel) files types are supported. Maximum file size is 25MB, maximun attachments:3.</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                      <div class="user-image mb-3 text-center">
                        <div id="showImageHere">
                          <div class="card-group">
                            <div class="row">
                              <!-- Image preview -->
                            </div>
                          </div>
                        </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

<div id="menu-folder-clone" style="display: none;">
    <a href="javascript:void(0)" class="custom-menu-list file-option openFolder"><span><i class="fa fa-folder-open"></i></span> Open</a>
    <hr class="solid">
    {{-- <a href="javascript:void(0)" class="custom-menu-list file-option moveFolderTo"><span><i  class="fa fa-arrows-alt" aria-hidden="true"></i></span>Move to</a> --}}
     <a href="javascript:void(0)" class="custom-menu-list file-option renameFolder"><span><i class="fa fa-pencil"></i></span>Rename</a>
     <hr class="solid">
    <a href="javascript:void(0)" class="custom-menu-list file-option viewFolderDetails"><span><i class="fa fa-eye"></i></span>View details</a>

     {{-- <a href="javascript:void(0)" class="custom-menu-list file-option edit"><span><i class="fa fa-arrow-circle-down "></i></span>Download</a> --}}
     <hr class="solid">
    {{-- <a href="javascript:void(0)" class="custom-menu-list file-option delete"><span><i class="fa fa-archive"></i></span>Send to Archive</a> --}}
     {{-- <a href="javascript:void(0)" class="custom-menu-list file-option delete"><span><i class="fa fa-file-archive-o"></i></span>Compressed(zipped)</a> --}}
</div>

<div id="menu-folder-clone2" style="display: none; " class="col-md-12">

         <div class="col-md-12 header-clone2">
            <div class="col-md-2"  data-toggle='tooltip' data-placement='bottom' title='Back'><h2 class="moveToFolderParentIdBack"><i class="fa fa-chevron-left"></i></h2></div>
            <div class="col-md-8"> <h2 class="moveTo-header"><b> </b></h2></div>
            <div class="col-md-2"><h2 class="close-clone2" data-toggle='tooltip' data-placement='bottom' title='Close'><i class="fa fa-times"></i></h2></div>
           <input type="" name="" class="moveToFolderParentId">
           <input type="" name="" class="moveToFolderSelected">
           <input type="" name="" class="moveToFolderParentId2">
           <input type="" name="" class="constantParentId">
           <input type="" name="" class="selectedParentId">

         </div>
         <div class="col-md-12 body-clone2">

         </div>
         <div class="col-md-12 footer-clone2">
         <div class="button-group button-move">
             <button class="btn btn-primary"><i class="fa fa-plus"></i> Add folder</button>


         </div>
         </div>



</div>

{{-- modal business infor --}}
<div class="modal fade" id="business_info_view" role="dialog" >
    <div class="modal-dialog modal-xl" >

      <div class="modal-content">
        <div class="modal-header">
          <h2  id="exampleModalLabel " > APPLICATION INFORMATION</h2>


          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="applicationAdd">
        <div class="modal-body business-modal-body">
            <div id=showEdit></div>


            <input type="hidden" name="applicationId_businessInfo" id="applicationId_businessInfo" name="applicationId_businessInfo">
            <input type="hidden" name="applicant_businessInfo" id="applicant_businessInfo" name="applicationId_businessInfo">
                <div class="col-md-12">
                    <h2><strong>Applicant</strong></h2>
                </div>
                <div class="col-md-12">
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">First Name</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="Fname_Business" id="Fname_Business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Last Name</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="Lname_Business" id="Lname_Business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Middle Name</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="Mname_Business" id="Mname_Business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Contact Number</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="contact_num_Business" id="contact_num_Business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Alternative Number</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="alcontact_business" id="alcontact_business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Purok</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="purok_applicant" id="purok_applicant" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Barangay</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="barangay_applicant" id="barangay_applicant" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">City</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="city_applicant" id="city_applicant" class="form-control" >
                          </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2><strong>Business</strong></h2>
                </div>
                <div class="col-md-12">
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Type of Application</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="type_application" id="type_application" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Control Number</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="control_number" id="control_number" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Type of Occupancy</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="type_occupancy" id="type_occupancy" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Nature of Business</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="nature_business" id="nature_business" class="form-control"  >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Business Name</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="business_name" id="business_name" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Bin</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="Bin" id="Bin" class="form-control"  >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">BP number</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="BP_num" id="BP_num" class="form-control" >
                          </div>
                    </div>

                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">OR Number</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="OR_num" class="form-control" id="OR_num">
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Status</label>
                    </div>
                        <div class="col-md-12">
                            <select id="status"  class="form-control " name="status">
                                <option id="status"></option>
                                <option value="forinspection">for inspection</option>
                                <option value="pending">peding</option>
                                <option value="approved">approved</option>
                                <option value="reinspection">reinspection</option>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Date Apply</label>
                    </div>
                        <div class="col-md-12">
                            <input type="date" name="date_apply" class="form-control" id="date_apply">
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Remarks</label>
                    </div>
                        <div class="col-md-12">
                            <select id="remarks"  class="form-control " name="remarks">
                                <option id="remarks"></option>
                                <option value="Old">Old</option>
                                <option value="New">New</option>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Purok</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="purok_business" id="purok_business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Barangay</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="barangay_business" id="barangay_business" class="form-control" >
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">City</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="city_business" id="city_business" class="form-control" >
                          </div>
                    </div>
                </div>
               <input type="hidden" name="" id="application_id" name="application_id">
                <!-- <input type="hidden" name="" id="inpector_id"> -->


          </div>
          <div class="modal-footer business-modal-footer">
            <h4 style="opacity: 0.8;display:inline-block" id="set_schedule_text"></h4>
            <div class="button-group view_button" style="float: right">

            </div>
          </div>
       </form>

        </div>
      </div>
    </div>



      <div class="modal fade" id="set_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set inspection schedule</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group row col-md-12">
                        <div class="col-md-12">
                        <label class="control-label ">Inspector Name</label>
                    </div>
                        <div class="col-md-12">
                            <select class="form-control" id="inpector_id">
                            </select>
                          </div>
                    </div>
                    <div class="form-group row col-md-12">
                        <div class="col-md-12">
                        <label class="control-label ">Date</label>
                    </div>
                        <div class="col-md-12">
                            <input type="date" name="" class="form-control" id="date_inspection">
                          </div>
                    </div>
                </div>

              </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="set">Set</button>
                  </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="payment_view_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                                  <div id="show2"></div>

                            <div class="x_content">

                 <div class="row">
                  <div class="col-md-12" id="receipt">
                      <div class="panel panel-default">
                          <div class="title_payment">
                          <center><h5><strong>ORDER OF PAYMENT</strong></h5>
                            <p>(NOT VALID AS OFFICIAL RECEIPT UNLESS MACHINE VALIDATED)</p>
                          </center>
                        </div>
                <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="applicant_name_payment" name=""></span></h5></div>

                 <div class="panel-heading"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="applicant_address" name=""></span></h5></div>
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
                              <input type="text" name="" class="group1" id="amount_paid_payment"><br>
                              <label>Change:</label>
                              <input type="text" name="" class="group1" id="change"><br>
                                <label>Payment Date:</label>
                              <input type="input" name="" class="group1" id="date_paid"><br><br>
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
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal" id="" style="display: inline-block;"  ><i class="fa fa-arrow-left" ></i>  Close</button>
                                      <button type="button" class="btn btn-secondary save_payment_button" onclick="printDivPayment()"><i class="fa fa-print" ></i>  Print</button>
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
        </div>
      </div>

      <div id="inspection_modal" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Inspection Report</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal form-label-left">
                    <div class="col-md-12">
                    <div class="form-group row col-md-4">
                        <label class="control-label">Type of Application</label>
                        <div class=" ">
                          <input type="text" class="form-control" placeholder="Default Input" id="type_application_inspection"  readonly>
                          </div>
                    </div>
                    <div class="form-group row  col-md-4">
                      <label class="control-label ">Inspector Name</label>
                      <div class=" ">
                        <input type="text" class="form-control" placeholder="Default Input" id="inspector_name"  readonly>
                        </div>
                  </div>
                  <div class="form-group row col-md-4">
                    <label class="control-label ">Date Inspected</label>
                    <div class=" ">
                      <input type="text" class="form-control" placeholder="Default Input" id="date_inspected" readonly >
                      </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row col-md-4">
                  <label class="control-label  ">Inspection Status</label>
                  <div class=" ">
                    <input type="text" class="form-control" placeholder="Default Input" id="inspection_status" readonly>
                    </div>
              </div>
              <div class="form-group row col-md-4">
                <label class="control-label  ">Verify Inspection Report</label>
                <div class="">
                  <input type="text" class="form-control" placeholder="Default Input" id="verify_inspection" readonly>
                  </div>
            </div>
              </div>
              <div class="col-md-12">
                <h2><strong>Evaluation Report</strong></h2>
              </div>
              <div class="col-md-12">
              <div class="form-group row col-md-4">
                <label class="control-label  ">Beams</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Beams" value="" id="beams" readonly>
                </div>
            </div>
            <div class="form-group row  col-md-4 ">
                <label class="control-label  ">Exterior Walls</label>
                <div class=" ">
                    <input type="text" class="form-control" placeholder="Exterior Walls" value="" id="exterior" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4 ">
                <label class="control-label ">Main Stair</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Main Stairs" value="" id="main_stair" readonly>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group row col-md-4">
                <label class="control-label ">Main Door</label>
                <div class=" ">
                    <input type="text" class="form-control" placeholder="Main Door" value="" id="main_door" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label  ">Columns</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Columns" value="" id="colums" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label  ">Corridor Walls</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Curridor Walls" value="" id="corridor_walls" readonly>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group row col-md-4">
                <label class="control-label ">Windows</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Default Input" value="" id="windows" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label  ">Trussess</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Trussess" value="" id="trussess" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label ">Flooring</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Flooring" value="" id="flooring" readonly>
                </div>
            </div>
          </div>
          <div class="col-md-12">

            <div class="form-group row col-md-4">
                <label class="control-label  ">Room Partitions</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="room_partitions" value="" id="room_partitions" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label ">Ceiling</label>
                <div class=" ">
                    <input type="text" class="form-control" placeholder="Ceiling" value="" id="ceiling" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label">Roof</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Roof" value="" id="roof" readonly>
                </div>
            </div>
          </div>

            <div class="form-group row col-md-12">
                <h2><strong>Fire Protection Equipment</strong></h2>
            </div>
            <div class="col-md-12">
            <div class="form-group row col-md-4">
                <label class="control-label  ">Emergency Lights Provide</label>
                <div class="form-group col-md-12">
                    <select name="" id="emergency_lights" class="form-control col-md-12" readonly><option value="yes">Yes</option><option value="no">No</option></select>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label ">Number of Fire Stinguisher</label>
                <div class=" ">
                    <input type="text" class="form-control" placeholder="No. Stinguisher" value="" id="no_stinguisher" readonly>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label col-md-12">Equiped with fire alarm? </label>
                <div class=" ">
                    <select name="" id="fire_alarm" class="form-control col-md-12" disabled><option value="yes">Yes</option><option value="no">No</option></select>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group row col-md-4">
                <label class="control-label ">Location of Control Panel</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Location of contorl panel" value="" id="location_panel" readonly>
                </div>
            </div>
          </div>
            <div class="col-md-12">
              <div class="form-group row col-md-4">
                  <label class="control-label ">Sectional Occupancy</label>
                  <div class="">
                     <textarea name="" id="sectional_occupancy" cols="30" rows="5" disabled></textarea>
                  </div>
              </div>

            <div class="form-group row col-md-4">
                <label class="control-label ">Defect</label>
                <div class="">
                    <textarea name="" id="defects" cols="30" rows="5" disabled></textarea>
                </div>
            </div>
            <div class="form-group row col-md-4">
                <label class="control-label  " disabled>Recommendation</label>
                <div class=" ">
                    <textarea name="" id="recommendation" cols="30" rows="5" disabled></textarea>
                </div>
            </div>
          </div>
          <div class="col-md-12">

          </div>





                    <div class="form-group" style="float: right" id="verify_button">

                  </div>

                    </form>






                </div>

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(e){
      $(document).on('click','#printReceipt',function(e){
        alert('nice ka one');
      });
      function printDiv() {
          var divContents = document.getElementById("receipt").innerHTML;
          var a = window.open('', '', 'height=1000, width=1000');
          a.document.write('<html>');
          a.document.write('<body stye="width:40px;height:50px"> ');
          a.document.write(divContents);
          a.document.write('</body></html>');
          a.document.close();
          a.print();
      }
    })

</script>
<script type="text/javascript">

    // From http://learn.shayhowe.com/advanced-html-css/jquery

// Change tab class and display content
$('.tabs-nav a').on('click', function (event) {
    event.preventDefault();
    var id =$(this).attr('href');
    $('.tab-active').removeClass('tab-active');
    $(this).parent().addClass('tab-active');
    $(id).siblings().hide();
    $(id).show();
});

$('.tabs-nav a:first').trigger('click'); // Default


</script>
  <script type="text/javascript">


      $(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip();
  var elementClicked=false;


    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

    let token = $('meta[name="csrf-token"]').attr('content');
       Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneDragArea", {
        paramName: "file",
        url: "{{ url('/addFile') }}",
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: true,
        clickable :['.addFiles','#dropzoneDragArea'],
        parallelUploads: 10,
        maxFiles: 10,
        params: {
            _token: token
        },
        init:function(){
            var myDropzone = this;
           $(document).on('submit','#addFileForm',function(event){
            event.preventDefault();
            var parentFolderId2=  $('#parentFolderId2').val();
             URL = $("#addFileForm").attr('action');
                    myDropzone.processQueue();


           });
        this.on('sending', function(file, xhr, formData){
             let parentFolderId2 = $('#parentFolderId2').val();
              var applicationId= $('#applicationId').val();
        formData.append('parentFolderId2', parentFolderId2);
            formData.append('applicationId', applicationId);

        });

        this.on("success", function (file, response) {
             let parentFolderId2 = $('#parentFolderId2').val();
               this.removeAllFiles();
             $('#addFile').modal('hide');
                fetch_data(parentFolderId2);


        });
         this.on("queuecomplete", function () {
        toastr.success('file Added Successfully');


        });


        }


});


        $('.viewDocuments').on('click',function(e){
            e.preventDefault();



            $('#viewDocuments').modal('show');


            $('.modal-dialog').draggable({
        handle: ".modal-header"

            });
        });

        $('#fileParent').click(function(e){
            e.preventDefault();

            $('#path').children().remove();
            $(' #folderName').val('');
        $(' #errorFolder').html('');
        load_folder_list();
        })

 load_folder_list();

        function load_folder_list(){
             $('#addFileButton').hide();
        var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
        var applicationId= '<?php   echo $applicationId->applicationId ?>';
         var admin ='{{Session::get('adminID')['username']}}';
            $.ajax({
                url: '{{ route('fetch_file') }}',
                type: "post",
                data:{
                    Fname:Fname,
                    Lname:Lname,
                    admin:admin,
                    applicationId:applicationId
                },
                dataType:'json',
                success:function(data){
                    $('#folder_table').html(data.data);

                     $('#parentFolderId').val(data.parentId);
                     $('#parentFolderId2').val(data.parentId);

                }
            })
        }

  $(document).on('dblclick','.file-folder',function(e){
            e.preventDefault();

        var folderId=$(this).attr('id');
        var parentId=$('#parentId').val();
        var applicationId= '<?php   echo $applicationId->applicationId ?>';



            $.ajax({
                url: '{{ route('viewFolder') }}',
                type:'post',
                data:{

                    applicationId:applicationId,
                    folderId:folderId,
                    parentId:parentId
                },
                dataType: 'json',
                success:function(data){
                     $('#folder_table').html(data.data);

                     $('#path').append('<div id='+data.folderParentId+' class="d-inline-block"><a type="button" class="btn  pathView" id="'+data.folderId+'"><span><input type="hidden" value="'+data.folderParentId+'" id="folderIdPath"><i class="fa fa-folder">'+data.folderName+'</i></span></a></div>');



                      $('#parentFolderId').val(folderId);
                      $('#parentFolderId2').val(folderId);
                      $('#addFileButton').show();

                }
            });

        });
$(document).on('click','.pathView',function(e){
    e.preventDefault();
    var folderId= $(this).attr('id');
    var parentId= $('#folderIdPath').val();
      var applicationId= '<?php   echo $applicationId->applicationId ?>';


$(' #folderName').val('');
$(' #errorFolder').html('');

$.ajax({
    url:'{{ route('viewFolder') }}',
    type:'post',
    data:{
        folderId:folderId,
        parentId:parentId,
        applicationId:applicationId
    },
    success:function(data){
$('#path div#'+folderId).nextAll('div').remove();
    $('#folder_table').html(data.data);
    $('#parentFolderId').val(folderId);
    }
})


})


    $(document).on('submit','#addFolderForm',function(e){
        e.preventDefault();
        var parentFolderId=$('#parentFolderId').val();

        var folderName=$('#folderName').val();
          var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
          var applicationId= '<?php   echo $applicationId->applicationId ?>';
          var admin ='{{Session::get('adminID')['username']}}';
        $.ajax({
            url: '{{ route('addFolder') }}',
            type:'post',
            data: {
                 Fname:Fname,
                Lname:Lname,
                admin:admin,
                applicationId:applicationId,
                parentFolderId:parentFolderId,
                folderName:folderName,
            },
            // dataType: 'json',
            success:function(data){
                if(data.status==200){
                $('#addFolder').modal('hide');
                $(' #folderName').val('');
                $(' #errorFolder').html('');
                fetch_data(data.parentId);

                }else{
                      $('#errorFolder').html(data.error);
                }




            }
        })

    });



    function fetch_data(parentId2){
         var parentId = parentId2;
         var folderId = parentId2;
         var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
          var applicationId= '<?php   echo $applicationId->applicationId ?>';
              $.ajax({
                url: '{{ route('viewFolder') }}',
                method:'post',
                data:{

                    Fname:Fname,
                    Lname:Lname,
                    folderId:folderId,
                    applicationId:applicationId,
                    parentId:parentId,
                },
                dataType: 'json',
                success:function(data){
                     $('#folder_table').html(data.data);

                }
            });
    }
    $(document).on('click','.viewFolderDetails', function(e){
          $('.viewFolderDetails').hide();
         var folderId2 = $(this).attr('id');

         viewFolderDetails(folderId2);
        $('.file-folder[id='+folderId2+']').addClass('active2 ');
        $('.file-folder').addClass('folderSelected');

          $(document).on('click','.folderSelected',function(e){
        $('.file-folder').removeClass('active2').addClass('folderSelected');
                $(this).addClass('active2 ');
                var folderId2 = $(this).attr('id');
               viewFolderDetails(folderId2);
          elementClicked=true;




            })
          elementClicked=true;


     });
     function viewFolderDetails(folderId2){

   var folderId2=folderId2;
     $('.description').attr('id',folderId2);
   $.ajax({
        url:'{{ route('viewFolderDetails') }}',
        type:'post',
        data:{
            folderId2:folderId2,
        },
        dataType:'json',
        success:function(data){
            var len=32;
            if(data.status==200){
        $.each(data.folderDetails, function( index, value ) {
                var foldername=value['folderName'].trim().length;
            $('#uploader').html(value['uploader']);
            if(foldername<=len){
            $('#folderNameView').html(value['folderName']);
            }else{
               foldername= value['folderName'].slice(0, len)+'...';
            $('#folderNameView').html(foldername);

            }


            $('#modifiedFolder').html(value['lastModified']);

            $('#createdFolder').html(value['created']);
            if(data.output!='' || data.description!=''){
                $('#tab-2').html(data.output);
                  $('.description').val(data.description);
                  $('.descriptionOld').val(data.description);

                    $('.description').addClass('description-view');
                  $('.description').show();

            }else{
                 $('#tab-2').html('<div class="container" style="margin-left:20px"><h6>No modification</h6></div>');
                  $('.description').hide();
                  $('.description').val('');

            }

            });

        document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("viewFolderModal").style.marginRight = "250px";
            }

        }

   });

 };

     $('.pencil').on('click',function(e){
            e.preventDefault();
            $('.description').removeAttr('disabled');
            $('.pencil').hide();
            $('.description').show();
            $('.description').focus();

         });

     $('.description').focusout(function(e){
            e.preventDefault();
        var folderId = $(this).attr('id');
         $('.pencil').show();
        $('.description').attr('disabled',true);
        $('.description').addClass('description-view');
         if (!$(this).hasClass('descriptionFired')) {
                 $('.description').addClass('descriptionFired');
                addDescription(folderId);
            }

     })
    $('.description').keyup(function(event){
        var folderId = $(this).attr('id');
        var key = false;

        if(key=false){
            if(event.ctrlKey && event.keyCode == 13){
                event.preventDefault();
                event.keyCode != 13;
          textAreaAdjust(this);

            }
          textAreaAdjust(this);

        }

     if (!$(this).hasClass('descriptionFired')) {
        if ( event.keyCode == 13 ) {
            key = true;
             event.preventDefault();
               $(this).addClass('descriptionFired');
             addDescription(folderId);
         $('.pencil').show();
        $('.description').attr('disabled',true);
        $('.description').addClass('description-view');
          }
         }

    });
     function textAreaAdjust(element) {
             element.style.height = "1px";
              element.style.height = (10+element.scrollHeight)+"px";
               $container = $('.tabs-stage');
                $container.animate({ scrollTop: $container[0].scrollHeight });

            }
     function addDescription(descriptionId){
         var description = $('.description').val();
         var descriptionOld = $('.descriptionOld').val();
         var folderId=descriptionId;
            var admin ='{{Session::get('adminID')['username']}}';
    if(description.trim()=='' || description.trim()===descriptionOld.trim()){

        if(descriptionOld.trim()==''){
         $('.description').hide();
          $('.pencil').show();
        $('.description').attr('disabled',true);
        $('.description').addClass('description-view');
          $('.description').removeClass('descriptionFired');

        }else{
         $('.description').show();
         $('.description').val(descriptionOld);
          $('.pencil').show();
          $('.description').removeClass('descriptionFired');
        $('.description').attr('disabled',true);
        $('.description').addClass('description-view');
        }

    }else{
        description=description.trim().replace(/\s+/g, " ");
        $.ajax({
            url:'{{ route('addDescription') }}',
            type:'post',
            data:{
                folderId:folderId,
                description:description,
                admin:admin
            },
            dataType:'json',
            success:function(data){
                 viewFolderDetails(folderId);
                 $('.description').removeClass('descriptionFired');
                  $('.pencil').show();
                $('.description').attr('disabled',true);
                $('.description').addClass('description-view');
            }
        })
    }

 }







$(document).on('click','.file-folder',function(e){
    var folderId =$(this).attr('id');

     if (e.button==0 && e.ctrlKey) {
          $('.file-folder[id='+folderId+']').toggleClass('active2');
          elementClicked=true;
    }else {
          $('.file-folder').removeClass('active2').addClass('folderSelected');
          $('.file-folder[id='+folderId+']').addClass('active2');
          elementClicked=true;
    }


});

 $(document).on('mousedown','.file-folder',function(e){
    e.preventDefault();

     $('.active2').draggable({
                cursor: 'move',
                revert: true,
                  revertDuration: 200,
                helper: myHelper,
                 start  : function(event, ui){
               $(ui.helper).css("margin-left", event.clientX - $(event.target).offset().left);
                $(ui.helper).css("margin-top", event.clientY - $(event.target).offset().top);
                $('.active2').each(function(){
                     $('.active2').addClass('dragStart');
                })

                },
               stop: handleDragStop
             });

          $('.file-folder').droppable( {
            accept:'.active2',
             drop: handleDropEvent,
              classes: {
            "ui-droppable-hover": "ui-state-hover"
                 },

            } );
 })

function myHelper( event,ui ) {

    var folderName= $(this).attr('name');
     var numItems = $('.active2').length;
        var ids = $('.active2').map(function () {
            return this.id;
        }).get();

    var count=0;
        for(var i=0;i<ids.length;i++){
            count +=1;
            if(ids.length==1){
                   var helper ='<div class="helper">'+folderName+' </div>';
               }else{
                var helper ='<div class="helper">'+folderName+' <span class="badge badge-light">'+count+'</span></div>';
               }

        }

  return helper;
}
function handleDragStop( event, ui ) {

     $('.active2').each(function(){
                $('.active2').removeClass('dragStart');
                })

  // var offsetXPos = parseInt( ui.offset.left );
  // var offsetYPos = parseInt( ui.offset.top );
  // alert( "Drag stopped!nnOffset: (" + offsetXPos + ", " + offsetYPos + ")n");
}
function handleDropEvent( event, ui ) {
  var draggable = ui.draggable;
  // var ids=draggable.attr('id');
  var parentFolderId =$('#parentFolderId').val();
  var slotNumber = $(this).attr( 'id' );
    var applicationId= '<?php   echo $applicationId->applicationId ?>';
    var ids = $('.active2').map(function () {
            return this.id;
        }).get();

          if($(this).hasClass('active2')){
            event.revert= true;
          }else{
             event.revert= false;
            $.ajax({
                url: '{{ route('moveFolder') }}',
                type:'post',
                data:{
                    ids:ids,
                    slotNumber:slotNumber,
                    applicationId:applicationId,
                },
                dataType:'json',
                success:function(data){
                   fetch_data(parentFolderId);
                   alert(data.path);
                }
            });

               // alert( 'table id ' + parseInt(ids[i]) + ' was dropped onto table id '+slotNumber+'' );
          }


}


 $('#closeFolderDetails').on('click',function(e){
    $(document).off("click",".folderSelected");

      document.getElementById("mySidebar").style.width = "0px";
    document.getElementById("viewFolderModal").style.marginRight = "0px";
            $('.viewFolderDetails').show();
        if(elementClicked===true){
            elementClicked=false;

        };

 });

 // move to folder
 $(document).on('click','.close-clone2',function(e){
    $('.custom-menu2').hide();
 })
 $(document).on('click','.moveFolderTo',function(e){
    e.preventDefault();
    var folderId = $(this).attr('id');
    var applicationId= '<?php   echo $applicationId->applicationId ?>';
    var Fname = '<?php   echo $account_details->Fname ?>';
    var Lname= '<?php   echo $account_details->Lname ?>';
    $('.moveButton').last().remove();
    var parentId=$('#parentFolderId').val();
   $('.moveToFolderSelected').val(folderId);


        $('.file-folder[id='+folderId+']').addClass('active2 ');
          elementClicked=true;
           $("div.custom-menu2").hide();

     var custom =$("<div class=' custom-menu2'></div>")
        custom.append($('#menu-folder-clone2').html());
    custom.css({top: '200px', left: event.pageX + "px"});
      custom.find('.moveToFolderSelected').val( $(this).attr('id'));
      custom.appendTo("#viewDocuments");


  var selected =  $('.moveToFolderSelected').val();
      $.ajax({
        url:'{{ route('moveToFolder') }}',
        type:'post',
        data:{
            folderId:folderId,
            applicationId:applicationId,
            parentId:parentId,
            selected:selected,
            Fname:Fname,
            Lname:Lname
        },
        dataType:'json',

        success:function(data){
            $('.body-clone2').html(data.output);
        $('.moveToFolderParentId').val(parentId);
        $('.moveToFolderParentId2').val(parentId);
        $('.constantParentId').val(data.constantParentId);

        if(data.constantParentId ==null){
             $('.moveTo-header').html('Files');
            // body-clone2
        }else{
             $('.moveTo-header').html(data.folderName);
        }
        $('.button-move').append(data.button);
        $('.selectedParentId').val(data.selectedParentId);
        }
      })

     $(document).on('mouseover','.moveFolderToClass',function(e){
        e.preventDefault();
          var  folderId2 = $(this).attr('id');
          $(this).css({
            backgroundColor: '#F1F1F1',
            opacity: '0.8',
            cursor:'pointer'
          });
        $('.moveFolderView[id='+folderId2+']').show();

        // moveTo-header
    });
      $(document).on('mouseout','.moveFolderToClass',function(e){
        e.preventDefault();
          $(this).css({
            backgroundColor: '#fff',
             opacity: '1',
            cursor:'default'

          });
        $('.moveFolderView').hide();
        // moveTo-header
    });
       $(document).on('click','.moveFolderView',function(e){
         var folderIdView = $(this).attr('id');
           var parentId=$('#parentFolderId').val();
          var selected = $('.moveToFolderSelected').val();
          moveFolderView =true;
          e.stopPropagation();
         moveFolderViewFetch(folderIdView,parentId,applicationId,selected);

        })
        $(document).on('click','.moveToFolderParentIdBack',function(e){

           var folderIdView =$('.moveToFolderParentId2').val();
           var parentId =$('.moveToFolderParentId2').val();
             var selected = $('.moveToFolderSelected').val();
         moveFolderViewFetch(folderIdView,parentId,applicationId,selected);
        })

         $(document).on('dblclick','.moveFolderToClass',function(){
                    var folderIdView = $(this).attr('id');
                    var parentId=$('#parentFolderId').val();
                  var selected = $('.moveToFolderSelected').val();
         moveFolderViewFetch(folderIdView,parentId,applicationId,selected);
         });
 })

var moveFolderView =false;
 function moveFolderViewFetch(folderIdView,parentId,applicationId,selected){
            $('.moveFolderToClass').removeClass('activeMove');

    var folderIdView = folderIdView;
    var parentId = parentId;
    var constantParentId=  $('.constantParentId').val();
    var applicationId = applicationId;
      var selected =  selected
      var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';


     $.ajax({
                        url:'{{ route('moveFolderToSelected') }}',
                        type:'post',
                        data: {
                            folderIdView:folderIdView,
                            applicationId:applicationId,
                            parentId:parentId,
                            selected:selected,
                            Fname:Fname,
                            Lname:Lname,

                        },
                        dataType:'json',
                        success:function(data){
                             $('.body-clone2').html(data.output);
                             $('.moveToFolderParentId').val(folderIdView);
                             $('.moveToFolderParentId2').val(data.folderParentId);
                          $('.moveToFolderSelected').val(selected);
                          $('.moveTo-header').html(data.folderName);
                          var selectedParentId = $('.selectedParentId').val();
                          var selectedParentId2 = $('.selectedParentId2').val();


                           if(selectedParentId ==selectedParentId2){

                             $('.moveButton').attr('disabled',true);
                            $('.moveButton').attr('title','Item is already in this folder');
                             $('.moveButton').removeClass('btn-primary').addClass('btn-default');
                               $('.moveButton').html('Move');
                          }else{
                             $('.moveButton').removeAttr('disabled title');
                          $('.moveButton').removeClass('btn-default').addClass('btn-primary');
                          $('.moveButton').html('Move here');


                          }
                        }
                    })
 }

  $(document).on('click','.moveFolderToClass',function(){
          var moveFolderViewId = $(this).attr('id');
           var applicationId= '<?php   echo $applicationId->applicationId ?>';
           $.ajax({
            url:'{{ route('moveViewParentFolderId') }}',
            type:'post',
            data:{
                moveFolderViewId:moveFolderViewId,
                applicationId:applicationId,
            },
            dataType:'json',
            success:function(data){

               if(  $('.moveFolderToClass[id='+moveFolderViewId+']').hasClass('activeMove')){
                  $('.moveFolderToClass[id='+moveFolderViewId+']').toggleClass('activeMove');
                  $('.moveToFolderParentId').val(data.parentId);
                  // var folderParentId= $('.moveToFolderParentId2').val();
                   var selectedParentId = $('.selectedParentId').val();

                   if(selectedParentId == data.parentId){
                             $('.moveButton').attr('disabled',true);
                            $('.moveButton').attr('title','Item is already in this folder');
                             $('.moveButton').removeClass('btn-primary').addClass('btn-default');

                        }else{
                            $('.moveButton').removeAttr('disabled title');
                          $('.moveButton').removeClass('btn-default').addClass('btn-primary');
                          $('.moveButton').html('Move here');
                        }


                  }else{
                     $('.moveFolderToClass').removeClass('activeMove');
                      $('.moveFolderToClass[id='+moveFolderViewId+']').addClass('activeMove');
                        $('.moveToFolderParentId').val(moveFolderViewId);
                     // var folderParentId= $('.moveToFolderParentId2').val();
                     // var folderParentId2= $('.moveButton').attr('id');

                     $('.moveButton').removeAttr('disabled title');
                     $('.moveButton').removeClass('btn-default').addClass('btn-primary');
                    $('.moveButton').html('Move ');



                  }
            }
           });


              $('.moveFolderViewIcon').removeClass('moveFolderViewIconHover');
           $('.moveFolderViewIcon[id='+moveFolderViewId+']').addClass(' moveFolderViewIconHover');

       })



  $(document).on('click','.moveButton',function(e){
    e.preventDefault();
    var folderId= $('.moveToFolderParentId').val();
//       moveToFolderParentId
// moveToFolderSelected
    alert(folderId);
  })




 $(document).on('click','.renameFolder',function(e){
    e.preventDefault();
      var folderId = $(this).attr('id');
      var folderNameOld = $('input[id='+folderId+'] ').val();

    $('.renameFolder2[id="'+folderId+'"]').siblings('div').hide();
        $('.renameFolder2[id="'+folderId+'"]').show();
      $(".renameFolder2").select().focus();




    $('.renameFolder2[id="'+folderId+'"]').blur(function() {
        if (!$(this).hasClass('keyupfired')) {
            var folderName =$(this).val();
            $(this).hide();
            $(this).siblings('div').show();
             $(this).addClass('keyupfired');
            folderRename(folderName,folderNameOld,folderId);

             }
        });

  $('.renameFolder2[id="'+folderId+'"]').keyup(function(event){
        var folderName =$(this).val();
         if (!$(this).hasClass('keyupfired')) {
           if ( event.keyCode == 13 ) {
                 event.preventDefault();
                   var folderName =$(this).val();
                 $(this).hide();
                 $(this).siblings('div').show();
                $(this).addClass('keyupfired');
                folderRename(folderName,folderNameOld,folderId);


              }

        }

    });

})


    function folderRename(folderName,folderNameOld,folderId){
        var folderName=folderName;
        var folderNameOld=folderNameOld;
        var folderId2=folderId;
        var admin ='{{Session::get('adminID')['username']}}';
        var applicationId= '<?php   echo $applicationId->applicationId ?>';
        var parentFolderId=$('#parentFolderId').val();

        if (folderName.trim() == '' || folderName.trim()===folderNameOld.trim()) {
            $('.renameFolder2').val(folderNameOld);
            $('.renameFolder2').hide();
            $('.renameFolder2').siblings('div').show();
            $('.renameFolder2').removeClass('keyupfired');
         }else{
            $.ajax({
                url:'{{ route('folderRename') }}',
                type:'post',
                data:{
                    folderName:folderName,
                    folderId2:folderId2,
                    admin:admin,
                    applicationId:applicationId
                },
                dataType:'json',
                success:function(data){
                      $('.renameFolder2').removeClass('keyupfired');
                    if(elementClicked==true){
                    viewFolderDetails(folderId2);

                    }

            fetch_data(parentFolderId);

                }
            });
         }
    }

$(document).on("contextmenu",'.file-folder', function(event) {
    event.preventDefault();

    $("div.custom-menu").hide();
    var folderId = $(this).attr('id');
    var folderNameOld = $('#folderNameOld').val();
var applicationId= '<?php   echo $applicationId->applicationId ?>';


$('.moveFolderToClass').removeClass('moveFolderToClass activeMove');
    $('.custom-menu2').hide();
   $('.file-folder').removeClass('active2');
   $('.file-folder[id='+folderId+']').addClass('active2');
    var custom =$("<div class='custom-menu'></div>")
        custom.append($('#menu-folder-clone').html());
         custom.find('.viewFolderDetails').attr('id',$(this).attr('id'));
         custom.find('.renameFolder').attr('id',$(this).attr('id'));
         custom.find('.moveFolderTo').attr('id',$(this).attr('id'));

    custom.css({top: '200px', left: event.pageX + "px"});
      custom.appendTo("#viewDocuments");
$('.openFolder').on('click',function(e){
    e.preventDefault();

        var parentId=$('#parentId').val();

            $.ajax({
                url: '{{ route('viewFolder') }}',
                type:'post',
                data:{

                    applicationId:applicationId,
                    folderId:folderId,
                    parentId:parentId
                },
                dataType: 'json',
                success:function(data){
                     $('#folder_table').html(data.data);

                     $('#path').append('<div id='+data.folderParentId+' class="d-inline-block"><a type="button" class="btn  pathView" id="'+data.folderId+'"><span><input type="hidden" value="'+data.folderParentId+'" id="folderIdPath"><i class="fa fa-folder">'+data.folderName+'</i></span></a></div>');


                      $('#parentFolderId').val(folderId);
                      $('#parentFolderId2').val(folderId);
                      $('#addFileButton').show();

                }
            });


});

     $('html').click(function(e) {

         $('.custom-menu').hide();
         // $('.custom-menu2').hide();
         if(elementClicked!=true){
         $('.file-folder').removeClass('active2');
         }

        if( !$('.custom-menu2').find('*').is(e.target)){
                $('.custom-menu2').hide();
        }
    });
    //   $('html').contextmenu(function() {
    //      $('.custom-menu').hide();
    //         $('.file-folder').removeClass('active2');

    // });
})


$('#updateDetails').on('submit',function(e){
    e.preventDefault();
  var id =$('#applicantId_info').val();
  var Fname =$('#Fname_info').val();
  var Lname =$('#Lname_info').val();
  var Mname =$('#Mname_info').val();
  var contact_num =$('#contact_num_info').val();
  var alcontact =$('#alcontact_info').val();
  var purok =$('#purok_info').val();
  var barangay	 =$('#barangay_info').val();
  var city =$('#city_info').val();


 $.ajax({
    type:'POST',
    url: "{{ route('update_info') }}",
    data:{
        id:id,
        Fname:Fname,
        Lname:Lname,
        Mname:Mname,
        contact_num:contact_num,
        alcontact:alcontact,
        purok:purok,
        barangay:barangay,
        city:city,
    },
    dataType: 'json',
    success:function(data){
        toastr.success(data.msg);
    }
 });

});

$('.business_info_button').on('click',function(e){
    e.preventDefault();
    var applicationId = $(this).attr('id');

    $.ajax({
        type:'post',
        url: '{{ route('view_business_info') }}',
        data:{
            applicationId:applicationId
        },
        dataType:'json',
        success:function(data){
    $('#business_info_view').modal('show');


        $.each(data.data2, function(index, value){
            $('#type_application').val(value['type_application']);
            $('#applicationId_businessInfo').val(value['applicationId']);
            $('#control_number').val(value['control_number']);
            $('#type_occupancy').val(value['type_occupancy']);
            $('#nature_business').val(value['nature_business']);
            $('#business_name').val(value['business_name']);
            $('#Bin').val(value['Bin']);
            $('#BP_num').val(value['BP_num']);
            $('#OR_num').val(value['OR_num']);
            $('#status').val(value['status']);
            $('#date_apply').val(value['date_apply']);
            $('#remarks').val(value['remarks']);
            $('#Fname_Business').val(value['Fname']);
            $('#Lname_Business').val(value['Lname']);
            $('#Mname_Business').val(value['Mname']);
            $('#contact_num_Business').val(value['contact_num']);
            $('#alcontact_business').val(value['alcontact']);
            $('#applicant_businessInfo').val(value['applicantId']);


    $('.view_button').html('<button type="button" class="btn btn-primary" id="setSchedule"><i class="fa fa-calendar"> Set schedule</i></button><button type="submit" class="btn btn-warning"><i class="fa fa-pencil"> Update</i></button>');
        });
        $.each(data.address_application,function(key, value){
            $('#purok_business').val(value['purok']);
            $('#barangay_business').val(value['barangay']);
            $('#city_business').val(value['city']);
        });

        $.each(data.address_applicant,function(key, value){
            $('#purok_applicant').val(value['purok']);
            $('#barangay_applicant').val(value['barangay']);
            $('#city_applicant').val(value['city']);
        });

        $.each(data.inspector,function(index , value){
            $('#inpector_id').append('<option value='+value['inspectorId']+'>'+value['Fname']+ ' ' +value['Lname']+'');
        })


        $.each(data.schedule,function(index, value){
            $('#set_schedule_text').html('Application Inspection set on ' + value['date_inspection']+'' );
            $('#setSchedule').attr('disabled', 'disabled');
        })

        }
    })


});


$('#applicationAdd').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:'post',
        url:'{{ route('update_business_info') }}',
        data: new FormData(this),
        contentType: false,
      processData: false,
        dataType:'json',
        success:function(data){
            toastr.success(data.msg);
        }
    })

});

$(document).on('click','#setSchedule',function(e){
    e.preventDefault();
  $('#set_schedule_modal').modal('show');

});

$('#set').on('click',function(e){
    e.preventDefault();

    var applicationId = $('#applicationId_businessInfo').val();
    var inpector_id = $('#inpector_id').val();
    var applicantId = $('#applicant_businessInfo').val();
    var date_inspection=$('#date_inspection').val();

     Swal.fire({
          title:"Comfirm Schedule",
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
                      type: 'post',
                      url:'{{ route('set_schedule') }}',
                      data:{
                        applicationId:applicationId,
                        inpector_id:inpector_id,
                        applicantId:applicantId,
                        date_inspection:date_inspection
                      },
                      dataType: 'json',
                      success:function(data){
                            toastr.success(data.msg);
                    $('#set_schedule_modal').modal('hide');
                   $('#business_info_view').modal('hide');


                      }

                  })

             }

                });
});

$('.view_payment_info').on('click',function(e){
    e.preventDefault();
    var applicationId  = $(this).attr('id');
    var applicantId  = $('#view_payment_applicationId').val();


    $.ajax({
        type: 'post',
        url:'{{ route('payment_view') }}',
        data:{
            applicationId :applicationId,
            applicantId :applicantId
        },
        dataType: 'json',
        success:function(data){
    $('#payment_view_modal').modal('show');
    $('#nature_payment_body').html(data.output);
            $.each(data.data,function($key,$value){
          $('#applicant_name_payment').val($value['Fname']+ ' ' +$value['Mname']+ ' '  + $value['Lname']);
          $('#applicant_address').val($value['purok']+ ', ' +$value['barangay']+ ', '  + $value['city']);
         ;
          $('#total_amount_inwords').val($value['total_amount_words']);
          $('#receipt_no').val($value['receipt_no']);
          $('#assessmentId').val($value['assessmentId']);
          $('#amount_paid').val($value['amount_paid']);
          $('#date_paid').val($value['payment_date']);
          $('#change').val($value['change']);




        });
        $.each(data.data3,function($key, $value){
          $('#defaultId').val($value['id']);
          $('#authority_of').val($value['authority_of']);
          $('#fee_assessor').val($value['fee_assessor']);
        });
        }
    })

});

$('.view_inspection_report').on('click',function(e){
  e.preventDefault();
  var applicationId = $(this).attr('id');

  $.ajax({
    type:'post',
    url:'{{ route('view_inspection_report') }}',
    data:{
      applicationId:applicationId
    },
    dataType: 'json',
    success:function(data){
      $('#inspection_modal').modal('show');

      $.each(data.data,function(key, value){
        $('#type_application_inspection').val(value['type_application']);
        $('#inspector_name').val(value['Fname'] + ' ' + value['Lname']);
        $('#date_inspected').val(value['date_inspect']);
        $('#inspection_status').val(value['status']);
        $('#beams').val(value['beams']);
     $('#exterior').val(value['exterior']);
     $('#main_stair').val(value['main_stair']);
    $('#main_door').val(value['main_door']);
     $('#colums').val(value['colums']);
    $('#corridor_walls').val(value['corridor_walls']);
     $('#windows').val(value['windows']);
     $('#trussess').val(value['trussess']);
    $('#flooring').val(value['flooring']);
     $('#room_partitions').val(value['room_partitions']);
     $('#ceiling').val(value['ceiling']);
     $('#roof').val(value['roof']);
     $('#sectional_occupancy').val(value['sectional_occupancy']);
     $('#emergency_lights').val(value['emergency_lights']);
     $('#no_stinguisher').val(value['no_stinguisher']);
    $('#fire_alarm').val(value['fire_alarm']);
     $('#location_panel').val(value['location_panel']);
     $('#defects').val(value['defects']);
     $('#recommendation').val(value['recommendation']);
        if(value['verify'] == null){
          $('#verify_inspection').val('not verify');
          $('#verify_button').html(' <button type="button" class="btn btn-success verify_inspection_button" id='+value['applicationId']+'><i class="fa fa-check"> </i> Verify</button>')
        }else{
          $('#verify_inspection').val('verified');
          $('#verify_button').html('');
        }
      })

    }
  })


})

$(document).on('click','.verify_inspection_button',function(e){
  e.preventDefault();
var applicationId = $(this).attr('id');
var adminPass='{{Session::get('adminID')['password']}}';

Swal.fire({
         title:"Verify Inspection Report",
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
              $('#inspection_modal').modal('hide');
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
                              url:'{{ route('verify_inspection_report') }}',
                              data:{
                                applicationId:applicationId,
                              },
                              dataType: 'json',
                              success:function(data){
                                swal.close();
                                toastr.success(data.msg);
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

$('.print_certificate').on('click',function(e){
  e.preventDefault();
  var applicationId = $(this).attr('id');

  $.ajax({
    type:'post',
    url:'{{ route('print_certificate') }}',
    data:{
      applicationId:applicationId
    },
    dataType:'json',
    success:function(data){
      $('#Print_certificate').modal('show');
        $('#business_name_print').val(data.business_name);
        $('#address_print').val(data.address);
        $('#applicant_name').val(data.applicant);
        $('#amount_paid_payment').val(data.amount_paid);
        $('#OR_num_print').val(data.OR_num);
        $('#payment_date').val(data.payment_date);
        $('#marshal').val(data.marshal);
        $('#chief').val(data.chief);

      var output='';
      // if(data.data =='Fire Safety Evaluation Clearance'){
      //   $('#print_content').html(' <img src="{{url('images/certificate/fsec.jpg')}}" alt=""><div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">close</button><button type="button" class="btn btn-primary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button></div>');
      // }
      // if(data.data =='Fire Safety Inspection Certificate for Business'){
      //   $('#print_content').html(' <img src="{{url('images/certificate/fsic_business.jpg')}}" alt=""><div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">close</button><button type="button" class="btn btn-primary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button></div>');
      // }
      // if(data.data =='Fire Safety Inspection Certificate for Occupancy'){
      //   $('#print_content').html(' <img src="{{url('images/certificate/fsic_occupancy.jpg')}}" alt=""><div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">close</button><button type="button" class="btn btn-primary" onclick="printDiv()"><i class="fa fa-print"></i> Print</button></div>');

      // }
    }
  })

});








      })


  </script>
<script>
    function printDiv() {
            var divContents = document.getElementById("print_content").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<body stye="width:40px;height:50px"> ');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printDivPayment() {
            var divContents = document.getElementById("receipt").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<body stye="width:40px;height:50px"> ');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>


  @endsection

