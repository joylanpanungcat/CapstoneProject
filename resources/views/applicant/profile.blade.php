@extends('applicant.include.navbar')
@section('title','Profile')
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
        $Fname = $data->Fname;
        $Lname = $data->Lname;
        $username = $data->username;
        $password = $data->password;
        $contact_num = $data->contact_num;
        $alternative_num = $data->alternative_num;
        $date_register = $data->date_register;
        $password = $data->password;
        $purok = $data->purok;
        $barangay = $data->barangay;
        $city = $data->city;
        $accountId =$data->accountId;




    }
   @endphp
    <div class="">
      
        <div class="col-md-12 body_content">

          <div class="row">

                    <h3>Account Details</h3>
                 
                    <hr class="separate col-md-12" > 
                    

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left" id="add_application">
                                   
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">First Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="First Name" id="Fname" value="{{$Fname }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Last Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Last Name" id="Lname"  value="{{$Lname }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Username</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="username" id="username"  value="{{$username }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Password</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Password" id="password" value="{{$password }}">
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Contact Number</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Contact Number" id="contact_num"  value="{{$contact_num }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Alternative Number</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Alternative Number" id="alternative_num"  value="{{$alternative_num }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Date Register</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" id="date_register"  readonly value="{{$date_register }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <h2><strong>Address</strong></h2>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Purok</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Alternative Number" id="purok"  value="{{$purok }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Barangay</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Alternative Number" id="barangay"  value="{{$barangay }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">City</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Alternative Number" id="city"  value="{{$city }}" readonly>
                                        </div>
                                    </div>
                                
                                   
                              
                                    <div class="form-group" style="float: right">
										<button type="button" class="btn btn-success update_profile" id="{{ $accountId  }}" ><i class="fa fa-edit "></i>  Update</button>
                                        
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
    var adminPass='{{Session::get('accountId')['password']}}';
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
  })


  $('.update_profile').on('click',function(e){
    e.preventDefault();
    var accountId =$(this).attr('id');
    var Fname = $('#Fname').val();
    var Lname = $('#Lname').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var contact_num = $('#contact_num').val();
    var alternative_num = $('#alternative_num').val();

    var purok = $('#purok').val();
    var barangay = $('#barangay').val();


    Swal.fire({
      title:"Update  Inspection",
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
                type:'post',
                url: '{{ route('update_profile') }}',
                data:{
                    accountId:accountId,
                    Fname:Fname,
                    Lname:Lname,
                    username:username,
                    password:password,
                    contact_num:contact_num,
                    alternative_num:alternative_num,
                    purok:purok,
                    barangay:barangay,
                },
                dataType: 'json',
                success:function(data){
                 toastr.success(data.msg);

                }
            })

          },
        
    
            });

  });
  })
</script>

  @endsection 