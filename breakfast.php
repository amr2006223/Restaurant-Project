<!doctype html>
<html lang="en">

<head>
    <?php session_start();
    $_SESSION['o'] = 1;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Shopping Cart</title>

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

    <?php include 'Front end/nav.php'; ?>
    <?php
    if(!isset($_SESSION['role'])){
        $_SESSION['menu'] = 'false';
        header("location:Signup.php");
    }
    print_r($_SESSION);

    //menu("breakfast");
    unset($_SESSION['o']);
    $category = '1';
    if (isset($_POST['add'])) {
        $category = $_POST['category'];
    }
    if (isset($_POST['breakfast_submit'])) {
        $category = '1';
    } else if (isset($_POST['lunch_submit'])) {
        $category = '2';
    } else if (isset($_POST['dinner_submit'])) {
        $category = "3";
    } else if (isset($_POST['Compose_submit'])) {
        $category = '4';
    }

    ?>
    


        <div class='menubar'>
            <form action="" method="post">
                <ul class=list>
                    <li>
                        <input class='button' type="submit" value="Breakfast" name=breakfast_submit>
                    </li>
                    <li>
                        <input class='button' type="submit" value="lunch" name=lunch_submit>
                    </li>
                    <li>
                        <input class='button' type="submit" value="dinner" name=dinner_submit>
                    </li>
                    <li>
                        <input class='button' type="submit" value="Compose a Sandwich" name=Compose_submit>
                    </li>
                </ul>
            </form>
        </div>


        <div class='container shadow'>
            <?php
            $sql = "select * from item where category_id = '$category'";
            $result = mysqli_query($conn, $sql);
            $row_num = mysqli_num_rows($result);

            for ($i = 0; $i < ($row_num / 2) - 1; $i++) {
                echo "<div class='row col-md-6'>";
                for ($j = 0; $j < 2; $j++) {
                    $row = mysqli_fetch_assoc($result);
                    component($row['name'], $row['price'], $row['image'], $row['id'], $category);
                }
                echo "</div>";
            }
            echo "<div class='row col-md-4'>";
            if ($row_num % 2 != 0) {
                $row = mysqli_fetch_assoc($result);
                component($row['name'], $row['price'], $row['image'], $row['id'], $category);
            }
            echo "</div>";
            ?>

        </div>


    <?php
    // huge error it keeps adding stuff again and again without checking if it is in the array
    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'])) {
            if (array_search($_POST['product_id'], array_column($_SESSION['cart'], 'product_id'))) { //when it retunrs the first index so it add it again???
                $element =
                    "<div class='center' id = 'center'>
                        <div class='content'>
                            <div class='header'>
                                <h2>Failed</h2>
                            </div>
                            <p>Item is already in cart</p>
                            <div class='line'></div>
                            <button onclick='change_id()' class = 'close-btn' > Close </button>
                        </div>
                    </div>";
                echo $element;
            } else {
                echo '<script> al() </script>';
                $count = count($_SESSION['cart']) - 1;
                $count++;
                echo $count;
                $_SESSION['cart'][$count] = array('product_id' => $_POST['product_id'], 'quantity' => 1, 'catagory' => $category);
                //$item_array = array('product_id' => $_POST['product_id']);
            }
        } else {
            echo '<script> al() </script>';
            //$item_array = array('product_id' => $_POST['product_id']);

            $_SESSION['cart'][0] = array('product_id' => 0, 'quantity' => 0, 'category' => '0');
            $_SESSION['cart'][1] = array('product_id' => $_POST['product_id'], 'quantity' => 1, 'category' => $category);
        }
    }
    print_r($_SESSION);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>