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
            $type_application = $data['type_application'];
            $nature_business = $data['nature_business'];
            $business_name = $data['business_name'];
            $date_apply = $data['date_apply'];
            $type_occupancy = $data['type_occupancy'];

            $Fname = $data['Fname'];
            $Lname = $data['Lname'];
            $Mname = $data['Mname'];

            $purok = $data['purok'];
            $barangay = $data['barangay'];
            $city = $data['city'];

            $applicationId= $data['applicationId'];

            
        }
     @endphp

    <div class="">
        <div class="page-title">
            <div class="title_left">
              <a class="btn btn-default" href="{{ route('for_inspection') }}"><i class="fa fa-arrow-left">  Back</i></a>
            </div>
            
           
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

                <div class="col-md-12">
                  <h2>Application Information</h2>
                </div>                 
                    <hr class="separate"> 

                  </div>
                  
                          
                                <br />
                                <form class="form-horizontal form-label-left">

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Application</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_application }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Type of Occupancy</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$type_occupancy }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Nature of Business</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$nature_business }}">
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 ">Business Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$business_name }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Date Apply</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$date_apply }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Applicant's Name</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$Fname.' '.$Mname.' '.$Lname }}">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 "> Address</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Default Input" value="{{$purok.' '.$barangay.' '.$city }}">
                                        </div>
                                    </div>
                      
                                            <input type="hidden" class="form-control" placeholder="Default Input" id="applicationId" value="{{ $applicationId }}">
                                    
                                    
                                    <div class="form-group" style="float: right">
										<button type="submit" class="btn btn-success" id="inspect_application_action"><i class="fa fa-info-circle "></i>  Inspect</button>
                                        
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
 $('#inspect_application_action').on('click',function(e){
  var applicationId =$('#applicationId').val();
     e.preventDefault();


     Swal.fire({
      title:"Inspect Application?",
      iconHtml: '<i class="fa fa-question"></i>',
      text: 'Click yes to inspect',
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
            window.location.href= 'inspect/'+applicationId+''
          },
         
            });
     
 })
  })
</script>

  @endsection 