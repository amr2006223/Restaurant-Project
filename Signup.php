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
<style>
    .shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        height: 780px;
        padding-top: 30px;
        border-radius: 30px;
        width: 34%;
    }

    .edit {
        font-weight: bold;
        font-size: large;
        text-align: center;
    }

    .center2 {
        padding-left: 41.5%;
    }

    .table {
        background-color: white;
        transition: .5s;
    }

    th,
    tr {
        transition: .5s;
    }

    .row {
        padding-top: 4%;
    }

    .th:hover,
    tr:hover {
        background-color: rgba(0, 0, 0, 0.208);
    }

    .link,
    .block,
    .unblock {
        background-color: rgba(0, 0, 0, 0.208);
        border: none;
        display: inline-block;
        width: 90%;
        border-radius: 5px;
        font-weight: bold;
    }

    .block {
        background-color: red;
        transition: .5s;
    }

    .unblock {
        background-color: green;
        transition: .5s;
    }

    .block:hover {
        background-color: rgba(167, 0, 0, 0.996);
    }

    .unblock:hover {
        background-color: rgb(1, 99, 1);
    }

    .center,
    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        user-select: none;
        z-index: 9;
    }

    #center_dis {
        opacity: 0;
        visibility: hidden;
    }

    .content {
        height: 230px;
        width: 400px;
        background: white;
        border-radius: 3px;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .4);
        transition: .3s ease-in;
        user-select: auto;

    }

    .content:focus {
        visibility: visible;
    }

    .click-me:focus~.content {
        opacity: 1;
        visibility: visible;
        user-select: none;
    }

    p {
        padding-top: 10px;
        font-size: 19px;
        color: #1a1a1a;
        text-align: center;

    }

    .line {
        position: absolute;
        bottom: 60px;
        width: 100%;
        height: 1px;
        background: silver;

    }

    .close-btn {
        position: absolute;
        bottom: 12px;
        right: 25px;
        border: 1px solid black;
        border-radius: 3px;
        color: black;
        padding: 8px 10px;
        font-size: 18px;
        cursor: pointer;
        background-color: white;
    }

    .yes-btn {
        position: absolute;
        bottom: 12px;
        right: 100px;
        border: 1px solid black;
        border-radius: 3px;
        color: black;
        padding: 8px 10px;
        font-size: 18px;
        cursor: pointer;
        background-color: white;
    }

    .close-btn:hover,
    .yes-btn:hover {
        background: orange;
        color: white;
        transition: .5s;
    }

    .header {
        height: 68px;
        background: orange;
        overflow: hidden;
        border-radius: 3px 3px 0 0;
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .2);
    }
    .warning{
        font-size: small;
        text-align: left;
        color:red;
        height: 1px;
        margin-bottom: 20px;
        margin-top: -10px;
    }
</style>

<body>
    <?php 
        include "Front End/nav.php" ;
        include "Back End/php/CreateDb.php";
        include "Back End/php/functions.php";
    ?>
    <?php
    if (isset($_POST['sub'])) {
        $firstname = $_POST['fname'];
        $secondname = $_POST['sname'];
        $email = $_POST['Email'];
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $nationalid = $_FILES['nationalId']['name'];

        $_SESSION['fname'] = $firstname;
        $_SESSION['sname'] = $secondname;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['pass'] = $password;
        $_SESSION['conpass'] = $conpass;
        $_SESSION['nationalId'] = $nationalid;


        $password2 = encrypt($password,'1234567891011121','WebProject');
        /*
        $sql = "select * from user where username = '$username' or email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row_num = mysqli_num_rows($result);
       // if($num)
        */
        $sql2 = "INSERT into user (firstname,secondname,email,username,password,nationalId) VALUES ($firstname,$secondname,$email,$username,$password2,$nationalid)";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            echo "
            <div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2 style = 'text-align: center'>Success</h2>
            </div>
            <p>Cashier Updated Successfuly</p>
            <div class='line'></div>
            <a href = 'Admin.php' onclick='change_id()' class = 'close-btn' > Close </a>
            </div>
            </div>";
        }
    }
//        $pass = decrypt($password2,'1234567891011121','WebProject');
    ?>
        <div class = 'row'>
            <div class = 'shadow col-md-6 mt-5'>
                 <p class = 'edit'>Sign Up</p>
                <br>    
                <form action='' method='post'>
            
            <form action='' method='post'>
            <div class='form-group'>
            <div class = 'warning'> </div>
            <label for='fname'>First Name:</label>
            <input type='text' class='form-control' id='fname' placeholder='First Name' name = 'fname' value = ''>
            </div>
          <div class='form-group'>
              <div class = 'warning'>  </div>
            <label for='sname'>Second Name:</label>
            <input type='text' class='form-control' id='sname' placeholder='Second Name' name = 'sname' value = ''>
          </div>
          <div class='form-group'>
          <div class = 'warning'>  </div>
            <label for='uname'>Email:</label>
            <input type='email' class='form-control' id='Email' placeholder='Email' name = 'Email' value = ''>
          </div>
          <div class='form-group'>
          <div class = 'warning'>  </div>
            <label for='uname'>Username:</label>
            <input type='text' class='form-control' id='uname' placeholder='Username' name = 'uname' value = ''>
          </div>
          <div class='form-group'>
          <div class = 'warning'>  </div>
            <label for='Password'>Password:</label>
            <input type='Password' class='form-control' id='Password' name = 'pass' placeholder='Password' value = ''>
          </div>
          <div class='form-group'>
          <div class = 'warning'>  </div>
            <label for='conPassword'>Confirm Password:</label>
            <input type='conPassword' class='form-control' id='conPassword' name = 'conpass' placeholder='Confirm Password' value = ''>
        </div>
        <div class='form-group'>
        <div class = 'warning'>  </div>
              
            <label for='nationalId'>National ID:</label>
            <input type='file' class='form-control' id='nationalId' name = 'nationalId' placeholder='PDF' value = ''>
            <p style = 'font-size: 15px;'>Please make sure to upload a clear <b style = 'color:red;'>PDF</b> picture of your National ID</p>
          </div>
         <div class = 'center2'>
             <button type='submit' name = 'sub' class='btn btn-warning'>Submit</button>
            </div>
        </form>
            </div>
        </div>
</body>

</html>