<?php
echo "
<header>
<nav>
    <div class = 'nave'>";
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
                    <li><a href='ContactUs.html'>Contact Us</a></li>                        
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
        
        if(isset($_SESSION['o'])){
            
            echo "<a class = 'btn btn-full hold' href = 'Back End/php/cart.php' class = 'cart'>Cart</a>";
        }
        
        echo "
</div>
</nav>
</header>";

?>