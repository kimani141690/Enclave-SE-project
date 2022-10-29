<?php
require_once('../connection/connection.php');

if(isset($_POST['submitBtn']))
{
$fname=$_POST['fname'];
$sname=$_POST['sname'];
$user=$_POST['user'];

//generating user password
 //=========================================================================================


$upp_case="ABCBEFGHIJKLMNOPQRSTUVWXYZ";
$lower_case="abcdefghijklmnopqrstuvwxyz";
$numbers="0123456789";
$special_char="!@#$%*?";

$generate_upp_case=substr(str_shuffle($upp_case),0,2);
$generate_lower_case=substr(str_shuffle($lower_case),0,2);
$generate_numbers=substr(str_shuffle($numbers),0,2);
$generate_special_char=substr(str_shuffle($special_char),0,2);

//combining generated characters to form a password

$mixed="$generate_upp_case$generate_lower_case$generate_numbers$generate_special_char";


//randomising password
 $generated_mixed=substr(str_shuffle($mixed),0,8);
echo $generated_mixed;

 //password salting and hashing
 $salted="23456dxydb".$generated_mixed."ffd4q567yah";
 $hashed=hash('sha512',$salted);

 //echo$hashed;

 //=========================================================================================

//creating user email
//-----------------------------------

$email=$fname.".".$sname."@enclave.edu";
echo$email;

if($user=="student"){
$sql="INSERT INTO student_details  (student_fname,student_sname,school_email,student_password) values('$fname','$sname','$email','$hashed')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
    // $alert = "<script>alert('New record created successfully!');</script>";
    // echo $alert;
    header("location:../user_account/create_user.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

elseif($user=="lecturer"){
  $sql2="INSERT INTO LECTURER  (lec_first_name,lec_last_name,lec_school_email,lec_password) values('$fname','$sname','$email','$hashed')";
  
  if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
    // $alert = "<script>alert('New record created successfully!');</script>";
    // echo $alert;
    header("location:../user_account/create_user.php");

  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
  }

  
  
elseif($user=="admin"){
  $sql3="INSERT INTO Administrator (admin_fname,admin_sname,admin_email,admin_password) values('$fname','$sname','$email','$hashed')";
  
  if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
    // $alert = "<script>alert('New record created successfully!');</script>";
    // echo $alert;
    header("location:../user_account/create_user.php");
    
    
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }
  }


  $conn->close();


}

