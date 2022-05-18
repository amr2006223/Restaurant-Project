<html>

<head>
<link rel="stylesheet" href = "../Resources/CSS/style.css">
</head>
<style>

</style>
<?php
include "database.php";

$FirstError ="";
$SecondError ="";
$AddressError ="";
$emailError="";
$PasswordError ="";
$fileError ="";



if(isset($_POST['Submit']))
{ //check if form was submitted
	$check = true;
	
	if(empty($_POST['FirstName']))
	{
		$FirstError="First Name is required";
		$check = false;
	}
	if(empty($_POST['SecondName']))
	{
		$SecondError="Second Name is required";
		$check = false;
	}
	if(empty($_POST['Address']))
	{
		$AddressError="Address is required";
		$check = false;
	}
	if(empty($_POST['Email']))
	{
		$emailError="Email is required";
		$check = false;
	}
	if(empty($_POST['Password']))
	{
		$PasswordError="Password is required";
		$check = false;
	}
	if(empty($_FILES['nationalID']['name']))
	{
		$fileError = "you need to upload an image of your National ID";
		$check = false;
	}
	
	if($check == true)
	{
		$name = $_POST['Name'];
		$email = $_POST['Email'];
		$pass = $_POST['Password'];
		$address = $_POST['Address'];
		$image = $_FILES['nationalID']['name'];
		
		//check if email already exists
		$repeat = "select count(Email) from user where Email = '$email';";
		$result2 = mysqli_query($conn,$repeat);
		$row = mysqli_fetch_array($result2);
		
		//insert data into the database
		$sql = "insert into user (fname, Email, Password, Address, image) 
		VALUES ('$name', '$email', '$pass', '$address','$image');";
		
		if($row[0] > 0) {
			echo "email already exist";
		}
		else
		{
			$result= mysqli_query($conn,$sql);
			if($result)	
			{
				//header("Location:Login.php");
				echo "done";
			}
			else
			{
				echo $sql;
			}
		}
	}
}
?>

<?php //include "menu.php";?>