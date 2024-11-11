<?php
    session_start();
    if(isset($_SESSION['sessionHolder'])):
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
    <title>Foodge - Edit profile</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
        include("models/connection.php");
    ?>
    <?php
            $user = $_SESSION['sessionHolder'];
            $userContact = $connection->query("SELECT * FROM contactdata INNER JOIN users ON contactdata.user_id = users.user_id WHERE contactdata.user_id = $user->user_id")->fetch();
    ?>
    <div class="col-md-12" id="backLogReg">
        <div class="col-md-5 centerLogReg">
            <br/>
            <form class="form-control d-flex flex-column" id="editForm" method="POST" enctype="multipart/form-data">
            <?php echo("<input type='hidden' id='userID' name='$user->user_id' value='$user->user_id'>")?>
             <div id="response"></div>
                <div class="form-group">
                    <label for="firstName">Name:</label>
                    <input class="form-control" type="text" id="e-firstName" value="<?php echo($user=$_SESSION['sessionHolder']->firstName)?>"/>
                    <span id="firstNameError"></span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="e-lastName" value="<?php echo($user=$_SESSION['sessionHolder']->lastName)?>"/>
                    <span id="lastNameError"></span>
                </div>
                <div class="form-group">
                <label for="email">E-mail:</label>
                    <input class="form-control" type="email" id="e-email" value="<?php echo($user=$_SESSION['sessionHolder']->email)?>"/>
                    <span id="emailError"></span>
                </div>
                <div>
                <label for="address">Address:</label>
                    <input class="form-control" type="text" id="address" value="<?php if(isset($userContact->address)){echo($userContact->address);}?>"/>
                    <span id="addressError"></span>
                </div>
                <div>
                <label for="phoneNumber">Phone number:</label>
                    <input class="form-control" type="text" id="phoneNumber" value="<?php if(isset($userContact->phoneNumber)){echo($userContact->phoneNumber);}?>"/>
                    <span id="phoneNumberError"></span>
                </div>
                <div class="form-group">
                    <label for="pass">Enter Your new password:</label>
                    <input class="form-control" type="password" id="e-pass" placeholder="******"/>
                    <span id="passError"></span>
                </div>
                <div class="form-group">
                    <label for="passCheck">Repeat Your password:</label>
                    <input class="form-control" type="password" id="e-passCheck" placeholder="******"/>
                    <span id="passCheckError"></span>
                </div>
                <div class="form-group">
                    <label for="profilePictureUpload">Upload profile picture:</label>
                    <input class="form-control" type="file" id="file" name="file"/>
                </div>
                <?php
                if($_SESSION['sessionHolder']->profile_picture != 'profilePH.png'){
                echo("<div class='form-group'>
                    <input type='button' id='removePfp' class='form-control btn btn-outline-danger' value='Remove profile picture.'/>
                </div>");
                }
                ?>
                <input type="button" id="editProfileSubmit" class="btn btn-warning" value="Save changes"/>
            </form>
        </div>
    </div>

    <?php
        include("pageElements/footer.php");
    ?>
    <script src="js/main.js"></script>
</body>
</html>
<?php
    endif;
?>
<?php
    if(!isset($_SESSION['sessionHolder'])){
        header("Location: http://127.0.0.1/PHP/foodge/models/404.php");
    }
?>