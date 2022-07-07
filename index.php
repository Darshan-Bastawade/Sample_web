<!doctype html>
<!--html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brands and Creators</title>
    <style>
      html
     

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
   <- *************************************** Header Section Starts  --- ***************************************>

   <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="margin-left:40px;font-size:20px;">Sample </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
    
       
    
    </div>
  </div>
</nav>
    <img src="img/banner.jpg" alt="op">
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</html--->


<?php 
include 'header.php';

?>
    <section class="landing">
      <div class="dark-overlay">
        <div class="landing-inner">
          <h1 class="x-large">Welcome to the Website</h1>
          <p class="lead">
            create a profile for Creator and apply for Creators job or  
            create a profile for brand and hire Creators 
          </p>
          <div class="buttons">
            <?php
          
            if (!isset($_SESSION['creator_username']) && !isset($_SESSION['brand_username']))
            {
            ?>
            <a href="creator_login.php" class="btn btn-primary">For Creator</a>
            <a href="brand/brand_login.php" class="btn btn-light">For Brand</a>
            <?php
            }
            elseif(isset($_SESSION['creator_username']))
            {
              ?>

              <a href="profile.php" class="btn btn-primary">View / Create Profile</a>
              <a href="adds.php" class="btn btn-light">Search for Jobs</a>
        
            <?php
            }
            elseif(isset($_SESSION['brand_username']))
            {
            ?>
            <a href="brand/publish_add.php" class="btn btn-primary">Publish Adds</a>
            <a href="brand/view_profiles.php" class="btn btn-light">View Profiles</a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>
<?php
include 'footer.php';
?>
  </body>
</html>
