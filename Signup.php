<h1>SignUp</h1>
<?php include "Back End/SignUp.php"?>
<link rel="stylesheet" href="Resources/CSS/style.css">
<form action="" method="post" enctype="multipart/form-data">
    First Name:<br>
    <input type="text" name="FirstName"><?php echo $FirstError; ?><br>
    Second Name:<br>
    <input type="text" name="SecondName"> <?php echo $SecondError; ?><br>
    Email:<br>
    <input type="text" name="Email"> <?php echo $emailError; ?><br>
    Address:<br>
    <input type="text" name="Address"> <?php echo $AddressError; ?><br>
    Password:<br>
    <input type="Password" name="Password"><?php echo $PasswordError; ?><br>
    Upload your National id: <input type="file" name='nationalID'> <?php echo $fileError ?>
    <br>
    <input  type="submit" value="Submit" name="Submit">
    <input   type="reset">
</form>
</html>