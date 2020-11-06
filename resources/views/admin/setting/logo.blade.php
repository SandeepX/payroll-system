
@extends('layout.admin')

@section('title','Logo detail')

@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection


@section('main-content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
				
				<hr> 
				
					<div class="row">

						

						<div class="col-sm-12 col-md-12 py-8">
							<div class="col-sm-12 border border-warning  py-3">

								<div class="col-md-12  text-center  ">
									<h3> Company logo and Title </h3>
									<hr class="bg-warning mb-3">
									<form action="{{route('sitelogo.store')}}" method="post" enctype="multipart/form-data" >
										@csrf
										<div class="form-group">
											<label> Enter Site Title:</label>
											<input type="text"  class="form-control" placeholder="Enter site title" required name="title">
										</div>

										<div class="form-group">
											<label > choose Site Logo</label>
												
											<input type="file" class="form-control" name="logo">
											
										</div>

										<div class="form-group">
										
											<div class="col-md-4 col-sm-4 col-xs-12">	<img src="" class="img-responsive" alt="" style="border:1px solid #ddd; border-radius:4px; padding:5px;width:250px;height:140px;">
											</div>
										</div>


												
										<input type="submit" class="btn text-white mb-2" style="width: 100%; background-color: #ce9c46;" value="submit"></input>
									
						  
									</form>
		
		
								</div>
								
							

								
							

							</div>

						</div>

					</div> 
               
            </div>
        </div>

    </div>

  
</section>


	@section('scripts')

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	@endsection


@endsection  












 