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

$query1="SELECT count(*) as count FROM student";
$result1=mysqli_query($link,$query1);
if(!$result1)
		header('location:school_error.php');
	
while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];


$query="SELECT student_id,class_id,school_name FROM student";

$result=mysqli_query($link,$query);


?>
<br><br><br>

<div class="container">
	<div class="row">
		  <div class="col-sm-6">
		  <br>
		  <div align="center">
			<p>student table details </p>
		  </div>
		  <br>
		<?php  
		if($c>0)
		{
		  echo'<table class="table table-bordered">
		  <thead>
					<tr>
						<th>Student_Id</th>
						<th>Class_Id</th>
						<th>School_Name</th>
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
						<form action="delete.php" method="post"> 
							<td>'.$row['student_id'].'</td>
							<td>'.$row['class_id'].'</td>
							<td>'.$row['school_name'].'</td>
						</form>  
					</tr>
				</tbody>';
		
	 }
	}
	else
	{
		
		echo'<br><br><br><br>
		<div align="center">
		<p>No entries are there plese enter the school Details</p>
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
			  <form class="form-horizontal" action="add_student.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email" id="label">Class_id:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="class_id" placeholder="class School_id" name="class_id">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd" id="label">School_name:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="school_name" placeholder="Enter School_Name" name="school_name">
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" >Add_student:</button>
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