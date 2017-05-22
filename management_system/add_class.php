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

$query1="select count(*) as count from class where class_id='$id' and school_name='$name'";

$result1=mysqli_query($link,$query1);
if(!$result1)
		header('location:class_error.php');
	
while($row1=mysqli_fetch_array($result1))
	$c=$row1['count'];
if($c<1)
{

	$query="INSERT INTO class (class_id,school_name)VALUES('$id','$name')";

	$result=mysqli_query($link,$query);

		if(!$result)
			header('location:class_error.php');

		if($result)
		{
			header('location:page2.php');
		}	
		else
			echo'sorry unable to ADD the tupple';
}
else
	header('location:class_error1.php');
}
?>


