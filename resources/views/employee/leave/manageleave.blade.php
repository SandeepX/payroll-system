

@extends('layouts.employee')

@section('title','Employee leave List')

@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('Employee-content')



  <section class="content">
	<div class="container-fluid">


	
		<div class="container border border-warning p-4 mt-5">
		<h3>Manage Leave</h3>
		<hr class="bg-warning">

		<div>
			<div class="my-2 row">
				
				<div class="col-md-4 col-sm-12">
					<input type="text" name="" placeholder="Enter leave type..." id="myInput" class="form-control" onkeyup="searchFun()">
				</div>
			</div>

		

			<div>
				<table class="table table-bordered table-striped col-lg-12" id="myTable" >
					<thead class="bg-primary ">
						<tr>
							<th >#</th>
							<th >Employee Name</th>
							<th >Leave Type</th>
							<th >Duration</th>
							<th >Leave Status</th>
							<th >Comment</th>
								
						</tr>
					</thead>
					<tbody>

					@if(isset($data))
						@foreach($data as $key => $value)

						<tr>
							<td>{{++$key}}</td>
							<td>{{ucfirst($value->employee->name)}}</td>
							<td>{{ucfirst($value->LeaveType)}}</td>
							<td><span class="badge badge-dark">{{($value->from)}}</span> To
							<span class="badge badge-dark">{{($value->to)}}</span></td>
							
							<td>
								 <span class="badge badge-{{ ( $value['status'] =='approved') ? 'success':'danger'}}">{{ ucfirst ( $value->status ) }}</span>
								 
							</td>
							<td>{{ucfirst($value->comment)}}</td>
							
						</tr>
						@endforeach
					@endif

						
					</tbody>
				</table>
			</div>

			

		</div>
		{{$data->links()}}
		
	</div>

    	


    </div>


  
</section>



@section('script')

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	



@endsection




<script>

	 const searchFun = () =>{
	  
	  let filter = document.getElementById('myInput').value.toUpperCase();

	  let myTable = document.getElementById('myTable');

	  let tr = myTable.getElementsByTagName('tr');

	  for(var i=0;i<tr.length; i++){
	    let td = tr[i].getElementsByTagName('td')[1];

	    if (td) {

	      let textvalue = td.textContent || td.innerHTML;

	      if (textvalue.toUpperCase().indexOf(filter)  > -1) {

	        tr[i].style.display = "";
	      }
	      else{
	        tr[i].style.display = "none";
	      }
	    }
	  }
	 }

	</script>
		      
		
@endsection  



  




	
	


	







































