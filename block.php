<?php
include "Back end/php/CreadDb.php";

$sql = "select * from cashier where id = $_POST['id']";
$result = mysqli_query($sql,$conn);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $row['status'] = 0;
    }
}
else{
        echo "error";
}  
?>