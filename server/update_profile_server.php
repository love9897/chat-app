<?php
session_start();
include ('../connection.php');
include ('./file_server.php');
$id = $_SESSION['user_id'] ?? false;

$required = ['first_name', 'last_name', 'email', 'password', 'phone', 'pin_code'];

$error = [];

foreach ($required as $k => $v) {
    if (!isset($_POST[$v]) || empty($_POST[$v])) {
        $error[$v] = $v . " is required";
    }
}

$file_name = $_SESSION['file_name'];
$uniquename = null;

if (isset($file_name) && !empty($file_name)) {

    if (empty($_FILES['file']['name'])) {

        $uniquename = $file_name;

    }

} else {

    if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name'])) {

        $_SESSION['file_error'] = "Image file is required";

        header('location:http://localhost/chat_app/profile_edit.php');

    }
}

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$phone = $_POST['phone'];
$pin_code = $_POST['pin_code'];
$unique_name = '';

if (count($error) == 0 && empty($_SESSION['file_error'])) {

    
    $unique_name = $uniquename ?? fileupload();


    if (isset($unique_name) && !empty($unique_name)) {

        $update_query = "UPDATE users SET email = '$email',password = '$password',first_name = '$firstname', last_name = '$lastname',
    phone = '$phone', pin_code = '$pin_code', file_name =  '$unique_name' where id = '$id' ";


        $result = mysqli_query($connection, $update_query);
    

        if ($result) {

            $_SESSION['success'] = "update successfully";
            header('location:http://localhost/chat_app/profile_edit.php');

        } else {
            $_SESSION['error'] = "Profile Not updated";
            header('location:http://localhost/chat_app/profile_edit.php');
        }

    }

} else {

    $_SESSION['error'] = $error;
    header('location:http://localhost/chat_app/profile_edit.php');

}

exit;
?>