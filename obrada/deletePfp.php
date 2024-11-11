<?php
session_start();

    if(isset($_SESSION['sessionHolder'])){
        include("../models/connection.php");
        include("../models/functions.php");
        if(isset($_POST['btnRemovePfp'])){
            $userID = $_SESSION['sessionHolder']->user_id;

            $deletedPFP = deleteProfilePicture($userID);
            if($deletedPFP){
                $reply=['reply'=>"Profile picture removed."];
                echo json_encode($reply);
                http_response_code(200);
            }
            else{
                $reply=['reply'=>"There is nothing to remove."];
                echo json_encode($reply);
            }


        }
        else{
            header("Location: http://127.0.0.1/PHP/foodge/models/404.php");
        }
    }
    else{
        header("Location: http://127.0.0.1/PHP/foodge/models/404.php");
    }



?>