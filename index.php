<!DOCTYPE html>
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
        <li><a href="#">Home</li>
        <li><a href="#">Vinyls</li>
        <li><a href="#">My account</li>
        <li><a href="#">Sign Up</li>
        <li><a href="#">Shopping Cart</li>
        <li><a href="#">Contact Us</li>

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
<li><a href="#">Rock</li>
  <li><a href="#">Metal</li>
    <li><a href="#">Classic</li>
      <li><a href="#">Reggar</li>
        <li><a href="#">Pop/Rock</li>
</ul>

<div id = "sidebar_title">Vinyl Condition</div>

<ul id ="cats">
<li><a href="#">Mint</li>
  <li><a href="#">Near Mint</li>
    <li><a href="#">Excellent</li>
      <li><a href="#">Very Good</li>

</ul>
    </div>

    <div id = "content_area">this is content area</div>

</div>
<div id = "footer"> this is the footer </div>
  </div>
</body>
</div>
</html>
