<?php
session_start();
include ('../connection.php');
$ajax_response = new \stdClass;
$ajax_response->is_success = false;

$id = $_SESSION['user_id'] ?? false;

$mess = $_POST['message'];

$insert_query = "INSERT into `message` (`sender_id` ,`message_text`)values('$id','$mess')";

$result = mysqli_query($connection, $insert_query);

if ($result) {

    $ajax_response->is_success = true;

} else {

    $ajax_response->is_success = false;

}

print_r(json_encode($ajax_response));
exit;

?>