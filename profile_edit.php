<?php
session_start();
if (isset($_SESSION['user_id'])) {

    $success = null;
    $error = null;
    $email = null;
    $password = null;
    $firstname = null;
    $lastname = null;
    $phone = null;
    $pin_code = null;
    $file_error = null;
    $olddata = null ;


    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['file_error'])) {
        $file_error = $_SESSION['file_error'];
        unset($_SESSION['file_error']);
    }
    // if (isset($_SESSION['olddata'])) {
    //     $olddata = $_SESSION['olddata'];
    // }

    $id = $_SESSION['user_id'];
    include('./connection.php');

    $query =  "SELECT * from users where id = '$id'";

    $result = mysqli_query($connection, $query);

    $olddata = mysqli_fetch_assoc($result);

    $_SESSION['file_name'] =  $olddata['file_name'];


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/chat_app/assest/vender/bootstrap/css/bootstrap.min.css">
        <title>Profile</title>
        <style>
            img {
                height: 75px;
                width: 75px;
                border-radius: 50%;
            }
        </style>
    </head>

    <body>
        <?php
        if (isset($success) && $success) {
            ?>
            <div class="alert alert-success">
                <?= $success ?>
            </div>
            <?php
        }

        if (isset($error) && $error) {
            if (is_array($error) && $error) {
                foreach ($error as $k => $v) {
                    switch ($k) {
                        case 'email': {
                            $email = $v;
                            break;
                        }
                        case 'password': {
                            $password = $v;
                            break;
                        }
                        case 'first_name': {
                            $firstname = $v;
                            break;
                        }
                        case 'last_name': {
                            $lastname = $v;
                            break;
                        }
                        case 'phone': {
                            $phone = $v;
                            break;
                        }
                        case 'pin_code': {
                            $pin_code = $v;
                            break;
                        }
                    }
                }
            } else {
                ?>
                <div class="alert alert-danger"><?= $error; ?></div>

            <?php }
        }
        ?>

        <div class="container ">
            <div class="row">
                <div class="content-overflow">
                    <form action="./server/update_profile_server.php" method="POST" enctype="multipart/form-data">
                        <div class=" m-5">
                            <div class="row g-2">

                                <h1 class=mb-5>Profile</h1>

                                <div class="col-6">
                                    <input type="email" name="email" placeholder="Email" value="<?= $olddata['email'] ??false?>" class="form-control">
                                    <?php if(isset($email)){ ?> 
                                        <div class="alert alert-danger"><?= $email ?> </div> <?php } ?>

                                </div>

                                <div class="col-6">
                                    <input type="password" name="password" placeholder="Password" value="<?= $olddata['password'] ??false?>"
                                        class="form-control password">

                                        <?php if(isset($password) && !empty($password)){?> <div class="alert alert-danger"><?= $password ?> </div> <?php } ?>
                                </div>

                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="text" name="first_name" placeholder="First_name" value="<?= $olddata['first_name'] ??false?>"
                                            class="form-control first_name">
                                            <?php if(isset($firstname)){?> <div class="alert alert-danger"><?= $firstname ?> </div> <?php } ?>

                                    </div>

                                    <div class="col-6">
                                        <input type="text" name="last_name" placeholder="Last_name" value="<?= $olddata['last_name'] ??false?>"
                                            class="form-control last_name">

                                            <?php if(isset($lastname)){?> <div class="alert alert-danger"><?= $lastname ?> </div> <?php } ?>

                                    </div>

                                    <div class="col-6 ">
                                        <input type="text" name="phone" placeholder="Phone" value="<?= $olddata['phone'] ??false?>"
                                            class="form-control phone">

                                            <?php if(isset($phone)){?> <div class="alert alert-danger"><?= $phone ?> </div> <?php } ?>

                                    </div>

                                    <div class="col-6 ">
                                        <input type="text" name="pin_code" placeholder="pin_code" value="<?= $olddata['pin_code'] ??false?>"
                                            class="form-control pin_code">

                                            <?php if(isset($pin_code)){?> <div class="alert alert-danger"><?= $pin_code ?> </div> <?php } ?>
                                    </div>


                                    <div class="row g-2">
                                        <div class="col-6 ">
                                            <img src="http://localhost/chat_app/assest/upload/<?=  $olddata['file_name'] ?? 'default.png' ?>"
                                                class="img-responsive" alt="image">
                                            <label for="">Profile Image</label>
                                            <input type="file" name="file" class="form-control">

                                            <?php if(isset($file_error)){?> <div class="alert alert-danger"><?= $file_error ?> </div> <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-2 ">
                                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                                        </div>

                                        <div class="col-2">
                                            <a class="btn btn-primary"
                                                href="http://localhost/chat_app/chat_page.php">close</a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        <footer class="fixed-bottom conatiner-lg bg-body-tertiary text-center">


            <div class="text-center p-3 bg-dark" style="color:white;">
                © 2024 Copyright:
                <a class="text-body" href="#">Example.com</a>
            </div>
        </footer>

        <script src="http://localhost/chat_app/assest/vender/bootstrap/js/bootstrap.min.js"></script>

    </body>


    </html>

<?php } else {
    header("location:http://localhost/chat_app/login.php");
} ?>