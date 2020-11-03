

@extends('layout.admin')

@section('title','Employee lEave List')

@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('main-content')



  <section class="content">
	<div class="container-fluid">


	
		<div class="container border border-warning p-4 mt-5">
		<h3>Employee Leave</h3>
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
							<th >Action</th>	
						</tr>
					</thead>
					<tbody>

					@if(isset($data))
						@foreach($data as $key => $value)

						<tr>
							<td>{{++$key}}</td>
							<td>{{ucfirst($value->employee->name)}}</td>
							<td>{{ucfirst($value->LeaveType)}}</td>
							<td>{{($value->from)}} To {{$value->to}}</td>
							<td>
								 <span class="badge badge-{{ ( $value['status'] =='approved') ? 'success':'danger'}}">{{ ucfirst ( $value->status ) }}</span>
								 
							</td>
							<td>{{ucfirst($value->comment)}}</td>
							<td >
								<a href="{{route('Employeeleave.edit',$value->id)}}"><button class="btn btn-primary  pull-left" style="margin-right:5px; " title="Edit data"><i class="fa fa-edit"></i></button></a>

                                <form  method="post" action="{{route('Employeeleave.destroy',$value->id)}}" onclick="return confirm('Are you sure you want to Delete this data?')">
                                              @csrf
                                              @method('delete')
                                            <button type="submit" class=" btn btn-danger form pull-left" title="Delete Employee leave data"><i class="fa fa-trash"></i></button>

                                            </form>
							</td>
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



  




	
	


	







































