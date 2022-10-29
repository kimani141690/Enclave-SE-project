<?php
require_once('../utils/upload.php');

if (isset($_POST)) {

    if (isset($_FILES)) {

        $image_file = $_FILES['image']['tmp_name'];
        $url = upload($image_file);
    } else {
        $url = "";
    }

    $tags = $_POST['tags'];

    include('../utils/db.php');
    $db = new Database();
    $title = mysqli_escape_string($db->conn, $_POST['title']);
    $text = mysqli_escape_string($db->conn, $_POST['text']);

    $tags = mysqli_escape_string($db->conn, $_POST['tags']);
    $query = "INSERT INTO enclave.DISCUSSION(`student_number`, `title`, `text`,`image`,`tags`) VALUES(134321,'$title','$text','$url','$tags');";

    $result = $db->executeQuery($query);
    if ($result = 1) {

        header("location:../index.php");
    } else {
        echo $db->get_error();
    }
}
