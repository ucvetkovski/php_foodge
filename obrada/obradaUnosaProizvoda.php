<?php
    if(isset($_POST['btnAddProduct'])){
        session_start();
        header("Content-type: application/json");
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            include('../models/connection.php');
            include('../models/functions.php');

            try{
                $productName = $_POST['productName'];
                $productCategory = $_POST['productCategory'];
                $productPrice = $_POST['productPrice'];

                $nameRegEx = '/^[A-Z][a-z]*(([,.] |[ \'-])[A-Za-z][a-z]*)*(\.?)$/';
                $priceRegEx = '/([0-9]*[.])?[0-9]+/';

                if(preg_match($nameRegEx,$productName) && preg_match($priceRegEx,$productPrice) && $productCategory != 0){
                   $insertedProduct = insertProduct($productName,$productCategory,$productPrice);
                   if($insertedProduct){
                    $reply = ["reply" => "Product has been added."];
                    echo json_encode($reply);
                    http_response_code(201);
                   }
                }
            }

            catch(PDOException $exception){
                // $reply = ["reply" => "2 Account with this email doesn't exist."];
                // echo json_encode($reply);
                // http_response_code(500);
            }
        }
        else{
            $reply = ["reply" => "You do not have access to this page."];
            echo json_encode($reply);
            http_response_code(404);
        }
    }
    else{
        header('Location: ../models/404.php');
    }
?>
