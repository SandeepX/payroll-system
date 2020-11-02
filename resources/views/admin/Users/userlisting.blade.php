@extends('layout.admin')

@section('title','Users Listing')



@section('main-content')



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                
              <hr><label>Manage Users Page</label>
                <div class='row col-lg-6 ' >
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By User name.." title="Type in a name">
                </div>
              <hr>  
                
                <table id="myTable" class= "col-lg-12">
                <tr class="header">
                    <th style="width:15%;">Name</th>
                    <th style="width:25%;">Email</th>
                    <th style="width:10%;">Status</th>
                    <th style="width:10%;">Role</th>
                    <th style="width:25%">Avatar</th>
                    <th style="width:15%;">Action</th>
                    
                </tr>
               

                    @if(isset($user))
                      @foreach($user as $key => $value)  


                         <tr>

                            <td>{{ ucfirst( $value['name']) }}</td>
                            <td>
                               {{ $value['email'] }}
                            </td>
                    

                            <td>
                              <span class="badge badge-{{ ( $value['status'] =='active') ? 'success':'danger'}}">{{ ucfirst ( $value->status ) }}</span>
                          
                              
                            </td>

                            <td>
                              {{ucfirst( $value['role'] )}}
                            </td>

                            <td>
                              
                                <img src="{{asset('uploads/userAvatar/'.$value->avatar)}}" class="img img-thumbnail img-responsive" style="width: 150px; height:100px;" alt="">
                              </div>
                            
                            </td> 
                                
                            <td>

                            
                              

                              <a href="/User/{{$value['id']}}/edit"><button class="btn btn-primary  pull-left" style="margin-right:5px; " title="Edit Userdata"><i class="fa fa-edit"></i></button></a>

                                <form  method="post" action="{{route('User.destroy',$value->id)}}" onclick="return confirm('Are you sure you want to remove this user?')">
                                              @csrf
                                              @method('delete')
                                            <button type="submit" class=" btn btn-danger form pull-left" title="Delete Userdata"><i class="fa fa-trash"></i></button>

                                            </form></td>
                        </tr>
                    @endforeach
                  @endif

                        
                  
                </table>

                <hr>
                <div class="ibox-head" style="padding-top: 10px;">

                    <a href="{{route('User.create')}}" class="btn  btn-dark add_btn">
                        <i class="fa fa-plus"></i>Add User
                     </a>
                </div>

            </div>
      </div>


      {{$user->links()}}
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



  