<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newdb";

    $conn = new mysqli($servername,$username,$password,$dbname);




function getData($tablename,$conn){
    
    $sql = "SELECT * FROM $tablename";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return($result);
    }


}
/*
 class CreateDb{

public $servername;
public $username;
public $password;
public $dbname;
public $tablename;
public $conn;

//create a  database or check if it exists and create a table inside it
function CheckDB($dbname1,$tablename1){
$servername = "localhost";
$username = "root";
$password = "";
this->dbname = $dbname1;
this->tablename = $tablename1;
this->conn = mysqli_connect($servername,$username,$password);

if(!this->conn) die("connection failed :". mysqli_connect_error());

$sql = "CREATE DATABASE IF NO EXIST $dbname";

if(mysqli_query(this->conn,$sql)){
this->conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "CREATE TABLE IF NOT EXIST $tablename (id int (11) NOT NULL PRIMARY KEY)";
}



}
*/


?>