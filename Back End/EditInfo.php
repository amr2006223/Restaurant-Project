<?php 
include "menu.php";
include "database.php";
session_start();
$N = $_SESSION['Name'];
$A = $_SESSION['Address'];

echo "<form action='' mathod='get'>";
echo "Name: <input type= 'text'  name= 'name'  value='$N'><br>";
echo "Address: <input type= 'text'  name= 'address' value='$A'><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
echo"</form>";

//check if form is submitted and update the values
if(isset($_GET['submit'])){

$Name = $_GET['name'];
$address = $_GET['address'];
$ID = $_SESSION['ID'];
$sql="update user set fname = '$Name', Address = '$address' WHERE ID = '$ID'";
$result=mysqli_query($conn,$sql);//check if query is executed sucessfully


if($result){
	echo " <br> query has updated successfully";
}
else{
	echo "<br> error unfortunatly query hasnt updated";
}
}

?>
