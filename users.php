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
    <link rel="stylesheet" href="homestyle.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- styles for this table -->
    <?php    session_start(); ?>
    
    <!-- function that dispaly table attributes of the database -->
</head>

<body>
    <?php
 
    include "Back End/php/CreateDb.php";
    include "Back End/php/functions.php";

    ?>
    <?php
    if (isset($_POST['delete'])) {
        delete($_POST['id'], $conn);
    }
    if (isset($_POST['Edit'])) {
        $_SESSION['id'] = $_POST['id'];
        header('location:Edit.php');
    }
    if (isset($_POST['block'])) {
        block($_POST['id'], $conn);
    }
    if (isset($_POST['unblock'])) {
        unblock($_POST['id'], $conn);
    }
    if (isset($_POST['promote'])) {
        promote($_POST['id'], $conn);
    }
    if (isset($_POST['comment_sub'])) {
        $comment = $_POST['comment'];
        $id = $_SESSION['id'];
        $sql = "UPDATE blocked SET Comment = '$comment' WHERE id = '$id';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
        } else {
            echo 'error';
        }
    }
    if (isset($_POST['delete2'])) {
        $id = $_POST['id2'];
        $sql2 = "select * from cashier where id = '$id'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            $row = mysqli_fetch_assoc($result2);
            $fname = $row['firstname'];
            $status = $row['status'];
            if ($status == 0) {
                $sql = "delete from blocked where id = '$id'";
                $result = mysqli_query($conn, $sql);
            }
            $sql = "delete from cashier where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {


                echo "
                <div class='center' id = 'center'>
                <div class='content'>
                <div class='head' style = '  height: 70px;background-color: orange; overflow: hidden; border-radius: 3px 3px 0 0; box-shadow: 0 2px 3px 0 rgba(0,0,0,.2);'>
                <h2 style = 'text-align: center;  color:white;'>Success</h2>
                </div>
                <div class = 'form-group'>
                <p style = 'text-align:center;'>cashier with name: $fname <br>is deleted successfully</p>
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
  
    ?>
    <?php include "Front End/nav.php" ?>
    <div class="row">
        <div class="col-md-3">
            Search <input class='bg-danger' type="text" id='input' placeholder="First Name or ID" onkeyup='tableSearch()'>
        </div>
        <div class="col-md-6 mt-5">
            <table class='table table-bordered' id='myTable'>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Second name</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Block</th>
                    <th>Promote</th>
                </tr>
                <?php
                $sql = "select * from cashier";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['status'] == 1) {
                            $status1 = 'Active';
                        } else {
                            $status1 = "blocked";
                        }
                        data($row['id'], $row['firstname'], $row['secondname'], $row['username'], $row['status'], $status1);
                    }
                }
                ?>
                <!-- <a href="#" style="text-decoration: none; color:red;">block</a> -->
            </table>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <script type="application/javascript">
        function tableSearch() {
            let input, filter, table, tr, td, txtvalue, td2, txtvalue2;
            input = document.getElementById('input');
            filter = input.value.toUpperCase();
            table = document.getElementById('myTable');
            tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[1];
                td2 = tr[i].getElementsByTagName('td')[0];
                if (td || td2) {
                    txtvalue = td.textContent || td.innerText;
                    txtvalue2 = td2.textContent || td2.innerText;
                    if (txtvalue.toUpperCase().indexOf(filter) > -1 || txtvalue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>