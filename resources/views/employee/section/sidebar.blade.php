


<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/dashboard')}}" class="nav-link">Home</a>
      </li>

     </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           <strong> {{ ucfirst(Auth::user()->name) }}</strong>  <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>
                                  

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Your Logo here</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/userAvatar/'.auth()->user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
        </div>

     
        <div class="info">
          <a href="{{url('/dashboard')}}" class="d-block"><strong>Welcome,<br>{{ ucfirst(Auth::user()->name) }}</strong></br></strong></a>
        </div>
      
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="      menu" data-accordion="false">
          
            <li class="nav-item has-treeview menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview has-treeview menu-open">
                  <a href="#" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    
                    <p>
                     Dashboard 
                      <i class="fas fa-angle-left right"></i>
                     
                    </p>
                  </a>
               
                  <ul class="nav nav-treeview">
                    

                   

                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-columns"></i>
                        <p>
                          Attendence
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{('/Attendence')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Daily Attendence</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Attendence Report</p>
                          </a>
                        </li>

                        
                        
                      </ul>
                    </li>

                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-bed"></i>
                        <p>
                          Leave
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('applyleave')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Apply for Leave</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('Leavelist')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Manage Leave</p>
                          </a>
                        </li>

                        
                        
                      </ul>
                    </li>
                    
                    

                    <li class="nav-item">
                      <a href="{{'/employee/payroll'}}" class="nav-link">
                        <i class="fas fa-receipt nav-icon"></i>
                        <p>PayRoll</p>
                      </a>
                    </li>




                    <li class="nav-item">
                      <a href="{{('/employee/holiday')}}" class="nav-link">
                        <i class="fa fa-plane nav-icon"></i>
                        <p>Holiday</p>
                      </a>
                    </li>


                    

                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog "></i>
                        <p>
                          Setting
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{'/employee/change-password'}}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>Change passsword</p>
                          </a>
                        </li>

                        

                        
                      </ul>
                    </li>


                    
                    

                    <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out nav-icon"></i>{{ __('Logout') }} 
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                              </form>
                      </a>


                      
                    </li>
                 </ul> 
                 
                </li>
              </ul>
            </li>
          
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
