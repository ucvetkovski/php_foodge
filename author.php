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
    <title>About author</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
    ?>

    <div class="container">
            <div class="row d_flex justify-content-between about">
               <div class="col-md-7">
                     <h2>About Author</h2>
                     <p>Hello! <br/> My name is Uroš. I am an aspiring web developer.<br/>Currently a student at the ICT College of Vocational Studies.</p>
                     <p>Links to my other projects:</p>
                     <ul>
                        <li><a href="https://oor0sh.github.io/portfolio/" target="_blank">My Portfolio</a></li>
                        <li><a href="https://oor0sh.github.io/tellon.winery/" target="_blank">Tellon Winery</a></li>
                        <li><a href="https://oor0sh.github.io/himym/" target="_blank">How I Met Your Mother</a></li>
                        <li><a href="https://oor0sh.github.io/penguindrom/" target="_blank">Penguindrom</a></li>
                        <li><a href="https://oor0sh.github.io/infoFrame/" target="_blank">infoFrame</a></li>
                     </ul>
               </div>
               <div class="col-md-2">
                  <div class="about_img">
                     <figure><img src="assets/JA.JPG" alt="#"/></figure>
                     <p class="text-right">Index number : 38/21</p>
                  </div>
            </div>
         </div>
      </div>

    <?php
        include("pageElements/footer.php");
    ?>
    <script src="js/main.js"></script>
</body>
</html>