<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <script src="https://kit.fontawesome.com/81d2b053cd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Foodge - Login</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
    ?>

<div class="col-md-12" id="backLogReg">
        <div class="col-md-5">
            <h1>Login</h1>
            <br/>
            <form class="form-control d-flex flex-column" action="" method="POST">
                <div id="response"></div>
                <div class="form-group">
                <label for="loginEmail">E-mail:</label>
                    <input class="form-control" type="email" name="loginEmail" id="loginEmail" placeholder="E-mail"/>
                    <span id="loginEmailError"></span>
                </div>
                <div class="form-group">
                    <label for="loginPass">Password:</label>
                    <input class="form-control" type="password" name="loginPass" id="loginPass" placeholder="******"/>
                    <span id="loginPassError"></span>
                </div>
                <input type="button" class="btn btn-warning" id="btnLogin" value="Login"/>
                <span class="mt-4">Don't have an account? Create one <a href="registration.php">here</a>.</span>
            </form>

            <?php
                if(isset($_SESSION['sessionHolder'])){
                    $user = $_SESSION['sessionHolder'];
                    if($user['role_name'] == 'admin'){
                        echo ("<a href='admin.php'>Admin page</a>");
                    }
                    if($user['role_name'] == 'user'){
                        echo ("<a href='admin.php'>User page</a>");
                    }
                }
            ?>
        </div>
    </div>


    <?php
        include("pageElements/footer.php");
    ?>
    <script src="js/main.js"></script>
</body>
</html>