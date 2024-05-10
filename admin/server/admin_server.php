<?php
session_start();

include('../server/function.php');


$required = ['email', 'password'];

$error = [];

foreach ($required as $k => $v) {
    if (!isset($_POST[$v]) || empty($_POST[$v])) {
        $error[$v] = $v . " is required";
    }
}


$email = $_POST['email'];
$password = $_POST['password'];



if (count($error) == 0) {


    if($email == admin_email && $password == admin_password){

        $_SESSION['is_admin'] = true;
        $_SESSION['success'] = "Admin login successfully";
        header("location:http://localhost/chat_app/admin/list.php");
    } else{
        $_SESSION['error']  = "Email and password not valid";
        header("location:http://localhost/chat_app/admin/admin_login.php");

        


    }

} else {

    $_SESSION['error'] = $error;
    $_SESSION['olddata']  = $_POST;
    header("location:http://localhost/chat_app/admin/admin_login.php");


}
exit;



?>