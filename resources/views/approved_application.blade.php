@extends('include.navbar')
@section('title','Application List')
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

  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Approved Application</h3>
            </div>

         
        </div>
        <hr class="separate2">
                    
                    
        <div class="clearfix"></div>
       

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                      <div id="show2"></div>
                           
                                <div class="x_content">
                                    <br />
                                    <div class="col-md-4 sort_select">
                                      <label><b> Sort:</b></label>
                                      <select class="select_status" id="category_filter">
                                          <option value="">All</option>
                                          <option value="pending">pending</option>
                                          
                                          <option value="approved">approved</option>
                                          <option value="reinspection">reinspection</option>
                                          <option value="renewal">renewal</option>
                                      </select>
                                    </div>
                              
                                    <div class="col-md-8">
                                      <div class="row input-daterange" style="float: right">
                                        <div class="">
                                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly  style="margin-right:10px;"/>
                                        </div>
                                        <div class="">
                                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                                        </div>
                                        <div class="">
                                            <button type="button" name="filter" id="filter" class="btn " style="background-color: #1ABB9C;color:#FFF"><i class="fa fa-check"></i></button>
                                            <button type="button" name="refresh" id="refresh" class="btn btn-default"><i class="fa fa-refresh"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                    <br><br>   <br><br>
                                       
                            <table class="table table-striped table-bordered " id="applicationData2" style="width: 100%"  >
                              <thead >
                               

                                <tr>
                                  <!-- <th>Select</th> -->
                                  <th>CONTROL #</th>
                                  <th>DATE</th>
                                  <th>TYPE OF OCCUPANCY</th>
                                  <th>NATURE OF BUSINESS </th>
                                  <th>OWNER / APPLICANT</th>
                                  <th>ADDRESS</th>
                                  <th>BUSINESS NAME</th>
                                  <th>BUSINESS ADDRESS</th>
                                  <th>INSPECTOR</th>
                                  <th>BIN</th>
                                  <th>BP #</th>
                                  <th>AMOUNT</th>
                                  <th>OR #</th>
                                  <th>DATA PAID IO#</th>

                                 
                                </tr>
                              </thead>
                              
                                  </table>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
  $(document).ready(function(){
    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
      $('.input-daterange').datepicker({
          todayBtn:'linked',
          format:'yyyy-mm-dd',
          autoclose:true
        });
        fetch_data();
    function fetch_data(category = '', from_date = '', to_date = '')
        {
     var dataTable= $('#applicationData2').DataTable({
        processing:true,
        info:true,
       
        'pageLength': 5,
        'aLengthMenu':[[5,10,25,50,-1],[5,10,25,50,"All"]],
        "autoWidth": false,
         autoWidth: false,
          scrollX:true,
          ajax: {
            url:"{{ route('reports') }}",
            data: {category:category,
                   from_date:from_date, 
                  to_date:to_date
            }
          },

        columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex', class: 'table_header'},
        {data:'date_apply',name:'date_apply'},
        {data:'type_occupancy',name:'type_occupancy'},
        {data:'nature_business',name:'nature_business'},
        {data:'nature_business',name:'nature_business'},
        {data:'nature_business',name:'nature_business'},
        {data:'business_name',name:'business_name'},
        {data:'business_name',name:'business_name'},
        {data:'inpector_id',name:'inpector_id'},
        {data:'BP_num',name:'BP_num'},
        {data:'BP_num',name:'BP_num'},
        {data:'BP_num',name:'BP_num'},
        {data:'OR_num',name:'OR_num'},
        {data:'OR_num',name:'OR_num'}
        ]
     });
  }

  $('#category_filter').change(function(){
      var category_id = $('#category_filter').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      $('#applicationData2').DataTable().destroy();
      fetch_data(category_id , from_date,to_date);
 });

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var category_id = $('#category_filter').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#applicationData2').DataTable().destroy();
   fetch_data(category_id,from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

  
 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#applicationData2').DataTable().destroy();
  fetch_data();
 });
  })
</script>

  
  @endsection 