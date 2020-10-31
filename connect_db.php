<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "crud_db";

    $conn = mysqli_connect($severname,$username,$password,$db_name);

    if (!$conn){
       die("Connecttion failed" . mysqli_connect_error());
    }else{
  
    }

?>