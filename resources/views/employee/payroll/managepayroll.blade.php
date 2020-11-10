

@extends('layouts.employee')

@section('title','Payroll list')

@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('Employee-content')



  <section class="content">
  <div class="container-fluid">


  
    <div class="container border border-warning p-4 mt-5">
    <h3>Payslip list</h3>
    <hr class="bg-warning">

    <div>

       
      <div class="my-2 row">
        
        <div class="col-md-4 col-sm-12">
          <input type="text" name="" placeholder="Enter name..." id="myInput" class="form-control" onkeyup="searchFun()">
        </div>
      </div>

    

      <div>
        <table class="table table-bordered table-striped col-lg-12" id="myTable" >
          <thead class="bg-primary ">
            <tr>
              <th>id</th>
              <th>Employee Name</th>
              <th >Amount</th>
              <th>Year</th>
              <th>Month</th>
              <th >status</th>

              
              
              <th >Action</th>
                
            </tr>
          </thead>
          <tbody>

          @if(isset($data))
            @foreach($data as $key => $value)

            <tr>
              <td>{{++$key}}</td>
              <td>{{ucfirst($value->employee)}}</td>
              <td>{{number_format($value->total)}}</td>
              <td>{{ date('Y', strtotime($value->date))}}</td>
              <td>{{ date('M', strtotime($value->date))}}</td>
              
              
              <td>
                 <span class="badge badge-{{ ( $value['status'] =='paid') ? 'success':'danger'}}">{{ ucfirst ( $value->status ) }}</span>
                 
              </td>
              
              
              
              <td >
                
                
                <a href="{{route('downloadPdf',$value->id)}}"><button class="btn btn-success  pull-left" title="download detail "><i class="fas fa-file-download"> </i> </button></a>

                                
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



  




  
  


  







































