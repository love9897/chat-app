<?php
session_start();
include ('../connection.php');
$ajax_response = new \stdClass;
$ajax_response->is_success = false;
$html = "";


$query  = "SELECT 
message.message_text, 
message.create_date, 
message.sender_id,
users.first_name, 
users.file_name 
FROM message
INNER JOIN users 
on users.id = message.sender_id ";

$result = mysqli_query($connection, $query);
$data = [];
while ($output = mysqli_fetch_assoc($result)){
    $data[] =$output;
}
      

if ($result) {



    $ajax_response->is_success = true;
    $ajax_response->data = $data;

    ob_start();
      
    include('../chat_window.php');

    $html =  ob_get_clean();
    $ajax_response->html = $html;

} else {

    $ajax_response->is_success = false;

}

print_r(json_encode($ajax_response));
exit;

?>
