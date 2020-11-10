@extends('layout.admin')

@section('title','Edit users')


@section('main-content')
	<section class="content">
		<div class="container mt-2">
			
			
@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endsection


	<div class="row" style="padding-top: 2%; margin-left: 170px;">
		
		<div class="col-md-8  text-center bg-white ">
			<h3> Edit user </h3>
			<hr class="bg-warning mb-3">
		@if(isset($userdata))

			<form action="{{route('User.update',$userdata->id)}}" method="post" enctype="multipart/form-data" >
				@method('put')
				@csrf
				<div class="form-group">
					<input type="text"  class="form-control" value="{{@$userdata->name}}" placeholder="Full Name" required name="name">
				</div>

				<div class="form-group">
					<input type="email"  class="form-control" placeholder="Email Address" required value="{{@$userdata->email}}"   name="email">
				</div>

				

				<div class="form-group">
					<select name="role" class="form-control" required>
						<option value="{{@$userdata->role}}" >{{ucfirst(@$userdata->role)}}</option>
						<option value="admin">Administrator</option>
						<option value="employee">Employee</option>

					</select>
				</div>

				<div class="form-group">
					<select name="status" class="form-control" required>
						<option value="{{@$userdata->status}}" >{{ucfirst(@$userdata->status)}}</option>
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>

					</select>
				</div>

				<div class="form-group">
					
					<img src="{{asset('uploads/userAvatar/'.@$userdata->avatar)}}" class="img-responsive" alt="ANDERSON-image" style="border:1px solid #ddd; border-radius:4px; padding:5px;max-width:200px">
				</div>


				
				<div class="form-group">
					<strong>upload updated Avatar<strong></strong><input type="file"  name="avatar" > 
				</div>
						
				<input type="submit" class="btn text-white mb-2" style="width: 100%; background-color: #ce9c46;" value="update"></input>
			
  
			</form>
		@endif
		
		
		</div>

			
	</div>

	</section>

@endsection

