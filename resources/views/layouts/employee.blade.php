@include('admin.section.header')

  @include('admin.section.sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<div class="row">
		    <div class="col-12">
		        @include('admin.section.notify')
		    </div>
		</div>

    @yield('Employee-content')
    
  </div>
@include('admin.section.footer')