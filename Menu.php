<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Shopping Cart</title>
    
    <!-- NORMALIZE AND GRID style sheets and templates -->
    <?php include "./Back End/Stylesheets/sheets.php"?>
    
    <!-- Style Sheets and font awesome links -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    
    <!-- custom stylesheets -->
    <link rel="stylesheet" href="./Resources/CSS/nave.css">
    <link rel="stylesheet" href="./Resources/CSS/cardStyle.css">
    <link rel="stylesheet" href="style.css">


</head>

<?php
    require_once('./Back End/php/components.php');
    require_once('./Back End/php/CreateDb.php');  
    session_start();
?>

<body>
    
<?php include './Front end/nav.php';?>


<div class = "body">
    <a href = "./Back End/php/cart.php" class = "cart">Cart</a>
    <div class = "container">
        <div class = "row">
            <?php 
                    $result = getData("producttb",$conn);
                    $i = 0;
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $counter++;
                        
                        component($row['product_name'],$row['product_price'],$row['product_image'],$row['ID'],$i);
                        if($counter == 2){
                            $counter = 0;
                            $i++;
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
        
       <?php 
    if(isset($_SESSION['cart']) && isset($_POST['product_id'])){
        if(in_array($_POST['product_id'],$_SESSION['cart'])){
            $element = 
            "<div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2>Modal Popup</h2>
            <label for='click' class = 'fas fa-times'></label>
            </div>
            <p>Item is already in cart</p>
            <div class='line'></div>
            <button  class = 'close-btn' onclick='change_id()'> Close </button>
            </div>
            </div>";
            echo $element;
        }
        else{
            $count = count($_SESSION['cart']);
                //$item_array = array('product_id' => $_POST['product_id']);
                $_SESSION['cart'][$count] = $_POST['product_id'];         
            }
            
        }
        else{
            //$item_array = array('product_id' => $_POST['product_id']);
            if(isset($_POST['product_id'])){

                $_SESSION['cart'][0] = $_POST['product_id'];
            }else{
                session_unset();
            }
        }
?>

        <script>
                function change_id(){
                    document.getElementById('center').setAttribute('id','center_dis');
                    document.getElementById('center').removeAttribute('id');
                }
            </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>