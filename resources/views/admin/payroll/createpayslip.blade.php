
@extends('layout.admin')

@section('title','Create payslip')



@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				<hr><label>Payroll Page</label>
				<hr> 
				@if(isset($alldepartments))
					<div class="border border-warning p-3" id="getEmployee">		
						<h3>Create Payslip</h3>
						<hr class="bg-warning">
						<form action="{{route('payroll.store')}}" method="post" id="form1" >
							{{csrf_field()}}
							<div class="row p-3">
								<div class="col-sm-12 col-md-4 p-2">
									<label>Department<span class="text-danger">*</span></label>
									<select class="form-control"  name="departmentId" id="departmentId" required>
										<option value="">select Department</option>
										@foreach($alldepartments as $key =>$value)
										   <option value="{{$value->id}}">{{$value->department}}</option>
										
										@endforeach
									</select>
								</div>

								<div class="col-sm-12 col-md-4 p-2">
									<label>Employee<span class="text-danger">*</span></label>
									<select class="form-control" id="Employee" name="employee" required="">
										
									
									</select>
								</div>

								<div class="col-sm-12 col-md-4 p-2">
									<label>Date<span class="text-danger">*</span></label>
									<input type="date" id="date" name="date" required="true" class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Basic Allowance<span class="text-danger">*</span></label>
									<input type="number"  id="keyup" name="BasicAllowance"  class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Other Allowance <span class="text-danger">*</span></label>
									<input type="number"  id="keyup1" name="otherAllowance"  class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Basic Deduction<span class="text-danger">*</span></label>
									<input type="number"  id="keyup2" name="BasicDeduct"  class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>other Deduction<span class="text-danger">*</span></label>
									<input type="number"  id="keyup3" name="otherDeduct"  class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Basic Salary<span class="text-danger">*</span></label>
									<input type="number"  name="BasicSalary" id="keyup4" required="true" class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Total:<span class="text-danger">*</span></label>
									<input type="number" id="total" name="total" readonly="" class="form-control">
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>Payment Method<span class="text-danger">*</span></label>
									<select class="form-control" id="payment"  name="payment" required >
										
										<option value="cash">cash</option>
										<option value="check">check</option>
										<option value="BankDeposit">Bank deposit</option>

									</select>
								</div>

								<div class="col-sm-12 col-md-3 p-2">
									<label>status<span class="text-danger">*</span></label>
									<select class="form-control" name="status" required="" >
										<option value="unpaid">unpaid</option>
										<option value="paid">Paid</option>
										

									</select>
								</div>
								




				

								<div class="col-sm-12 col-md-3 p-3">
									<button class="btn btn-success mt-3 " id="Createpayslip ">Create Payslip</button>
								</div>
							</div>

							

							
						</form>

						

					</div> 
                @endif
            </div>
        </div>

    </div>

  
</section>


 




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>




	@section('scripts')
		<script>

			$(document).ready(function(){
				$("#departmentId").change(function(){
					var id = $(this).val();
					$.ajax({
		                type: "post",
		                url: '/payroll/Employee',
		                data:{
		                	id:id,
		                	_token:"{{ csrf_token() }}"
		                },
		                success: function(data){
					  		$('#Employee').html(data.html);
						}

		            });
				});



				$('#keyup4').keyup(function(){
					//alert('hello');
					var Ballowance  = $('#keyup').val();
					var Oallowance  = $('#keyup1').val();
					var Bdeduct  = $('#keyup2').val();
					var Odeduct = $('#keyup3').val();
					var Bsalary  = $('#keyup4').val();

					var Add = (+Ballowance ) +(+Oallowance) ;
					var sub = (+Bdeduct) + (+Odeduct) ;
					var subtotal = (Add) + (-sub);
					var Total = (+Bsalary) + (+subtotal);

					//alert(Total);

					$("#total").val(Total);
				});

				
			});


							
		</script>

		
	
	@endsection
@endsection 

