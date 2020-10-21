@extends('layout.admin')


@if(isset($data)&& !empty($data))
	@section('title','Edit Department')
@else
	@section('title','Create Department')
@endif

@section('main-content')

  <section class="content">

  	@section('styles')

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	@endsection


	@section('main-content')
		<!-- @if (count($errors) > 0)
	      <div class="alert alert-danger">
	        <strong>Sorry !</strong> There were some problems with your input.<br><br>
	        <ul>
	          @foreach ($errors->all() as $error)
	              <li>{{ $error }}</li>
	          @endforeach
	        </ul>
	      </div>
	      @endif

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif -->

	    @if(session('success'))
	        <div class="alert alert-success">
	          {{ session('success') }}
	        </div> 
	    @endif
		<section class="content">
			<div class="container-fluid ">
				<h3 class="jumbotron"><i class="glyphicon glyphicon-upload"></i> 
				{{isset($data)? 'Edit Department':'Create Department'}}</h3>

					@if(isset($data) && !empty($data))
					
	      				<form action="{{route('departmentUpdate',$data->id)}}" method="post" enctype="multipart/form-data" >
					
	      			
	      			@method('PUT')
	       			@else
       		
					<form method="post" action="{{route('createDepartment')}}" >
       			@endif 

			  		{{csrf_field()}}

					<div class="form-group">
						<label for="name">Department:</label>
					    <input  type="text" 
								class="form-control" 
								id="caption"
								value="{{isset($data)? $data['department']:''}}" 
								placeholder="Name Department....." 
								name="department" required>
						</div>
						@error('department')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror

					@if(!isset($data))

			        <div class="input-group control-group increment" >
			        	<div>
			        	<label for="name">Designation:</label>
			        		
			        	</div>
			          <input type="text" name="designation[]" class="form-control" placeholder="Designation" required>
			          <div class="input-group-btn"> 
			            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
			          </div>
			        </div>

			        <div class="clone hide">
			          <div class="control-group input-group" style="margin-top:10px">
			            <input type="text" name="designation[]" class="form-control" placeholder="Designation.....">
			            <div class="input-group-btn"> 
			              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
			            </div>
			          </div>
			        </div>

			        @else

			        <div class="input-group control-group increment" >
			        	<label for="name">Designation:</label>

			       <? @foreach(json_decode($data->designation) as $designation)?>

				       
				          <input 	type="text" 
									name="designation[]" 
									class="form-control" 
									placeholder="Designation"
									value="{{ $designation }} "
									>
					<? @endforeach ?>
				          <div class="input-group-btn"> 
				            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
				          </div>
				        </div>


				    <div class="clone hide">
			          <div class="control-group input-group" style="margin-top:10px">
			            <input type="text" name="designation[]" class="form-control" placeholder="Designation.....">
			            <div class="input-group-btn"> 
			              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
			            </div>
			          </div>
			        </div>


			    @endif

			        
			        <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> {{(isset($data))?'update':'Submit'}}</button>
			  </form>
				   
			</div>

				@section('scripts')

					<script type="text/javascript">
					    $(document).ready(function() {
					      $(".btn-success").click(function(){ 
					          var html = $(".clone").html();
					          $(".increment").after(html);
					      });
					      $("body").on("click",".btn-danger",function(){ 
					          $(this).parents(".control-group").remove();
					      });
					    });
					</script>
				@endsection


		      
		</section>
@endsection  



  