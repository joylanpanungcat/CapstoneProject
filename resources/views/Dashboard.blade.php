@extends('include.navbar')
@section('title','Dashboard')
@section('content')
 <div class="right_col" role="main" >



    <div class="">
        <div class="col-md-12 body_content">

           <div class="row">
                     
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-tasks"></i>
                          </div>
                          <div class="count">2</div>

                          <h3><a href="application.php">Application</a></h3>
                          <p>Old and New Application.</p>
                        </div>
                      </div>
                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                          <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check"></i>
                          </div>
                          <div class="count">2</div>

                          <h4 style="margin-left: 4%;"><a href="application.php">Approve </a></h4>
                          <p>Approve Application.</p>
                        </div>
                      </div>
                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-ban"></i>
                          </div>
                          <div class="count">2</div>

                          <h3><a href="application.php">Denied </a></h3>
                          <p>Denied Application </p>
                        </div>
                      </div> 
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-refresh"></i>
                          </div>
                          <div class="count">2</div>

                          <h3><a href="mail.php">Renewal</a></h3>
                          <p>renewal of application</p>
                        </div>
                      </div>
                    </div>

               
              </div>
            </div>
       



  @endsection 