@extends('layout.admin')



@if(isset($EmployeeEditData) && !empty($EmployeeEditData))
	@section('title','Edit EmployeeDetail')
@else
	@section('title','Add EmployeeDetail')
@endif


@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
	

@section('main-content')
<section class="content">
	<div class="container mt-2">
		

		@if(isset($EmployeeEditData) && !empty($EmployeeEditData))
      		<form action="{{route('Employee.update',$EmployeeEditData->id)}}" method="post" enctype="multipart/form-data" >
      			
      			@method('PUT')
       	@else

			<form action="{{route('Employee.store')}}" method="post" enctype="multipart/form-data">
		@endif

			@csrf
			<h3>{{ isset($EmployeeEditData)? 'Edit Employee Detail':'Add Employee Detail'}} </h3>

			<div class="row">

					<!-- column left -->
				<div class="col-sm-12 col-md-6 row">

				<!---------------Personal Details --------------> 
				<div class="col-sm-12 border border-warning">
					<div class="my-3">
						<h4>Personal Details</h4>
						<hr class="bg-warning">

						<div class="row">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Name<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['name']:''}}" name="name" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Father Name<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['father_name']:''}}" name="father_name" class="form-control" required>
							</div>	
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Date of Birth<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="date" value="{{isset($EmployeeEditData)? $EmployeeEditData['dob']:''}}" name="dob" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Gender<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<select name="gender"   class="form-control" required>
									@if(isset($EmployeeEditData))
									<option value="{{ isset($EmployeeEditData)?$EmployeeEditData['gender']:''}}">{{$EmployeeEditData['gender']}}</option>
									@endif
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>

								</select>
							</div>
						</div>


						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Phone<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="tel" value="{{isset($EmployeeEditData)? $EmployeeEditData['phone']:''}}" name="phone" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Reference</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['reference']:''}}" name="reference" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end"> Reference Phone </label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="tel" value="{{isset($EmployeeEditData)? $EmployeeEditData['referencePhone']:''}}"name="referencePhone" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Local Address<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['localaddress']:''}}"
								name="localaddress" class="form-control" >
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Permanent Address<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['permanentadress']:''}}" name="permanentadress" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Nationality</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['Nationality']:''}}" name="Nationality" class="form-control" required>
							</div>
						</div>

						

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
							<label class="d-flex justify-content-end">Marital Status<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<select name="Materialstatus"  class="form-control" required>
									@if(isset($EmployeeEditData))
									<option value="{{ isset($EmployeeEditData)?$EmployeeEditData['Materialstatus']:''}}">{{$EmployeeEditData['Materialstatus']}}</option>
									@endif
									
									<option value="married">Married</option>
									<option value="unmarried">Unmarried</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>


						@if(isset($EmployeeEditData))
						<div class="form-group">
							<img src="{{asset('uploads/employeephoto/'.$EmployeeEditData->photo)}}" class="img img-thumbnail img-responsive" style="width: 150px; height:100px;" alt="">
						</div>
						@endif

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Photo<span class="text-danger font-weight-bold">*</span></label>
							</div>
						@if(isset($EmployeeEditData))
							<div class="col-sm-12 col-md-8">
								<input type="file" name="photo" > 
								
							</div>
						@else
							<div class="col-sm-12 col-md-8">
								<input type="file" name="photo" > 
								
							</div>
						@endif

						</div>
					</div>
				</div>

				<!------------ Documents ---------->
				<div class="col-sm-12 border border-warning my-3">
					<div class="my-3">
						<h4>Documents</h4>
						<hr class="bg-warning">

						<div class="row mt-2">


							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Resume File &nbsp<span><i title="Only .pdf file allowed" class="fas fa-info-circle"></i></span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="file"   name="resumefile">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Offer Letter &nbsp<span><i title="Only .pdf file allowed" class="fas fa-info-circle"></i></span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="file"  name="offerletter">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Joining Letter &nbsp<span><i title="Only .pdf file allowed" class="fas fa-info-circle"></i></span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="file"  name="joiningletter">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Contract Paper &nbsp<span><i title="Only .pdf file allowed" class="fas fa-info-circle"></i></span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="file"  name="contractletter">
							</div>
						</div>

						
						

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Google Drive Url   &nbsp&nbsp</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="url" value="{{isset($EmployeeEditData)? $EmployeeEditData['googledriveurl']:''}}" name="googledriveurl" placeholder="Employee documents google drive url" class="form-control">
							</div>
						</div>

					</div>	
				</div>
	
			</div>

				<!-- column right -->
			
			<div class="col-sm-12 col-md-6">

				<!------------------- Account Login ----------------->
				<div class="col-sm-12 border border-warning  py-3">
					
					<h4>Account Login<span class="pl-2"><i title="Employee Login" class="fas fa-info-circle"></i></span></h4>
					<hr class="bg-warning">

					    <div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Email<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="email" value="{{isset($EmployeeEditData)? $EmployeeEditData['email']:''}}" name="email" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Password<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['password']:''}}" name="password" class="form-control" required>
							</div>
						</div>
					</div>

				<!------------Company Details ------------------>
				<div class="col-sm-12  border border-warning  py-3 my-3">
					<h4>Company Details</h4>
					<hr class="bg-warning">

					    <div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Employee ID</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="text" name="" class="form-control" placeholder="Auto Generated" disabled="true">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Department<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">

								<select name="department"  id="department"class="form-control" required>
									<option value="">--select department--</option>

									
								@if(isset($departmentdata))
									
									@foreach($departmentdata as $key=> $value)
										<option value="{{$value->id}}">{{$value->department}}</option>
									@endforeach
								@endif

								@if(isset($departmentdataEdit))
									@foreach($departmentdataEdit as $key=> $value1)
										<option value="{{$value1['id']}}">{{$value1['department']}}</option>
									@endforeach
								@endif
								</select>
							</div>
						</div>

						<div class="row mt-2">
							
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Designation<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<select name="designation" 
								
								 id="designation" class="form-control" required>
								
									
								</select>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Date of Joining<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="date" value="{{isset($EmployeeEditData)? $EmployeeEditData['dateofjoining']:''}}" name="dateofjoining" class="form-control" required>
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Date of Leaving</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="date" value="{{isset($EmployeeEditData)? $EmployeeEditData['dateofleaving']:''}}" name="dateofleaving" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Status</label>
							</div>
							<div class="col-sm-12 col-md-8">
								<select name="status"  class="form-control">
								@if(isset($EmployeeEditData))
									<option value="{{isset($EmployeeEditData)? $EmployeeEditData['status']:'' }}">{{ucfirst($EmployeeEditData['status'])}}</option>
								@endif
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
								</select>
							</div>
						</div>

				</div>
				<!--------------- Financial Details ------------>
				<div class="col-sm-12 border border-warning  py-3 my-3">
					<h4>Financial Details</h4>
					<hr class="bg-warning">

					    <div class="row mt-2">
							<div class="col-sm-12 col-md-4">
								<label class="d-flex justify-content-end">Salary<span class="text-danger font-weight-bold">*</span></label>
							</div>
							<div class="col-sm-12 col-md-8">
								<input type="number" value="{{isset($EmployeeEditData)? $EmployeeEditData['basicsalary']:''}}" name="basicsalary" placeholder="Amount Rs." class="form-control" required>
							</div>
						</div>
                        
                        <hr class="bg-warning">

                        <div class="col-sm-12 col-md-12 row">
                        	
                        	<div class="col-sm-12 col-md-6">
                        		<select name="" class="form-control">
									<option value="alloowence">Allowence</option>
									<option value="houseRent">House Rent</option>
								</select>
                        	</div>

                        	<div class="col-sm-12 col-md-6">
                        		<input type="number" value="{{isset($EmployeeEditData)? $EmployeeEditData['allowence']:''}}" name="allowence" placeholder="Rs." class="form-control">
                        	</div>

                        	
							
						</div>

						<hr class="bg-warning">

                        <div class="col-sm-12 col-md-12 row">
                        	
                        	<div class="col-sm-12 col-md-6">
                        		<select name="" class="form-control">
									<option value="Deduction">Deduction</option>
									<option value="PF">PF</option>
								</select>
                        	</div>





                        	<div class="col-sm-12 col-md-6">
                        		<input type="number" value="{{isset($EmployeeEditData)? $EmployeeEditData['deduction']:''}}" name="deduction" placeholder="Rs." class="form-control">
                        	</div>

                        	
							
						</div>

						
				</div>
