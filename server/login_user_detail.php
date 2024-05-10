<?php
session_start();
include ('../connection.php');
$ajax_response = new \stdClass;
$ajax_response->is_success = false;

$id = $_SESSION['user_id'] ?? false;

if ($id) {

    $ajax_response->is_success = true;

    $query = "SELECT * from users where id = '$id'";

    $result = mysqli_query($connection, $query);

    $data = mysqli_fetch_assoc($result);

    $ajax_response->logedin_userData = $data;

} else {
    $ajax_response->is_success = false;
}


print_r(json_encode($ajax_response));
exit;










?>