<?php

include ('./connection.php');
$sender_id = $_SESSION['user_id'];
$query = "SELECT is_active FROM message where sender_id = '$sender_id'";

$result = mysqli_query($connection, $query);

$data = mysqli_fetch_assoc($result);

if ($data['is_active'] == '1'){

?>

<form class="msger-inputarea">
  <input type="text" class="msger-input" placeholder="Enter your message...">
  <button type="submit" class="msger-send-btn">Send</button>
</form>

<?php } else{ ?>
   
   <div class="text-center">You are Blocked</div>
  
<?php }?>