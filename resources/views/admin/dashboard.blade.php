@extends('layout.admin')

@section('title','Admin dashboard')

@section('main-content')

  <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$countEmployee}}</h3>

                      <p>Total Employee</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('Employee.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$countDepartment}}</h3>

                      <p>Total Departments</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('department')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$countEmployeePresent}}</h3>

                      <p>Total Present Today</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$countEmployeeAbsent}}</h3>

                      <p>On leave today</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                
              </div>
            <!-- /.row -->

     <div class="col-md-6 col-sm-12 border border-warning">
        <div class="row">
        <h4 style="margin-left: 100px; padding-top: 20px;">Log Activity</h4>
          
        </div>
        <hr>
        <div class="timeline p-3">

          <ul>
             @if(isset($logActivity) && count($logActivity)>0)
                @foreach($logActivity as $key => $value) 
                    <li>
                      <div class="content">
                        <h4>{{ucfirst(@$value->subject)}}</h4>
                        
                        <p>
                          {{date('d M Y', strtotime($value->created_at))}},  by {{$value->user->name}}
                        </p>
                       
                      </div>


                    </li>
                    <br>

                @endforeach
            @endif
          </ul>
        </div>  
      </div>

          
           
            
          </div>
  </section>
@endsection  



  


  