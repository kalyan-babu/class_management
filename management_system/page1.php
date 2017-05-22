<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>	
<script src="bootstrap/js/bootstrap.min.js"></script>

<style>
#label
{
	font-weight:bold;
}

</style>

</head>

<body>

<?php

require('connection.php');
if(!$link)
{
	header('location:error.php');
}

$query1="SELECT count(*) as count FROM school";
$result1=mysqli_query($link,$query1);
if(!$result1)
		header('location:school_error.php');
	
while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];


$query="SELECT school_name,address FROM school";

$result=mysqli_query($link,$query);


?>
<br><br><br>

<div class="container">
	<div class="row">
		  <div class="col-sm-6">
		  <br>
		  <div align="center">
			<p>school table details </p>
		  </div>
		  <br>
		<?php  
		if($c>0)
		{
		  echo'<table class="table table-bordered">
		  <thead>
					<tr>
						<th>School_Name</th>
						<th>Address</th>
					</tr>
				</thead>';
		}
		  ?>
	<?php
	if($c>0)
	{
	  while($row=mysqli_fetch_array($result))
	 {
		echo'
			
				
				<tbody>
					<tr>
				
							<td>'.$row['school_name'].'</td>
							<td>'.$row['address'].'</td>
					
					</tr>
				</tbody>';
		
	 }
	}
	else
	{
		
		echo'<br><br><br><br>
		<div align="center">
		<p>No entries are there please enter the school Details</p>
		</div>';
		
	}
     ?>
		  </table>
		  
		  </div>
		  
		    <div class="col-sm-6">
			<br>
			<div align="center">
			<p>school entry form</p>
			</div>
			<br>
			  <form class="form-horizontal" action="add_school.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email" id="label">School_name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="school_name" placeholder="Enter School_name" name="school_name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd" id="label">Address:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="address" placeholder="School_Address" name="address" required>
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" >Add_School:</button>
						</div>
					</div>
			</form>
		  </div>
    </div>
	<br><br><br><br>
	 <form class="form-horizontal" action="main_page.php" method="post">
	 <div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" >go to main_page</button>
						</div>
					</div>
	</form>
	
</div>

</body>

</html>