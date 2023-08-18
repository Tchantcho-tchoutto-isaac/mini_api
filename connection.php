<?php
$dbname="film";
$host="localhost";
$username="root";
$password="";

// connection à la BD 
$con=mysqli_connect($host,$username,$password,$dbname);
if(!$con){
    echo"Message: Impossible de se connecte à la BD";
    die();
}
else{
    echo"Message:connection reuissi";
}

?>