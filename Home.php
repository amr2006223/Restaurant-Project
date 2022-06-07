<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start();?>
    <title>Cairo Restaurnat</title>

    <!-- dh l file ely e7na hn4t8l 3leh w n7ot css files-->
    <link rel="stylesheet" href="Resources/CSS/styles.css">

    <!--these are links that I have not created they are already made code
    for google fonts and other front end stuff do not change anything in these
    files or their link tags unless you know what you are doing mthbedoo4... -->
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/Grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">

</head>

<body>

    <header>
        <nav>
            <div class="nave">
                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'user') {
                        echo "<img class = 'logo' src='resources/Imgs/logo-white.png' alt='logo'>
                        <ul class = 'main-Nav'>
                            <li><a href='Home.php'>Home</a></li>                                                               
                            <li><a href='breakfast.php'>Menu</a></li>                                           
                            <li><a href='ContactUs.html'>Contact Us</a></li>                        
                            <li><a href='Signout.php'>Sign out</a></li>                        
                                                  
                        </ul>";
                    }
                    else if ($_SESSION['role'] == 'cashier') {
                        echo "<img class = 'logo' src='resources/Imgs/logo-white.png' alt='logo'>
                        <ul class = 'main-Nav'>
                            <li><a href='Home.php'>Home</a></li>                                                               
                            <li><a href='breakfast.php'>Menu</a></li>  
                            <li><a href='Orders.php'>Orders</a></li>                           
                            <li><a href='Signout.php'>Sign out</a></li>                        
                                                  
                        </ul>";
                    }
                    else if ($_SESSION['role'] == 'qualitycontrol') {
                        echo "<img class = 'logo' src='resources/Imgs/logo-white.png' alt='logo'>
                        <ul class = 'main-Nav'>
                            <li><a href='Home.php'>Home</a></li>
                            <li><a href='users.php'>Users</a></li>                                                                                                              
                            <li><a href='homeAdmin.php'>Manage</a></li>                                                                                                              
                            <li><a href='Signout.php'>Sign out</a></li>                        
                        </ul>";
                    }
                } else {
                    echo "<img class = 'logo' src='resources/Imgs/logo-white.png' alt='logo'>
                    <ul class = 'main-Nav'>
                        <li><a href='Home.php'>Home</a></li>                    
                        <li><a href='Login.php'>Login</a></li>                                                                
                        <li><a href='Signup.php'>Sign Up</a></li>                        
                        <li><a href='breakfast.php'>Menu</a></li>                                           
                        <li><a href='ContactUs.html'>Contact Us</a></li>                        
                                              
                    </ul>";
                }
                
                ?>


            </div>
        </nav>
        <div class=hero-text-box>
            <h1>Hello for example</h1>
            <a class="btn btn-full" href="SignUp.php"> Im'Hungury </a>
            <!--signup section-->
            <a class="btn btn-ghost" href="#">Show me more</a>
        </div>
    </header>


</body>

</html>