<?php
require_once('../connection/connection.php');

if (isset($_POST["reset"])) {

  $id_num = $_POST["id_num"];
  $new_password = $_POST["password"];

  //salting and hashinh the new password
  $salted = "23456dxydb" . $new_password . "ffd4q567yah";
  $hashed = hash('sha512', $salted);

  $sql1 = "SELECT lec_password FROM LECTURER WHERE lecturer_id=$id_num LIMIT 1";
  $result1 = mysqli_query($conn, $sql1);

  $sql2 = "SELECT student_password FROM student_details WHERE student_number=$id_num LIMIT 1";
  $result2 = mysqli_query($conn, $sql2);

  $sql3 = "SELECT admin_password FROM Administrator WHERE admin_id=$id_num LIMIT 1";
  $result3 = mysqli_query($conn, $sql3);

  if (mysqli_num_rows($result1) == 1) {

    $row = mysqli_fetch_assoc($result1);
    $old_password = $row["lec_password"];
    //comparing current and new password
    if ($old_password == $hashed) {

      echo "You can  not repeat existing password";
      header("location:reset_password.php");
    } else {
      //to change password
      $reset_password = "UPDATE LECTURER SET lec_password ='$hashed' WHERE lecturer_id =$id_num";
      if ($conn->query($reset_password) === TRUE) {
        echo "password updated successfully";
        header("location: ./login.php");

      }
    }

  } elseif (mysqli_num_rows($result2) == 1) {
    $row = mysqli_fetch_assoc($result2);
    $old_password = $row["student_password"];
    //comparing current and new password
    if ($old_password == $hashed) {

      echo "You can  not repeat existing password";
      header("location:reset_password.php");
    } else {
      //to change password
      $reset_password = "UPDATE student_details SET student_password ='$hashed' WHERE student_number =$id_num";
      if ($conn->query($reset_password) === TRUE) {
        echo "password updated successfully";
        header("location: ./login.php");

      }
    }

  } elseif (mysqli_num_rows($result3) == 1) {
    $row = mysqli_fetch_assoc($result3);
    $old_password = $row["admin_password"];
    //comparing current and new password
    if ($old_password == $hashed) {

      echo "You can  not repeat existing password";
      header("location:reset_password.php");
    } else {
      //to change password
      $reset_password = "UPDATE Administrator SET admin_password ='$hashed' where admin_id =$id_num";
      if ($conn->query($reset_password) === TRUE) {
        echo "password updated successfully";
        header("location: ./login.php");
      }
    }

  } else {

    echo "Record Not found";
  }
}
