$(document).ready(function () {  
    var error=false;
    var count= 0;
    $('#txtPassword').keyup(function () {  
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))  
    })  
   
    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 12 && password.length !=0) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Short')  
            $('#txtPassword').addClass('Short2')  
            error=true;
            return 'Too short (password must be greater than 12 characters)'  
        }  
        if (password.length ==0) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('none')  
            return 'none'
        }  
        if (password.length > 12) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Weak') 
            $('#txtPassword').addClass('Weak2') 
            
               error=true; 
            return 'Weak (password must contains numbers and characters)'  
        } else if (strength == 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Good')  
            $('#txtPassword').addClass('Good2')  
               error=false;
            return 'Good'  
        } else {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Strong')  
            $('#txtPassword').addClass('Strong2')  
               error=false;
            return 'Strong'  
        }  
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#username').keyup(function(){
        var username = $(this).val();

        $.ajax({
            type:'post',
            url:"verify_username",
            data:{
                username:username,
            },
            dataType:'json',
            success:function(data){

                if(data.output !=''){
                    $('#validate_username').addClass('validateUsername');
                    $('#validate_username').html(data.output);
                    count = 1;
                    console.log(count);

                }else{
                    count = 0;
                    $('#validate_username').html('');

                    console.log(count);
                }
                
            }

        })
    
    });
   
      $('#register').on('submit',function(e){
      e.preventDefault();
     if(error==false && count ==0){
      Swal.fire({
          title: 'Register Confirmation',
          text: "Click yes to register",
          icon: 'warning',
            background: 'rgb(0,0,0,.9)',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
            
          confirmButtonText: 'Yes',
          customClass : {
              title: 'swal2-title',
              text:'swal2-title'
            },
        }).then((result) => {
          if (result.isConfirmed) {
           var Fname = $('#Fname').val();
           var Lname = $('#Lname').val();
           var username = $('#username').val();
           var password = $('#txtPassword').val();
           var txtPassword = $('#txtPassword').val();
           var contact_num= $('#contact_num').val();
           var purok= $('#purok').val();
           var barangay= $('#barangay').val();
           var city= $('#city').val();

           $.ajax({
               type:'post',
               url: 'register_applicant',
               data:{
                Fname:Fname,
                Lname:Lname,
                username:username,
                password:password,
                txtPassword:txtPassword,
                contact_num:contact_num,
                purok:purok,
                barangay:barangay,
                city:city,
                
               },
               dataType: 'json',
               success:function(data){
                   if(data.code == 200){
                             Swal.fire({
                            title:"Successfully Register",
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
                            window.location.href = "/";
                        })
                   }

               }
           })

          }
        })

     }else{
        // $('#txtPassword').focus();
 
     }
    }); 
   

    $('#login').on('submit',function(e){
        e.preventDefault();
        var username =$('#username').val();
        var password =$('#password').val();
        var login=true;

      $.ajax({
        url:'verify.php',
        type:'post',
        data:{
            username:username,
            password:password,
            login:login,
        },
        dataType:'json',
        success:function(data){
         
           if(data.code==200){
            document.location.href='home.php';
            
           }else{
              $('.error').show();
           $('#error').html(data.error);
           }
        }
      })
    });
    $('.close').on('click',function(e){
        e.preventDefault();
           $('.error').hide();

    })
});  