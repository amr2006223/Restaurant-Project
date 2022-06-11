<!doctype html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Orders</title>

    <!-- NORMALIZE AND GRID style sheets and templates -->
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/Grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">

    <!-- Style Sheets and font awesome links -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- custom stylesheets -->
    <link rel="stylesheet" href="Resources/CSS/nave.css">
    <link rel="stylesheet" href="Resources/CSS/cardStyle.css">
    <link rel="stylesheet" href="style.css">

    <script>
        function change_id() {
            document.getElementById("center").setAttribute("id", "center_dis");
        }
    </script>
</head>
<style>
    .button {
        border: none;
        color:white;
        background-color: grey;
    }

    .list li{
        padding-right: 24px;
        float:left;
        list-style: none;
        
    }
    .menubar{
        display: block;
        height: 100px;
       
    }
</style>
<?php

require_once('Back End/php/CreateDb.php');

?>

<body>
    
<?php session_start();?>
    <?php
    $_SESSION['o'] = 1;
    $PIN = 2203;
    ?>
    <?php include 'Front end/nav.php'; ?>
    <?php
    if(!isset($_SESSION['role'])){
        $_SESSION['menu'] = 'false';
        header("location:Signup.php");
    }

    ?>

    
        <div class='container shadow'>
            <?php
            if(isset($_GET['order_id'])){
                $order_id = $_GET['order_id'];
            }

            $sql = "select * from orders where order_id = '$order_id'";
            $result = mysqli_query($conn, $sql);
            while($orderData = mysqli_fetch_array($result)){
            if($orderData['status'] == 0){
                $sql_delete = "delete from orders where order_id = '$order_id'";
                $result_delete = mysqli_query($conn, $sql_delete);
                $sql_deleteanditems = "delete from order_items where order_id = '$order_id'";
                $result_deleteanditems = mysqli_query($conn, $sql_deleteanditems);
                if($result_delete && $result_deleteanditems)
                {
                    echo 'success';
                }
                
            } else {
                echo '<form method="post" action="" class="form-inline">';
                echo '<div class="form-group mb-2 mx-sm-2">';
                    echo '<label for="pin" class="">Insert PIN first to delete a confirmed order</label>';
                    echo '<input type="text" name="pin" id="pin" class="form-control" placeholder="Enter PIN">';
                    echo '<input type="hidden" name="order_id" value =" '. $order_id .'">';
                    echo '</div>';
                    echo '<button type="submit" name="sub" class="btn btn-primary mb-2">Enter</button>';
                echo '</form>';
            }

            
            if(isset($_POST['sub'])){
                
                $insertedPin = $_POST['pin'];
                if($insertedPin == $PIN){
                    
                    $sql_delete = "delete from orders where order_id = '$order_id'";
                    $result_delete = mysqli_query($conn, $sql_delete);
                    $sql_deleteanditems = "delete from order_items where order_id = '$order_id'";
                    $result_deleteanditems = mysqli_query($conn, $sql_deleteanditems);
                    if($result_delete && $result_deleteanditems)
                    {
                        echo 'success';
                    }
                } else {
                    echo 'WRONG PIN';
                }
            }

}

mysqli_close($conn);

        ?>

        </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>