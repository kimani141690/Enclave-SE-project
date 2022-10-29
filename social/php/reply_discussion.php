<?php
if(isset($_POST)){
    $reply = $_POST['reply'];
    $disc_id = $_POST['disc_id'];
    include("../utils/db.php");

    $db = new Database();
    $query = "INSERT INTO DISCUSSION_COMMENT(discussion,student_number,text) VALUES($disc_id,134321,'$reply')";
    $result = $db->executeQuery($query);
    if($result=1){
        header("location:../forum.php?id=$disc_id");
    }
    else{
        $db->get_error();
    }
}