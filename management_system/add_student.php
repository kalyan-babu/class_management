<?php

require('connection.php');
session_start();
if(!$link)
{
	header('location:error.php');
}


else
{
$id=$_POST['class_id'];
$name=$_POST['school_name'];

$query="INSERT INTO student (class_id,school_name)VALUES('$id','$name')";

$result=mysqli_query($link,$query);

if(!$result)
		header('location:student_error.php');

if($result)
{
	header('location:page3.php');
}	

else
	echo'sorry unable to ADD the tupple';

}
?>


