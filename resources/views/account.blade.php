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
 
  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Applicant Account</h3>
            </div>

            <div class="title_right">
             
                <button class="btn btn-default"><i class="fa fa-user-plus fa-lg"  data-toggle="modal" data-target="#Modal"></i></button>
            </div>
        </div>

                    
                    
        <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                             
                                <div class="x_content">
                                    <br />
                                     
                                     <table class="table table-striped table-bordered" id="data" style="width:100%;">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Contact Number</th>
                                    <th>Password</th>
                                    <th width="200px" id="action">Action</th>
                                </tr>
                              </thead>
                              <tbody id="user_data">
                                @foreach($data as $data)
                               <tr>
                                  <th>#</th>
                                  <th>{{$data['Fname']}}</th>
                                  <th>{{$data['Lname']}}</th>
                                  <th>{{$data['contact_num']}}</th>
                                    <th>{{$data['password']}}</th>
                                    <th width="200px" id="action"><button type="button" name="delete" class="btn btn-defualt btn-xs delete" i><i class='fa fa-trash'></i></button>|| <button type='button' name='update' class='btn btn-defualt btn-xs update' ><i class='fa fa-edit'></i></button>||
<input type='hidden' name='account_id2' value=".$row['account_id'].">

 <button type='submit' name='view' class='btn btn-defualt btn-xs '  ><i class='fa fa-eye'></i></button>
</th>
                                </tr>
                                 @endforeach 
                                    
                                  </tbody>
                 
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                   <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class=" form-group">
                                <form method="post" id="formAdd">
                                  @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>First Name</b></label>
                                            <input type="text" name="" class="form-control" placeholder="First Name" id="Fname">
                                            <span id="errorFname"></span><br>
                                            <label><b>Username</b></label>
                                            <input type="" name="" class="form-control" placeholder="Username"  id="username">
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Last Name</b></label>
                                            <input type="" name="" class="form-control" placeholder="Last Name"  id="Lname" >
                                            <span id="errorLname"></span><br>
                                            <label><b>Password</b></label>
                                            <input type="" name="" class="form-control" placeholder="Password"  id="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Address</h5>
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Purok</b></label>
                                            <input type="" name="" class="form-control" placeholder="Purok"  id="purok">
                                            <label><b>City</b></label>
                                            <input type="" name="" class="form-control" placeholder="Purok" readonly="" value="Panabo City"  id="city">
                                            
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Barangay</b></label>
                                            <input type="" name="" class="form-control" placeholder="Barangay"  id="barangay">
                                            <label><b>Contact Number</b></label>
                                            <input type="" name="" class="form-control" placeholder="Contact Number" id="contact_num">
                                              <input type="hidden" name="" class="form-control" placeholder="Contact Number" id="date_register" value="<?php echo date("Y/M/D  h:i:s")?>">
                                            
                                            
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="click" class="btn btn-primary" id="add">Add</button>
                                </div>
                                </div>
                                </div>

                               
                                </div>
                                </form>




                                <!-- modal edit -->
                                  <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md" >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Applicant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" id="editForm">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="" class="form-control" id="editFname">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="" class="form-control" id="editLname">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="" class="form-control" id="editUsername">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="" class="form-control" id="editPassword">
                                </div>
                                    <input type="hidden" name="" class="form-control" id="editAccount_id">


                     
                            
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="edit">Edit</button>
                                </div>
                                </div>
                                </div>
                           </form>
                               
                                </div>
                <!-- compose -->
    <div class="compose col-md-6  " >
      <div class="compose-header">
        Send Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>

        <div id="editor" class="editor-wrapper"></div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
      $('#add').on('click', function(e){
                        e.preventDefault();

                        var Fname=$('#Fname').val();
                        var username=$('#username').val();
                        var Lname=$('#Lname').val();
                        var password=$('#password').val();
                        var purok=$('#purok').val();
                        var city=$('#city').val();
                        var barangay=$('#barangay').val();
                        var contact_num=$('#contact_num').val();
                        var date_register=$('#date_register').val();
                        console.log(username);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
                        $.ajax({
                            url: "addApplicant",
                            type: "post",
                            data:{
                                Fname:Fname,
                                username:username,
                                Lname:Lname,
                                password:password,
                                purok:purok,
                                city:city,
                                barangay:barangay,
                                date_register:date_register,
                                contact_num:contact_num
                            },
                            dataType:'json',
                            success: function(response){
                                // $('#show2').html(data);
                                // $('#Modal').modal('hide');
                                // $('#formAdd')[0].reset();
                                // load_data();
                                if(response.status==400)
                                {
                              $.each(response.errors,function(key , message){
                                $('#errorFname').html(response.errors.Fname);
                                 $('#errorLname').html(response.errors.Lname);
                          
                              });
                              
                                }
                             
                                
                            }
                         
                        });
                        

                    });
      });
    </script>
    <!-- /compose -->




       



  @endsection 