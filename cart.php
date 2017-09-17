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
  <br>
<form action = "" method ="post" enctype="multipart/form-data">
<table align="center" width="700" bgcolor="skyblue">

  <tr align = "center">
    <th>Remove</th>
    <th>Product(s)</th>
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>

  <?php
  $total = 0;

  global $con;

  $ip = getIp();

  $sel_price = "select * from cart where ip_add = '$ip'";

  $run_price = mysqli_query($con, $sel_price);

  while ($p_price=mysqli_fetch_array($run_price)){

    $vin_id = $p_price['v_id'];
    $vin_price = "select * from vinyl where vinyl_id ='$vin_id'";

    $run_vin_price = mysqli_query($con, $vin_price);

    while ($vv_price = mysqli_fetch_array($run_vin_price)){

      $vinyl_price = array($vv_price['vinyl_price']);
      $vinyl_album = $vv_price['vinyl_price'];
      $vinyl_image = $vv_price['vinyl_image'];
      $single_price = $vv_price['vinyl_price'];


      $values = array_sum($vinyl_price);

      $total += $values;

   ?>
   <tr align="center">
     <td><input type="checkbox" name="remove[]" value="<?php echo $vin_id;?>"/></td>
     <td><?php echo $vinyl_artist; ?><br>
     <img src="admin_area/vinyl_images/<?php echo $vinyl_image; ?>" width="60" height="60"/>
     </td>
     <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
     <?php
     if(isset($_POST['update_cart'])){

       $qty = $_POST['qty'];

       $update_qty = "update cart set qty='$qty'";

       $run_qty = mysqli_query($con, $update_qty);

       $_SESSION['qty']=$qty;

       $total = $total*$qty;
     }
     ?>
     <td><?php echo  $single_price; ?></td>
   </tr>


   <?php } } ?>

   <tr>
     <td colspan="4" align="right"><b>Sub Total:</b></td>
     <td><?php echo $total;?></td>
   </tr>

   <tr align="center">
     <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
     <td><input type="submit" name="continue" value="Continue Shopping" /></td>
     <td><button><a href="index.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
   </tr>

   </table>

   </form>
    </div>

</div>
<div id = "footer"><h2 style = " text-align:center; padding-top:30px;">&copy; 2017 by Marius Daugėla</h2> </div>
  </div>
</body>
</div>
</html>
