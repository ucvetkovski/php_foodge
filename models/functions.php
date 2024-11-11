<?php
    function addUser($firstName,$lastName,$email,$encryptedPassword,$token){
        global $connection;

        $query = "INSERT INTO users(firstName,lastName,email,password,role_id,$token) VALUES (:firstName,:lastName,:email,:password,:role)";

        $userRoleId = 2;
        $standby = $connection->prepare($query);
        $standby->bindParam(':firstName',$firstName);
        $standby->bindParam(':lastName',$lastName);
        $standby->bindParam(':email',$email);
        $standby->bindParam(':password',$encryptedPassword);
        $standby->bindParam(':role',$userRoleId);

        $message = "Hello $firstName! You have successfully created your Foodge account! Here is the activation link http://localhost/registration/activate.php?token=$token";
        
        mail($email , 'Activate Account' , $message , 'From: foodge@foodmart.com');

        $execution = $standby->execute();
        return $execution;
    }

    function tryLogin($username,$encryptedPassword){
        global $connection;

        $query = "SELECT * FROM users JOIN userroles ON users.role_id = userroles.role_id WHERE users.email = :username AND users.password = :password";

        $standby = $connection->prepare($query);
        $standby->bindParam(':username',$username);
        $standby->bindParam(':password',$encryptedPassword);
        
        $standby->execute();
        
        $execution = $standby->fetch();
        return $execution;
    }

    function getCategories(){
        global $connection;

        $query = "SELECT * FROM categories";

        $categories = $connection->query($query)->fetchAll();

        return $categories;
    }

    function insertProduct($productName,$productCategory,$productPrice){
        global $connection;

        $query = "INSERT INTO products(product_name,category_id,price) VALUES (:productName,:productCategory,:productPrice)";

        $standby = $connection->prepare($query);
        $standby->bindParam(":productName",$productName);
        $standby->bindParam(":productCategory",$productCategory);
        $standby->bindParam(":productPrice",$productPrice);

        $execution = $standby->execute();
        return $execution;
    }

    function getDBTableNames(){
        global $connection;

        $query = "SHOW TABLES";
        $tables = $connection->query($query)->fetchAll(PDO::FETCH_NUM);
        return $tables;
    }

    function getProducts(){
        global $connection;

        $query = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id";
        $data = $connection->query($query)->fetchAll();
        return $data;
    }

    function getProductsByCategory($catId){
        global $connection;

        $query = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id WHERE category_id = $catId";
        $data = $connection->query($query)->fetchAll();
        return $data;
    }

    function deleteProduct($productId){
        global $connection;

        $query = "DELETE FROM `products` WHERE product_id = :productId";
        $standby = $connection->prepare($query);
        $standby->bindParam(":productId",$productId);

        $execution = $standby->execute();
        return $execution;

    }

    function displayData($products){
        global $editIcon;
        global $deleteIcon;
        echo("<table class='table'>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>");
            $productNum = 1;
            foreach($products as $product){
                echo("
                <tr>
                    <td>$productNum</td>
                    <td>$product->product_name</td>
                    <td>$product->category_name</td>
                    <td>$product->price</td>
                    <td>$editIcon</td>
                    <td><a href='#' class='deleteProduct' data-productId='$product->product_id'>$deleteIcon</td>
                </tr>");
                $productNum++;
            }
    echo("</table>");
 }

 function updateUserData($firstName,$lastName,$email,$userID){
    global $connection;

    $query = "UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":firstName",$firstName);
    $standby->bindParam(":lastName",$lastName);
    $standby->bindParam(":email",$email);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function updateUserDataWithPass($firstName,$lastName,$email,$encryptedPassword,$userID){
    global $connection;

    $query = "UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, password = :password WHERE user_id = :userID";


    $standby = $connection->prepare($query);
    $standby->bindParam(":firstName",$firstName);
    $standby->bindParam(":lastName",$lastName);
    $standby->bindParam(":email",$email);
    if(isset($encryptedPassword)){
    $standby->bindParam(":password",$encryptedPassword);
    }
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function getUserAddress($userID){
    global $connection;

    $query = "SELECT address FROM users INNER JOIN contactdata ON users.user_id = contactdata.user_id WHERE contactdata.user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(':userID',$userID);

    $standby->execute();
        
    $execution = $standby->fetch();
    return $execution;
    
    // $execution = $standby->execute();
    // return $execution;
}


function addUserAddress($address,$userID){
    global $connection;
    
    $query = "INSERT INTO contactdata(address,user_id) VALUES (:address,:userID)";

    $standby = $connection->prepare($query);
    $standby->bindParam(":address",$address);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function updateUserAddress($address,$userID){
    global $connection;

    $query = "UPDATE contactdata SET address = :address WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":address",$address);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function deleteUserAddress($address,$userID){
    global $connection;

    $query = "DELETE FROM contactdata WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}
function getUserPhoneNumber($userID){
    global $connection;

    $query = "SELECT phoneNumber FROM users INNER JOIN userphones ON users.user_id = userphones.user_id WHERE userphones.user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(':userID',$userID);

    $standby->execute();
        
    $execution = $standby->fetch();
    return $execution;
    
    // $execution = $standby->execute();
    // return $execution;
}

function addUserPhone($phoneNumber,$userID){
    global $connection;
    
    $query = "INSERT INTO userphones(phoneNumber,user_id) VALUES (:phoneNumber,:userID)";

    $standby = $connection->prepare($query);
    $standby->bindParam(":phoneNumber",$phoneNumber);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function updateUserPhone($phoneNumber,$userID){
    global $connection;

    $query = "UPDATE userphones SET phoneNumber = :phoneNumber WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":phoneNumber",$phoneNumber);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function deleteUserPhone($phoneNumber,$userID){
    global $connection;

    $query = "DELETE FROM userphones WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function getProfilePicture($userID){
    global $connection;

    $query = "SELECT profile_picture FROM users WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(':userID',$userID);

    $standby->execute();
        
    $execution = $standby->fetch();
    return $execution;
}

function updateProfilePicture($profilePicture,$userID){
    global $connection;

    $query = "UPDATE users SET profile_picture = :picture WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":picture",$profilePicture);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}

function deleteProfilePicture($userID){
    global $connection;

    $query = "UPDATE users SET profile_picture = 'profilePH.png' WHERE user_id = :userID";

    $standby = $connection->prepare($query);
    $standby->bindParam(":userID",$userID);

    $execution = $standby->execute();
    return $execution;
}