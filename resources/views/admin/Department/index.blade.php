@extends('layout.admin')

@section('title','Department')



@section('main-content')



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                
              <hr><label>Manage Department Page</label>
                <div class='row col-lg-4 ' >
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Department.." title="Type in a name">
                </div>
              <hr>  
                
                <table id="myTable" class= "col-lg-12">
                <tr class="header">
                    <th style="width:25%;">Department</th>
                    <th style="width:25%;">Deginastion</th>
                    <th style="width:25%;">Total Employee</th>
                    <th style="width:25%;">Action</th>
                    
                </tr>
                @if(isset($departmentdata))


                    
                  @foreach($departmentdata as $key =>$departmentdetail ) 
                      

                      


                         <tr>

                            <td>{{$departmentdetail->department}}</td>
                            <td>
                                <?
                                @foreach(json_decode($departmentdetail->designation) as $data)?>
                                <li>{{ $data }}</li>
                                <?
                                @endforeach
                                ?>
                            </td>
                    

                            <td>
                          
                              {{isset($employeecount)?$employeecount[$key]:''}}
                            </td>

                            <td><a href="{{route('departmentedit',$departmentdetail->id)}}"><button class="btn btn-primary  pull-left"><i class="fa fa-edit"></i></button></a>

                                <form  method="post" action="{{route('departmentdelete',$departmentdetail->id)}}" onclick="return confirm('Are you sure?')">
                                              @csrf
                                              @method('delete')
                                            <button type="submit" class=" btn btn-danger form pull-left"><i class="fa fa-trash"></i></button>

                                            </form></td>
                        </tr>

                        
                    @endforeach

                    
                  
                
                @endif
                   
                </table>

                <hr>

                
                <div class="ibox-head" style="padding-top: 10px;">

                    <a href="{{route('showform')}}" class="btn  btn-dark add_btn">
                        <i class="fa fa-plus"></i>Add Department
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



  