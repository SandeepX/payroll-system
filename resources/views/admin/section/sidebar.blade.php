


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
      <span class="brand-text font-weight-light">{{(auth()->user()->role =='admin')?'Admin':'Employee'}} dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/userAvatar/'.auth()->user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
        </div>

      @if(auth()->user()->role=='admin')
        <div class="info">
          <a href="{{url('/dashboard')}}" class="d-block">Welcome,<br> Administrator</br></a>
        </div>
      @else
        <div class="info">
          <a href="#" class="d-block"><strong>Welcome,<br>{{ ucfirst(Auth::user()->name) }}</strong></br></strong></a>
        </div>
      @endif
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
                     {{(auth()->user()->role =='admin')?'Admin Management':'Employee management'}} 
                      <i class="fas fa-angle-left right"></i>
                     
                    </p>
                  </a>
                @if(auth()->user()->role == 'admin')
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{('/Employee')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        
                        <p>Employee</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('department')}}" class="nav-link">
                        <i class="fas fa-building nav-icon"></i>
                        
                        <p>Department</p>
                      </a>
                    </li>

                   

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
                          <a href="{{route('Employeeleave.create')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Add Leave</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('Employeeleave.index')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Manage Leave</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('leave.create')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Add Leave Type</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('leave.index')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Manage Leave Type</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                    
                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                          payroll 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('payroll.create')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Create payslip</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('payroll.index')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Payslip list</p>
                          </a>
                        </li>

                        
                        
                      </ul>
                    </li>




                    <li class="nav-item">
                      <a href="{{('/holiday')}}" class="nav-link">
                        <i class="fa fa-plane nav-icon"></i>
                        <p>Holiday</p>
                      </a>
                    </li>


                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-archive"></i>
                        <p>
                          Daily
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('notice.create')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Add Notice</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('notice.index')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Manage Notice</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('quote.create')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Add Quotes</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('quote.index')}}" class="nav-link">
                            <i class=" nav-icon"></i>
                              <p>Manage Quotes</p>
                          </a>
                        </li>
                        
                      </ul>
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
                          <a href="{{'/change-password'}}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>Change passsword</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('configuration.index')}}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>company detail</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('sitelogo.index')}}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>Change Logo</p>
                          </a>
                        </li>
                      </ul>
                    </li>


                    

                    <li class="nav-item">
                      <a href="{{('/User')}}" class="nav-link">
                         <i class="fas fa-users-cog nav-icon"></i>
                          <p>Users</p>
                      </a>
                    </li>

                    
                    
                    

                    
                    

                    <li class="nav-item">
                      <a href="{{'/logActivity'}}" class="nav-link">
                        <i class="fa fa-bicycle nav-icon"></i>
                        <p>Activity log</p>
                      </a>
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
                @endif 
                </li>
              </ul>
            </li>
          
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
