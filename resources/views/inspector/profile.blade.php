@extends('inspector/include.navbar')
@section('title','Inspection')
@section('content')
 <style type="text/css">
    .legend-group{
      padding: 10px;
      display: inline;
    }
    .legend-group.FSEC{
      margin-left: -10px;
    }
    .legend-group .legend-body{
      display: inline-block;
      width: 200px;
      margin-top: 20px;

    }
    .legend-group .legend-event{
      display: inline-block;
      font-size: 20px;
      text-align: center;

    }
    .legend-group .legend-color{
      display: inline-block;
      height: 20px;
      width: 20px;

    }
    .legend-group .legend-grou2{
      margin-left: 10px;
    }
     .legend-group .legend-color.FSIC_Business{
     background-color: #0B62A4;
     float: right;
    }
    .legend-group .legend-color.FSIC_new{
     background-color: #4DA74D;
     float: right;
    }
    .legend-group .legend-color.FSIC_OCCU{
     background-color: #AFD8F8;
     float: right;
    }
    .legend-group .legend-color.FSEC{
     background-color: #7A92A3;
     float: right;
    }
    .legend-group .legend-body h4.FSEC: hover{
     color: #111;
    }
     .legend-group .legend-body h4.FSIC_OCCU:hover{
     color: #AFD8F8;
    }
   
     .legend-group .legend-body h4.FSIC_new:hover{
     color: #4DA74D;
    }
     .legend-group .legend-body h4.FSIC_Business:hover{
     color: #0B62A4;
    }
    .icon{
      color: #446587 !important;
    }
 .separate{
  border-bottom: 3px solid #1ABB9C;
  width: 80%;
}
.swal2-title{
    color: #ffff;
}
  </style>
 <div class="right_col" role="main" >
     @php 
        foreach($data as $data){
            $Fname = $data['Fname'];
            $Lname = $data['Lname'];
            $Position = $data['Position'];
            $username = $data['username'];
            $password = $data['password'];
            $inspectorId  = $data['inspectorId'];


        }
     @endphp

    <div class="">
        
        <div class="col-md-12 body_content">

          <div class="row">

                    <h3>Account Details</h3>
                 
                    <hr class="separate"> 

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">First Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Fname }}" id="Fname">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Last Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Lname }}" id="Lname">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Position</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Position }}" id="Position">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Username</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$username }}" id="username">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Position</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Position }}" id="Position">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Password</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$password }}" id="password">
                                        </div>
                                    </div>

                                    
                                            <input type="hidden" class="form-control" placeholder="Default Input" id="inspectorId" value="{{ $inspectorId }}">
                                    
                                    
                                    <div class="form-group" style="float: right">
										<button type="submit" class="btn btn-success" id="update"><i class="fa fa-edit "></i>  Update</button>
                                        
                                    </div>
                                </form>

                  </div>
         </div>

   </div>
 </div>




</div>  
       
     </div>
 </div>

 <script>
  $(document).ready(function(){
    var adminPass='{{Session::get('inspectorId')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
 $('#update').on('click',function(e){
  var inspectorId  =$('#inspectorId').val();
  var Fname=$('#Fname').val();
  var Lname  =$('#Lname').val();
  var Position  =$('#Position').val();
  var username  =$('#username').val();
  var password  =$('#password').val();
     e.preventDefault();
     Swal.fire({
      title:"Update Account Details",
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
                 
                  confirmButtonColor: '#42BA96',
                  confirmButtonText:
                    '<i class="fa fa-check" ></i> Confirm',
                
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
                           url:'{{ route('update_inspector') }}',
                           data:{
                            inspectorId:inspectorId,
                            Fname:Fname,
                            Lname:Lname,
                            Position:Position,
                            username:username,
                            password:password,
                           },
                           success:function(data){
                             swal.close();
                             toastr.success(data.msg);
                           }
                         })
                            
                        })
                    }
                  },
               
          });

          },
        
            });
     
 })
  })
</script>

  @endsection 