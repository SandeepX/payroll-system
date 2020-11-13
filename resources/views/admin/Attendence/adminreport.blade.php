@extends('layout.admin')



  @section('title','Attendence Report')


@section('main-content')

<section class="content">

	<div>
				<table class="table table-bordered table-striped col-lg-12" id="myTable" >
					
					<tbody>

						
					 @php ($s_no = 1)
					 <tr>
					     <th > S. No</th>
					     <th > Name</th>
					     @foreach ($empatts as $key => $empat)
					      <th >{{ $key}} </th>
					     @endforeach
					   	
					 </tr>

					
					 <tr>
					 	
					 @foreach ($empat as $value)
					     <td> {{ $s_no  }}</td>

					     <td> {{ $value->Employeename}} </td>

					    
						@foreach ($empatts as $key => $empat)
						    @foreach ($empat as $value)

							     <td>
							    
							       <span class="badge badge-{{($value->status=='present')?'success':'danger'}}">{{($value->status )}} 
							       </span>

							     </td>
						    @endforeach

					   
						@endforeach
					 @endforeach
					    @php ($s_no++)
					    
					 </tr>
					

					 

						
					</tbody>
				</table>
			</div>

</section>



@endsection 