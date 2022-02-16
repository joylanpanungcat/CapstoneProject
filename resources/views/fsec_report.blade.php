
@extends('include.navbar')
@section('title','FSEC')
@section('content')
<style type="text/css">
    
  .title_right button{
    float: right;
  }
  .modal input:hover{
     border: 1px solid #0687d6;
  }
 #user_data tr.removeRow
        {
            background-color: #b5b5b5;
        }




.swal2-title {
color: #FFF;
}
.my-validation-message{
background-color: transparent;
}
.modal-dialog{
width: 1200px;
}
button.close-modal{
   
width: 40px;
height: 40px;
line-height: 40px;
display: block;
font-size: 30px;
color: #000;
margin: 0 auto 10px auto;
padding: 2px;
}
button.close-modal:hover{
   
width: 40px;
height: 40px;
line-height: 40px;
display: block;
font-size: 30px;
color: #ffffff;
background: #2A3F54;
border-radius: 50%;
margin: 0 auto 10px auto;
padding: 2px;
border: none;
}
#fieldset1 .input_fieldset1.error2{
 border-bottom: 2px solid red;
}
.panel-requirements{
border: 2px solid #000;
     height: 200px;
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

   
    .dz-progress{
        display: none;
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
.scroll {
width: 100%;
height: 300px;
overflow: scroll;
}

/* .actionButton {

width: 10px;
height: 10px;


} */
/* .actionButton i {
margin-top: -5px;
margin-left: -5px;
width: 10px;
height: 10px;
position: absolute;

} */
.actionButton i {
border-radius: 50%;
border:1px solid  #696767;
padding: 10px;
color: #696767;
margin-left: -20px;
}
.actionButton:focus {

outline: none !important;
box-shadow: none !important;
}
.actionButton i:hover{
color: #1ABB9C;
border:1px solid  #1ABB9C;

}
.actionButton2 i {
border-radius: 50%;
border:1px solid  #696767;
padding: 10px;
color: #696767;
margin-left: -20px;
}
.actionButton2:focus {

outline: none !important;
box-shadow: none !important;
}
.actionButton2 i:hover{
color: #1ABB9C;
border:1px solid  #1ABB9C;

}
.dataTable tbody td{
padding: 0px;
color: #000;
font-size: 13px;
font-weight: 500;
word-break: break-word;
text-align: center;
vertical-align: middle;
}
.addApplicantionTooltip:focus {

outline: none !important;
box-shadow: none !important;
}
.my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.separate2{
border-bottom: 3px solid #1ABB9C;
margin-top: 60px;
}
.input-daterange input{
float: right;
cursor: pointer;
}
.sort_select{
display: flex;
flex-flow: row wrap;
align-items: center;
}
.sort_select select {
vertical-align: middle;
margin-left: 10px;
padding: 10px;
background-color: #fff;
border: 1px solid #ddd;
cursor: pointer;
}
.dataTables_wrapper  .dataTables_paginate  .paginate_button  {
margin: 5px 3px;

}

.dataTables_wrapper  .dataTables_paginate  .paginate_button .page-item{
border-radius: 40px !important;
color: rgb(255, 255, 255) !important;
background-color: #1ABB9C !important;

}
.dataTables_wrapper  .dataTables_paginate  .paginate_button .page-link{
border-radius: 40px !important;

}

.dataTables_wrapper  .dataTables_paginate  .paginate_button.active .page-link{

background-color: #1ABB9C !important;

}

.addApplication .modal-content{
height: 90vh;

}


.addApplication .modal-content .input-form{
/* background-color: #0687d6; */
height: 70vmin;
position: absolute;
}

.table_header{
color: #0687d6;
width: 10px !important;
}
#image{
    height: 70vh;
    width: 70vm;
}

</style>
<div class="right_col" role="main" >
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h3>FES Clearance Report </h3>
        </div>
        <div class="title_right">
             
            <button class="btn btn-success  " onclick="printDiv()"  ><i class="fa fa-print"   ></i> Print</button>
        </div>

     
    </div>
    <hr class="separate2">

                    
        <div class="clearfix"></div>
                 <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                                <div class="x_title">
                                    
                                   
                                    <div class="clearfix"></div>
                                    <div id="show"></div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-8" id="print_certificate">
                                    <img src="{{url('images/certificate/fsec.jpg')}}" alt="" id="image"> 
                                </div>
                                <div class="col-md-3"></div>

                     
                        
                        
                               </div>
                              </div>
       
        </div>

       </div>
       <script>
    function printDiv() {
            var divContents = document.getElementById("print_certificate").innerHTML;
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
