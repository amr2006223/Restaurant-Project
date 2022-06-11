<?php

require_once('Back End/php/CreateDb.php');
session_start();
$_SESSION['o'] = 1;

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}

$sql = "update orders set status='1' where order_id = '$order_id' ";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:orders.php");

}

?>