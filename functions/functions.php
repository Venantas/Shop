<?php
$con = mysqli_connect ("localhost", "id2498594_admin", "nfqakademija", "id2498594_vinylshop");
//getting users IP
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

// shopping cart creation
function cart(){
if(isset($_GET['add_cart'])){
global $con;
$ip = getIp();
$vin_id = $_GET['add_cart'];

$check_vin = "select * from cart where ip_add = '$ip' AND v_id='$vin_id'";
$run_check = mysqli_query($con, $check_vin);

if(mysqli_num_rows($run_check)>0){
  echo "";
}

else {

  $insert_vin = "insert into cart (v_id, ip_add) values('$p_id', '$ip')";

  $run_vin = mysqli_query ($con, $insert_vin);
  echo "<script>window.open('index.php','_self')</script>";
}
}

}

//total items

function total_items(){

  if(isset($_GET['add_cart'])){

    global $con;

    $ip = getIp();

    $get_items = "select * from cart where ip_add='$ip'";

   $run_items = mysqli_query($con, $get_items);

   $count_items = mysqli_num_rows($run_items);
 }
   else {
     global $con;

     $ip = getIp();

     $get_items = "select * from cart where ip_add='$ip'";

    $run_items = mysqli_query($con, $get_items);

    $count_items = mysqli_num_rows($run_items);
   }
   echo $count_items;

}

//total price

function total_price(){
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

      $values = array_sum($vinyl_price);

      $total += $values;

    }

  }
echo $total;
}

//Categories
function getCats(){
  global $con;
$get_cats = "select * from categories";
  $run_cats = mysqli_query($con, $get_cats);
  while ($row_cats=mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  }
};


function getVin(){

  if (!isset ($_GET['cat'])){

  global $con;
  $get_vin = "select * from vinyl order by RAND() LIMIT 0,6";
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
          <p><b>Price: &euro; $vin_price</b></p>
          <a href='details.php?vin_id=$vin_id' style='float:left'>Details</a>

          <a href='index.php?add_cart=$vin_id'><button style='float:right'>Add to card</button></a>
          </div>";
}
}
}




function getCatVin(){

  if (isset ($_GET['cat'])){
$cat_id = $_GET['cat'];
  global $con;
  $get_cat_vin = "select * from vinyl where vinyl_cat='$cat_id'";
  $run_cat_vin = mysqli_query($con, $get_cat_vin);

  while($row_cat_vin=mysqli_fetch_array($run_cat_vin)){
    $vin_id = $row_cat_vin['vinyl_id'];
    $vin_artist = $row_cat_vin['vinyl_artist'];
    $vin_album = $row_cat_vin['vinyl_album'];
    $vin_cat = $row_cat_vin['vinyl_cat'];
    $vin_image = $row_cat_vin['vinyl_image'];
    $vin_condition = $row_cat_vin['vinyl_condition'];
    $vin_price = $row_cat_vin['vinyl_price'];

    echo "<div id='single_product'>
          <h3>$vin_artist</h3>
          <img src='admin_area/vinyl_images/$vin_image' width='180' height='180' />
          <p><b> &euro; $vin_price</b></p>
          <a href='details.php?vin_id=$vin_id' style='float:left'>Details</a>

          <a href='index.php?vin_id=$vin_id'><button style='float:right'>Add to card</button></a>
          </div>";
}
}
}
 ?>
