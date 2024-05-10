<?php
session_start();
include ('./function.php');


$sender_id = $_GET['id'];

$value = 1;

if (isset($sender_id)) {

    $query = "SELECT is_active FROM message where sender_id= '$sender_id'";

    $res = mysqli_query($connection, $query);

    $data = mysqli_fetch_assoc($res);

    if ($data['is_active'] == $value) {

        $value = 0;

        $_SESSION['text']= "unblock";

    } else {
        $_SESSION['text']= "block";
       
    }

    $update_query = "UPDATE message set is_active = '$value' WHERE sender_id = '$sender_id'";

    $result = mysqli_query($connection, $update_query);

    if($result){
        header("location:http://localhost/chat_app/admin/list.php");
        exit;
    }

}

exit;




?>