@extends('layout.admin')

@section('title','Add users')


@section('main-content')
	<section class="content">
		<div class="container mt-2">
			
			
@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endsection


	<div class="row" style="padding-top: 2%; margin-left: 170px;">
		
		<div class="col-md-8  text-center bg-white ">
			<h3> Register User </h3>
			<hr class="bg-warning mb-3">
			<form action="{{route('User.store')}}" method="post" enctype="multipart/form-data" >
				@csrf
				<div class="form-group">
					<input type="text"  class="form-control" placeholder="Full Name" required name="name">
				</div>

				<div class="form-group">
					<input type="email"  class="form-control" placeholder="Email Address" required=""  name="email">
				</div>
				
				<div class="form-group">
				    <input type="password" name="password" class="form-control" placeholder=" Enter Password" >
				</div>


				<div class="form-group">
					<select name="role" class="form-control" required>
						<option value="" >Select Role</option>
						<option value="admin">Administrator</option>
						<option value="employee">Employee</option>

					</select>
				</div>

				<div class="form-group">
					<select name="status" class="form-control" required>
						<option value="" >Select status</option>
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>

					</select>
				</div>


				
				<div class="form-group">
					<strong>upload Avatar<strong></strong><input type="file"  name="avatar" > 
				
				</div>
						
				<input type="submit" class="btn text-white mb-2" style="width: 100%; background-color: #ce9c46;" value="submit"></input>
			
  
			</form>
		
		
		</div>

			
	</div>

	</section>

@endsection

