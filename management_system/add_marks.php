<?php

require('connection.php');
session_start();
if(!$link)
{
	header('location:error.php');
}

else
{

$id=$_POST['student_id'];
$s_id=$_POST['subject_id'];
$marks=$_POST['marks'];
$mit=$_POST['submit'];
echo $mit;

if($_POST['submit']=='insert_marks')
{
	echo'hai';
$query1="SELECT count(*) as count FROM marks where student_id='$id' and subject_id='$s_id'";

$result1=mysqli_query($link,$query1);
	while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];

		if($c<1)
		{
			$query="INSERT INTO marks (student_id,subject_id,marks)VALUES('$id','$s_id','$marks')";

			$result=mysqli_query($link,$query);
	
				if(!$result)
					header('location:marks_error.php');

				if($result)
				{
				header('location:page4.php');
				}	

				else
					echo'sorry unable to ADD the tupple';
		}
	

		else
			header('location:insert_error.php');
	
}

else if($_POST['submit']=='update_marks')
{
	echo'hai bro';
$query1="SELECT count(*) as count FROM marks where student_id='$id' and subject_id='$s_id'";

$result1=mysqli_query($link,$query1);
	while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];

		if($c>0)
		{
			$query="UPDATE marks set marks='$marks' where student_id='$id' and subject_id='$s_id'";

			$result=mysqli_query($link,$query);
	
				if(!$result)
					header('location:marks_error.php');

				if($result)
				{
				header('location:page4.php');
				}	

				else
					echo'sorry unable to ADD the tupple';
		}
	

		else
			header('location:insert_error1.php');
	
	
}

}
?>


