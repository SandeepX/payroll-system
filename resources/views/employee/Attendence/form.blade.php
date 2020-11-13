@extends('layouts.employee')



  @section('title','Attedence')





@section('Employee-content')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<section class="content">


  
			<div class="container-fluid">
		    	<div class="row">
		            <div class="col-lg-12">
						<hr><label>Attendance Report</label>
						<hr> 
							
							<div class="border border-warning p-3" id="getEmployee">	<h4>Employee Attendence Report</h4>	
								
								<hr class="bg-warning">
								<form action="{{route('generatereport')}}" method="post">
									{{csrf_field()}}
									<div class="row p-3">

										<div class="col-sm-12 col-md-4 p-2">
											<label>From<span class="text-danger">*</span></label>
											<input type="date" id="from" name="from" required="true" class="form-control">
										</div>
										
										<div class="col-sm-12 col-md-4 p-2">
											<label>To<span class="text-danger">*</span></label>
											<input type="date" id="to" name="to" required="true" class="form-control">
										</div>

										<div class="col-sm-12 col-md-4 p-4">
											<button class="btn btn-success mt-3 " id="report">Find</button>
										</div>

									</div>
								</form>
							</div> 
		               
		            </div>
		        </div>

		    </div>

  


  
	</section>

 

		
@endsection  



  