@include('employee.section.header')

  @include('employee.section.sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<div class="row">
		    <div class="col-12">
		        @include('employee.section.notify')
		    </div>
		</div>

    @yield('Employee-content')
    
  </div>
@include('employee.section.footer')