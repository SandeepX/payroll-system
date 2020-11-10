
<!DOCTYPE html>
<html>
<head>
	<title>Download</title>
</head>
<body>
	<section class="content">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
           

            	<h1 style="position: center;">Cybil Tech Pvt Technology </h1>
				<hr> 
				<label>Employee Name:</label><strong>{{ucfirst($employee)}}</strong>
				<br>
				<label>payment:</label><strong>{{ucfirst($payment)}}</strong>
				<br>
				<label>status:</label><strong>{{ucfirst($status)}}</strong>
				<div>
				<table class="table table-bordered table-striped col-lg-12"  >
					<thead class="bg-primary ">
						<tr>
							
							<th>Basic salary</th>
							<th>Basic Allowance</th>
							<th>other Allowance</th>
							<th>Basic Deduction</th>
							<th>other Deduction</th>
							<th>Total paid Amount</th>
								
						</tr>
					</thead>
					<tbody>

					

						<tr>
							<td>{{number_format($BasicSalary)}}</td>
							<td>{{number_format($BasicAllowance)}}</td>
							<td>{{number_format($otherAllowance)}}</td>
							<td>{{number_format($BasicDeduct)}}</td>
							<td>{{number_format($BasicDeduct)}}</td>
							<td>{{number_format($total)}}</td>

						</tr>
						

						
					</tbody>
				</table>

			</div>
			<hr>
				<br>
				
				
            </div>
        
        </div>

    </div>

</section>

</body>
</html>