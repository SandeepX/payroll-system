@extends('layout.admin')

@section('title','Employee List ')



@section('main-content')

@section('styles')
  <!--  <style >
      th, td{ border-left:1px solid #ccc; border-right: 1px solid #ccc;}
   </style> -->
@endsection



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                
               <hr><label>Manage Employee Page</label>
                <div class='row col-lg-4 ' >
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Name.." title="Type in a name">
                </div>
           
               <hr> 
                <table id="myTable" class= "col-lg-12">
                <tr class="header">
                    <th style="width:15%; margin-right: 15px;">Name</th>
                    <th style="width:20%;">Email</th>
                    <th style="width:15%;">Department</th>
                    <th style="width:25%;">Designation</th>
                    
                    <th style="width:25%;">Action</th>
                </tr>
                @if(isset($EmployeeDetail))


                    @foreach($EmployeeDetail as $EmployeeData)
                      


                         <tr>

                            <td style="">{{$EmployeeData->name}}</td>
                            <td style="padding: 10px;">{{$EmployeeData->email}}</td>
                            <td style="padding: 10px;">{{$EmployeeData->getDepartment->department}}</td>
                            <td style="padding: 10px;">{{$EmployeeData->designation}}</td>
                                                       
                            
                            <td>
                              <a href="{{route('Employee.show',$EmployeeData->id)}}"><button class="btn btn-success  pull-left" title="view EmployeeData"><i class="fa fa-eye" ></i></button></a>

                              <a href="/Employee/{{$EmployeeData->id}}/edit"><button class="btn btn-primary   pull-left" title="edit EmployeeData"><i class="fa fa-edit" ></i></button></a>

                                <form  method="POST" action="{{route('Employee.destroy', $EmployeeData->id)}}" onclick="return confirm('Are you sure you want to delete the this of this Employee?')">
                                              @csrf
                                              @method('delete')
                                            <button type="submit" class=" btn btn-danger form pull-left" title="delete EmployeeData"><i class="fa fa-trash" ></i></button>


                                            </form></td>
                        </tr>

                        
                    @endforeach
                
                @endif
                   
                </table>
                {{ $EmployeeDetail->links() }}
                <hr>
                <div class="ibox-head" style="padding-top: 10px;">

                    <a href="{{route('Employee.create')}}" class="btn  btn-dark add_btn">
                        <i class="fa fa-plus"></i>Add Employee 
                     </a>
                </div>    
            </div>
        </div>

    </div>

  
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



  