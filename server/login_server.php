<?php
session_start();
include ('../connection.php');
$ajax_response = new \stdClass();

$ajax_response->is_success = false;

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


    $login_query = "SELECT * FROM users where email = '$email' &&  password = '$password'";

    $res = mysqli_query($connection, $login_query);

    $data = mysqli_fetch_assoc($res);

    $row = mysqli_num_rows($res);

    if($row > 0){

        $ajax_response->is_success = true;
        // $_SESSION['olddata']  = $data;
        $_SESSION['user_id'] = $data['id'];
        

    }else{

        $ajax_response->is_success = false;
        $ajax_response->error_message = "Email and password not valid";

    }


} else {
    $ajax_response->is_success = false;

    $ajax_response->error = $error;

}


print_r(json_encode($ajax_response));
exit;


?>