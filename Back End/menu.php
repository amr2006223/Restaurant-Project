<html>
	<head>
		<link rel = "stylesheet" href = "../Front End/CSS Files/menu.css" > 
	</head>
	<body>		
		
	<?php
				if(isset($_SESSION['Name'])) 
				{
					echo "<div class = '2'>";
					echo "Welcome ".$_SESSION['Name'];
					echo "</div>";
					echo "<div class = 'm'>";
					echo "<br>";
					echo"<a class = 'menu' href='home.php'>Home</a>";
					echo"<a class = 'menu' href='test.php'>test</a>";
					echo"<a class = 'menu' href='slide.php'>Gallery</a>";
					echo"<a class = 'menu' href='Delete.php'>Delete Account</a>";
					echo"<a class = 'menu' href='SignOut.php'>SignOut</a>";
                    echo"<a class = 'menu' href='EditInfo.php'>Edit</a>";
					echo "</div>";
				}
				else
				{
					echo "<div class = 'w'>";
					echo "Welcome";
					echo "</div>";
					echo "<div class = 'm'>";
					echo"<a class = 'menu' href='home.php'>Home</a>";
					echo"<a class = 'menu' href='test.php'>test</a>";
					echo"<a class = 'menu' href='slide.php'>Gallery</a>";
					echo"<a class = 'menu' href='Login.php'>Login</a>";
					echo"<a class = 'menu' href='SignUp.php'>Signup Here</a>";
					echo "</div>";
				}
				?>
	
		<br><br>
	</body>
</html>