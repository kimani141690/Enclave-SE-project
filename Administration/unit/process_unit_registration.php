<?php
 
 require("../connection/connection.php");


 $lecturer_id = $_POST["lecturer_id"];
 $unit_name = $_POST["unit_name"];
 $unit_capacity = $_POST["unit_capacity"]; 
 $course_id = $_POST["course_id"];


$sql = "INSERT INTO UNITS (lecturer_id, unit_name, unit_capacity, course_id) VALUES
('$lecturer_id', '$unit_name', '$unit_capacity', '$course_id')";

 if(mysqli_query($conn,$sql)){

 header("location: unit_registration.php");
 echo '<script> alert("New Record Created Successfully!") </script>';

 }

 else{

     echo"Error:" .$sql. "<br/>" .mysqli_error($conn);
 }



?>