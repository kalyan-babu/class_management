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

$query1="SELECT count(*) as count FROM marks";
$result1=mysqli_query($link,$query1);
if(!$result1)
		header('location:marks_error.php');
	
while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];

$query="SELECT s.student_id,c.school_name,c.class_id,s.subject_id,s.marks FROM marks as s inner join student as c on s.student_id=c.student_id";

$result=mysqli_query($link,$query);
if(!$result)
	echo'database error';


?>
<br><br><br>

<div class="container-fluid">
	<div class="row">
		  <div class="col-sm-8">
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
						<th>School_Name</th>
						<th>Class_Id</th>
						<th>Subject_Id</th>
						<th>Marks</th>
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
							<td>'.$row['student_id'].'</td>
							<td>'.$row['school_name'].'</td>
							<td>'.$row['class_id'].'</td>
							<td>'.$row['subject_id'].'</td>
							<td>'.$row['marks'].'</td>
			
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
		  
		    <div class="col-sm-4">
			<br>
			<div align="center">
			<p>school entry form</p>
			</div>
			<br>
			  <form class="form-horizontal" action="add_marks.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email" id="label">Student_id:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="student_id" placeholder="Enter student_id" name="student_id">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd" id="label">subject_id:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="subject_id" placeholder="Enter subject_id" name="subject_id">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd" id="label">marks:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="marks" placeholder="Enter marks" name="marks">
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="submit" id="submit1" value="insert_marks">insert_marks</button>
						<button type="submit" class="btn btn-default" name="submit" id="submit2" value="update_marks">update_marks</button>
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