<!---------------------------------- Bank Account Details\




 ----------------------------------------->

<div id="dd">
</div>



				<div class="col-sm-12 border border-warning  py-3 my-3">
					<h4>Bank Account Details</h4>
					<hr class="bg-warning">

					    <div class="row mt-2">
							<div class="col-sm-12 col-md-5">
								<label class="d-flex justify-content-end">Account Holder Name</label>
							</div>
							<div class="col-sm-12 col-md-7">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['Accountholdername']:''}}" name="Accountholdername" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-5">
								<label class="d-flex justify-content-end">Account Number</label>
							</div>
							<div class="col-sm-12 col-md-7">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['Accountnumber']:''}}" name="Accountnumber" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-5">
								<label class="d-flex justify-content-end">Bank Name</label>
							</div>
							<div class="col-sm-12 col-md-7">
								<input type="text"value="{{isset($EmployeeEditData)? $EmployeeEditData['bankname']:''}}" name="bankname" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-5">
								<label class="d-flex justify-content-end">Branch</label>
							</div>
							<div class="col-sm-12 col-md-7">
								<input type="text" value="{{isset($EmployeeEditData)? $EmployeeEditData['branch']:''}}" name="branch" class="form-control">
							</div>
						</div>

						<div class="row mt-2">
							<div class="col-sm-12 col-md-5">
								<label class="d-flex justify-content-end">Bank Code</label>
							</div>
							<div class="col-sm-12 col-md-7">
								<input type="number" value="{{isset($EmployeeEditData)? $EmployeeEditData['bankcode']:''}}"name="bankcode" class="form-control">
							</div>
						</div>
				</div>
			</div>
			</div>

			<div class="d-flex justify-content-center my-4">
				<div class="form-group">
				<button class="btn btn-success">{{ isset($EmployeeEditData)? 'Update':'Submit'}}</button>
			</div>
  
			</div>
		</form>
	</div>




		@section('scripts')

			<script src="https://kit.fontawesome.com/a076d05399.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


			<script >
				$(document).ready(function(){
					loaddata();
					$("#department").change(function(){
						var id = $(this).val();
						//alert(id);
						$.ajax({
			                type: "post",
			                url: '/Employee/designation',
			                data:{
			                	id:id,
			                	_token:"{{ csrf_token() }}"
			                },
			                
			                success: function(data){

			                	//alert(data);

			               		$('#designation').html(data.html);
			                }	   
	                   	
						});

					});
				});
					
				function loaddata(){
					var id = $("#department").val();
					//alert(id);
					$.ajax({
			                type: "post",
			                url: '/Employee/designation',
			                data:{
			                	id:id,
			                	_token:"{{ csrf_token() }}"
			                },
			                
			                success: function(data){
						$('#designation').html(data.html);
			                }	   
	                   	
						});

					
				}
			</script>

		@endsection
	</section>

@endsection

