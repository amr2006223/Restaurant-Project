<?php
ssession_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cashier";

//create connection
$conn = new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['save'])) //??????
{
    $sql = mysql_query("SELECT * FROM items WHERE title LIKE '%term%'") or die
        (mysql_error());


        //????????
}


?>

<?php include "menu.php";?>

<form action = ""  method = "Post">
  
    <input type = "text" value = "search" name = "search"> 
    <input type = "submit" value = "search" name = "search">
    
    
</form>