<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

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
    <link rel="stylesheet" href="shadow2.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- styles for this table -->


    <!-- function that dispaly table attributes of the database -->

</head>
<script>
    function validate() {
        validation();
        validateID();
    }

    function validateID() {
        var formData = new FormData();
        formData.append('file', $('#nationalId')[0].files[0]);

        $.ajax({
            url: 'validate_id.php',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data) {
                if (data == 1)
                    $('#nationalId_check').html("");
                else if (data == 0)
                    $('#nationalId_check').html("National id required");
                else
                    $('#nationalId_check').html("National id picture must be a pdf");
            }
        });
    }

    function validation() {
        jQuery.ajax({
            url: "validation.php",
            data: {
                fname: $('#fname').val(),
                sname: $("#sname").val(),
                uname: $("#uname").val(),
                Email: $("#Email").val(),
                Password: $("#Password").val(),
                conPassword: $("#conPassword").val()
            },
            type: "POST",
            success: function(data) {
                $('#firstname').html("");


                $('#secondname').html("");
                $('#email_check').html("");
                $('#username_check').html("");
                $('#password_check').html("");
                $('#conpassword_check').html("");
                if (data.substring(0, 1) == '9') {
                    $('#pop_up').html(data);
                } else {
                    const value = data.split(",");
                    var length = value.length;
                    if (value[0].substring(2, 3) == '1')
                        $('#firstname').html(value[0].substring(3));
                    else if (value[0].substring(2, 3) == '2')
                        $('#secondname').html(value[0].substring(3));
                    else if (value[0].substring(2, 3) == '3')
                        $('#email_check').html(value[0].substring(3));
                    else if (value[0].substring(2, 3) == '4')
                        $('#username_check').html(value[0].substring(3));
                    else if (value[0].substring(2, 3) == '5')
                        $('#password_check').html(value[0].substring(3));
                    else if (value[0].substring(2, 3) == '6')
                        $('#conpassword_check').html(value[0].substring(3));

                       

                    for (let i = 1; i < length; i++) {
                        if (value[i].substring(0, 1) == '1')
                            $('#firstname').html(value[i].substring(1));
                        else if (value[i].substring(0, 1) == '2')
                            $('#secondname').html(value[i].substring(1));
                        else if (value[i].substring(0, 1) == '3')
                            $('#email_check').html(value[i].substring(1));
                        else if (value[i].substring(0, 1) == '4')
                            $('#username_check').html(value[i].substring(1));
                        else if (value[i].substring(0, 1) == '5')
                            $('#password_check').html(value[i].substring(1));
                        else if (value[i].substring(0, 1) == '6')
                            $('#conpassword_check').html(value[i].substring(1));
                    }
                }
            }
        });
    }

    function change_id() {
        document.getElementById("center").setAttribute("id", "center_dis");
    }
</script>
<style>

</style>

<body>
    <?php
    include "Front End/nav.php";
    include "Back End/php/CreateDb.php";
    include "Back End/php/functions.php";
    ?>
    <?php
    if (!isset($_SESSION['role']) && isset($_SESSION['menu'])) {
        $element =
            "<div class='center' id = 'center'>
                        <div class='content'>
                            <div class='header'>
                                <h2>Sign up</h2>
                            </div>
                            <p>You need to sign up before ordering</p>
                            <div class='line'></div>
                            <button onclick='change_id()' class = 'close-btn' > Close </button>
                        </div>
                    </div>";
        echo $element;
        unset($_SESSION['menu']);
    }
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


        $password2 = encrypt($password, '1234567891011121', 'WebProject');
        /*
        $sql = "select * from user where username = '$username' or email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row_num = mysqli_num_rows($result);
       // if($num)
        */
        $sql = "select * from users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row_num = mysqli_num_rows($result);
        if ($row_num > 0) {
            echo "
            <div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2 style = 'text-align: center'>Failed</h2>
            </div>
            <p style = 'align-text:center;'>Email is already used</p>
            <p style = 'align-text:center;'>Please try a diffrent email address</p>

            <div class='line'></div>
            <a href = 'login.php' onclick='change_id()' class = 'close-btn' > Close </a>
            </div>
            </div>";
        } else {

            $sql2 = "INSERT into users (firstname,secondname,email,username,password,nationalId) VALUES ('$firstname','$secondname','$email','$username','$password2','$nationalid')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                echo "
            <div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2 style = 'text-align: center'>Success</h2>
            </div>
            <p>You have signed up sucessfully</p>
            <div class='line'></div>
            <a href = 'login.php' onclick='change_id()' class = 'close-btn' > Close </a>
            </div>
            </div>";
                $sql3 = "select * from users where email = '$email'";
                $result3 = mysqli_query($conn, $sql3);
                if ($result3 or die("error")) {
                    $row = mysqli_fetch_assoc($result3);
                    $_SESSION['user_id'] = $row['id'];
                }
            }
        }
    }

    //        $pass = decrypt($password2,'1234567891011121','WebProject');
    ?>
    <div class='row'>
        <div class='shadow col-md-6 mt-5'>
            <p class='edit'>Sign Up</p>
            <br>
            <form action='' method='post' enctype="multipart/form-data">
                <div class='form-group'>
                    <div class='warning' id='firstname'> </div>
                    <label for='fname'>First Name:</label>
                    <input type='text' class='form-control' id='fname' placeholder='First Name' name='fname' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='secondname'> </div>
                    <label for='sname'>Second Name:</label>
                    <input type='text' class='form-control' id='sname' placeholder='Second Name' name='sname' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='email_check'> </div>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' id='Email' placeholder='Email' name='Email' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='username_check'> </div>
                    <label for='uname'>Username:</label>
                    <input type='text' class='form-control' id='uname' placeholder='Username' name='uname' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='password_check'> </div>
                    <label for='Password'>Password:</label>
                    <input type='Password' class='form-control' id='Password' name='pass' placeholder='Password' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='conpassword_check'> </div>
                    <label for='conPassword'>Confirm Password:</label>
                    <input type='conPassword' class='form-control' id='conPassword' name='conpass' placeholder='Confirm Password' value=''>
                </div>
                <div class='form-group'>
                    <div class='warning' id='nationalId_check'> </div>

                    <label for='nationalId'>National ID:</label>
                    <input type='file' class='form-control' id='nationalId' name='nationalId' placeholder='PDF'>
                    <p style='font-size: 15px;'>Please make sure to upload a clear <b style='color:red;'>PDF</b> picture of your National ID</p>
                    <a class='a' href="login.php">already have an account?</a>
                </div>
                <div class='center2'>
                    <button type='button' name='sub' class='btn btn-warning' onclick='validate()'>Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>