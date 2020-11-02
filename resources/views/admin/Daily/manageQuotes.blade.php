@extends('layout.admin')

@section('title','Quotes list')



@section('main-content')



  <section class="content">
  <div class="container-fluid">
      <div class="row">
            <div class="col-lg-12">
                
              <hr><label>Manage Notice Page</label>
                <div class='row col-lg-4 ' >
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By title.." title="Type in a name">
                </div>
              <hr>  
                
                <table id="myTable" class= "col-lg-12">
                <tr class="header">
                    
                    <th style="width:20%;">Title</th>
                    
                    <th style="width:60%;">Description</th>
                    <th style="width:20%;">Action</th>
                    
                </tr>

                @if(isset($quote))
                  @foreach($quote as $key => $value)
                  <tr>
                    
                    <td>{{ucfirst($value->author)}}</td>

                    <td>{{$value->quote}}</td>

                    <td style="margin-right: 20px;">
                      <a href="{{route('quote.edit', $value->id)}}"><button class="btn btn-primary   pull-left" title="edit Quote"><i class="fa fa-edit" ></i></button></a>

                                <form  method="POST" action="{{route('quote.destroy',$value->id)}}" onclick="return confirm('Are you sure you want to delete this quote?')">
                                              @csrf
                                              @method('delete')
                                            <button type="submit" class=" btn btn-danger form pull-left" title="delete notice"><i class="fa fa-trash" ></i></button>


                                            </form>
                        </td>
                </tr>
                  @endforeach

                @endif
               
                    
                   
                </table>
                
                  
            </div>
      </div>

      {{$quote->links()}}

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



  