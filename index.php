<!DOCTYPE html>
<?php
include("functions/functions.php")
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel = "stylesheet" href ="styles/style.css" media = "all" />
</head>
<body>

  <div class = "main_wrapper">
<div class="header_wrapper">

  <img id = "logo" src = "images/header.png">

</div>
<div class= "menubar">

  <ul id ="menu">
    <li><a href="index.php">Home</li>
    <li><a href="all_products.php">Vinyls</li>
    <li><a href="cart.php">Shopping Cart</li>

  </ul>

  <div id="form">
    <form method="get" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Search Artist">
<input type ="submit" name="search" value="Search">
    </form>
  </div>


</div>

<div class="content_wrapper">

    <div id = "sidebar">
<div id = "sidebar_title">Categories</div>

<ul id ="cats">
<?php getCats();?>
</ul>
    </div>

    <div id = "content_area">
<?php cart(); ?>
      <div id="shopping_cart">
<span style= "float:right; font-size: 18px; padding:5px; line-height: 40px;">
  Welcome Guest! <b style="color:yellow">Shopping Cart -</b>Total items: <?php  total_items(); ?>  Total Price:<?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
</span>
      </div>

<div id= "products_box">
<?php getVin(); ?>
<?php getCatVin(); ?>
    </div>

</div>
<div id = "footer"><h2 style = " text-align:center; padding-top:30px;">&copy; 2017 by Marius Daugėla</h2> </div>
  </div>
</body>
</div>
</html>
