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
    <title>Foodge - Register</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
    ?>

    <div class="col-md-12" id="backLogReg">
        <div class="col-md-5 centerLogReg">
            <h1>Registration form</h1>
            <br/>
            <form class="form-control d-flex flex-column" id="regForm" action="" method="POST">
             <div id="response"></div>
                <div class="form-group">
                    <label for="firstName">Name:</label>
                    <input class="form-control" type="text" name="firstName" id="firstName" placeholder="Name"/>
                    <span id="firstNameError"></span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name"/>
                    <span id="lastNameError"></span>
                </div>
                <div class="form-group">
                <label for="email">E-mail:</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="something_like@this.com"/>
                    <span id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="pass">Enter Your password:</label>
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="******"/>
                    <span id="passError"></span>
                </div>
                <div class="form-group">
                    <label for="passCheck">Repeat Your password:</label>
                    <input class="form-control" type="password" name="passCheck" id="passCheck" placeholder="******"/>
                    <span id="passCheckError"></span>
                </div>
                <input type="button" id="regSubmit" class="btn btn-warning" value="Register"/>
                <span class="mt-4">Already have an account? <a href="login.php">Login here</a>.</span>
            </form>
        </div>
    </div>

    <?php
        include("pageElements/footer.php");
    ?>
    <script src="js/main.js"></script>
</body>
</html>