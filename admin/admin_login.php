<?php
session_start();
$success = null;
    $error = null;
    $email = null;
    $password = null;
    $olddata= [];

    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['olddata'])) {
        $olddata = $_SESSION['olddata'];
        unset($_SESSION['olddata']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/chat_app/assest/vender/bootstrap/css/bootstrap.min.css">
    <title>Admin Login</title>
    
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
                        
                    }
                }
            } else {
                ?>
                <div class="alert alert-danger"><?= $error; ?></div>

            <?php }
        }
        ?>


    <div class="alert alert-success success"></div>

    <div class="container ">
        <div class="row">

            <div class="content-overflow">
                <form  method="POST" action="http://localhost/chat_app/admin/server/admin_server.php" >
                    <div class=" m-5">
                        <div class="row g-2">

                            <h1 class=mb-5>Admin Login</h1>

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
                                <div class=" col-6 ">
                                    <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
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
    <script src="http://localhost/chat_app/assest/js/jquery.js"></script>
    <script src="http://localhost/chat_app/assest/js/script.js"></script>

</body>


</html>