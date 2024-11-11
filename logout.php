<?php
    session_start();
    if(isset($_SESSION['sessionHolder'])){
        unset($_SESSION['sessionHolder']);
        header("Location: index.php");
    }
?>