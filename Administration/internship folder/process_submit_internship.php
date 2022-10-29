<?php
require("..\connection.php");

if (!isset($_SESSION)) {
    session_start();
}

$company_name=$_POST['cname'];
$location=$_POST['location'];
$slots=$_POST['slots'];
$deadline=$_POST['deadline'];
$duration=$_POST['duration'];
$qualification=$_POST['qualification'];
$description=$_POST['description'];
$company_logo = $_FILES['imageFile']['name'];
$product_img_tmp_name = $_FILES['imageFile']['tmp_name'];
$product_img_folder = "../images/" .$company_logo;




  $sql2="insert into internship_information (company_name,location,slots,deadline,duration,qualification,description,company_logo)
  values('$company_name','$location','$slots','$deadline','$duration','$qualification','$description','$product_img_folder')";
  
  if ($conn->query($sql2) === TRUE) {
    move_uploaded_file($product_img_tmp_name, $product_img_folder);
    header("location:post_internship.php"); 
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
 

  
  $conn->close();



?>