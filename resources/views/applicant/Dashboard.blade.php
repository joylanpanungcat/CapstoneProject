@extends('applicant.include.navbar')
@section('title','Dashboard')
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
 .separate2{
  border-bottom: 3px solid #1ABB9C;
  width: 80%;
}
.swal2-title{
  color: white;
}
.control-label {
  float: left;
  color: white;
}

  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="col-md-12 body_content">

          <div class="row">
            <div class="page-title">
              <div class="title_left">
                <h4></h4>
              </div>
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group " id="emergency_button">
                 
                </div>
              </div>
            </div>
                     
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-bullhorn "></i>
               </div>
               <div class="count" ><strong id="announcement"></strong></div>

               <h3><a href="">Announcement</a></h3>
               <p>anouncements list</p>
             </div>
           </div>
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-tasks"></i>
              </div>
              <div class="count"><strong id="application"></strong> </div>

              <h3><a href="{{ route('application') }}"> Application  </a></h3>
              <p>List of application information </p>
            </div>
          </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
             <div class="tile-stats">
               <div class="icon"><i class="fa fa-refresh"></i>
               </div>
               <div class="count"><strong id="renewal"></strong> </div>

               <h3><a href="{{ route('renewal') }}"> Renewal </a></h3>
               <p>List of Renewal Application</p>
             </div>
           </div>
           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-user"></i>
              </div>
              <div class="count" >1</div>

              <h3><a href="{{ route('profile') }}"> Profile </a></h3>
              <p>Account Information</p>
            </div>
          </div>
          <div id="stablishment" style="display: none">
            <select name="" id="list_stablishment" class="form-control">
            </select>
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
    fetch()
      function fetch(){
          $.ajax({
              type:'get',
              url:'{{ route('Dashboard_fetch') }}',
              dataType: 'json',
              success:function(data){
                $('#announcement').html(data.data);
                $('#application').html(data.data2);
                $('#renewal').html(data.data3);
                $('#profile').html(data.data4);
                $('#list_stablishment').html(data.output);
                if(data.emergencyCount >0){
                  $('#emergency_button').html('<button   class="btn btn-danger button_danger"  style="float: right"><i class="fa fa-warning"> Send Emergency </i></button>');
                }else{
                  $('#emergency_button').html('<button   class="btn btn-success button_success"  style="float: right" id='+data.accountId+'><i class="fa fa-share">Connect Account </i></button>');

                }
                
              }

          })
      }

      $(document).on('click','.button_success',function(e){
        e.preventDefault;
        var accountId =$(this).attr('id');

    
            Swal.fire({
    title:"Already Applied?",
    iconHtml: '<i class="fa fa-check"></i>',
    text: 'Click yes to connect application',
    iconColor: '#42ba96',
         showCancelButton: true,
         showConfirmButton:true,
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
           html:'<form class="form-horizontal form-label-left" > <div class="form-group row "> <label class="control-label col-md-3 col-sm-3 ">Control Number</label> <div class="col-md-9 col-sm-9 "><input type="text" class="form-control" placeholder="Application Control Number" id="control_num_connect"  ></div><p class="error_connect" style="color:red"></p></div><div class="form-group row "> <label class="control-label col-md-3 col-sm-3 ">Contact Number</label> <div class="col-md-9 col-sm-9 "><input type="text" class="form-control" placeholder="Contact Number" id="contact_num_connect"  ></div><p class="error_connect" style="color:red"></p></div></form>',
            inputPlaceholder: 'Enter your password',
           titleFontColor:'red',
            // iconHtml: '<i class="fa fa-lock"></i>',
            // iconColor: '#FFF',
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
                var control_num_connect =$('#control_num_connect').val();
                  var contact_num_connect =$('#contact_num_connect').val();
                  if (value !== adminPass) {
                    Swal.showValidationMessage(
                      'incorrect password'
                    )
                  }
                  if(control_num_connect == '' && contact_num_connect == ''){
                    $('.error_connect').html('this field is required');
                  }
                  $('#control_num_connect').keyup(function(e){
                    e.preventDefault();
                    $('.error_connect').html('');
                  })
                  $('#contact_num_connect').keyup(function(e){
                    e.preventDefault();
                    $('.error_connect').html('');
                  })
                  if (value === adminPass && control_num_connect != '' &&  contact_num_connect != '') {
                    return new Promise(function (resolve){
                        $.ajax({
                          type: 'post',
                          url: '{{ route('connect_account') }}',
                          data:{
                            control_num_connect:control_num_connect,
                            contact_num_connect:contact_num_connect,
                          },
                          dataType: 'json',
                          success:function(data){
                            //preconfirm walay internet!!!!
                          
                            if( data.code == 400){
                              Swal.fire({
                                title:"Successfully Conencted",
                                icon:'success',
                                    showConfirmButton:true,
                                    focusConfirm: false,
                                    background: 'rgb(0,0,0,.9)',
                                    customClass : {
                                        title: 'swal2-title'
                                    }, 
                                background: 'rgb(0,0,0,.9)',
                                confirmButtonColor: '#1ABB9C',
                                confirmButtonText: 'login',
                                  }).then((result) => {
                                      window.location.href = "dashboard";
                              })
                            }else{
                              $('.error_connect').html('Invalid Credentials');
                            }
                           
                          }
                        })
                      })  
                     
                  }
                },
              
        });

        },
     
  
          });
 
      })
      $('#emergency_button').on('click',function(e){
        e.preventDefault();
        var output = $('#stablishment').html();
        var business_name=$('#list_stablishment').val();

        Swal.fire({
    title:"Send Fire Emergency?",
    iconHtml: '<i class="fa fa-warning"></i>',
   
    iconColor: '#DC3545',
         showCancelButton: true,
         showConfirmButton:true,
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
           html:output,
            inputPlaceholder: 'Enter your password',
           titleFontColor:'red',
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
                          type: 'post',
                          url: '{{ route('send_emergency') }}',
                          data:{
                            business_name:business_name
                          },
                          dataType: 'json',
                          success:function(data){
                            //preconfirm walay internet!!!!
                          
                            if( data.code == 400){
                              Swal.fire({
                                title:"Emergency Send Successfully ",
                                text:'We shall call you for the response check your phone',
                                icon:'warning',
                                    showConfirmButton:true,
                                    focusConfirm: false,
                                    background: 'rgb(0,0,0,.9)',
                                    customClass : {
                                        title: 'swal2-title'
                                    }, 
                                background: 'rgb(0,0,0,.9)',
                                confirmButtonColor: '#1ABB9C',
                                confirmButtonText: 'Done',
                                  }).then((result) => {
                                      window.location.href = "dashboard";
                              })
                            }else{
                              $('.error_connect').html('Invalid Credentials');
                            }
                           
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