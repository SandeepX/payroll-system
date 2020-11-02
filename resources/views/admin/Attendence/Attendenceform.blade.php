
@extends('layout.admin')

@section('title','Form Attendence')



@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				
				<hr> 
				@if(isset($Employeelist))
					<div class="border border-warning p-3" id="getEmployee">		
						<h3>Attendance Form</h3>
						<hr class="bg-warning">

						<form action="{{route('storeEmployee')}}" method="post"  >
							{{csrf_field()}}

							<div class="form-row">
								<div class="col-3">
									<label>Attendence BY:</label>
									<input type="text" class="form-control" placeholder="Attendance By" value="{{(Auth::user()->name)}}" name="AttendenceBy" >
								</div>

								<div class="col-3">
									<label>Date:</label>
									<input type="date" class="form-control" placeholder="date" value="{{$datadate}}" name="date" >
								</div>

							</div>
							<hr>

							@foreach($Employeelist as $key =>$value)
							<div class="form-row" style="padding-top: 10px;">
								<div class="col-4">
									<label>Employee Name:</label>
									<input type="text" class="form-control" placeholder="Employeename" name="Employeedetail[Employeename]" value="{{ $value->name }}">
								</div>

								
								

								<div class="col">
									<label>In time:</label>
									<input type="time" class="form-control" placeholder="Intime" value="" name="Employeedetail[intime]">
								</div>

								<div class="col">
									<label>Out Time:</label>
									<input type="time" name="Employeedetail[outtime]" value="" class="form-control" placeholder="outtime">
								</div>

								<div class="col-3">
									<label>Status:</label>
									<select name="Employeedetail[status]" class="form-control">
										<option value="">Select status</option>
										<option value="absent">Absent</option>
										<option value="present">present</option>
										<option value="Onleave">On leave</option>
									</select>
									
								</div>
							</div>
							@endforeach

							<div class="d-flex justify-content-center my-3">
								<div class="form-group">
									<button class="btn btn-success">save</button>
								</div>
							</div>
						</form>
					</div>
                @endif
            </div>
        </div>

    </div>

    
  
</section>


@endsection  




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@section('scripts')
	<!-- <script>
		$(document).ready(function(){
			$("#getemployee").click(function(){
				var departmentId = $('#departmentId').val();
				var date = $('#date').val();
				alert(departmentId);
				$.ajax({
					type: "post",
					url: '/Attendence/Employeelist',
					data:{
					id:departmentid,
					date:date,
					_token:"{{ csrf_token() }}"
					},

					success: function(data){

						//alert(data);
					}
				});

			});
		});
	

	</script> -->

endsection

