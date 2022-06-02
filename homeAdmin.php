<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resteraunt</title>

    <!-- NORMALIZE AND GRID style sheets and templates -->
    <!-- NORMALIZE AND GRID style sheets and templates -->
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/Grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Resources/CSS/nave.css">
    <!-- Style Sheets and font awesome links -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- custom stylesheets -->
    <link rel="stylesheet" href="Resources/CSS/nave.css">
    <link rel="stylesheet" href="Resources/CSS/cardStyle.css">
    <link rel="stylesheet" href="../../style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- styles for this table -->
</head>
<style>
    .shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        height: 300px;
        padding-top: 30px;
        border-radius: 30px;
        width: 60%;
        margin-left: 19%;
        margin-top: 20%;
        background-image: linear-gradient(130deg, #bdc3c7, #2c3e50);
        transition: .5s;
        border: 3px solid black;
    }

    a, a:focus,a:hover {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.781);
    }

    .head {
        font-size: 20px;
    }

    .shadow:hover  {
        box-shadow: -20px 10px 10px 0 rgba(0, 0, 0, 0.6), -20px 10px 20px 20px rgba(0, 0, 0, 0.19);
        transform: scale(1.1);
    }

    .sub {
        text-align: center;
        font-size: larger;
        padding-top: 2%;
    }
</style>

<body>
    <?php
    include "Back End/php/CreateDb.php";
    include "Back End/php/functions.php";
    include "Front End/nav.php";
    ?>

    <div class='row'>
        <div class="col-md-4">
            <a href='Admin.php'>
                <div class='shadow'>
                    <p class='head' style='text-align:center;'>Cashier</p>
                    <br>
                    <p class='sub' style = "padding-top:17%;">Add/Edit/Block <br> or promote cashiers</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href='#'>
                <div class='shadow'>
                    <p class='head' style='text-align:center;'>User Comments</p>
                    <br>
                    <p class='sub' style = "padding-top:17%;">View the comments of the customers</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href='#'>
                <div class='shadow'>
                    <p class='head' style='text-align:center;'>Generate Reports</p>
                    <br>
                    <p class='sub' style = ' padding-left:5%; padding-right:5%;  '>Generate reports related to Aggregation by rating, Aggregation by product, Customers canceled, Customers Edited, and Most ordered item/product</p>
                </div>
            </a>
        </div>
    </div>

</body>