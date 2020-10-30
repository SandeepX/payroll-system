
@extends('layout.admin')

@section('title','Daily Attendence')



@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				<hr><label>Attendance Page</label>
				<hr> 
				@if(isset($alldepartments))
					<div class="border border-warning p-3" id="getEmployee">		
						<h3>Daily Attendance</h3>
						<hr class="bg-warning">
						<form action="{{route('getEmployee')}}" method="post"  >
							{{csrf_field()}}
							<div class="row p-3">
								<div class="col-sm-12 col-md-4 p-2">
									<label>Employees By Department<span class="text-danger">*</span></label>
									<select class="form-control"  name="departmentID" id="departmentId">
										<option value="">All Department</option>
										@foreach($alldepartments as $key =>$value)
										   <option value="{{$value->id}}">{{$value->department}}</option>
										
										@endforeach
									</select>
								</div>
								<div class="col-sm-12 col-md-4 p-2">
									<label>Date<span class="text-danger">*</span></label>
									<input type="date" id="date" name="date" required="true" class="form-control">
								</div>
								<div class="col-sm-12 col-md-4 p-4">
									<button class="btn btn-success mt-3 " id="getemployee">Get Employee List</button>
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

