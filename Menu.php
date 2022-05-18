<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Shopping Cart</title>
    
    <!-- NORMALIZE AND GRID style sheets and templates -->
  <!-- NORMALIZE AND GRID style sheets and templates -->
  <link rel="stylesheet" href="../../vendors/css/normalize.css">
    <link rel="stylesheet" href="../../vendors/css/Grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    
    <!-- Style Sheets and font awesome links -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>
    
    <!-- custom stylesheets -->
    <link rel="stylesheet" href="../../Resources/CSS/nave.css">
    <link rel="stylesheet" href="../../Resources/CSS/cardStyle.css">
    <link rel="stylesheet" href="../../style.css"> 
    
    
</head>

<?php
    require_once('./Back End/php/components.php');
    require_once('./Back End/php/CreateDb.php');  
    session_start();
    ?>

<body>
    
    
<?php include './Front end/nav.php';?>

<!-- this must change according to the catgory the table name will change-->
<div class = 'body'>
    <a href = './Back End/php/cart.php' class = 'cart'>Cart</a>
    

    </div>
    <div class = 'container'>
        <div class = 'row'>
            <?php 
                    $result = getData('producttb',$conn,$id);
                    while($row = mysqli_fetch_assoc($result)){
                        component($row['product_name'],$row['product_price'],$row['product_image'],$row['ID'],);
                        }
                    
                    ?>
            </div>
        </div>
    </div>
        
<?php
// huge error it keeps adding stuff again and again without checking if it is in the array
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        if(array_search($_POST['product_id'], array_column($_SESSION['cart'], 'product_id'))){
            $element = 
            "<div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2>Modal Popup</h2>
            <label for='click' class = 'fas fa-times'></label>
            </div>
            <p>Item is already in cart</p>
            <div class='line'></div>
            <button onclick='change_id()'  class = 'close-btn' > Close </button>
            </div>
            </div>";
            echo $element;
        }
        else{
            $count = count($_SESSION['cart']);
            $count++;
            $_SESSION['cart'][$count] = array( 'product_id' => $_POST['product_id'] ,'quantity'=> 1, 'catagory' => "not yet");; 
            //$item_array = array('product_id' => $_POST['product_id']);
        }
    }
    else{
        //$item_array = array('product_id' => $_POST['product_id']);
        $_SESSION['cart'][0] = array( 'product_id' => $_POST['product_id'] ,'quantity'=> 1, 'catagory' => "not yet");   
    }
}
print_r($_SESSION)
?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>