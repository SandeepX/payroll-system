




@extends('layout.admin')

@section('title','Activity Log')



@section('main-content')


	



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                
              
                
             

	            <div class="container border border-warning p-4 mt-5">
	            	
					<h4>Last 30 Days Activity Log</h4>
					<hr class="bg-warning"> 

					<div class='row col-lg-4'  >
                    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date.." title="Type in a name">
                	</div><hr> 
	                
	                <div>
						<table id="myTable" class="table table-bordered table-striped">
							<thead class="bg-primary">
								<tr>
									<th>Date</th>
									<th>Activity</th>
									<th>IP</th>
									<th>Action</th>	
								</tr>
							</thead>

							<tbody>

								@if($logs->count())
									@foreach($logs as $key => $log)
										<tr>

											<td>{{ date('d/m/y', strtotime($log->created_at))}}</td>
											<td>{{ $log->subject }},By {{ $log->user_id }} On {{ date('d M Y h:i:s', strtotime($log->created_at))}} </td>
											
											
											<td class="text-warning">{{ $log->ip }}</td>
											
											
											<td>
												<form  method ="POST" action="{{route('logActivity.destroy',$log->id)}}"  onclick="return confirm('Are you sure you want to delete this log?')">
												@method('delete')
												@csrf
													<button type="submit" class="btn btn-danger"><i class="fas fa-times"> Delete</i></button>
												</form>
											</td>
										</tr>
									@endforeach
								@endif
							</tbody>

						</table>
					</div>
					{{$logs->links()}}
					<hr>

					
				</div>
           
            </div>
        </div>


    </div>
    <hr>

  
</section>


<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
</script>





		      
		
@endsection  



  







































