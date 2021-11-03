
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
height: 300px;
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
.folderItem .file-item,.file-folder {
        cursor: pointer;
}

.folderItem .file-item:hover,.folderItem .file-folder:hover{
        background: #eaeaea;
        color: black;
        box-shadow: 3px 3px #0000000f;
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
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Uploaded Documents</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
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
                         <input type="text" name="" id="parentFolderId">
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
                         <input type="text" name="" id="parentFolderId2">
                         <input type="text" value="<?php   echo $applicationId->applicationId ?>" id='applicationId' >
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
        
       
    
  <script type="text/javascript">


      $(document).ready(function(){




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
                     $('#parentFolderId2').val(data.parentId);
                         
                }
            })
        }
        $(document).on('click','.viewFolder',function(e){
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

               

                    
                     $('#path').append('<div id='+data.folderParentId+' class="d-inline-block"><a type="button" class="btn  pathView" id="'+data.folderParentId+'"><span><i class="fa fa-folder">'+data.folderName+'</i></span></a></div>');
                     
                          

                      $('#parentFolderId').val(folderId);
                      $('#parentFolderId2').val(folderId);
                      $('#addFileButton').show();

                }
            });

        });
$(document).on('click','.pathView',function(e){
    e.preventDefault();
    
    var folderId= $(this).attr('id');
   
    $('#path div#'+folderId).nextAll('div').remove();

$(' #folderName').val('');
$(' #errorFolder').html('');

  fetch_data(folderId);
 
 
   
})

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
    


    function fetch_data(parentId){
         var parentId = parentId;
         var folderId = parentId;
         var Fname = '<?php   echo $account_details->Fname ?>';
        var Lname= '<?php   echo $account_details->Lname ?>';
          var applicationId= '<?php   echo $applicationId->applicationId ?>';
              $.ajax({
                url: '{{ route('viewFolder') }}',
                type:'post',
                data:{
                   
                    Fname:Fname,
                    Lname:Lname,
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
