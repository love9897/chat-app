<?php
include ('../connection.php');
include('./file_server.php');
$ajax_response = new \stdClass();

$ajax_response->is_success = false;

$required = ['first_name', 'last_name', 'email', 'password', 'phone', 'pin_code'];

$error = [];

foreach ($required as $k => $v) {
    if (!isset($_POST[$v]) || empty($_POST[$v])) {
        $error[$v] = $v . " is required";
    }
}



$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$phone = $_POST['phone'];
$pin_code = $_POST['pin_code'];


if (count($error) == 0) {


    $email_query = "SELECT * FROM users where email = '$email'";

    $res = mysqli_query($connection, $email_query);

    $row = mysqli_num_rows($res);

    if ($row > 0) {

        $ajax_response->email_validate = "email already present";

    } else {

        $insert_query = "INSERT into users (`email` , `password`, `first_name` , `last_name`, `phone`, `pin_code`)values('$email','$password','$firstname', '$lastname', '$phone', '$pin_code')";

        $result = mysqli_query($connection, $insert_query);

        if ($result) {

            $ajax_response->is_success = true;

        } else {

            $ajax_response->is_success = false;

        }
    }

} else {
    $ajax_response->is_success = false;

    $ajax_response->error = $error;

}


print_r(json_encode($ajax_response));
exit;


?>