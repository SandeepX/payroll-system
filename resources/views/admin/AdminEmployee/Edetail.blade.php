@extends('layout.admin')

@section('title','Employee Detail ')



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
            <hr><label>Employee Detail</label>
                
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style type="text/css">
    .tab button{
      background-color: gray;
      width: 100%;
    }
    .tab button:hover{
      background-color: #3a4191;
    }
    .tab button.active{
      background-color: #091be3;
    }
    .tab button{
      color: white;
    }

  </style>

<body>

      @if(isset($EmployeedetailById))

          <div class="container my-3">
            <div class="row">

              <div class="col-sm-6 col-md-4 col-lg-3 p-3 mr-3 border border-warning">

                <h4>{{$EmployeedetailById['name']}}</h4>

                <div class="d-flex justify-content-center border border-warning p-1 mt-3">
                  <img src="{{asset('uploads/employeephoto')}}/{{$EmployeedetailById['photo'] }}" alt="Employee Photo" style="width: 100%; height: 25vh;">
                </div>

                <div class="mt-3">
                  <i class="fas fa-phone-alt">  Ph:{{$EmployeedetailById['phone'] }} </i>
                  <i class="fas fa-envelope"> Email:{{$EmployeedetailById['email'] }}</i>
                </div>
                <hr style="border: 2px solid; border-color: #ffc107;">

                <div class="tab">
                  <button class="tablinks btn" onclick="openCity(event, 'Personal')" id="defaultOpen">Personal Details</button>
                  <button class="tablinks mt-1 btn" onclick="openCity(event, 'Company')">Company Details</button>
                  <button class="tablinks mt-1 btn" onclick="openCity(event, 'Financial')">Financial Details</button>
                  <button class="tablinks mt-1 btn" onclick="openCity(event, 'Bank_Account')">Bank Account Details</button>
                  <button class="tablinks mt-1 btn" onclick="openCity(event, 'Documents')">Documents</button>
                </div>

              </div>

              <div class="col-sm-12 col-md-7 col-lg-8 border border-warning p-3" >

        <!-- -----------------------Personal Details----------------------------- -->
                <div id="Personal" class="tabcontent">
                  <h5>Personal Details</h5>
                  <hr class="bg-warning">
                    <table class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                            <td>Name</td>
                            <td>{{ucfirst($EmployeedetailById['name'] )}}</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>{{$EmployeedetailById['email'] }}</td>
                          </tr>
                          <tr>
                            <td>Father Name</td>
                            <td>{{ucfirst($EmployeedetailById['father_name']) }}</td>
                          </tr>
                          <tr>
                            <td>Date of Birth</td>
                            <td>{{ date('d M Y', strtotime($EmployeedetailById['dob']))}}</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <td>{{ucfirst($EmployeedetailById['gender']) }}</td>
                          </tr>
                          <tr>
                            <td>Phone </td>
                            <td>{{$EmployeedetailById['phone'] }}</td>
                          </tr>
                          
                          <tr>
                            <td>Local Address</td>
                            <td>{{isset($EmployeedetailById['localaddress'])?ucfirst($EmployeedetailById['localaddress']):'' }}</td>
                          </tr>
                          <tr>
                            <td>Permanent Address</td>
                            <td>{{isset($EmployeedetailById['permanentadress'])?ucfirst($EmployeedetailById['permanentadress']):'' }}</td>
                          </tr>
                          <tr>
                            <td>Nationality</td>
                            <td>{{ucfirst($EmployeedetailById['Nationality']) }}</td>
                          </tr>
                          <tr>
                            <td>Referance </td>
                            <td>{{ucfirst($EmployeedetailById['reference']) }}</td>
                          </tr>
                          <tr>
                            <td>Reference  Phone</td>
                            <td>{{$EmployeedetailById['referencePhone'] }}</td>
                          </tr>
                         
                          <tr>
                            <td>Marital Status</td>
                            <td>{{ucfirst($EmployeedetailById['Materialstatus']) }}</td>
                          </tr>
                          <tr>
                            <td colspan="2"><i>Created by Administrator At, {{$EmployeedetailById['created_at']}} PM</i></td>
                          </tr>
                      </tbody>                    
                    </table>
                </div>

        <!-- --------------------------Company Details------------------------------ -->
                <div id="Company" class="tabcontent">
                  <h5>Company Details</h5>
                  <hr class="bg-warning">
                    <table class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                            <td>Employee ID</td>
                            <td>{{$EmployeedetailById['id'] }}</td>
                          </tr>
                          <tr>
                            <td>Department</td>
                            <td>{{$EmployeedetailById->getDepartment->department}}</td>

                          </tr>
                          <tr>
                            <td>Designation</td>
                            <td>{{$EmployeedetailById['designation'] }}</td>
                          </tr>
                          <tr>
                            <td>Date of Joining</td>

                            <td>{{ date('d M Y', strtotime($EmployeedetailById['dateofjoining']))}}</td>
                          </tr>
                          <tr>
                            <td>Date of Leaving</td>
                            <td>{{ isset($EmployeedetailById['dateofleaving'])?
                            date('d M Y', strtotime($EmployeedetailById['dateofleaving'])):''}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>{{ucfirst($EmployeedetailById['status']) }}</td>
                            
                          </tr>
                          <tr>
                           <td colspan="2"><i>Created by Administrator At, {{$EmployeedetailById['created_at']}} PM</i></td>
                          </tr>
                      </tbody>                    
                    </table>
                </div>


        <!-- --------------------------Financial Details------------------------------ -->
                <div id="Financial" class="tabcontent">
                  <h5>Financial Details</h5>
                  <hr class="bg-warning">
                    <table class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                            <td>Basic Salary</td>
                            <td>Rs. {{number_format($EmployeedetailById['basicsalary']) }}</td>
                          </tr>
                          <tr>
                            <td>Allowence</td>
                            <td>Rs. {{number_format($EmployeedetailById['allowence']) }}</td>
                            
                          </tr>
                          
                            <td>Deduction</td>
                            <td>Rs. {{number_format($EmployeedetailById['deduction']) }}</td>
                            
                          </tr>
                          
                          <tr>
                            <td>Total Salary</td>

                            <td>Rs. {{number_format(($EmployeedetailById['basicsalary'])+($EmployeedetailById['allowence'])-($EmployeedetailById['deduction'])) }}</td>
                            
                          </tr>
                          <tr>
                            <td colspan="2"><i>Created by Administrator At, {{$EmployeedetailById['created_at']}} PM</i></td>
                          </tr>
                          </tr>
                      </tbody>                    
                    </table>
                </div>

        <!-- --------------------------Bank Account Details------------------------------ -->
                <div id="Bank_Account" class="tabcontent">
                  <h5>Bank Account Details</h5>
                  <hr class="bg-warning">
                    <table class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                            <td>Account Holder Name</td>
                            <td>{{ucfirst($EmployeedetailById['Accountholdername'] )}}</td>
                          </tr>
                          <tr>
                            <td>Account Number</td>
                            <td>{{($EmployeedetailById['Accountnumber'] )}}</td>
                            
                          </tr>
                          <tr>
                            <td>Bank Name</td>
                            <td>{{ucfirst($EmployeedetailById['bankname'] )}}</td>
                           
                          </tr>
                          <tr>
                            <td>Branch</td>
                            <td>{{ucfirst($EmployeedetailById['branch'] )}}</td>
                            
                          </tr>
                          <tr>
                            <td>Bank Code</td>
                            <td>{{($EmployeedetailById['bankcode'] )}}</td>
                            
                          </tr>
                          <tr>
                            <tr>
                            <td colspan="2"><i>Created by Administrator At, {{$EmployeedetailById['created_at']}} PM</i></td>
                          </tr>
                          </tr>
                      </tbody>
                   </table>
                </div>

        <!-- --------------------------Document Details------------------------------ -->
                <div id="Documents" class="tabcontent">
                  <h5>Documents</h5>
                  <hr class="bg-warning">
                    <table class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                            <td>Resume File</td>
                            <td><a href="{{asset('uploads/Resumefile')}}/{{$EmployeedetailById['resumefile'] }}" target="_blank">{{($EmployeedetailById['resumefile'])}}</td>
                            
                           
                            
                          </tr>
                          <tr>
                            <td>Offer Letter</td>
                            <td><a href="{{asset('uploads/Offerletter')}}/{{$EmployeedetailById['offerletter'] }}" target="_blank">{{($EmployeedetailById['offerletter'])}}</td>
                            
                            
                            
                          </tr>
                          <tr>
                            <td>Joining Letter</td>
                            <td><a href="{{asset('uploads/joiningletter')}}/{{$EmployeedetailById['joiningletter'] }}" target="_blank">{{($EmployeedetailById['joiningletter'])}}</td>
                            
                            
                            
                          </tr>
                          <tr>
                            <td>Contract Paper</td>
                            <td><a href="{{asset('uploads/Contarctletter')}}/{{$EmployeedetailById['contractletter'] }}" target="_blank">{{($EmployeedetailById['contractletter'])}}</td>
                            
                            
                            
                          </tr>
                          
                          <tr>
                            <td>Google Drive Url</td>
                            <td><a href="{{$EmployeedetailById['googledriveurl']}}">{{isset($EmployeedetailById['googledriveurl'] )?
                            $EmployeedetailById['googledriveurl']:''}}</td>
                            
                          </tr>
                          <tr>
                            <td colspan="2"><i>Created by Administrator At, {{$EmployeedetailById['created_at']}} PM</i></td>
                          </tr>
                      </tbody>
                   </table>
                </div>    
              </div>        
            </div>    
          </div>
      @endif
          



           
               <hr> 
          </div>


      </div>
    </div>

  
</section>

@section('scripts')
  <script>
  function openCity(evt, doc_Name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(doc_Name).style.display = "block";
    evt.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen").click();
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@endsection


<script>
    
</script>






		      
		
@endsection  



  