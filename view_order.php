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
require_once('Back End/php/components.php');
require_once('Back End/php/CreateDb.php');

?>

<body>
    <script>
        function al() {
            alert("items has been added to the cart");
        }
    </script>
<?php session_start();?>
    <?php
    $_SESSION['o'] = 1;
    ?>
    <?php include 'Front end/nav.php'; ?>
    <?php
    if(!isset($_SESSION['role'])){
        $_SESSION['menu'] = 'false';
        header("location:Signup.php");
    }

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }

    ?>

    
        <div class='container shadow'>
            <?php
            $sql = "select * from order_items where order_id =  '$order_id' ";
            $result = mysqli_query($conn, $sql);
            echo '<table border="1">';
                echo '<tr>';
                    echo '<th>Item ID</th>';
                    echo '<th>Category</th>';
                    echo '<th>Name</th>';
                    echo '<th>Item Price</th>';
                    
                echo '</tr>';
            
            while($orderData = mysqli_fetch_array($result)){
            echo '<form action="delete.php" method="POST">';
            echo '<tr>';
                $item_id = $orderData['item_id'];
                $quantity = $orderData['quantity'];
                $sql_items = "select * from item where id = '$item_id'";
                $result_items = mysqli_query($conn, $sql_items);
                while($itemData = mysqli_fetch_array($result_items)){
                    echo '<td>'.$itemData['id'].'</td>';
                if($itemData['category_id'] == 0)
                {
                    echo '<td>Breakfast</td>';
                } elseif($itemData['category_id'] == 1) {
                    echo '<td>Lunch</td>';
                }else {
                    echo '<td>Dinner</td>';
                }
                    echo '<td>'.$itemData['name'].'</td>';
                    echo '<td>'.$itemData['price'].'</td>';
        
       
        echo '<td><input type="submit" name="delete" value="Delete"></td>';
    echo '</form>';
        
    echo '</tr>';
                }
                

}
echo '</table>';
mysqli_close($conn);

        ?>

        </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>