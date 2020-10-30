@extends('layout.admin')



@section('title','Edit holiday')





@section('main-content')



  <section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                
              <hr><label>Edit Holiday </label>
                
              <hr>  
             
                <form action="{{route('holiday.update',$editdata->id)}}" method="post" enctype="multipart/form-data" >
          
              
                @method('PUT')

              
                

                @csrf

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="margin-bottom: 5px;">  Date<span class="required">*</span></label>

                      <div class="col-md-4 col-sm-3 col-xs-12">
                        <div class="input-group date" id="myDatepicker22">
                        
                          <input type="date" class="form-control" required="true" name="date"   value="{{isset($editdata)? $editdata['date']:''}}">

                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">Description<span class="required">*</span></label>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <textarea class="form-control" required="true" name="description" rows="4">{{isset($editdata)? $editdata['description']:''}}</textarea>
                    </div>
              </div>

              <div class="ln_solid"></div>
              
              <div class="form-group">
              
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                    <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>
          </form>



                
                
            </div>
        </div>

    </div>

  
</section>









		      
		
@endsection  



  