<?php
 
 require("../connection/connection.php");


 $faculty_id = $_POST["faculty_id"];
 $course_name = $_POST["course_name"];
 $course_capacity = $_POST["course_capacity"];

 $sql1="Select * FROM COURSES where course_name = '$course_name'";
 $result = mysqli_query($conn,$sql1);

 

 if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    header("location: create_course.php");

echo "This course already exists in the system. :)";

 }
}

 else{

$sql2 = "INSERT INTO COURSES (course_name, course_capacity, faculty_id) VALUES
('$course_name', '$course_capacity', '$faculty_id')";

 if(mysqli_query($conn,$sql2)){

 header("location: create_course.php");
 echo '<script>alert("New Record Created Successfully!")</script>';


 }

 else{

     echo"Error:" .$sql. "<br/>" .mysqli_error($conn);
 }

 }

?>