
@extends('include.navbar')
@section('title','Archived')
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
                                      <div id="show2"></div>
                                <div class="x_title">
                                    <h2>Archived <small></small></h2>

                                   
                                    <div class="clearfix"></div>
                                    <div id="show"></div>
                                </div>
                               
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Application</a>
                          </li>
                           <li role="presentation" class="active"><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Account </a>
                          </li>
                         
                        
                        </ul>
                         
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <div id='showDelete'></div>
                         <div class='container'>   
                           <div class="x_content">
                                    <br />
                                       <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                     <table class="table table-striped table-bordered" id="archiveData"  style="width:100%;">
                              <thead>
                                     <tr>
                                  <th>#</th>
                                  <th>Owner's Name</th>
                               
                                  <th>Type of Application</th>
                                     <th>Control #</th>
                                  <th>Business Name</th>
                                    {{-- <th>Contact Number</th> --}}
                                    <th >Action</th>
                                   
                                </tr>
                              </thead>
                              <tbody >
                            
                            
                                  
                                    
                                  </tbody>
                 
                                  </table>

                        </div>
                        </div>

                             </div>
                                  
                              
                              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="row">
                                  <div class="x_content">
                                    <br />
                                       <!--  <button type="button" name="delete_all" id="delete_all" class="btn  btn-xs"><i class="fa fa-user-times fa-lg"></i></button> -->
                                     <table class="table table-striped table-bordered" id="archiveData_account" style="width:100%;">
                              <thead>
                                <tr>
                                  <!-- <th>Select</th> -->
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Contact No.</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                    <th >Action</th>

                                </tr>
                              </thead>
                              
                 
                                  </table>

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
     var dataTable= $('#archiveData_account').DataTable({
        processing:true,
        info:true,
        'pageLength': 5,
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
          "columnDefs":[
         {
          "targets":[0, 3, 4,5],
          "orderable":false,
         },
        ],
          ajax: "{{ route('archivedFetch') }}",
        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'Fname',name:'Fname'},
        {data:'contact_num',name:'contact_num'},
        {data:'username',name:'username'},
        {data:'password',name:'password'},
        {data:'actions',name:'actions'}
        ]
      

     
     });

  })
</script>


  @endsection 
