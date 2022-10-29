<?php
require('../utils/upload.php');
if(isset($_POST)){
    var_dump($_POST);

$text = $_POST['text'];
    $tags = $_POST['tags'];
    $tags = strtolower($tags);
    if(isset($_FILES['image'])){
        $image = $_FILES['image']['tmp_name'];
        $url = upload($image);
    }
    else{
        $url = '';
    }

    include('../utils/db.php');
    $db = new Database();

    $query = "INSERT INTO enclave.TALENT(`student_number`,`file`,`caption`,`tags`) VALUES (134321,'$url','$text','$tags');";
    $result = $db->executeQuery($query);
    if($result=1){
        header("location:../talent.php");
    }
    else{
        echo $db->get_error();
    }

}