<html>
<head>
<link rel="stylesheet" href="../Front End/CSS Files/home.css">
</head>
<?php
session_start();

include 'database.php';
if(isset($_POST['Submit'])){ //check if form was submitted
	$email = $_POST["Email"];
	$password =  $_POST["Password"];
	$sql= "
    SELECT * 
    FROM  user 
    WHERE Email = '$email' 
    AND   Password = '$password'";
	$result = mysqli_query($conn,$sql);

	if($row = mysqli_fetch_array($result))
	{
		$_SESSION["ID"]=$row[0];
		$_SESSION["Name"]=$row[1];
		$_SESSION["Email"]=$row[2];
		$_SESSION["Password"]=$row[3];
		$_SESSION["Address"]=$row[4];
		header("Location:home.php");
	}
	else	
	{
		echo "Invalid Email or Password";
	}
	
}

?>
<?php include "menu.php";?>

<div class = "container">
<div class = "inside container">
		<h1>Login</h1>
		<div class = "form">
			<form action="" method = "post">
				Email:<br>
				<input type="text" name="Email">  <br>
				Password:<br>
				<input type="Password" name="Password"><br>
			</div>
			<div class = "buttons">
				
				<input type="submit" value="Submit" name="Submit">
				<input type="reset">
			</div>
		</form>
	</div>
</div>	
</html>