
@extends('layout.admin')

@section('title','Add leave Type')



@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				
				<hr> 
				
					<div class="border border-warning p-3" id="getEmployee">		
						<h3>Leave Type Add Form</h3>
						<hr class="bg-warning">
						<form action="{{route('leave.store')}}" method="post"  >
							{{csrf_field()}}
							<div class="row p-3">
								
								<div class="col-sm-12 col-md-4 p-2">
									<label>Leave Type<span class="text-danger">*</span></label>
									<input type="text" name="leavetype" required="true" class="form-control">
								</div>
								<div class="col-sm-12 col-md-4 p-4">
									<button class="btn btn-success mt-3 " >save</button>
								</div>
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


