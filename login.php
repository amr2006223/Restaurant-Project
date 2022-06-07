<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>res</title>

    <!-- NORMALIZE AND GRID style sheets and templates -->
    <!-- NORMALIZE AND GRID style sheets and templates -->
    <link rel="stylesheet" href="../../vendors/css/normalize.css">
    <link rel="stylesheet" href="../../vendors/css/Grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Resources/CSS/nave.css">
    <!-- Style Sheets and font awesome links -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- custom stylesheets -->
    <link rel="stylesheet" href="../../Resources/CSS/nave.css">
    <link rel="stylesheet" href="../../Resources/CSS/cardStyle.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="shadow3.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- styles for this table -->


    <!-- function that dispaly table attributes of the database -->
    <?php
    session_start();
    ?>
</head>
<script>
    function change_id() {
        document.getElementById("center").setAttribute("id", "center_dis");
    }
</script>


<body>
    <?php
    include "Front End/nav.php";
    include "Back End/php/CreateDb.php";
    include "Back End/php/functions.php";
    ?>
    <?php
    if (isset($_POST['sub'])) {

        $email = $_POST['uname'];
        $password = $_POST['pass'];
        $password2 = encrypt($password, '1234567891011121', 'WebProject');
        
        /*
        $sql = "select * from user where username = '$username' or email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row_num = mysqli_num_rows($result);
       // if($num)
        */
        $sql = "select * from users where username = '$email' && password = '$password2'";
        $result = mysqli_query($conn, $sql);
        $row_num_user = mysqli_num_rows($result);
        $sql2 = "select * from cashier where username = '$email' && password = '$password2'";
        $result2 = mysqli_query($conn, $sql2);
        $row_num_cash = mysqli_num_rows($result2);
        $sql3 = "select * from qualitycontrol where username = '$email' && password = '$password'";
        $result3 = mysqli_query($conn, $sql3);
        $row_num_qual = mysqli_num_rows($result3);
        if ($result && $row_num_user > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $password;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = 'user';
            header("location:home.php");
        } else if ($result2 && $row_num_cash > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $password;
            $row = mysqli_fetch_assoc($result2);
            $_SESSION['cash_id'] = $row['id'];
            $_SESSION['role'] = 'cashier';
            header("location:home.php");
        } else if ($result3 && $row_num_qual > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $password;
            $row = mysqli_fetch_assoc($result3);
            $_SESSION['qual_id'] = $row['id'];
            $_SESSION['role'] = 'qualitycontrol';
            header("location:home.php");
        }
    }

    //        $pass = decrypt($password2,'1234567891011121','WebProject');
    ?>
    <div class='row'>
        <div class='shadow col-md-6 mt-5'>
            <p class='edit'>Log In</p>
            <br>
            <form action='' method='post' enctype="multipart/form-data">
                <div class='form-group'>
                    <div class='warning'> </div>
                    <label for='uname'>Email:</label>
                    <input type='text' class='form-control' id='uname' placeholder='Username' name='uname' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning'> </div>
                    <label for='Password'>Password:</label>
                    <input type='Password' class='form-control' id='Password' name='pass' placeholder='Password' value=''>
                    <a class='a' href="Signup.php">don't have an account?</a>
                </div>
                <div class='center2'>

                    <button type='submit' name='sub' class='btn btn-warning'>Submit</button>

                </div>
            </form>
        </div>
    </div>
</body>

</html>