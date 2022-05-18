<?php
//ssession_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

//create connection
$conn = new mysqli($servername,$username,$password,$dbname);
if(isset($_POST['Submit'])) //check if form was submitted
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM cashier WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result))
    {
        $_SESSION["id"] = $row[3]; //??

        header("Location: home.php");
    }
    else
    {
        echo "Invalid Username or Password";
    }
}
?>

<?php include "menu.php";?>

<h1> Login </h1>
<form action = ""  method = "Post">
    Username: <br>
    <input type = "text"  name = "username"> <br>
    Password: <br>
    <input type = "Password" name = "password"> <br>
    <input type = "submit" value = "Submit" name = "submit"> <br>
    <input type = "reset" >
    
</form>
