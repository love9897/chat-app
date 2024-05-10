<?php

foreach ($data as $key => $val) {


  ?>

  <div class="text-center "><span class="bg-primary datee">
      <?php 
      if ($key == date('Y-m-d')) {
        echo 'today';
      } else {
        if ($key == date('Y-m-d', strtotime("-1 days"))) {
          echo 'yesterday';
        }else{
         echo  $key;
        }
      }

      ?></span></div>

  <?php
  foreach ($val as $k => $v) {



    $class = 'left-msg';

    if ($v['sender_id'] == $_SESSION['user_id']) {

      $class = "right-msg";

    }




    ?>



    <div class="msg <?php echo $class; ?>">

      <div class="msg-img" style="background-image: url(http://localhost/chat_app/assest/upload/<?= $v['file_name'] ?>)">
      </div>

      <div class="msg-bubble">
        <div class="msg-info">

          <div class="msg-info-name"><?= $v['first_name'] ?></div>

          <div class="msg-info-time"> <?= date('h:i', strtotime($v['create_date'])); ?></div>
        </div>

        <div class="msg-text">
          <?= $v['message_text']; ?>
        </div>
      </div>
    </div>


    <?php
  }
}

?>