<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>
    <script>
        function add(id){
           let val = document.getElementById(id).getAttribute("value");
           val++;
           document.getElementById(id).setAttribute("value",val);
        }
        function sub(id){
           let val = document.getElementById(id).getAttribute("value");
           if(val > 1){
               val--;
               document.getElementById(id).setAttribute("value",val);
            }
        }
    </script>

<body class = bg-light>

   <?php require_once ('header.php');?> 
   <?php require_once ('CreateDb.php');?> 
   <?php require_once ('cartItem.php');?> 
        
   <?php
   session_start();
   if(isset($_POST["plus"]) || isset($_POST["minus"])){
       //$_SESSION['cart']['quantity'] = $_POST["quantity"];
   } 
   if(isset($_SESSION['cart'])){

       //$value = array_search($_POST['product_id'], array_column($_SESSION['cart'], 'product_id'))
       $array = $_SESSION['cart'];
       echo "<div class='row col-md-12'>";
       foreach($array as $items){
           cart_item($items['catagory'],$items['product_id'],$conn,$items['quantity']);
        }
        echo "</div>";
    }else{
        echo "no items";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>