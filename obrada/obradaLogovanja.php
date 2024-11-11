<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if($_SESSION['sessionHolder']->activation_status == 1){

        include('../models/connection.php');
        include('../models/functions.php');


        try{
            $username = $_POST['username'];
            $password = $_POST['password'];

            $mailRegEx = '/^[a-zA-Z0-9\.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/';
            $passRegEx = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

            if(preg_match($mailRegEx,$username) && preg_match($passRegEx,$password)){
                $encryptedPassword = md5($password);

                $login = tryLogin($username,$encryptedPassword);
                if($login){
                    $_SESSION['sessionHolder'] = $login;
                    $reply = ["reply" => "index.php"];
                    echo json_encode($reply);
                    http_response_code(200);
                }
                else{
                    $reply = ["reply" => "Account with this email does not exist."];
                    echo json_encode($reply);
                    http_response_code(500);
                }
            }
        }

        catch(PDOException $exception){
            // $reply = ["reply" => "2 Account with this email doesn't exist."];
            // echo json_encode($reply);
            // http_response_code(500);
        }
    }
}
    else{
        header('Location: ../models/404.php');
    }
?>
