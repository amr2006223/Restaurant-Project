
<?php
session_start();
function sanitize($text)
{
    $text = htmlspecialchars($text);
    $text = stripslashes($text);
    $text = trim($text);
    return $text;
}

function validate($data, $type, $code, $conPass = '')
{
    if ($type == 'String') {
        if (empty($data)) {
            echo $code . "Name is required,";
            $GLOBALS['check'] = false;
        } else {
            //$data = sanitize($data);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $data)) {
                echo $code . "Invalid Only letters and white space allowed,";
                $GLOBALS['check'] = false;
            }
        }
    } else if ($type == 'Email') {
        if (empty($data)) {
            echo $code . "Email is required,";
            $GLOBALS['check'] = false;
        } else {
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            // check if e-mail address is well-formed
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                echo $code . "Invalid email format,";
                $GLOBALS['check'] = false;
            }
        }
    } elseif (($type == 'Username')) {
        if (empty($data)) {
            echo $code . "Username is required,";
            $GLOBALS['check'] = false;
        } else {
            $data = sanitize($data);
            // check if name only contains letters and whitespace
            if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $data)) {
                echo $code . "Username is invalid or already in use,";
                $GLOBALS['check'] = false;
            }
        }
    } elseif ($type == 'Password') {
        if (empty($data)) {
            echo $code . "Password is required,";
        } else if ($conPass != $data) {
            echo $code . "Password confirmation does not match,";
            $GLOBALS['check'] = false;
        } else {
            $uppercase = preg_match('@[A-Z]@', $data);
            $lowercase = preg_match('@[a-z]@', $data);
            $number = preg_match('@[0-9]@', $data);
            if (!$uppercase || !$lowercase || !$number || strlen($data) < 8) {
                echo $code . "Password must contain at least 1 uppercase and lowercase letter and more than 8 characters long,";
                $GLOBALS['check'] = false;
            }
        }
    } else if ($type == 'Image') {
        if ($data == 'none') {
            echo $code . "National ID is required,";
            $GLOBALS['check'] = false;
        } else {
            $allowed =  'application/pdf';
            if ($conPass == $allowed) {
                echo $code . "Please submit you national ID as a <b style = 'color:red;'>PDF</b>,";
                $GLOBALS['check'] = false;
            }
        }
    }
}
$check = true;
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$uname = $_POST['uname'];
$Email = $_POST['Email'];
$password = $_POST['Password'];
$conpassword = $_POST['conPassword'];

validate($fname, 'String', '1');
validate($sname, 'String', '2');
validate($Email, 'Email', '3');
validate($uname, 'Username', '4');
validate($password, 'Password', '5', $conpassword);
//validate($nationalid, 'Image', '7',$NTYPE);
if (false) {
    /*
    $_SESSION['fname'] = $fname;
    $_SESSION['sname'] = $sname;
    $_SESSION['email'] = $Email;
    $_SESSION['username'] = $username;
*/
    $password2 = encrypt($password, '1234567891011121', 'WebProject');

    /*
    $sql = "select * from user where username = '$username' or email = '$email'";
    $result = mysqli_query($conn,$sql);
    $row_num = mysqli_num_rows($result);
   // if($num)
    */

    $sql = "select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row_num = mysqli_num_rows($result);
    if ($row_num > 0) {
        echo "4This Username is already in use please try a different one";
    } else {

        $sql2 = "INSERT into users (firstname,secondname,email,username,password,nationalId) VALUES ('$firstname','$secondname','$email','$username','$password2','$nationalid')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            $sql3 = "select * from users where username = '$username'";
            $result3 = mysqli_query($conn, $sql3);
            if ($result3 or die("error")) {
                $row = mysqli_fetch_assoc($result3);
                $_SESSION['user_id'] = $row['id'];
            }
            echo "9
            <div class='center' id = 'center'>
            <div class='content'>
            <div class='header'>
            <h2 style = 'text-align: center'>Success</h2>
            </div>
            <p>You have Signed Up Sucessfully</p>
            <div class='line'></div>
            <a href = 'login.php' onclick='change_id()' class = 'close-btn' > Close </a>
            </div>
            </div>";
        }
    }
}

?>