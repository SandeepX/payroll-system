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
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>

      @if(auth()->user()->role=='admin')
        <div class="info">
          <a href="#" class="d-block">Welcome,<br> Adminastrator</br></a>
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
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                     {{(auth()->user()->role =='admin')?'Admin Management':'Employee management'}} 
                      <i class="fas fa-angle-left right"></i>
                     
                    </p>
                  </a>
                @if(auth()->user()->role == 'admin')
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{('/Employee')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('department')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Department</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Attendence</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Leave</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                      </a>
                    </li>
                    
                     <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Holidays</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>settings</p>
                      </a>
                    </li>
                    

                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Activity log</p>
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
