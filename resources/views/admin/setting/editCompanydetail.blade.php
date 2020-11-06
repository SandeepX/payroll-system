
@extends('layout.admin')

@section('title','Company detail')

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

						<div class="col-sm-12 col-md-6 row">
						
							<div class="col-sm-12 border border-warning">

							
								<div class="col-md-12  text-center  ">
									<h3> Company detail </h3>
									<hr class="bg-warning mb-3">

								

									<form action="{{route('configuration.update',$companydata[0]->id)}}" method="post" enctype="multipart/form-data" >
									@method('PUT')

										@csrf
										
										<div class="form-group">
											<input type="text"  class="form-control" placeholder="Enter Company name" required name="company_name" value="{{isset($companydata)?$companydata[0]->company_name:''}}">
										</div>

										<div class="form-group">
											<input type="tel"  class="form-control" placeholder="Enter phone number" required name="phone" value="{{isset($companydata)?$companydata[0]->phone:''}}">
										</div>

										<div class="form-group">
											<input type="email"  class="form-control" placeholder="company Email Address" required="" value="{{isset($companydata)?$companydata[0]->email:''}}"  name="email">
										</div>

										<div class="form-group">
											<input type="url"  class="form-control" placeholder="company website url" required=""  value="{{isset($companydata)?$companydata[0]->website_url:''}}" name="website_url">
										</div>
										
										<div class="form-group">
											<input type="tel"  class="form-control" placeholder="company fax" value="{{isset($companydata)?$companydata[0]->fax:''}}"  name="fax">
										</div>

										<div class="form-group">
											<input type="text"  class="form-control" placeholder="Enter company adress" required  value="{{isset($companydata)?$companydata[0]->address:''}}" name="address">
										</div>

										<div class="form-group">
											<input type="city"  class="form-control" placeholder="Enter location city"  value="{{isset($companydata)?$companydata[0]->city:''}}"  name="city">
										</div>

										<div class="form-group">
											<input type="number"  class="form-control" placeholder="Enter Postal code" value="{{isset($companydata)?$companydata[0]->postal_code:''}}"  name="postal_code">
										</div>

										<div class="form-group">
											<input type="text"  class="form-control" placeholder="Enter location counttry" required value="{{isset($companydata)?$companydata[0]->country:''}}" name="country">
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












 