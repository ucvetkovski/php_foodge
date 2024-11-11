<?php
if (isset($_POST['btnEditProfile'])) {
    include("../models/connection.php");
    include("../models/functions.php");
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $userID = $_POST['user'];


    $nameRegEx = '/^[A-Z][a-z]*(([,.] |[ \'-])[A-Za-z][a-z]*)*(\.?)$/';
    $mailRegEx = '/^[a-zA-Z0-9\.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/';
    $passRegEx = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    $addressRegEx = '/^[#.0-9a-zA-Z\s,-]+$/';
    $phoneRegEx = '/^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';
    $noValueRegEx = '/^$/';


    if (isset($password)) {
        if (preg_match($passRegEx, $password)) {
            $encryptedPassword = md5($password);
            if (preg_match($nameRegEx, $firstName) && preg_match($nameRegEx, $lastName) && preg_match($mailRegEx, $email) && isset($userID)) {
                $updateUserData = updateUserDataWithPass($firstName, $lastName, $email, $encryptedPassword, $userID);
                if ($updateUserData) {

                    $userAddress = getUserAddress($userID);
                    if ($userAddress) {
                        if ($address) {
                            $addressUpdated = updateUserAddress($address, $userID);
                        }
                    } else {
                        if (isset($address)) {
                            $addressAdded = addUserAddress($address, $userID);
                        }
                    }
                    if ($userAddress) {
                        if ($address == '') {
                            $addressRemoved = deleteUserAddress($address, $userID);
                        }
                    }


                    $userPhone = getUserPhoneNumber($userID);
                    if ($userPhone) {
                        if ($phoneNumber) {
                            $phoneUpdated = updateUserPhone($phoneNumber, $userID);
                        }
                    } else {
                        if (isset($phoneNumber)) {
                            $phoneAdded = addUserPhone($phoneNumber, $userID);
                        }
                    }
                    if ($userPhone) {
                        if ($phoneNumber == '') {
                            $phoneRemoved = deleteUserPhone($address, $userID);
                        }
                    }

                    $reply = ['reply' => "Changes saved."];
                    echo json_encode($reply);
                }
            }
        } else {
            if (preg_match($nameRegEx, $firstName) && preg_match($nameRegEx, $lastName) && preg_match($mailRegEx, $email) && isset($userID)) {
                $updateUserData = updateUserData($firstName, $lastName, $email, $userID);
                if ($updateUserData) {

                    $userAddress = getUserAddress($userID);
                    if ($userAddress) {
                        if ($address) {
                            $addressUpdated = updateUserAddress($address, $userID);
                        }
                    } else {
                        if (isset($address)) {
                            $addressAdded = addUserAddress($address, $userID);
                        }
                    }
                    if ($userAddress) {
                        if ($address == '') {
                            $addressRemoved = deleteUserAddress($address, $userID);
                        }
                    }


                    $userPhone = getUserPhoneNumber($userID);
                    if ($userPhone) {
                        if ($phoneNumber) {
                            $phoneUpdated = updateUserPhone($phoneNumber, $userID);
                        }
                    } else {
                        if (isset($phoneNumber)) {
                            $phoneAdded = addUserPhone($phoneNumber, $userID);
                        }
                    }
                    if ($userPhone) {
                        if ($phoneNumber == '') {
                            $phoneRemoved = deleteUserPhone($address, $userID);
                        }
                    }

                    $reply = ['reply' => "Changes saved."];
                    echo json_encode($reply);
                }
            }
        }
    }
} else {
    header("Location: http://127.0.0.1/PHP/foodge/models/404.php");
}
?>