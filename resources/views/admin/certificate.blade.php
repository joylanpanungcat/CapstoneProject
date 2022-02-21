@extends('admin/include.navbar')
@section('title','Emergency List')
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
.main-panel{
    width: 750px;
    border: 2px solid black;
    padding: 20px;
    
}
.main-panel input {
    border: none;
    border-bottom: 1px solid #000;
    background-color: #F7F7F7;
}
.certificate_content{
    height: ;

}
.certificate_content img{
    margin-top: 20px;
    width: 100%;
}
.certificate_content input{
    border:none;
    border-bottom: 1px solid #000;
    margin-top: -40px;    
    
}
.certificate_content .top p, h2, input{
    text-align: center;
}
.certificate_content h2 { 
    font-weight: bold;
    color: #2A3F54;
    margin-top: -10px
}
.fsecn_no input {
    border-bottom: 2px solid red;
}
.fsecn_no{
    color: red;
}
.fsecn_no strong {
    font-size: 20px;
}
.fsec_mid {
    font-weight: bold;
    color:#2A3F54;
    font-size: 90em;
    text-decoration: underline;
    text-align: justify;
    width: 100%;
    margin-bottom: 20px;
}
.date_style{
    text-align: center;
    margin-bottom: 20px;
}
.date_style input {
    border-bottom: 2px solid #2A3F54;
}
.to_whom{
    text-align: justify;
}
.middle_design strong{
font-weight: bold;
color: #000;
}
.middle_design input{
    width: 60%;
}
.middle_design2 input{
    height: 2px;
    width: 100%;
}
.middle_design2 p {
    text-align: center
}
.owned input{
    width: 100%;
    margin-left: -20px;
}
.representative{
    text-align: end;
    margin-left: -20px
}
.issued_for input{
    width: 100%;
}
.issued_for2{
    width: 100%;
}
.violation{
    text-indent: 20px;
    margin-top: 10px
}
.note p{
    font-weight: bold;
    font-style: italic;
    text-align: center;
}
.paalala{
    font-weight: bolder;
    color: red;
    text-align: center
}
.moto p{
    text-align: center;
    font-size: 30px;
    color: #2A3F54;
    font-weight: thin;

}
  </style>
 <div class="right_col" role="main" >
     <div class="form ">
    <div class="main-panel ">
        <div class="row certificate_content" > 
            <div class=" col-md-12">
                <div class="col-md-2">
                    <img src="{{ asset('images/logo.png')  }}" alt="" style="width: 100%">
                </div>
                <div class="col-md-8">
                    <div class=" top">
                        <p>Republic of the Philippines
                        <br><strong>Department of the Interior and local Government</strong></p>
                        <h2 style="color:#2A3F54">BUREAU OF FIRE PROTECTION</h2>
                       <center>
                        <input type="text" name="" id="" style="width:40%">
                        <input type="text" name="" id=""  style="width:60%">
                        <input type="text" name="" id=""  style="width:80%">
                    </center> 
                    </div><br><br>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('images/logo.png')  }}" alt="" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 fsecn_no">
                    <div class="col-md-6"><strong>FSEC NO . R</strong></div>
                    <div class="col-md-4"><input type="text"></div>
                </div>
            </div>
        </div>
        <div class="row">
         <div class="col-md-12 fsec_mid"> 
                <h3><b>FIRE SAFETY EVALUATION CLEARANCE</b></h3>
         </div>
    </div>
        <div class="row date_style">
            <div class="col-md-8"></div>
            <div class="col-md-4"><input type="text"><br><span>Date</span></div>
        </div>
        <div class="row to_whom">
                    <h2><strong >TO WHOM IT MAY CONCERN</strong></h2>
            <div class="row">
                <div class="col-md-12 middle_design">
                <p>By virtue of the provisions of RA 9514 otherwise known as the Fire Code of the Philippines of 2008 the application for</p>
                        <strong >FIRE SAFETY EVALUATION CLEARANCE OF </strong><span><input type="text" name="" id="" value="JOYLAN E PANUNGCAT"></span>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"><p>(Name of Building/ Structure Facility)</p></div>
                    </p>
                </div>
                <div class="col-md-12 middle_design2">
                    <div class="col-md-12">
                        <input type="text" name="" id="">
                    </div>
                    <div class="col-md-12">
                        <p>to be constructed / renovated / altered / modified / change of occupancy located at</p>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="" id="">
                    </div>
                    <div class="col-md-12">
                        <p>(Address)</p>
                    </div>
                </div>
                <div class="col-md-12 owned">
                    <div class="col-md-12">
                        <div class="col-md-2">owned by</div>
                        <div class="col-md-4"><input type="text" name="" id=""></div>
                        <div class="col-md-6"> <p>is hereby <strong>GRANTED</strong> after the building plans and</p></div>
                       
                        <div class="col-md-12 representative">
                            <div class="col-md-6"><p>(Name of Owners/Representative)</p></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                        <p>other documents conform to the safety and life safety requirements of the Fire Code of the Philippines of 2008 and its IRR <br>
                            and that the recommendations in the Fire Safety Checklist (FSC) will be adopted.</p>
                        </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <p>This clearance is being issued for <span><input type="text" name="" id="" style="width: 350px"></span></p>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="" id="" style="width:100%">
                        </div>
                        </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 violation">
                            <p>Violation of Fire Code provisions shall ipso facto cause this certificate null and void, and shall hold the owner of the
                                building liable to the penalties provided for by the said Fire code.
                                </p>
                        </div>
                    </div>
                </div>
                <div class="row fire_code">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <label for=""><b>Fire Code Fees</b></label>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label for="">Amount Paid:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text"  style="width: 100%">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label for="">O.R. Number:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label for="">Date:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <p>RECOMMEND APPROVAL</p>
                            </div>
                            <div class="col-md-12">
                                <input type="text"><br>
                                <p style="text-align: center">CHIEF, FSES</p>
                            </div>
                            <div class="col-md-12">
                                <p><strong>APPROVED :</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="" id=""><br>
                                <p>CITY/MUNICIPAL FIRE MARSHAL</p>
                            </div>
                        </div>

                        <div class="row note">
                            <div class="col-md-12">
                            <p><b>NOTE :  “This Clearance is accompanied by Fire safety Checklist and does not take the place of any license required by
                                law and is not transferable. Any change or alteration in the design and specification during construction shall require a
                                new clearance”</b></p>
                            </div>
                        </div>
                        <div class="row paalala">
                            <div class="col-md-12">
                            <p>PAALALA: “MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION SA MGA KAWANI NITO ANG
                                MAGBENTA O MAGREKOMENDA NG ANUMANG BRAND NG FIRE EXTINGUISHER”</p>
                            </div>
                        </div>
                        <div class="row moto">
                            <div class="col-md-12 ">
                            <p><strong>"FIRE SAFETY IS OUR MAIN CONCERN"</strong></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
  </div>
           


  
  @endsection 