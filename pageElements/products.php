<?php
       include('models/connection.php');

       $products = $connection->query("SELECT * FROM products");
       $categories = $connection->query("SELECT * FROM categories");

       echo("<div class='col-md-10 mt-5 center'><h1 class='display-3 text-center'>Menu</h1></div>");
       echo("<div class='col-md-5 mt-5 center'><h2 class='display-5 text-center'>What will it be today?</h2></div>");
       echo("<div class='col-md-4 mt-5 center text-center'><input class='form-control' type='text'/ placeholder='Search..'></div>");

       echo("<div class='col-md-4 mt-5 center d-flex justify-content-around' id='menuCategories'>
       <div class='bd-highlight' id='menuCategoriesList'>");
       
       while ($row = $categories->fetch()) {
        echo ("<button type='button' id='$row->id' class='btn btn-outline-warning categoryItem m-2'>$row->category_name</button>");
    }
     echo("</div></div>");
    echo("<div class='col-md-10 mt-5' id='menu'>
    <div class='row center' id='menuItems'>");

       
       while ($row = $products->fetch()) {
        echo ("<div class='card' style='width: 18rem; margin: 10px'>
        <img class='card-img-top' src='$row->image' alt='Card image cap'>
        <div class='card-body'>
          <h3 class='card-title'>$row->product_name</h3>
          <p class='card-text'>Price: $$row->price</p>
          <a href='#' class='btn btn-warning'>Add to cart</a>
        </div></div>");
    }
        echo("</div></div>");
?>