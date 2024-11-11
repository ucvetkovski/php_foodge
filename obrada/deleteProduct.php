<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include('../models/connection.php');
        include('../models/functions.php');

        try{

            $productId = $_POST['id'];

            $deleted = deleteProduct(intval($productId));

            if($deleted){
                http_response_code(200);
                $data = getProducts();
                echo json_encode($data);
            }
            else{
                $reply = ["reply" => "Something went wrong."];
                echo json_encode($reply);
                http_response_code(500);
            }
        }

        catch(PDOException $exception){
            $reply = ["reply" => "Something went wrong. Really wrong."];
            echo json_encode($reply);
            http_response_code(500);
        }
    }
    else{
        header('Location: ../models/404.php');
    }
?>