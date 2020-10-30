@extends('layout.admin')



  @section('title', ' Edit Quote')





@section('main-content')



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
             
             
          
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


  <div class="container mt-5">
    <div class="border border-warning p-3">   
      <h3>Edit Quote</h3>
      <hr class="bg-warning">

      <form action="{{route('quote.update',$editdata->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row p-2">
          <div class="col-sm-12 col-md-1"></div>
          <div class="col-sm-12 col-md-6">
            <div>
              <label>Author<span class="text-danger">*</span></label>
              <input type="text" name="author"  value="{{$editdata->author }}" class="form-control">
            </div>
            <div class="mt-2">
              <label>Quote<span class="text-danger">*</span></label>
              <textarea class="form-control"  name="quote" style="height: 25vh;">{{$editdata->quote}}</textarea>
            </div>  
          </div>
          <div class="col-sm-12 col-md-5"></div>
        </div>
        <hr class="bg-warning">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success">update</button>
        </div>
      </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

                



                
                
            </div>
        </div>

    </div>

  
</section>









		      
		
@endsection  



  