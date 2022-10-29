<?php

require("../connection.php");

if (!isset($_SESSION)) {
    session_start();
}

$id_num = $_POST['id_num'];
$password = $_POST['password'];

//salting and hashinh the new password
$salted="23456dxydb".$password."ffd4q567yah";
 $hashed=hash('sha512',$salted);

$sql_admin = "SELECT * FROM Administrator WHERE admin_id='$id_num' AND admin_password='$hashed' LIMIT 1";
$result1 = mysqli_query($conn, $sql_admin);

$sql_student = "SELECT * FROM student_details WHERE student_number='$id_num' AND student_password='$hashed' LIMIT 1";
$result2 = mysqli_query($conn, $sql_student);

$sql_lec = "SELECT * FROM LECTURER WHERE lecturer_id='$id_num' AND lec_password='$hashed' LIMIT 1";
$result3 = mysqli_query($conn, $sql_lec);

$sql_parent= "SELECT * FROM student_details WHERE student_number='$id_num' AND parent_password='$hashed' LIMIT 1";
$result4 = mysqli_query($conn, $sql_parent); 

if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);

    $_SESSION['admin_fname'] = $row['admin_fname'];
    $_SESSION['admin_sname'] = $row['admin_sname'];
    $_SESSION['admin_id'] = $row['admin_id'];
    // $_SESSION['admin_img'] = $row['admin_img'];

    header("location: ../admin_dashboard/admin_dashboard.php");

} else if (mysqli_num_rows($result2) == 1) {

    $row = mysqli_fetch_assoc($result2);

    $_SESSION['student_name'] = $row['student_fname'];
    $_SESSION['student_sname'] = $row['student_sname'];
    $_SESSION['student_number'] = $row['student_number'];
    $_SESSION['school_email'] = $row['school_email'];

    // $_SESSION['student_img'] = $row['student_img'];

    header("#");

} else if (mysqli_num_rows($result3) == 1) {

    $row = mysqli_fetch_assoc($result3);

    $_SESSION['lec_first_name'] = $row['lec_first_name'];
    $_SESSION['lec_last_name'] = $row['lec_last_name'];
    $_SESSION['lecturer_id'] = $row['lecturer_id'];

    header("#");
}
else if (mysqli_num_rows($result4) == 1) {

    $row = mysqli_fetch_assoc($result4);

    $_SESSION['student_number'] = $row['student_number'];
    $_SESSION['parent_fname'] = $row['parent_fname'];

    header("location:../parent/parent_page.php");
}
else
{
 echo"User not found :) Try again";
 header("location:login.php");

}