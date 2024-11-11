<?php
    session_start();
    if(isset($_SESSION['sessionHolder']) && $_SESSION['sessionHolder']->role_name == "admin"):
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
    <title>Foodge - Admin Panel</title>
</head>
<body>
    <?php
        include("pageElements/header.php");
        include("models/connection.php");
        include("models/functions.php");
        $categories = getCategories();
        // $tables = getDBTableNames();
        $products = getProducts();
        $editIcon = '<i class="fa-solid fa-pen-to-square"></i>';
        $deleteIcon = '<i class="fa-solid fa-trash"></i>';
    ?>


    <div class="container">
            <div class="row about">
               <div class="col-md-12 text-center mb-5">
                     <h2>Admin Panel Page</h2>
                <br/>
               <?php
                    echo("<h2>Welcome " . $_SESSION['sessionHolder']->firstName . "!");
                ?>
               </div>
               <!-- <div class="col-md-6 center text-center"> 
               <select id="tableSelect">
                <option value=0>Choose a table</option>
                //<php
                    // foreach($tables as $table){
                    //     echo("<option value=".$table[0].">".$table[0]."</option>");
                    // }
                ?>
               </select>
                </div> -->

                <div id="productsDiv">
               <div class="col-md-8 center text-center">
                    <input type="button" class="btn btn-warning" id="addProdBtn" value="Add product to database"/>
                    <input type="button" class="btn btn-warning" id="alterProdBtn" value="Products"/>
               </div>
                
               <div id="response"></div>

               <div class="col-md-8 center text-center mt-5" id="addProdDiv">
                   <form class="form-control" action="obrada/obradaUnosaProizvoda.php" method="POST">
                        <div class="form-group d-flex flex-row">
                            <label for="productName">Product name:</label>
                            <input class="form-control mt-2" type="text" placeholder="Product name" id="productName"/>
                        </div>
                        <span id="productNameError"></span>
                        <div class="form-group d-flex flex-row">
                            <label for="catSel">Product category:</label>
                            <select  id="catSel" class="form-control mt-2">
                                <option id="value0" value='0'>Choose a category</option>
                                <?php
                                foreach($categories as $category){
                                    echo("<option value='".$category->id."'>".$category->category_name."</option>");
                                }
                                ?>
                            </select>
                        </div>
                        <span id="productCategoryError"></span>
                        <div class="form-group d-flex flex-row">
                            <label for="productPrice">Product price:</label>
                            <input class="form-control mt-2" id="productPrice" type="text" placeholder="Product price"/>
                        </div>
                        <span id="productPriceError"></span>
                        <div class="form-group">
                            <input type="button" class="btn btn-warning" id="btnAddProduct" value="Commit"/>
                        </div>
                    </form>
               </div>

               <div class="col-md-8 center text-center mt-5" id="alterProdDiv">
                    <?php 
                        if(count($products) != 0){
                            ?>
                        <?php
                            displayData($products);
                        ?>
                        <?php
                        }
                        else{
                            echo("<h2 class='alert alert-danger my-3'>No data found.</h2>");
                        }
                    ?>
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
<?php
endif;
?>
<?php
    if(isset($_SESSION['sessionHolder']) && $_SESSION['sessionHolder']->role_name == "user"){
        header("Location: models/403.php");
    }
?>