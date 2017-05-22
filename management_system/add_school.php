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
$address=$_POST['address'];

$query="INSERT INTO school (school_name,address)VALUES('$name','$address')";

$result=mysqli_query($link,$query);

if(!$result)
		header('location:school_error.php');

if($result)
{
	header('location:page1.php');
}	

else
	echo'sorry unable to ADD the tupple';

}
?>


