@extends('layout.admin')

@section('title','Holiday')



@section('main-content')



  <section class="content">
  	<div class="container-fluid">
      	<div class="row">
              <div class="col-lg-12">
                  
                <hr><label>Manage Holiday Page</label>
                  <div class='row col-lg-4 ' >
                      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date.." title="Type in a name">
                  </div>
                <hr>  
                  
                  <table id="myTable" class= " table table-dark col-lg-12">
                    <tr class="header">
                        <th scope="col">Date</th>
                        <th scope="col">Holiday</th>
                        
                        <th scope="col">Action</th>
                        
                    </tr>
                  

                  @if(isset($holidaydata))
                      
                   
                      @foreach($holidaydata as $key =>$value)  

                        


                          <tr>
                          	<td>{{date('d M Y', strtotime($value->date))}}</td>
                              
                              
                      
                              <td style="margin-left: 20px;">{{ucfirst($value->description)}}</td>
                              
                              <td style="margin-left: 20px";>
                                

                                <a href="{{route('holiday.edit',$value->id)}}"><button class="btn btn-primary   pull-left" title="edit EmployeeData"><i class="fa fa-edit" ></i></button></a>

                                  <form  method="POST" action="{{route('holiday.destroy',$value->id)}}" onclick="return confirm('Are you sure you want to delete the this holiday?')">
                                                @csrf
                                                @method('delete')
                                              <button type="submit" class=" btn btn-danger form pull-left" title="delete Holiday"><i class="fa fa-trash" ></i></button>


                                              </form></td>
                          </tr>
                      @endforeach
                  @endif    

                      
                     
                  </table>
                  <hr>
                  {{ $holidaydata->links()}}
                  <hr>

                  <div class="ibox-head" style="padding-top: 10px;">

                      <a href="{{route('holiday.create')}}" class="btn  btn-primary add_btn">
                          <i class="fa fa-plus"></i>Add Holiday
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



  