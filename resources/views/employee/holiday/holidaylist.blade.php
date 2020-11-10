@extends('layouts.employee')



  @section('title','Manage holiday')





@section('Employee-content')



  <section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
              <hr><label>Manage Holiday Page</label>
                <div class='row col-lg-4 ' >
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date.." title="Type in a name">
                </div>
              <hr>  
                
                <table class="table table-dark" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                    
                    <tbody>
                    @if(isset($holidaydata))
                        
                     
                        @foreach($holidaydata as $key =>$value) 
                            <tr>

                                <td>{{date('d/m/Y', strtotime($value->date))}}</td>
                                <td>{{ucfirst($value->description)}}</td>
                                
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <hr>
                {{ $holidaydata->links()}}
                <hr>

                    
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



  