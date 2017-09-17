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
<input type="text" name="user_query" placeholder="Search Vinyl">
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

      <div id="shopping_cart">
<span style= "float:right; font-size: 18px; padding:5px; line-height: 40px;">
  Welcome Guest! <b style="color:yellow">Shopping Cart -</b>Total items - Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
</span>
      </div>
<div id= "products_box">
<?php
if (isset($_GET['search'])){
$search_query = $_GET['user_query'];

$get_vin = "select * from vinyl where vinyl_artist like '%$search_query%'";
$run_vin = mysqli_query($con, $get_vin);

while($row_vin=mysqli_fetch_array($run_vin)){
  $vin_id = $row_vin['vinyl_id'];
  $vin_artist = $row_vin['vinyl_artist'];
  $vin_album = $row_vin['vinyl_album'];
  $vin_cat = $row_vin['vinyl_cat'];
  $vin_image = $row_vin['vinyl_image'];
  $vin_condition = $row_vin['vinyl_condition'];
  $vin_price = $row_vin['vinyl_price'];

  echo "<div id='single_product'>
        <h3>$vin_artist</h3>
        <img src='admin_area/vinyl_images/$vin_image' width='180' height='180' />
        <p><b> &euro; $vin_price</b></p>
        <a href='details.php?vin_id=$vin_id' style='float:left'>Details</a>

        <a href='index.php?vin_id=$vin_id'><button style='float:right'>Add to card</button></a>
        </div>";
}
}

 ?>


    </div>

</div>
<div id = "footer"><h2 style = " text-align:center; padding-top:30px;">&copy; 2017 by Marius Daugėla</h2> </div>
  </div>
</body>
</div>
</html>
