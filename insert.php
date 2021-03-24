<?php
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$conn = mysqli_connect("localhost", "root", "", "test") or die("The connection is failed");

 $sql = "INSERT INTO student(first_name, last_name) VALUES ('{$first_name}', '{$last_name}')";
 //$result = mysqli_query($conn, $sql) or die("The Query is failed");
if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}




?>