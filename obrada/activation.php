<?php

include('../models/functions.php');
include('../models/connection.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $query = "UPDATE users SET activation_status='1' where token='$token'";
    if($db->query($query)){
        header("Location:index.php?success=Account Activated!!");
        exit();
    }
    
}

?>