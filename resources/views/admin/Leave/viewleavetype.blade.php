@extends('layout.admin')

@section('title','Leave Type List')

@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('main-content')



  <section class="content">
	<div class="container-fluid">


	
		<div class="container border border-warning p-4 mt-5">
		<h3>Leave Type</h3>
		<hr class="bg-warning">

		<div>
			<div class="my-2 row">
				
				<div class="col-md-4 col-sm-12">
					<input type="text" name="" placeholder="Enter leave type..." id="myInput" class="form-control" onkeyup="searchFun()">
				</div>
			</div>


			<div>
				<table class="table table-bordered table-striped"  id="myTable">
					<thead class="bg-primary">
						<tr>
							<th>#</th>
							<th>Leave Type</th>
							<th>Action</th>	
						</tr>
					</thead>
					<tbody>

				@if(isset($data))
					@foreach($data as $key =>$value)
						<tr>
							<td>{{++$key}}</td>
							<td>{{$value->leavetype}}</td>
							<td>
								<div>
									<form action="{{route('leave.destroy',$value->id)}}"  onclick="return confirm('Are you sure you want to delete this leave type?')" method="POST" >

                                              @method('delete')
                                              @csrf
										<button type="submit" class="btn btn-danger"><i class="fas fa-times"> Delete</i></button>
								    </form>
								</div>
							</td>
							
						</tr>
					@endforeach
				@endif
						
							
						
					</tbody>
				</table>
			</div>
		{{$data->links()}}

		</div>
		
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



  




	
	


	





