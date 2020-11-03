
@extends('layout.admin')

@section('title','Add leave Type')


@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				
				<hr> 
				
					<div class="border border-warning p-3" >		
						<h3>Leave Add Form</h3>
						<hr class="bg-warning">
						<form action="{{route('Employeeleave.store')}}" method="post">
							@csrf
							<div class="row p-2">
								<div class="col-sm-12 col-md-1"></div>
								<div class="col-sm-12 col-md-6">

									<div class="row">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>Employee<span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="Employee_id" required="">
												<option value="">Select Employee</option>
											@if(isset($employeedata))
												@foreach($employeedata as $key =>$value)
												
													<option value="{{$key}}">{{ $value}}</option>
												
												
												@endforeach

											@endif	
											</select>
										</div>
									</div>

									<div class="row mt-1">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>Leave Type<span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-12 col-md-8">  
											<select class="form-control" name="LeaveType" required="">
												<option>Select leave type</option>
											@if(isset($leavedata))
												@foreach($leavedata as $key =>$value)
												
													<option value="{{$value}}">{{ $value}}</option>
												
												
												@endforeach

											@endif
												
											</select>
										</div>
									</div>

									<div class="row mt-1">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>From<span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-12 col-md-8">
											<input type="date" required="" name="from" required="true" class="form-control">
										</div>
									</div>

									<div class="row mt-1">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>To<span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-12 col-md-8">
											<input type="date" required="" name="to" required="true" class="form-control">
										</div>
									</div>

									<div class="row mt-1">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>Comment  <span class="text-danger">*</span></label>
										</div>
										<div class="col-sm-12 col-md-8">
											<textarea class="form-control" name="comment" style="height: 10vh;" required=""></textarea>
										</div>
									</div>



									<div class="row mt-1">
										<div class="col-sm-12 col-md-4 d-flex justify-content-end">
											<label>Leave Status</span></label>
										</div>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="status" required="">
												<option value="">Select</option>
												<option value="pending">pending</option>
												<option value="approved">Approved</option>
												<option value="cancelled">cancelled</option>
											</select>
										</div>
									</div>
				
								</div>
								<div class="col-sm-12 col-md-5"></div>
							</div>
							<hr class="bg-warning">
							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</form>
					</div> 
               
            </div>
        </div>

    </div>

  
</section>


@endsection  




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



