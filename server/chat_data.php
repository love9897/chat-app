<?php
session_start();
include ('../connection.php');
$ajax_response = new \stdClass;
$ajax_response->is_success = false;
$html = "";


$query  = "SELECT 
DATE(message.create_date) AS message_date,
message.create_date,
message.message_text, 
message.sender_id,
users.first_name, 
users.file_name 
FROM message
INNER JOIN users 
on users.id = message.sender_id
ORDER by message_date ASC";

$result = mysqli_query($connection, $query);
$row = mysqli_num_rows($result);
$data = [];
$output = [];
while ($output = mysqli_fetch_assoc($result)){
    $data[$output['message_date']][] = $output;
}   
// echo "<pre>"; print_r($data); echo "</pre>";die;


if ($result) {

    

    $ajax_response->is_success = true;
    $ajax_response->data = $data;

    ob_start();
      
    include('../chat_window.php');

    $html =  ob_get_clean();
    $ajax_response->html = $html;
    $ajax_response ->count= $row;

} else {

    $ajax_response->is_success = false;

}

print_r(json_encode($ajax_response));
exit;

?>
