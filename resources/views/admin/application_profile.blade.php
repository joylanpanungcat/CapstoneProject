
@extends('admin/include.navbar')
@section('title','applicant account')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inspectionReport.css') }}">
<link rel="stylesheet" href="{{ asset('css/noticeToComply.css') }}">
<link rel="stylesheet" href="{{ asset('css/noticeToCorrect.css') }}">
  <style type="text/css">
table tbody tr td input{
border: none;
background-color: transparent;
padding: 5px;
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
/* text-align: center; */
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
/* text-align: center; */

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
/* text-align: center; */
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
    /* text-align: center; */
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
/* text-align: center; */
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
  /* text-align: center; */
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
.certificate_content .top {
    text-align: center;
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
.add_mobile_account {
    background-color: #446587;
    color: #fff;
    padding: 5px;
    border: none;
    border-radius: 10px;
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
  margin-left: auto;
  position: relative;
}
.panel-heading input {
    /* text-align: justify !important; */
}
.noticeToComplyCertNodata{
    display: block;
    text-align: center;
}
.noticeToComplyCertNodata img{
    width: 42%;
    margin-right: auto;
    margin-left: auto;
    display: block;
    padding: 0 36px;
}
.noticeToComplyCertNodata h1{
    margin-top: 23px;
}
.noticeToCorrectNoData{
    display: block;
    text-align: center;
}
.noticeToCorrectNoData img{
    width: 42%;
    margin-right: auto;
    margin-left: auto;
    display: block;
    padding: 0 36px;
}
.noticeToCorrectNoData h1{
    margin-top: 23px;
}
.deficiencies{
    display: flex;
    gap: 20px;
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
                                        <input type="text" name="" id="Fname_info" class="form-control" value="{{ $Fname }}">
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
                                    <img src="{{ asset('images/no_user.png') }}" alt=""><br>
                                    <button class="add_mobile_account" id="add_mobile_account">Connect Mobile Account</button>
                                 </center>
                                 <input type="hidden" value="<?php foreach($application as $applicationId){
                                     echo $applicationId->applicationId;
                                 } ?>" id="connect_mobile_applicationId">

                             </div>
                         </div>
                         @endif

                         <div class="col-md-12">
                              {{-- <hr class="separate"> --}}
                                <div class="x_title">
                                    <h2>Applicant and Business Information  <small></small></h2>


                                    <div class="clearfix"></div>
                                </div>
                         </div>

                            <div class="col-md-12">
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
                                        <td>@if ($application->status === 'pending')
                                            <div class="badge badge-info">{{ $application->status }}</div>
                                            @elseif ($application->status === 'approved')
                                            <div class="badge badge-success">{{ $application->status }}</div>
                                            @elseif ($application->status === 'reinspection')
                                            <div class="badge badge-warning">{{ $application->status }}</div>
                                            @elseif ($application->status === 'forinspection')
                                            <div class="badge badge-primary">{{ $application->status }}</div>
                                            @elseif ($application->status === 'rejected')
                                            <div class="badge badge-danger">{{ $application->status }}</div>
                                        @endif
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
                                                  <th>Addess</th>
                                                  <th>Application Status</th>
                                                  <th>Action</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                              @endphp
                                               @foreach ($certificate as $certificate)
                                              <tr>
                                                  <td>{{$i++}}
                                                  </td>
                                                  <td>
                                                      {{$certificate->type_application}}
                                                  </td>
                                                  <td>{{$certificate->date_apply}}
                                                  </td>
                                                  <td>{{$certificate->purok}},{{  $certificate->barangay }},{{ $certificate->city }}
                                                  </td>
                                                  <td>@if ($application->status === 'pending')
                                                    <div class="badge badge-info">{{ $certificate->status }}</div>
                                                    @elseif ($certificate->status === 'approved')
                                                    <div class="badge badge-success">{{ $certificate->status }}</div>
                                                    @elseif ($certificate->status === 'reinspection')
                                                    <div class="badge badge-warning">{{ $certificate->status }}</div>
                                                    @elseif ($certificate->status === 'forinspection')
                                                    <div class="badge badge-primary">{{ $certificate->status }}</div>
                                                    @elseif ($certificate->status === 'rejected')
                                                    <div class="badge badge-danger">{{ $certificate->status }}</div>
                                                @endif
                                                </td>
                                                    @if ($certificate->status == 'approved' || $certificate->status == 'renewal')
                                                    <td> <button type="button" class="btn btn-success  print_certificate"  id="{{ $certificate->applicationId }}" ><i class="fa fa-print"   ></i> Print</button></td>
                                                    @else

                                                        <td>Check payment and inspection details</td>


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
                                                <th>Application Status</th>
                                                <th>Business Name</th>
                                                  <th>Payment Status</th>
                                                <th>Action</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                            @if (count($assessment)>0)
                                            @php
                                                    $i=1;
                                            @endphp
                                            @foreach ($assessment[0]->assessment as $assessmentData)
                                                <tr>
                                                 <td>{{ $i++ }}</td>
                                                <td>{{ $assessmentData['type_application'] }}</td>
                                                <td>{{ $assessmentData['status'] }}</td>
                                                <td>{{ $assessmentData['business_name'] }}</td>
                                                <td>@if( $assessmentData['payment_status'] === null)
                                                    <div class="badge badge-danger">unpaid</div>
                                                 @else
                                                    <div class='badge badge-success'>{{ $assessmentData['payment_status']; }}</div>
                                                 @endif</td>
                                                <td>
                                                    @if ($assessmentData['payment_status'] === null)
                                                    <a href="{{ route('assessmentSearch', ['name' => $assessmentData['Fname'].' '.$assessmentData['Lname']]) }}" target="_blank" type='' name='view' class='btn btn-primary view'
                                                        ><i class='fa fa-plus'></i></a>
                                                    @else
                                                    <button type='' name='view' class='btn btn-success view view_payment_history'
                                                    id="{{$assessmentData['applicationId']}}"><i class='fa fa-eye'></i>
                                                    </button>
                                                    @endif
                                              </td>
                                                 </tr>
                                            @endforeach
                                            @else
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
                                        <td>@if ($uploaded->status === 'pending')
                                            <div class="badge badge-info">{{ $uploaded->status }}</div>
                                            @elseif ($uploaded->status === 'approved')
                                            <div class="badge badge-success">{{ $uploaded->status }}</div>
                                            @elseif ($uploaded->status === 'reinspection')
                                            <div class="badge badge-warning">{{ $uploaded->status }}</div>
                                            @elseif ($uploaded->status === 'forinspection')
                                            <div class="badge badge-primary">{{ $uploaded->status }}</div>
                                            @elseif ($uploaded->status === 'rejected')
                                            <div class="badge badge-danger">{{ $uploaded->status }}</div>
                                        @endif
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
                                                <th>Business Name</th>
                                                <th>Inspector Name</th>
                                                <th>Date inspected</th>
                                                <th>Application Status</th>
                                                <th>Action</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                            $i=1;
                                            $index= 0;

                                            @endphp
                                             @if ($inspection_details->count()>0)
                                               @foreach ($inspection_details[0]->inspection_details as $inspection_detailsItem)
                                            <tr>
                                                <td>{{$i++}}
                                                </td>
                                                <td>
                                                    @if ($inspection_details[0]->inspection_details[$index]['status']!== null)
                                                    {{ $inspection_details[0]->inspection_details[$index]['business_name'] }}
                                                    @else
                                                     {{$inspection_details[0]->business_name}}
                                                    @endif

                                                </td>

                                                <td>@if ($inspection_details[0]->inspection_details[$index]['status']!== null)
                                                    {{ $inspection_details[0]->inspection_details[$index]['Fname'] }}
                                                    ,{{ $inspection_details[0]->inspection_details[$index]['Lname'] }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td>@if($inspection_details[0]->inspection_details[$index]['status']!== null)
                                                    {{ $inspection_details[0]->inspection_details[$index]['date_inspect'] }}
                                                    @else
                                                    N/A
                                                @endif
                                                </td>
                                                </td>
                                                <td>@if ($inspection_details[0]->inspection_details[$index]['status']!== null)
                                                        @if ($inspection_details[0]->inspection_details[$index]['status'] === 'pending')
                                                            <div class="badge badge-info"> {{ $inspection_details[0]->inspection_details[$index]['status'] }}</div>
                                                            @elseif ($inspection_details[0]->inspection_details[$index]['status'] === 'approved')
                                                            <div class="badge badge-success"> {{ $inspection_details[0]->inspection_details[$index]['status'] }}</div>
                                                            @elseif ($inspection_details[0]->inspection_details[$index]['status'] === 'reinspection')
                                                            <div class="badge badge-warning"> {{ $inspection_details[0]->inspection_details[$index]['status'] }}</div>
                                                            @elseif ($inspection_details[0]->inspection_details[$index]['status'] === 'forinspection')
                                                            <div class="badge badge-primary"> {{ $inspection_details[0]->inspection_details[$index]['status'] }}</div>
                                                            @elseif ($inspection_details[0]->inspection_details[$index]['status'] === 'rejected')
                                                            <div class="badge badge-danger"> {{ $inspection_details[0]->inspection_details[$index]['status'] }}</div>
                                                        @endif

                                                    @else
                                                  N/A
                                                @endif
                                                </td>
                                                <td>
                                                @if ($inspection_details[0]->inspection_details[$index]['status']!== null)
                                                <input type="hidden" value="{{ $inspection_details[0]->applicantId }}" id="view_payment_applicationId">
                                                <button type='' name='view' class='btn btn-success view view_inspection_report'
                                                  id="{{$inspection_details[0]->inspection_details[$index]['applicationId']}}"><i class='fa fa-eye'></i></button>
                                                @else
                                                Set schedule to inspection
                                                @endif

                                                </td>
                                            </tr>
                                            @php
                                                $index++;
                                            @endphp
                                                 @endforeach
                                            @else
                                                @php
                                                $i=1;
                                                @endphp
                                             @foreach ($assessment as $assessment)
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
            <div class="main-panel " id="main-panel">
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
                              <input type="text" class="top-input" name="" id="" style="width:40%">
                              <input type="text" class="top-input" name="" id=""  style="width:60%">
                              <input type="text" class="top-input"name="" id=""  style="width:80%">
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
            <button type="button" class="btn btn-primary" id="printCertificate"><i class="fa fa-print"></i> Print</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">close</button>
          </div>
          </div>
      </div>

  </div>
  <div id="divhidden"></div>
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
                                <option value="rejected">rejected</option>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Date Apply</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="date_apply" class="form-control" id="date_apply" readonly>
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Date Approved</label>
                    </div>
                        <div class="col-md-12">
                            <input type="text" name="date_approved" class="form-control" id="date_approved" readonly>
                          </div>
                    </div>
                    <div class="form-group row col-md-3">
                        <div class="col-md-12">
                        <label class="control-label ">Remarks</label>
                    </div>
                        <div class="col-md-12">
                            <select id="remarks"  class="form-control " name="remarks" disabled>
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


    <div class="modal fade " id="add_mobile_account_modal" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal_assessment">
          <div class="modal-content modal-lg">
            <div class="modal-header">
              <h4 class="modal-title" id="ModalTitle">Connect Account</h4>

              <div class="btn-group mr-2  " role="group" aria-label="First group">
                                   <input type="text" name="" placeholder="Search Account.." id="search_account_connect">
                          <button type="button" class="btn btn-secondary " id="search_account_connect_button"><i class="fa fa-search"></i></button>
                        </div>
            </div>
            <div class="modal-body">
                  <div class="row">
                    <table class="table table_assessment">
                      <thead>
                         <tr>
                          <td>#</td>
                          <td>Name</td>
                          <td>Username</td>
                          <td>Action</td>
                        </tr>
                         </thead>
                        <tbody class="tbody_add_mobile_account_modal" >


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
               </div>
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

      <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="payment_view_history_modal">
        <div class="modal-dialog modal-xl view-modal-dialog">
          <div class="modal-content view-modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Payment History</h5>
                 <button type="button" class="close" data-dismiss="modal">x</button>
             </div>
             <div class="modal-body view-modal-body ">
                <table class="table">
                    <thead>
                        <th>Type of Application</th>
                        <th>Total Amount</th>
                        <th>Date Paid</th>
                        <th>Type of Payment</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="payment_view_history_modal-body"></tbody>
                </table>
             </div>
          </div>
        </div>
      </div>
      <div id="inspection_modal_details" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl view-modal-dialog">
            <div class="modal-content view-modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Inspection Report</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body view-modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Business name</th>
                                <th>Inspector name </th>
                                <th>Date inspected </th>
                                <th>Type of Inspection </th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="inspection_modal_details_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="view_inspection_details_modal">
        <div class="modal-dialog modal-xl view-modal-dialog">
          <div class="modal-content view-modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Inspection Details</h5>
                 <button type="button" class="close" data-dismiss="modal">x</button>
             </div>
             <div class="modal-body view-modal-body ">
                <table class="table">
                    <thead>
                        <th>Type of Application</th>
                        <th>Total Amount</th>
                        <th>Date Paid</th>
                        <th>Type of Payment</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="payment_view_history_modal-body"></tbody>
                </table>
             </div>
          </div>
        </div>
      </div>
{{-- generate receipt modal  --}}
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
                        <div class="panel-heading"><h5>NAME: <span  ><input type="text" class="underline"  id="applicant_name_payment" name=""  ></span></h5></div>

                        <div class="panel-heading"><h5>ADDRESS: <span  ><input type="text" class="underline"  id="applicant_address" name=""  ></span></h5></div>
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
                                  <div class="button-group total_body2 ">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal" id="" style="display: inline-block;"  ><i class="fa fa-arrow-left" ></i>  Close</button>
                                      <button type="button" class="btn btn-secondary print_payment_button"  id="print_payment_button"><i class="fa fa-print" ></i>  Print</button>
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
      </div>



      <div id="inspection_modal" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content modal-header-inpsection-report ">
                <div class="modal-header ">
                    <h5 class="modal-title">Inspection Report</h5>
                    <div class="btn-group">
                        <div id="updateInspectionDetailsButton" style="margin-right: 10px"></div>
                        <div id="verify_button" style="margin-right: 10px"></div>
                        <button type="button" class="btn btn-success print-inspection" >Print</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                  <li role="presentation" class="active" ><a href="#tab_contentInspectionDetails" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Inspection Details</a>
                                  </li>
                                   <li role="presentation" class=""  ><a href="#tab_contentNotice" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Notice To Comply</a>
                                  </li>
                                   <li role="presentation" class=""><a href="#tab_contentToCorrect" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Notice To Correct Violation</a>
                                  </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab_contentInspectionDetails" aria-labelledby="profile-tab">
                                    <div class="page1">
                                        <div class="mainborder">
                                  <div class="topcontainer">
                                    <div class="leftcol" >
                                        <img src="{{ asset('images/dilg.png') }}" alt="Paris" class="logo">
                                    </div>
                                    <div class="midcol" >
                                            <ul class="headerinfo">
                                                <li>Republic of the Philippines</li>
                                                <li class="boldletter" style="font-size:9px;">Department of the Interior and Local Government</li>
                                                <li class="boldletter" style="font-size:9px;">Bureau of Fire Protection</li>
                                                <li class="smol">Regional Office XI</li>
                                                <li class="smol">Davao Del Norte Provincial Office</li>
                                                <li class="smol">Panabo City Fire Station</li>
                                                <li class="smol">Brgy. New Pandan, Panabo City</li>
                                                <li class="smol">Hotline # (084) 822-0160/ Email: stflorian_pcfo@yahoo.com.ph</li>
                                                <li class="smol">Globe: 09284587586/Smart: 09659334466</li>
                                            </ul>
                                    </div>
                                    <div class="rightcol" >
                                        <img src="{{ asset('images/logo.png') }}" alt="Paris" class="logo">
                                    </div>
                                    </div>

                                    <div class="personalinfo">
                                        <div>
                                            <ul class="person">
                                            <li>
                                            <form>
                                            <input type="text" value="" class="textboxinfo" id="nameOwner" readonly>
                                            </form>
                                            <label>(Name of Owner)</label> </li>

                                            <li>
                                            <form>
                                            <input type="text" value="" class="textboxinfo" id="nameEstablishment" readonly>
                                            </form>
                                            <label>(Name of Establishment)</label> </li>

                                            <li>
                                            <form>
                                            <input type="text" value="" class="textboxinfo" id="applicationAddress" readonly>
                                            </form>
                                            <label>(Address)</label> </li>

                                        </ul>
                                        </div>

                                        <div class="datecol">
                                            <form>
                                                <label class="date" >DATE</label>
                                                <input type="date" value="" class="changeDetials" id="date_issued">
                                            </form>

                                        </div>
                                    </div>

                                    <div class="third">
                                        <form>
                                            <label for="" class="boldletter">SUBJECT: Inspection of</label>
                                            <input type="text" value="">
                                        </form>
                                        <div class="for-attn">
                                        <label style="padding-right:5px;">FOR</label>
                                        <label class="boldletter">:CITY FIRE MARSHAL</label> <br>
                                        <label>ATTN</label>
                                        <label class="space">:CHIEF, FIRE SAFETY ENFORCEMENT SECTION</label>
                                        </div>

                                    </div>

                                    <div class="fourth">
                                        <form>
                                            <label> <strong> REFERENCE: </strong> INSPECTION ORDER NO.</label>
                                            <input type="text" value="" style="width: 214px;">
                                        </form>

                                        <form>
                                            <label>DATE ISSUED</label>
                                            <input type="text" value="">
                                        </form>

                                        <form>
                                            <label>DATE OF INSPECTION:</label>
                                            <input type="text" value="" class="inspectiondate" id="date_inspect">
                                        </form>

                                    </div>
                                    <div class="nature-inspection">
                                        <label><strong>NATURE OF INSPECTION CONDUCTED: [ ] Check Appropriate Box </strong></label>
                                    </div>
                                    <div class="fifth">
                                        <div class="checkitems1">
                                            <ul class="checc">

                                             <li><label for="" class="container">
                                                <input type="checkbox" id="under_construction" >
                                                <span class="checkmark" ></span>
                                                Building under construction
                                            </label></li>
                                             <li><label for="" class="container">
                                                <input type="checkbox" id="occupancy_permit" >
                                                <span class="checkmark"></span>
                                                Application for Occupancy Permit
                                            </label></li>
                                             <li><label for="" class="container">
                                                <input type="checkbox" id="business_permit" >
                                                <span class="checkmark"></span>
                                                Application for Business Permit
                                            </label></li>
                                             <li><label for="" class="container">
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                                Others (Specify)
                                            </label>
                                            <input type="text" class="others" id="others_specify"></li>

                                        </ul>
                                        </div>


                                        <div class="checkitems2">
                                            <ul class="checc">

                                             <li><label for="" class="container">
                                                <input type="checkbox" id="periodic_inspection">
                                                <span class="checkmark"></span>
                                                Periodic Inspection of Occupancy
                                            </label></li>
                                             <li><label for="" class="container">
                                                <input type="checkbox" id="verification_inspection_compliance" >
                                                <span class="checkmark"></span>
                                                Verification Inspection of Compliance to NTCV
                                            </label></li>
                                             <li><label for="" class="container">
                                                <input type="checkbox" id="verification_inspection_complaint" >
                                                <span class="checkmark"></span>
                                                Verification Inspection of Complaint Received </label></li>
                                        </ul>
                                        </div>
                                    </div>

                                    <div>
                                    <div>
                                        <label class="occ-checklist">OCCUPANCY CHECKLIST</label>
                                    </div>
                                    <div>
                                        <label class="general-info">I.GENERAL INFORMATION</label>
                                    </div>

                                    <div class="generalinfo1">
                                        <ul class="generalinfo11">
                                            <li>
                                            <label for="" class="container">
                                            Name of Building
                                            </label>
                                            <input type="text" class="others" style="width:629px;" id="name_building"></li>

                                            <li>
                                            <label for="" class="container">
                                            Business Name
                                            </label>
                                            <input type="text" class="others" style="width:635px;" id="business_name_inspecton"></li>

                                            <li>
                                            <label for="" class="container">
                                            Address
                                            </label>
                                            <input type="text" class="others" style="width:671px;" id="address"></li>

                                            <li>
                                            <label for="" class="container">
                                            Nature of Business
                                            </label>
                                            <input type="text" class="others" id="nature_business_inspection"></li>
                                        </ul>
                                    </div>

                                    <div class="generalinfo2">
                                        <div>
                                            <ul class="generalinfo22">
                                                <li>
                                                <label>Name of Owner/Occupant</label>
                                                <input type="text" id="name_owner">
                                                </li>

                                                <li>
                                                    <label>Name of Representative</label>
                                                    <input type="text" id="name_representative">
                                                </li>
                                                </ul>
                                            </div>
                                        <div>
                                            <ul class="generalinfo22">
                                                <li>
                                                    <label>Contact No.</label>
                                                    <input type="text" id="owner_contact_no">
                                                </li>

                                                <li>
                                                    <label>Contact No.</label>
                                                    <input type="text" id="representative_no">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="generalinfo3">
                                           <div>
                                        <ul class="generalinfo33">
                                            <li><label>No. of Storey <input type="text" id="no_storey"></label>
                                                 </li>
                                            <li><label>Height of Bldg. <input type="text" id="height_building">(m)</label>
                                                </li>
                                            <li><label>Portion Occupied</label>
                                                <input type="text" style="width: 215px;" id="portion_occupied"></li>
                                                <ul>
                                            </div>

                                            <div>
                                                <ul class="generalinfo33">

                                            <li><label>Area per flr. <input type="text" style="width:209px;" id="area_per_flr">sqm</label>
                                                </li>

                                            <li><label>Total Flr. Area</label>
                                                <input type="text" style="width:40px;" id="total_flr_area"></li>

                                                <div style="display: inline; position:relative; top:1px;">
                                            <li><input type="text" style="width:260px;" id="fire_insurance">
                                                <span style="font-size: 11px;">sqm</span></li>
                                            </div>

                                        </ul>
                                    </div>

                                    </div>
                                         <div class="generalinfo4">
                                             <ul class="generalinfo44">
                                                 <li><label>Name of Fire Inusrance Co/Co-Insurer<input type="text" style="width: 215px;"></label> </li>
                                                 <li><label> Policy No.<input type="text" id="policy_no"></label></li>
                                                 <li><label>Date Issued<input type="text" id="date_issued"></label></li>
                                                 <li><label style="font-weight:bold; ">TYPE OF OCCUPANCY<input type="text" style="width: 400px;" id="type_occupancy"></label></li>
                                             </ul>
                                         </div>
                                     </div>

                                     <div class="building-construction">
                                        <div><label style="font-weight: bold;">II.BUILDING CONSTRUCTION</label></div>
                                        <div class="buildconstruct">
                                            <div>
                                                <ul class="listcon">
                                                <li><label>Beams<input type="text" style="width:165px;" id="beams"></label></li>
                                                <li><label>Exterior Walls<input type="text" style="width:131px;" id="exterior"></label></li>
                                                <li><label>Main Stair<input type="text" id="main_stair"></label></li>
                                                <li><label>Main Door<input type="text" id="main_door"></label></li>

                                            </div>
                                            <div>
                                                <ul class="listcon">
                                                <li><label>Columns<input type="text" id="colums"></label></li>
                                                <li><label>Corridor Walls<input type="text" id="corridor_walls" style="width: 125px;"></label></li>
                                                <li><label>Windows<input type="text" id="windows"></label></li>
                                                <li><label>Trusses<input type="text" style="width: 155px;" id="trussess"></label></li>
                                            </ul>
                                            </div>
                                            <div>
                                                <ul class="listcon">
                                                <li><label>Flooring<input type="text" id="flooring"></label></li>
                                                <li><label>Room Partitions<input type="text" style="width: 112px;" id="room_partitions"></label></li>
                                                <li><label>Ceiling<input type="text" style="width: 157px;" id="ceiling"></label></li>
                                                <li><label>Roof<input type="text" style="width: 167px;" id="roof"></label></li>
                                            </ul>
                                            </div>

                                        </div>

                                     </div>
                                        <div class="Sectional-Occupancy">
                                            <label style="font-weight:bold;">
                                            III. SECTIONAL OCCUPANCY (Note: Indicate specific usage of each floor, section or rooms)
                                            </label>
                                            <form>
                                                <textarea class="secoccup" id="sectional_occupancy"></textarea>
                                            </form>
                                        </div>

                                        <div class="Classification">
                                            <div><label style="font-weight:bold;">IV.CLASSIFICATION</label></div>
                                            <label> Occupancy Classification</label>
                                            <div class="classi" style="display: inline-flex;">
                                                <ul class="listcon">
                                                    <li><label class="class1"><input class="check occupancy_classification" type="checkbox" value="A">A </label></li>
                                                    <li><label class="class2"><input class="check occupancy_classification" type="checkbox" value="B">B </label></li>
                                                    <li><label class="class3" ><input class="check occupancy_classification" type="checkbox" value="C">C </label></li>
                                                </ul>

                                            </div>
                                            <div style="display: inline-flex; padding-left: 30px;">
                                                <label>Others</label> <input class="textclass" type="text" style="width: 300px;" id="other_classification">
                                            </div>
                                            <div><label>Occupant Load: <input type="text" id="occupant_load">(Requirement: 2.8 sq. m per person for street level; 5.6 sq. m for upper floors and 9.3 sq. m. for
                                                offices, storage, and shipping and not open to the general public)</label>
                                                <div>
                                                <label>Any renovations
                                                    <input type="checkbox" class="any_renoviation" value="Yes">Yes
                                                    <input type="checkbox" class="any_renoviation" value="No">No
                                                </label>
                                                <label style="padding-left: 30px;">If yes, specify <input type="text" id="other_renoviation"></label></div>
                                                <label>Underground:
                                                    <input type="checkbox" class="under_ground" value="Yes">Yes
                                                    <input type="checkbox" class="under_ground" value="No">No
                                                </label>
                                                <label style="padding-left: 40px;">Windowless:
                                                    <input type="checkbox" class="windowless" value="Yes">Yes
                                                    <input type="checkbox" class="windowless" value="No">No
                                                </label>
                                    </div>
                                        </div>

                                        <div class="Exit-details">
                                        <div style="font-weight:bold"><label> V. EXIT DETAILS</label></div>

                                        <ul class="listcon">
                                           <li><label>Capacity of Horizontal Exit (Corridor Hallway) <input type="text" style="width: 207px;" id="horizontal_exit"> (Requirement: 100 persons per unit of exit width per min)</label></li>
                                           <li><label>Capacity of Exit Stair: <input type="text" style="width: 300px;" id="capcity_exit_stair"> (Requirement: 60 persons per unit of exit width per min)</label></li>
                                            <li><label>No. of Exits <input type="text" style="width: 350px;" id="no_exits"> Remote <input type="checkbox" class="remote" value="Yes">Yes <input type="checkbox" class="remote" value="No">No</label></li>
                                            <li><label>Minimum Requirement: No. of Exits: Two (2) units per floor</label></li>
                                           <li> <label>Location of Exit <input type="text" style="width: 600px;" id="location_exit"></label></li>
                                            <li><label>Maximum Travel Distance Requirement from Farthest Room: 30.5 m without AFSS & 46m with AFSS</label></li>
                                            <li><label>Any Enclosure Provided <input type="checkbox" class="enclosure_provided" value="Yes">Yes <input type="checkbox" class="enclosure_provided" value="No">No <label style="padding-left: 100px;">Min of 2-hr fire rating-storey or mainborder,Min of 1hr, fire rung- less than 4-storey</label> </label></li>
                                        </ul>
                                        </ul>
                                        </div>

                                        <div class="Means-egress">
                                            <label style="font-weight:bold;">MEANS OF EGRESS</label>
                                            <div class="meancolumns">
                                                <div>
                                                <ul class="listcon">
                                                    <li>
                                                        <label>Ready accesible <span style="padding-left: 70px;"><input class="check ready_accessible" type="checkbox" value="Ye">Yes <input class="check ready_accessible" type="checkbox" value="No">No </span></label>
                                                    </li>
                                                    <li>
                                                        <label>Travel distance within limits? <span style="padding-left: 22px;"> <input class="check travel_distance" type="checkbox" value="Yes">Yes <input class="check travel_distance" type="checkbox" value="No">No </span></label>
                                                    </li>
                                                    <li>
                                                        <label>Adequate illumination <span style="padding-left: 50px;"> <input type="checkbox" class="adequete_illumination" value="Yes">Yes <input type="checkbox" class="adequete_illumination" value="No">No </span> </label>
                                                    </li>
                                                    <li>
                                                        <label>Panic hardware operational? <span style="padding-left: 21px;"><input type="checkbox" class="panic_hardware" value="Yes">Yes <input type="checkbox" class="panic_hardware" value="No">No </span></label>
                                                    </li>
                                                    <li>
                                                        <label>Doors open easily <span style="padding-left: 64px;"><input type="checkbox" class="doors_open_easily" value="Yes">Yes <input type="checkbox" class="doors_open_easily" value="No">No </span> </label>
                                                    </li>
                                                    <li>
                                                        <label>Bldg w/Mezzanine <span style="padding-left: 63px;"><input type="checkbox" class="bldg_with_mezzanine" value="Yes">Yes <input type="checkbox" class="bldg_with_mezzanine" value="No">No </span> </label>
                                                    </li>
                                                    <li>
                                                        <label>Corridors & aisles of sufficient size <input type="checkbox" class="corridors" value="Yes">Yes <input type="checkbox" class="corridors" value="Yes">No </label>
                                                    </li>
                                                </ul>
                                            </div>
                                                <div>
                                                    <ul class="listcon">
                                                        <li>
                                                            <label>Obstructed <span style="padding-left: 90px;"> <input type="checkbox" class="obstructed" value="Yes">Yes <input type="checkbox" class="obstructed" value="No">No </span> </label>
                                                        </li>
                                                        <li>
                                                            <label>Dead-ends within limits <span style="padding-left: 40px;">  <input type="checkbox" class="dead_ends" value="Yes">Yes <input type="checkbox" class="dead_ends" value="No">No </span> </label>
                                                        </li>
                                                        <li>
                                                            <label>Proper rating of illummination <span style="padding-left: 15px;">  <input type="checkbox" class="proper_rating_illumination" value="Yes">Yes <input type="checkbox" class="proper_rating_illumination" value="No">No  </span></label>
                                                        </li>
                                                        <li>
                                                            <label>Door swing in the direction of exit <input type="checkbox" class="door_swing" value="Yes">Yes <input type="checkbox" class="door_swing" value="No">No  </label>
                                                        </li>
                                                        <li>
                                                            <label>Self-closure operational<span style="padding-left: 38px;"> <input type="checkbox" class="self_closure" value="Yes">Yes <input type="checkbox" class="self_closure" value="No">No </span> </label>
                                                        </li>
                                                        <li>
                                                            <label>Mezzanine with proper exits <span style="padding-left: 22px;">  <input type="checkbox" class="mezzanne_with_proper_exit" value="Yes">Yes <input type="checkbox" class="mezzanne_with_proper_exit" value="No">No </span> </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="footerlabel">
                                            <label>BFP-QSF-FSED-017 Rev. 01 (07.05.19) Page 1 of 2</label>
                                        </div>



                                        </div>
                                        <div class="mainborder2">

                                            <div class="Fire-Protection-Equipment">
                                                <div><label class="boldletter">VI. FIRE PROTECTION EQUIPMENT</label></div>
                                                <div>
                                                    <label>
                                                        a.) Emergency lights provided?
                                                        <span style="padding-right: 100px;"><input type="checkbox" class="emergency_lights" value="Yes">Yes <input type="checkbox" class="emergency_lights" value="No">No</span>
                                                        Illuminated exit signs provided?
                                                        <span><input type="checkbox" class="illuminated_signs" value="Yes">Yes <input type="checkbox" class="illuminated_signs" value="No">No</span>
                                                    </label>
                                                </div>

                                                <div>
                                                    <label>
                                                        b.) No. of fire extinguisher
                                                        <span><input class="letterb" type="text" id="no_stinguisher"></span>
                                                        Type
                                                        <span><input class="letterb" type="text" id="type"></span>
                                                        Capacity
                                                        <span><input class="letterb" type="text" id="capacity"></span>
                                                        Accessible
                                                        <span><input type="checkbox" class="accessible" value="Yes">Yes <input type="checkbox" class="accessible" value="No">No</span>
                                                    </label>
                                                </div>

                                                <div>
                                                    <label>
                                                        c. Is bldg. equipped with fire alarm?
                                                        <span style="padding-right: 60px;"><input type="checkbox" class="fire_alarm" value="Yes">Yes <input type="checkbox" class="fire_alarm" value="No">No</span>
                                                        Detectors
                                                        <span><input type="checkbox" class="detectors" value="Yes">Yes <input type="checkbox" class="detectors" value="No"  >No</span>


                                                    </label>
                                                    <div >
                                                        <label style="padding-left: 9px;">
                                                        Location of control panel
                                                        <span style="padding-right: 37px;"><input type="text" id="location_panel"></span>
                                                        Functional
                                                        <span><input type="checkbox" class="functional" value="Yes">Yes <input type="checkbox" class="functional" value="No">No</span>
                                                    </label>
                                                    </div>
                                                </div>

                                            </div>

                                                <div class="Flammables">
                                                    <div><label class="boldletter">VII. FLAMMABLES </label></div>
                                                    <div style="padding-bottom:10px">
                                                        <label>
                                                            a.) Presence of hazardous materials
                                                            <span style="padding-right:100px"><input type="checkbox" class="hazardous_materials" value="Yes">Yes <input type="checkbox" class="hazardous_materials" value="No">No</span>
                                                            Properly stored and handled
                                                            <span><input type="checkbox" class="store_handled" value="Yes">Yes <input type="checkbox" class="store_handled" value="No">No</span>
                                                        </label>
                                                    </div>

                                                    <div class="flammable-group">

                                                    <div style="margin-top:8px;">
                                                        <ol style="line-height:22px;">
                                                            <li></li>
                                                            <li></li>
                                                            <li></li>
                                                        </ol>
                                                    </div>


                                                        <ul class="listcon" style="padding-right: 1px;">
                                                            <li>Kinds</li>
                                                            <li><input type="text"></li>
                                                            <li><input type="text"></li>
                                                            <li><input type="text"></li>
                                                        </ul>



                                                        <ul class="listcon" style="padding-left: 10px;">
                                                            <li>Container</li>
                                                            <li><input type="text"></li>
                                                            <li><input type="text"></li>
                                                            <li><input type="text"></li>
                                                        </ul>




                                                        <ul class="listcon" style="padding-left: 70px;">
                                                            <li>Volume</li>
                                                            <li><input type="text" style="width: 50px;"></li>
                                                            <li><input type="text" style="width: 50px;"></li>
                                                            <li><input type="text" style="width: 50px;"></li>
                                                        </ul>



                                                        <ul class="listcon" style="padding-left: 10px;">
                                                            <li>Location</li>
                                                            <li><input type="text" style="width: 200px;"></li>
                                                            <li><input type="text" style="width: 200px;"></li>
                                                            <li><input type="text" style="width: 200px;"></li>
                                                        </ul>
                                                    </div>

                                                    <div>
                                                     <form><label>Storage Permit for Flammables? Combustible Covered by BFP Permit? <input type="text" style="width:400px;" id="bfp_permnit"></label></form>
                                                     <form> <label>Clearance of Stocks from Ceiling <input type="text" style="width:554px" id="stocks_ceiling"></label></form>
                                                     <form style="padding-left: 30px;"><label class="boldletter">Minimum Ceiling Clearance: 1.0mm for Flammable Liquids and 0.5 for Combustible Materials.</label></form>

                                                     <form> <label>
                                                        No smoking sign provided?
                                                        <span style="padding-right:100px"><input type="checkbox" class="sign_provide" value="Yes">Yes <input type="checkbox" class="sign_provide" value="No">No</span>
                                                        Is smoking permitted?
                                                        <span style="padding-right:100px"><input type="checkbox" class="smoking_permitted" value="Yes">Yes <input type="checkbox" class="smoking_permitted" value="No">No</span>
                                                         Where?
                                                        <span ><input type="text" id="smoking_where"></span>
                                                    </label>
                                                </form>

                                                    <form>
                                                        <label>
                                                            b.) Oven/Stove used
                                                            <span><input style="width:200px;" id="stoved_used" type="text"></span>
                                                            Kind of Fuel
                                                            <span><input  style="width:347px;" id="kind_fuel" type="text"></span>
                                                        </label>
                                                    </form>
                                                    <form>
                                                        <label>
                                                            Smoke hood?
                                                            <span><input style="width:155px;" id="smoke_hood" type="text"></span>
                                                            Spark arrester
                                                            <span><input style="width:155px;" type="text" id="spark_arrester"></span>
                                                            Partition construction
                                                            <span><input style="width:162px;" type="text" id="partition_construction"></span>
                                                        </label>
                                                    </form>
                                                </div>

                                            </div>
                                            <div class="Operating-features">
                                                <div><label class="boldletter" style="position: relative; bottom: 10px;">VII. OPERATING FEATURES</label></div>

                                                <label>
                                                    Fire Safety Program (Under Supervision of the Chief Local Fire Service)
                                                    <span style="padding-left: 200px;" class="boldletter">Date</span>
                                                </label>
                                                 <form >
                                                     <label>
                                                     <ul class="listcon">
                                                         <li>Fire Brigade Organization?
                                                            <span style="padding-left: 350px;">
                                                                <input type="checkbox" class="brigade_organization" value="Yes">Yes
                                                                <input type="checkbox" class="brigade_organization" value="No">No
                                                                <label style="padding-left: 20px;"  >Date:<input type="text" id="brigade_organization_date"></label>
                                                            </span>
                                                        </li>
                                                        <li>Fire Safety Seminar
                                                            <span style="padding-left: 410px;">
                                                                <input type="checkbox" class="safety_seminar" value="Yes">Yes
                                                                <input type="checkbox" class="safety_seminar" value="No">No
                                                                <label style="padding-left: 20px;">Date:<input type="text" id="safety_seminar_date"></label>
                                                            </span>
                                                        </li>
                                                        <li>Employee trained in emergency procedures?
                                                            <span style="padding-left: 200px;">
                                                                <input type="checkbox" class="emergency_procedures" value="Yes">Yes
                                                                <input type="checkbox" class="emergency_procedures" value="No">No
                                                                <label style="padding-left: 20px;">Date:<input type="text" id="emergency_procedures_date"></label>
                                                            </span>
                                                        </li>
                                                        <li>Fire/Evacuation Drill
                                                            <span style="padding-left: 398px;">
                                                                <input type="checkbox" class="evacuation_drill" value="Yes" >Yes
                                                                <input type="checkbox" class="evacuation_drill" value="No" >No
                                                                <label style="padding-left: 20px;">Date:<input type="text" id="evacuation_drill_date"></label>
                                                            </span>
                                                        </li>

                                                     </ul>
                                                    </label>
                                                 </form>

                                            </div>

                                            <div class="defects-deficiencies">
                                                <div><label class="boldletter">IX. DEFECTS / EFECIENCIES NOTED DURING INSPECTION (Attached pictures, sketch and others)</label></div>
                                                <textarea class="messagetext" id="defects"></textarea>
                                            </div>

                                            <div class="Recommendations">
                                                <div><label class="boldletter">X. RECOMMENDATIONS </label></div>
                                                <textarea class="messagetext" id="recommendation"></textarea>
                                            </div>
                                            <div class="acknowledgement" >
                                                <div><label class="boldletter">ACKNOWLEDGED BY:</label></div>

                                                <div style="padding-top: 20px;">
                                                    <ul class="listcon">
                                                    <li>
                                                    <form style="padding-right: 300px;">
                                                    <input type="text" style="width: 215px; " id="printedName">
                                                    </form>
                                                    <label>Signature over Printed Name of Owner/Representative</label> </li>

                                                    <li>
                                                    <form>
                                                    <input type="text" value="" style="width: 415px;" id="inspectorName" >
                                                    </form>
                                                    <labels>Fire Safety Inspector/s</label> </li>



                                                </ul>
                                                </div>

                                                <div style="padding-top: 20px;">
                                                    <ul class="listcon">
                                                    <li>
                                                        <form style="padding-right: 300px;">
                                                        <input type="text" value="" style="width: 215px;" id="dateAndTime">
                                                        </form>
                                                        <label>Date & TIme</label> </li>

                                                    <li>
                                                    <form>
                                                    <input type="text" value="" style="width: 315px;" >
                                                    </form>
                                                    <label>Team Leader</label> </li>
                                                </ul>
                                                </div>

                                                <div style="padding-top: 50px; position: relative; left: 560px; padding-bottom: 50px;">
                                                    <label class="boldletter">RECOMMEND ISSUANCE OF FISC/NTC/NTCV:</label>
                                                    <form>
                                                        <input type="text" value="" style="width: 215px;" >
                                                        </form>
                                                        <label>Chief, Fire Safety Enforcement Section</label>
                                                </div>

                                                <div style="text-align: center; padding-top: 30px;">
                                                <label class="boldletter" >
                                                    PAALALA: "MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION
                                                    SA MGA KAWANI NITO ANG MAGBENTA O MAGREKOMENDA NG ANUMANG BRAND NG FIRE
                                                    EXTINGUISHER"
                                                </label>
                                            </div>
                                                <div style="text-align: center;">
                                                    <h1>"FIRE SAFETY IS OUR MAIN CONCERN"</h1>
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                            <div style="padding-bottom: 310px;"></div>



                                        <div class="footerlabel">
                                            <label>BFP-QSF-FSED-017 Rev. 01 (07.05.19) Page 2 of 2</label>
                                        </div>

                                      </div>
                                  </div>
                                    <div class="form-group" style="float: right" id="verify_button">
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_contentNotice" aria-labelledby="profile-tab">
                                    <div class="noticeToComplyCert">

                                    </div>
                                    <div class="noticeToComplyCertNodata">
                                        <img src="{{ asset('images/nodata2.svg') }}" alt="">
                                        <h1>No Data for notice to comply..</h1>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane " id="tab_contentToCorrect" aria-labelledby="profile-tab">
                                    <div class="noticeToCorrect">

                                    </div>
                                    <div class="noticeToCorrectNoData">
                                        <img src="{{ asset('images/nodata2.svg') }}" alt="">
                                        <h1>No Data..</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
            if(value['status']=='renewal' || value['status'] == 'approved' || value['status'] == 'renewed'){
                $('#status').append('<option value='+value['status']+' >'+value['status']+'</option>');
                $('#status').val(value['status']);
                $('#status').attr('disabled',true);

            }
            $('#date_apply').val(value['date_apply']);
            $('#date_approved').val(value['date_approved']);
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
$('#add_mobile_account').on('click',function(e){
    e.preventDefault();
    get_mobile_account();
    $('#add_mobile_account_modal').modal('show');

});
$('#search_account_connect').on('keyup',function(){
    var name = $(this).val();
    get_mobile_account(name);
});
function get_mobile_account(username =''){
    $.ajax({
        type: 'get',
        url: '{{ route('get_mobile_account') }}',
        data:{
            username:username
        },
        success:function(data){
            $('.tbody_add_mobile_account_modal').html(data.output);
        }
    })
}
$(document).on('click','.connect_mobile_account',function(e){
    e.preventDefault();
    var accountId = $(this).attr('id');
    var applicationId= $('#connect_mobile_applicationId').val();
    Swal.fire({
         title:"Connect Mobile Account?",
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
                     url: '{{ route('connect_mobile_account') }}',
                     data:{
                        accountId:accountId,
                        applicationId:applicationId
                     },
                     dataType: 'json',
                     success:function(data){
                        Swal.fire({
                            icon: 'success',
                            title:'Account Successfully Connected',
                            background: 'rgb(0,0,0,.9)',
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Continue',
                            customClass : {
                            title: 'swal2-title'
                            },
                            preConfirm: function(){
                                location.reload();
                            }
                            })
                     }
                 })

             },

            });
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
            window.setTimeout(loadWindow, 2000);
        }
    })

});
var loadWindow =function (){
    window.location.reload();
}

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
$('.view_payment_history').on('click',function(e){
    e.preventDefault();
    var applicationId  = $(this).attr('id');
    $.ajax({
        type: 'post',
        url: '{{ route('view_payment_history') }}',
        data:{
            applicationId:applicationId
        },
        dataType: 'json',
        success:function(data){
            $('#payment_view_history_modal-body').html(data.output)
            $('#payment_view_history_modal').modal('show');
        }
    })
})
//generate receipt
$(document).on('click','.view_payment_info',function(e){
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
                $('#amount_paid_payment').val($value['amount_paid']);
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
$('#date_issued').on('input',function(){
   $value = $(this).val();
   if($value === ''){
    $('#updateInspectionDetailsButton').css('display','none');
   }else{
    $('#updateInspectionDetailsButton').css('display','block');
    $('#updateInspectionDetailsButton').html('<button type="button" class="btn btn-info verify_inspection_button"  ><i class="fa fa-check"> </i> Update</button>');
   }
});

$('#date_issued').on('input',function(){
   $value = $(this).val();
   if($value === ''){
    $('#updateInspectionDetailsButton').css('display','none');
   }else{
    $('#updateInspectionDetailsButton').css('display','block');
    $('#updateInspectionDetailsButton').html('<button type="button" class="btn btn-info verify_inspection_button"  ><i class="fa fa-check"> </i> Update</button>');
   }
});
$(document).on('click','.view_inspection_report_single',function(){
    var applicationId = $(this).attr('id');
    console.log(applicationId);
    $.ajax({
        type: 'post',
        url: '{{ route('view_inspection_report_single') }}',
        data: {
            applicationId: applicationId
        },
        dataType: 'json',
        success:function(data){
       $.each(data.data[0]['applicant'],function(key,value){
            $('#nameOwner').val(value['Fname'] + value['Lname']);
            $('#printedName').val(value['Fname'] + value['Lname']);
       });
       $.each(data.data[0]['inspector'],function(key,value){
            $('#inspectorName').val(value['Fname'] + value['Lname']);
       });


       $('#inspection_modal').modal('show');
    if(data.noticeToComply.length > 0){
        $.each(data.noticeToComply,function(key,value){
        console.log(value['defects']);
         });
            $('.noticeToComplyCert').css('display','block');
            $('.noticeToComplyCert').html(data.noticeToComplyOutput);
            $('.noticeToComplyCertNodata').css('display','none');
    }else{
        $('.noticeToComplyCert').css('display','none');
        $('.noticeToComplyCertNodata').css('display','block');

    }
    if(data.noticeToCorrect.length > 0){
        $('.noticeToCorrectNoData').css('display','none');
        $('.noticeToCorrect').css('display','block');
        $('.noticeToCorrect').html(data.outputNoticeToCorrectItem);
    }else{
        $('.noticeToCorrect').css('display','none');
        $('.noticeToCorrectNoData').css('display','block');
    }
      $.each(data.data,function(key, value){
        $('#applicationAddress').val(value['purok']+',  '+value['barangay']+',  '+value['city']);
        $('#dateAndTime').val(value['date_inspect']);
        $('#nameEstablishment').val(value['business_name']);
        $('#date_inspect').val(value['date_inspect']);
        if(value['under_construction'] ==='true'){
            $('#under_construction').attr('checked','checked');
        }
        if(value['occupancy_permit'] ==='true'){
            $('#occupancy_permit').attr('checked','checked');
        }
        if(value['business_permit'] ==='true'){
            $('#business_permit').attr('checked','checked');
        }
        if(value['periodic_inspection'] ==='true'){
            $('#periodic_inspection').attr('checked','checked');
        }
        if(value['verification_inspection_compliance'] ==='true'){
            $('#verification_inspection_compliance').attr('checked','checked');
        }
        if(value['verification_inspection_complaint'] ==='true'){
            $('#verification_inspection_complaint').attr('checked','checked');
        }

        $('#others_specify').val(value['others_specify']);
        $('#name_building').val(value['name_building']);
        $('#business_name_inspecton').val(value['business_name']);
        $('#address').val(value['address']);
        $('#nature_business_inspection').val(value['nature_business']);
        $('#name_owner').val(value['name_owner']);
        $('#owner_contact_no').val(value['owner_contact_no']);
        $('#name_representative').val(value['name_representative']);
        $('#representative_no').val(value['representative_no']);
        $('#no_storey').val(value['no_storey']);
        $('#height_building').val(value['height_building']);
        $('#portion_occupied').val(value['portion_occupied']);
        $('#area_per_flr').val(value['area_per_flr']);
        $('#total_flr_area').val(value['total_flr_area']);
        $('#fire_insurance').val(value['fire_insurance']);
        $('#policy_no').val(value['policy_no']);
        $('#date_issued').val(value['date_issued']);
        $('#type_occupancy').val(value['type_occupancy']);
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
       $('.occupancy_classification').each(function(){
            if($(this).attr('value') === value['occupancy_classification']){
                $(this).attr('checked','checked');
            }
       })
       $('#other_classification').val(value['other_classification'])
       $('#occupant_load').val(value['occupant_load'])
       $('.any_renoviation').each(function(){
            if($(this).attr('value') === value['any_renoviation']){
                $(this).attr('checked','checked');
            }
       })
       $('#other_renoviation').val(value['other_renoviation'])
       $('.under_ground').each(function(){
            if($(this).attr('value') === value['under_ground']){
                $(this).attr('checked','checked');
            }
       })
       $('.windowless').each(function(){
            if($(this).attr('value') === value['windowless']){
                $(this).attr('checked','checked');
            }
       })
       $('#horizontal_exit').val(value['horizontal_exit'])
       $('#capcity_exit_stair').val(value['capcity_exit_stair'])
       $('#no_exits').val(value['no_exits'])
       $('.remote').each(function(){
            if($(this).attr('value') === value['remote']){
                $(this).attr('checked','checked');
            }
       })
       $('#location_exit').val(value['location_exit'])

       $('.enclosure_provided').each(function(){
            if($(this).attr('value') === value['enclosure_provided']){
                $(this).attr('checked','checked');
            }
       })

       $('.ready_accessible').each(function(){
            if($(this).attr('value') === value['ready_accessible']){
                $(this).attr('checked','checked');
            }
       })
       $('.travel_distance').each(function(){
            if($(this).attr('value') === value['travel_distance']){
                $(this).attr('checked','checked');
            }
       })
       $('.adequete_illumination').each(function(){
            if($(this).attr('value') === value['adequete_illumination']){
                $(this).attr('checked','checked');
            }
       })
       $('.panic_hardware').each(function(){
            if($(this).attr('value') === value['panic_hardware']){
                $(this).attr('checked','checked');
            }
       })
       $('.doors_open_easily').each(function(){
            if($(this).attr('value') === value['doors_open_easily']){
                $(this).attr('checked','checked');
            }
       })
       $('.bldg_with_mezzanine').each(function(){
            if($(this).attr('value') === value['bldg_with_mezzanine']){
                $(this).attr('checked','checked');
            }
       })
       $('.corridors').each(function(){
            if($(this).attr('value') === value['corridors']){
                $(this).attr('checked','checked');
            }
       })
       $('.obstructed').each(function(){
            if($(this).attr('value') === value['obstructed']){
                $(this).attr('checked','checked');
            }
       })
       $('.dead_ends').each(function(){
            if($(this).attr('value') === value['dead_ends']){
                $(this).attr('checked','checked');
            }
       })
       $('.proper_rating_illumination').each(function(){
            if($(this).attr('value') === value['proper_rating_illumination']){
                $(this).attr('checked','checked');
            }
       })
       $('.door_swing').each(function(){
            if($(this).attr('value') === value['door_swing']){
                $(this).attr('checked','checked');
            }
       })
       $('.self_closure').each(function(){
            if($(this).attr('value') === value['self_closure']){
                $(this).attr('checked','checked');
            }
       })
       $('.mezzanne_with_proper_exit').each(function(){
            if($(this).attr('value') === value['mezzanne_with_proper_exit']){
                $(this).attr('checked','checked');
            }
       })
       $('.emergency_lights').each(function(){
            if($(this).attr('value') === value['emergency_lights']){
                $(this).attr('checked','checked');
            }
       })
       $('.illuminated_signs').each(function(){
            if($(this).attr('value') === value['illuminated_signs']){
                $(this).attr('checked','checked');
            }
       })
       $('#no_stinguisher').val(value['no_stinguisher'])
       $('#type').val(value['type'])
       $('#capacity').val(value['capacity'])
       $('.accessible').each(function(){
            if($(this).attr('value') === value['accessible']){
                $(this).attr('checked','checked');
            }
       })
       $('.fire_alarm').each(function(){
            if($(this).attr('value') === value['fire_alarm']){
                $(this).attr('checked','checked');
            }
       })
       $('.detectors').each(function(){
            if($(this).attr('value') === value['detectors']){
                $(this).attr('checked','checked');
            }
       })
       $('#location_panel').val(value['location_panel'])
       $('.functional').each(function(){
            if($(this).attr('value') === value['functional']){
                $(this).attr('checked','checked');
            }
       })
       $('.hazardous_materials').each(function(){
            if($(this).attr('value') === value['hazardous_materials']){
                $(this).attr('checked','checked');
            }
       })
       $('.store_handled').each(function(){
            if($(this).attr('value') === value['store_handled']){
                $(this).attr('checked','checked');
            }
       })
       $('#bfp_permnit').val(value['bfp_permnit'])
       $('#stocks_ceiling').val(value['stocks_ceiling'])
       $('.sign_provide').each(function(){
            if($(this).attr('value') === value['sign_provide']){
                $(this).attr('checked','checked');
            }
       })
       $('.smoking_permitted').each(function(){
            if($(this).attr('value') === value['smoking_permitted']){
                $(this).attr('checked','checked');
            }
       })
       $('#smoking_where').val(value['smoking_where'])
       $('#stoved_used').val(value['stoved_used'])
       $('#kind_fuel').val(value['kind_fuel'])
       $('#smoke_hood').val(value['smoke_hood'])
       $('#spark_arrester').val(value['spark_arrester'])
       $('#partition_construction').val(value['partition_construction'])
       $('.brigade_organization').each(function(){
            if($(this).attr('value') === value['brigade_organization']){
                $(this).attr('checked','checked');
            }
       })
       $('#brigade_organization_date').val(value['brigade_organization_date'])
       $('.safety_seminar').each(function(){
            if($(this).attr('value') === value['safety_seminar']){
                $(this).attr('checked','checked');
            }
       })
       $('#safety_seminar_date').val(value['safety_seminar_date'])
       $('.emergency_procedures').each(function(){
            if($(this).attr('value') === value['emergency_procedures']){
                $(this).attr('checked','checked');
            }
       })
       $('#emergency_procedures_date').val(value['emergency_procedures_date'])
       $('.evacuation_drill').each(function(){
            if($(this).attr('value') === value['evacuation_drill']){
                $(this).attr('checked','checked');
            }
       })
       $('#evacuation_drill_date').val(value['evacuation_drill_date'])
       $('#defects').val(value['defects'])
       $('#recommendation').val(value['recommendation'])


        if(value['verify'] == null){
          $('#verify_button').html(' <button type="button" class="btn btn-warning verify_inspection_button" id='+value['applicationId']+' ><i class="fa fa-check"> </i> Verify</button>')
        }else{
            $('#verify_button').html(' <button type="button" class="btn btn-default " ><i class="fa fa-check"> </i> Verified</button>')

        }
      });
        }
    })
})

$('.view_inspection_report').on('click',function(e){
  e.preventDefault();
  var applicationId = $(this).attr('id');
console.log(applicationId);
  $.ajax({
    type:'post',
    url:'{{ route('view_inspection_report') }}',
    data:{
      applicationId:applicationId
    },
    dataType: 'json',
    success:function(data){

    //   $('#inspection_modal').modal('show');
      $('#inspection_modal_details').modal('show');
      $('#inspection_modal_details_body').html(data.output);

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
                        }
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

$('#printCertificate').on('click',function(){
    //download
    // html2canvas(document.getElementById("print_content")).then(function (canvas) {
    //                var anchorTag = document.createElement("a");
    //                 document.body.appendChild(anchorTag);
    //                 // document.getElementById("previewImg").appendChild(canvas);
    //                 anchorTag.download = "filename.jpg";
    //                 anchorTag.href = canvas.toDataURL();
    //                 anchorTag.target = '_blank';
    //                 anchorTag.click();
    //             });

        var element = $("#main-panel")[0];
        html2canvas(element).then(function (canvas) {
        var myImage = canvas.toDataURL("image/png");
        var tmp = window.open("");
        $(tmp.document.body)
        .html("<img src=" + myImage + " alt=''>")
        .ready(function () {
            tmp.focus();
            tmp.print();
        })
        })

})
$('#print_payment_button').on('click',function(){
    var element = $("#receipt")[0];
    html2canvas(element).then(function (canvas) {
    var myImage = canvas.toDataURL("image/png");
    var tmp = window.open("");
    $(tmp.document.body)
    .html("<img src=" + myImage + " alt=''>")
    .ready(function () {
    tmp.focus();
    tmp.print();
    })
    })
});
$('.print-inspection').on('click',function(e){
    e.preventDefault();
    var element = $(".page1")[0];
    html2canvas(element).then(function (canvas) {
    var myImage = canvas.toDataURL("image/png");
    var tmp = window.open("");
    $(tmp.document.body)
    .html("<img src=" + myImage + " alt=''>").css('color','red')
    .ready(function () {
    tmp.focus();
    tmp.print();
    })
    })
})



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

