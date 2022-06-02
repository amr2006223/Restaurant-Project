<?php
function block($id, $conn)
{
    $sql = "select * from cashier where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($result) {
        $id2 = $row['firstname'];
        echo "
            <div class='center' id = 'center'>
            <div class='content'>
            <div class='head' style = '  height: 68px; background: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
            <h2 style = 'text-align: center'>$id2 was blocked</h2>
            </div>
            <div class = 'form-group'>
            <p></p>
            <br>
            <form action = '' method = 'post'>
            <label for='comment'>Please enter a comment:</label>
            <input type = text id = 'comment' name = 'comment' placeholder = 'comment' required>
            </div>
            <div class='line'></div>
            <input type = 'submit' onclick='change_id()' name = 'comment_sub' class = 'close-btn' value = 'Send'>
            </form>
            </div>
            </div>";
        $_SESSION['id'] = $id;
        $sql3 = "UPDATE cashier set status = '0' where id = $id";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3) {
            $date = date('d-m-y h:m:sa');
            $date2 = new DateTime($date);
            $stringDate = $date2->format('Y-m-d H:i:s');
            $sql2 = "INSERT INTO blocked(id,date)
                    VALUES ($id,'$stringDate');";
            $result2 = mysqli_query($conn, $sql2);
            if (!$result2) {
                echo "error";
            }
        }
    } else {
        echo "<script>alert('error in database or id was not found')</script>;";
    }
}
function unblock($id, $conn)
{
    $sql = "select * from cashier where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($result) {

        $_SESSION['id'] = $id;
        $sql3 = "UPDATE cashier set status = '1' where id = $id";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3) {
            $sql2 = "DELETE from blocked where id = '$id'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                $id2 = $row['firstname'];
                echo "
                <div class='center' id = 'center'>
                <div class='content'>
                <div class='head' style = '  height: 68px; background: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
                <h2 style = 'text-align: center'>$id2 was unblocked</h2>
                </div>
                <div class = 'form-group'>
                <p></p>
                <br>
                <form action = '' method = 'post'>
                </div>
                <div class='line'></div>
                <input type = 'submit' onclick='change_id()' name = 'sub' class = 'close-btn' value = 'close'>
                </form>
                </div>
                </div>";
            }
        } else {

            echo "<script>alert('error in database or id was not found')</script>;";
        }
    } else {
        echo "<script>alert('error in database or id was not found')</script>;";
    }
}
function data($id, $firstname, $secondname, $username, $status, $status1)
{
    echo " 
   <form action = '' method = 'post'>
   <tr class = '$id'>
    <td>$id</td>
    <td>$firstname</td>
    <td>$secondname</td>
    <td>$username</td>
    <td>$status1</td>
    <td><input type = 'submit' class = 'link' name = 'delete' value = 'Delete' ></td>
    <td><input type = 'submit'  color:black;' class = 'link' name = 'Edit' value = 'Edit'></td>
    <input type = 'hidden'  name = 'id' value = '$id'>";
    if ($status == 1) {
        echo "
    <td><input type = 'submit'  border:none; color:black;' class = 'block' name = 'block' value = 'block'></td>";
    } else {
        echo "
    <td><input type = 'submit'  color:black;' class = 'unblock' name = 'unblock' value = 'unblock'></td>";
    }
    echo "<td>
    <input type = 'submit'  color:black;' class = 'link' name = 'promote' value = 'promote'>
    </td>
    </tr>";
    echo "</form>";
}
function promote($id, $conn)
{
    $sql = "select * from cashier where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['firstname'];
        $sname = $row['secondname'];
        $uname = $row['username'];
        $pass = $row['password'];
        $status = $row['status'];
        if ($status == 0) {
            echo "
                <div class='center' id = 'center'>
                <div class='content'>
                <div class='head' style = 'height: 68px; background: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
                <h2 style = 'text-align: center'>Failure</h2>
                </div>
                <div class = 'form-group'>
                <p>unfourtunatly $fname couldn't be promoted because he is blocked </p>
                <br>
                <form action = '' method = 'post'>
                </div>
                <div class='line'></div>
                <input type = 'submit' onclick='change_id()' name = 'sub' class = 'close-btn' value = 'close'>
                </form>
                </div>
                </div>";
        } else {


            $sql2 = "insert into QualityControl (firstname,secondname,username,password) values ('$fname','$sname','$uname','$pass')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                echo "
                <div class='center' id = 'center'>
                <div class='content'>
                <div class='head' style = 'height: 68px; background: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
                <h2 style = 'text-align: center'>Success</h2>
                </div>
                <div class = 'form-group'>
                <p>$fname was promoted into a Quality Control</p>
                <br>
                <form action = '' method = 'post'>
                </div>
                <div class='line'></div>
                <input type = 'submit' onclick='change_id()' name = 'sub' class = 'close-btn' value = 'close'>
                </form>
                </div>
                </div>";

                $sql3 = "delete from cashier where id = '$id'";
                $result3 = mysqli_query($conn, $sql3);
                if ($result3) {
                } else {
                    echo "
                <div class='center' id = 'center'>
                <div class='content'>
                <div class='head' style = '  height: 70px;background-color: red; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
                <h2 style = 'text-align: center;  color:white;'>Error</h2>
                </div>
                <div class = 'form-group'>
                <p>$fname was demoted again due to an error</p>
                <br>
                <form action = '' method = 'post'>
                </div>
                <div class='line'></div>
                <a href = 'Admin.php'  onclick='change_id()' class = 'close-btn' value = 'close'>close</a>
                </form>
                </div>
                </div>";
                }
            }
        }
    }
}

function delete($id, $conn)
{
    $sql = "select * from cashier where id ='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['firstname'];
        echo "
        <div class='center' id = 'center'>
        <div class='content'>
        <div class='head' style = '  height: 68px; background: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
        <h2 style = 'text-align: center'>Warning</h2>
        </div>
        <div class = 'form-group'>
        <p>Are You sure u want to delete $fname</p>
        <br>
        <form action = '' method = 'post'>
        </div>
        <div class='line'></div>
        <input type = 'hidden' onclick='change_id()' name = 'id2' value = '$id'>
        <input type = 'submit' onclick='change_id()' name = 'delete2' class = 'yes-btn' value = 'Yes'>
        <input type = 'submit' onclick='change_id()' class = 'close-btn' value = 'No'>
        </form>
        </div>
        </div>";
    }
}
function encrypt($string,$enc_iv,$key){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $string2 = openssl_encrypt($string, $ciphering,
    $key, $options, $enc_iv);
    return $string2;
}
function decrypt($string,$dec_iv,$key){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $string2 = openssl_decrypt($string, $ciphering,
    $key, $options, $dec_iv);
    return $string2;
}
