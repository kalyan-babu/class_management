<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>	
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<?php

require('connection.php');
session_start();
if(!$link)
{
	header('location:error.php');
}


else
{
$name=$_POST['school_name'];
$id=$_POST['class_id'];

$query1="select count(*) as count from (select m.student_id,m.marks from marks as m inner join student as s on s.student_id=m.student_id where s.school_name='$name' and s.class_id='$id') as t";
$result1=mysqli_query($link,$query1);

if(!$result1)
		header('location:school_error.php');
	
while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];

$query="select q.student_id,q.avg_marks from (select t.student_id,avg(t.marks) as avg_marks from (select m.student_id,m.marks from marks as m inner join student as s on s.student_id=m.student_id where s.school_name='$name' and s.class_id='$id') as t group by student_id) as q order by avg_marks desc limit 3";

$result=mysqli_query($link,$query);

if(!$result)
		header('location:topper_error.php');
}
?>


<div class="container-fluid">
	<div class="row">
	 <div class="col-sm-2">
	 </div>
		  <div class="col-sm-8">
			<br><br><br>
				<div align="center">
				<p>top 3 topper details </p>
				</div>
			<br>
		<?php  
		if($c>0)
		{
		  echo'<table class="table table-bordered">
		  <thead>
					<tr>
						<th>Student_Id</th>
						<th>Avg_Marks</th>
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
							<td>'.$row['avg_marks'].'</td>
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
		  
		  <br><br><br>
		  <div align="center">
		  <p>click here <a href="page5.php">check_topper_details</a></p>
		  </div>
			</div>
			<br><br><br><br>
			 <form class="form-horizontal" action="main_page.php" method="post" align="center">
						<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<br><br>
						<button type="submit" class="btn btn-default" >go to main_page</button>
						</div>
					</div>
	</form>
		</div>
	</div>

	</body>
</html>