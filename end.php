<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="shadow.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>
<body class= 'bg-light'>

<header class = "bg-warning h-90" id = "nav-header">

<nav class = "h-50">
    <a href= "breakfast.php" class = "navbar-brand">
        <h3 class = "px-5 mb-1 text-dark">
            <i class = "fas fa-shopping-basket"></i> Menu

        </h3>
</a>
</nav>
</header>
    <?php require_once('./Back End/php/CreateDb.php'); ?>
    <?php
    if(isset($_POST['sub'])){
        $user_id = $_SESSION['user_id'];
        $sql2 = 'select max(order_id) from orders';
            $result2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_row($result2);
            $row_num = mysqli_num_rows($result2);
            if($row_num == 0){
                $order_id = 1;
            }else{
                $order_id = $row['0'] + 1;
            }
        $item_id = $_SESSION['cart'][1]['product_id'];
        $quantity = $_SESSION['cart'][1]['quantity'];
        if($item_id !=0){

            $sql ="insert into order_items (order_id,item_id,quantity,user_id) Values ('$order_id','$item_id','$quantity',$user_id)";
            $result = mysqli_query($conn,$sql);
        }

        for($i = 2;$i < count($_SESSION['cart']);$i++){
            
            $item_id = $_SESSION['cart'][$i]['product_id'];
            $quantity = $_SESSION['cart'][$i]['quantity'];
            if($item_id == 0) continue;
            $sql3 ="insert into order_items (order_id,item_id,quantity,user_id) Values ('$order_id','$item_id','$quantity',$user_id)";
            $result3 = mysqli_query($conn,$sql3);
        }
    }
    ?>
<body>

    <div class='row'>
        <div class='shadow col-md-4 mt-5'>
            <p class='edit'>Check</p>
            <br>
            <form action='Home.php' method='post' enctype="multipart/form-data">
           
                    <div class='form-group'>
                        <div class='warning'> </div>
                <?php
                    echo "<label for='price'>Done</label> <br>";
                    echo "<label for='price'> go to the cashier to submit your order</label> <br>";
                    echo "<label for='price'>Have a nice meal</label>";

                    echo "</div>
                    <br>
                    <br>";
                    ?>
                   
                    <div class='center2'>
                        <button type='submit' name='sub' class='btn btn-warning'>Home</button>
                    </div>
                </form>
        </div>
    </div>
    </body>
