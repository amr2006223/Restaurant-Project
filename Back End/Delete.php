<?php
include "database.php";
session_start();
$ID =  $_SESSION['ID'];
$sql="delete from user where ID = '$ID' ";
$result=mysqli_query($conn,$sql);

if($result)
{
	session_destroy();
	header("Location:home.php");
}
else
{
	echo $sql;
}
		
		
?>