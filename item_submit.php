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
<body>

<div class='row'>
        <div class='shadow col-md-4 mt-5'>
            <p class='edit'>Check</p>
            <br>
            <form action='end.php' method='post' enctype="multipart/form-data">
           
                    <div class='form-group'>
                        <div class='warning'> </div>
                <?php
            $space = " ";
                $array = $_SESSION['cart'];
                $i = 0;
                $sum = 0;
                for($i = 0; $i<count($_SESSION['cart']);$i++){
                    $id = $array[$i]['product_id'];
                    $sql = "select * from item where id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    $row_num = mysqli_num_rows($result);
                    if($row_num == 0) continue;
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $price = $row['price'];
                        $sum+=$price;
                    }
                    echo "<label for='price'>Item name: $name &nbsp</label>";
                    echo "<label for='price'>Item price: $price &nbsp</label> <br>";
                }
               
                      
                        echo "<label for='price'>The Total Price is $sum $</label>";
                    echo "</div>
                    <br>
                    <br>";
                    ?>
                   
                    <div class='center2'>
                        <button type='submit' name='sub' class='btn btn-warning'>Pay now</button>
                    </div>
                </form>
        </div>
    </div>
    </body>
