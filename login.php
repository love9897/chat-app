<?php
session_start();
if(empty($_SESSION['user_id'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/chat_app/assest/vender/bootstrap/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        .error,
        .success {
            display: none;
        }
    </style>
</head>

<body>


    <div class="alert alert-success success"></div>

    <div class="container ">
        <div class="row">

            <div class="content-overflow">
                <form id="login_form">
                    <div class=" m-5">
                        <div class="row g-2">

                            <h1 class=mb-5>Login</h1>

                            <div class="col-6">
                                <input type="email" name="email" placeholder="Email" value=""
                                    class="form-control email">

                                <div class="alert alert-danger error error-email"></div>

                            </div>
                            <div class="col-6">
                                <input type="password" name="password" placeholder="Password" value=""
                                    class="form-control password">

                                <div class="alert alert-danger error error-password"> </div>
                            </div>


                            <div class="row g-2">
                                <div class=" col-6 ">
                                    <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <p class="">Dont have Account ? <a
                                        href="http://localhost/chat_app/register.php">Register</a>
                                </p>
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

<?php } else { header("location:http://localhost/chat_app/chat_page.php");} ?>