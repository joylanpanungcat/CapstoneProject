
@extends('include.navbar')
@section('title','applicant account')
@section('content')
  <style type="text/css">
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
.folder a{
    font-size: 14px;
}
.folder a:hover{
    color: blue;
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
                          
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Applicant Information  <small></small></h2>


                                   
                                    <div class="clearfix"></div>
                                </div>
                              <div class="col-md-12 applicant-account">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div id="showDetail"></div>
                                        
                                    </div>


                    
                            <div class="col-md-4 img" style="margin-top: 3%;" >
                                
                                         

                                <img src="{{ asset('images/profile/')."/".rand(1,5).".jpg" }}" class="profile2">
                                <h5 class="Applicant">
                                  
                              {{ $account_details->Fname }}  {{ $account_details->Lname }}
                                    
                               
               
                                   </h5>

                            </div>

                              <!--   <div class="buttons">
                                  <button class="btn btn-secondary buttons" id="compose" ><i class="fa fa-envelope-o"></i></button>
                                  <button class="btn btn-secondary buttons" ><i class="fa fa-phone"></i></button>
                                </div> -->
                              
                                 <form method="post">
                                    <div class="col-md-8 personalInfo ">  
                                         
                                
                                      
                                          
                               
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{ $account_details->Fname }}">
                                    </div>
                                  </div>
                                  <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{ $account_details->Mname }}" >
                                    </div>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{ $account_details->Lname }}" >
                                    </div><br>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{ $account_details->contact_num }}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Alternative Contact</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{ $account_details->alcontact }}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Purok</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{$applicantAdd->purok}}" >
                                    </div><br>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>Barangay</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{$applicantAdd->barangay}}">
                                    </div>
                                  </div>
                                   <div class="col-md-4">  
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="" id="contact_numDetails" class="form-control" value="{{$applicantAdd->city}}" >
                                    </div>
                                  </div>
                                   <div class="col-md-4">  
                                 
                             
                                  <div class="form-group">
                                    <label></label>
                                    <button type="submit" name="" class="btn btn-secondary updateDetails" id="">Update</button>
                                </div>
                                     </div>
                                </div>
                                   </form>
                <br><br>
                         </div>

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
                                     @foreach ($account_details->application as $application)
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
                                        <td>{{$application->date_apply}}
                                        </td>
                                        <td>{{$application->status}}
                                        </td>
                             <td><button type='' name='view' class='btn btn-defualt view'
                     ><i class='fa fa-eye'></i></button>
                            </td>

                                    </tr>
                                    @endforeach

                              
                                  </tbody>
                                 {{--  <input type="" name="" id="account_id" value="<?=$data['account_id'] ?>" > --}}
                                 

                            </table>
                        </div>
               

                            


                             </div>
                                  <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                   <div id="GFG" >
                                 
                            
                           </div>
                                  
                        
                                  </div>
                              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                         
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
                                     @foreach ($account_details->application as $application)
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
                                        <td>{{$application->date_apply}}
                                        </td>
                                        <td>{{$application->status}}
                                        </td>
                                         <td>    <button  class="btn viewDocuments view" data-toggle="modal"><i class="fa fa-eye"></i></button>
                                        </td>

                                    </tr>
                                    @endforeach

                              
                                  </tbody>

                              
                                  </tbody>
                                 {{--  <input type="" name="" id="account_id" value="<?=$data['account_id'] ?>" > --}}
                                 

                            </table>
             
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




 
    <!-- Modal HTML -->
    <div id="viewDocuments" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Uploaded Documents</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <button class="btn btn-primary btn-sm" id="new_folder" data-toggle="modal" data-target="#addFolder"><i class="fa fa-plus" ></i> New Folder</button>
                    <button class="btn btn-primary btn-sm ml-4" id="new_file"><i class="fa fa-upload"></i> Upload File</button>
                </div>
                <div >
                <div class="d-inline-block">
                     <h7><a  href='javascript:;' type="button" id="fileParent">
                        <span><i class="fa fa-folder"></i></span>
                            <b class="to_folder">Files </b>
                            </a>
                    </h7>
                </div>
                <div id="path" class="d-inline-block">
                   
                    
                </div>
                </div>

                    <div id="folder_table" class="table-responsive"></div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
       

       {{-- Add folder --}}
       <div id="addFolder" class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Uploaded Documents</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addFolderForm">
                         <input type="text" name="" id="parentFolderId">
                        <div class="form-group">
                           
                            <label>Folder Name</label> 
                            <input type="text" name="" id="folderName" placeholder="Enter Folder Name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                         
                    </form>
                  
              
             
                    
                   
                </div>
              
            </div>
        </div>
    </div>
        
       
    
  <script type="text/javascript">

      $(document).ready(function(){




         $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
            $('#path div:last').remove();
            
        load_folder_list();
        })

 load_folder_list();
   
        function load_folder_list(){
        var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
        var applicationId= '<?php   echo $applicationId->applicationId ?>';
         
            $.ajax({
                url: '{{ route('fetch_file') }}',
                type: "post",
                data:{
                    Fname:Fname,
                    Lname:Lname,
                    applicationId:applicationId
                },
                dataType:'json',
                success:function(data){
                    $('#folder_table').html(data.data);

                     $('#parentFolderId').val(data.parentId);
                }
            })
        }
        $(document).on('click','.viewFolder',function(e){
            e.preventDefault();

        var folderId=$(this).attr('id');
        var parentId=$('#parentId').val();
      

            $.ajax({
                url: '{{ route('viewFolder') }}',
                type:'post',
                data:{
                   
                    folderId:folderId,
                    parentId:parentId
                },
                dataType: 'json',
                success:function(data){
                     $('#folder_table').html(data.data);
                     $('#path').append('<div>nice ka one</div>');
                      $('#parentFolderId').val(folderId);

                }
            });

        });

    $(document).on('submit','#addFolderForm',function(e){
        e.preventDefault();
        var parentFolderId=$('#parentFolderId').val();
        var folderName=$('#folderName').val();
          var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
          var applicationId= '<?php   echo $applicationId->applicationId ?>';
        $.ajax({
            url: '{{ route('addFolder') }}',
            type:'post',
            data: {
                 Fname:Fname,
                Lname:Lname,
                applicationId:applicationId,
                parentFolderId:parentFolderId,
                folderName:folderName,
            },
            dataType: 'json',
            success:function(data){
                $('#addFolder').modal('hide');
                fetch_data(data.parentId);
              
            }
        })

    });

    function fetch_data(parentId){
         var parentId = parentId;
         var folderId = parentId;

              $.ajax({
                url: '{{ route('viewFolder') }}',
                type:'post',
                data:{
                   
                    folderId:folderId,
                    parentId:parentId
                },
                dataType: 'json',
                success:function(data){
                     $('#folder_table').html(data.data);

                }
            });
    }



      })


  </script>



  @endsection 
