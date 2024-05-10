<?php
session_start();

if(isset($_SESSION['user_id'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('./partials/head.php') ?>
  
</head>

<body id= "chat-app">

  <!--$%adsense%$-->
  <main class="cd__main">
    <!-- Start DEMO HTML (Use the following code into your project)-->
    <section class="msger">
      <?php include ('./partials/header.php') ?>

      <main class="msger-chat">
      
      </main>

     <?php include('./input_message.php') ?>
    </section>
    <!-- END EDMO HTML (Happy Coding!)-->

    <?php include('./profile_details.php')?>
    
  </main>


    <?php include ('./partials/footer.php') ?>
</body>

</html>

<?php }else { header("location:http://localhost/chat_app/login.php"); } ?>