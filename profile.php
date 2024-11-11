<?php
    session_start();
?>

<?php
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
    <title>Foodge - User profile</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
        include("models/connection.php");
    ?>

    <div class="container">
            <div class="row d_flex justify-content-between about">
               <div class="col-md-6">
                    <?php
                        $user = $_SESSION['sessionHolder'];
                        $userContact = $connection->query("SELECT * FROM contactdata INNER JOIN users ON contactdata.user_id = users.user_id WHERE contactdata.user_id = $user->user_id")->fetch();
                        $userPhone = $connection->query("SELECT * FROM userphones INNER JOIN users ON userphones.user_id = users.user_id WHERE userphones.user_id = $user->user_id")->fetch();

                        echo("<input type='hidden' id='userID' name='$user->user_id' value='$user->user_id'>");
                        echo("<h3>Name: ".$user->firstName);
                        echo("<h3>Last name: ".$user->lastName);
                        echo("<h3>Email: ".$user->email);
                        if($userContact){
                        echo("<h3>Address: ".$userContact->address);
                        }
                        if($userPhone){
                            echo("<h3>Phone number: ".$userPhone->phoneNumber);
                            }
                        echo("<h3>Registration date: ".$user->registration_date);
                        echo("<br/><br/><br/><a href='editProfile.php'>Edit profile</a>");
                    ?>
               </div>

               <div class="col-md-4 profilePicture" style="background-image: url('http://127.0.0.1/PHP/foodge/upload/<?php $user = $_SESSION['sessionHolder']; echo($user->profile_picture) ?>'); background-size:contain; background-position:center; border-radius: 50%; background-repeat: no-repeat;">
               </div>
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