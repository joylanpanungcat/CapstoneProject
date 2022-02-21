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
 .separate2{
  border-bottom: 3px solid #1ABB9C;
  width: 80%;
}

  </style>
 <div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
              <h4></h4>
            </div>
            
            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search ">
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="button" style="color: white">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-12 body_content">

          <div class="row">

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>For Inspection</h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">

                    <table class="table table-striped" style="width: 100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Inspection Schedule</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="fetch_for_inspection">
                      
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
         </div>

   </div>
 </div>




</div>  
       
     </div>
 </div>
<script>
    $(document).ready(function(){
      fetch()
        function fetch(){
            $.ajax({
                type:'get',
                url:'{{ route('fetch_inspection') }}',
                dataType: 'json',
                success:function(data){
                    $('#fetch_for_inspection').html(data.output);
                }

            })
        }
    })
</script>
     



  @endsection 