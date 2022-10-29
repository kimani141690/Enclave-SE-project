<?php
require_once('../connection.php');

if(isset($_POST['submitBtn']))
{
$password=$_POST['password'];
$student_num=$_POST['student_num'];

 //password salting and hashing
 $salted="23456dxydb".$password."ffd4q567yah";
 $hashed=hash('sha512',$salted);




$sql="UPDATE student_details SET parent_password ='$hashed' where student_number =$student_num ";

if ($conn->query($sql) === TRUE) {
  header("location:../login/login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

  }

  $conn->close();

}

