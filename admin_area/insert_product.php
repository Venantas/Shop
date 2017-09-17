<!DOCTYPE>
<?php
include ("includes/db.php");
 ?>
<html>
<head>
  <title>Insert Product</title>
</head>


<body bgcolor = "skyblue">
<form action = "insert_product.php" method="post" enctype="multipart/form-data">
  <table align="center" width="750px" bgcolor="orange" border="2">
<tr align="center">
<td><h2>Insert New post Here</h2></td>
</tr>
<tr>
  <td  colspan = "8" align= "right"><b>Artist:</b></td>
  <td><input type="text" name="vinyl_artist" /></td>
</tr>

<tr>
  <td  colspan = "8" align= "right"><b>Album:</b></td>
  <td><input type="text" name="vinyl_album" /></td>
</tr>

<tr>
  <td  colspan = "8" align= "right"><b>Category:</b></td>
  <td>
    <select name="vinyl_cat">
      <option> Select Category:</option>
      <?php
      $get_cats = "select * from Categories";
        $run_cats = mysqli_query($con, $get_cats);
        while ($row_cats=mysqli_fetch_array($run_cats)){

          $cat_id = $row_cats['cat_id'];
          $cat_title = $row_cats['cat_title'];

          echo "<option value='$cat_id'>$cat_title</option>";
        }
       ?>
    </select>
  </td>
</tr>

<tr>
  <td  colspan = "8" align= "right"><b>Album Image:</b></td>
  <td><input type="file" name="vinyl_image" /></td>
</tr>

<tr>
  <td  colspan = "8" align= "right"><b>Condition:</b></td>
  <td><input type="text" name="vinyl_condition" /></td>
</tr>

<tr>
  <td  colspan = "8" align= "right"><b>Price:</b></td>
  <td><input type="text" name="vinyl_price" /></td>
</tr>

<tr align= "center">
  <td coslspan="8"><input type="submit" name="insert_post" value="Insert now" /></td>
</tr>
</table>
</body>
</html>

<?php
if (isset($_POST['insert_post'])){
  //getting text
$vinyl_artist = $_POST['vinyl_artist'];
$vinyl_album = $_POST['vinyl_album'];
$vinyl_cat = $_POST['vinyl_cat'];
$vinyl_condition = $_POST['vinyl_condition'];
$vinyl_price = $_POST['vinyl_price'];

//getting image

$vinyl_image = $_FILES['vinyl_image'] ['name'];
$vinyl_image_tmp = $_FILES['vinyl_image'] ['tmp_name'];

move_uploaded_file($vinyl_image_tmp, "vinyl_images/$vinyl_image");

$insert_vinyl = "insert into vinyl
(vinyl_artist, vinyl_album, vinyl_cat, vinyl_image, vinyl_condition, vinyl_price)
value ('$vinyl_artist', '$vinyl_album', '$vinyl_cat', '$vinyl_image', '$vinyl_condition', '$vinyl_price')";
}

$insert_vinyl = mysqli_query($con, $insert_vinyl);

if ($insert_vinyl) {
  echo "<script>alert('Vinyl has been inserted!')</script>";
  echo "<script>window.open('insert_product.php', '_self')</script>";
}
