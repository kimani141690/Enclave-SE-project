<?php

$server="database-1.cqjxrkfej1rs.ap-northeast-1.rds.amazonaws.com";
$userName="admin";
$password="enclaveSE";
$database="enclave";

$conn = mysqli_connect($server,$userName,$password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>