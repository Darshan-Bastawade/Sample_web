
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css" />
    <title>Welcome To The Developer Connector</title>
  </head>
  <body>
    <nav class="navbar bg-dark">
      <h1>
        <a href="../index.php" style="margin-left: 40px;"> Sample Web</a>
      </h1>
      <ul>
      <?php
            session_start();
            if (!isset($_SESSION['creator_username'])&& !isset($_SESSION['brand_username']))
            {
            ?>
        <li><a href="creator_login.php">Creator Login</a></li>
        <li><a href="brand/brand_login.php">Brand Login</a></li>
        <?php
            }
            elseif(isset($_SESSION['creator_username']) || isset($_SESSION['brand_username']))
            {
              ?>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-right:5px;"></i>  Logout </a></li>
              <?php
            }
            ?>
      </ul>
    </nav>

    <?php
 if(isset($_SESSION['brand_id']))
 {
include '../config.php';
$sql="SELECT * FROM profile";

$result=mysqli_query($conn,$sql) or die("Query Failed");

?>
<section class="container">
<h1 class="large text-primary">Creators</h1>
      <p class="lead">
        <i class="fab fa-connectdevelop"></i> Browse with Creators
      </p>
        </section>
      <?php
if(mysqli_num_rows($result)>0)
{
        while ($row=mysqli_fetch_assoc($result))
        {
          $id=$row["id"];
          $username=$row["username"];
          $status=$row["status"];
          $location=$row["location"];
          $skills=$row["skills"];
          $bio=$row["bio"];
      
    ?>
<section class="container">
      
      <div class="profiles">
        <div class="profile bg-light">
          <img
            class="round-img"
            src="http://www.gravatar.com/avatar/05434e5d678bc30625550497804f6d0e?s=200&r=pg&d=mm"
            alt=""
          />
          <div>
            <h2><?php echo $username?></h2>
            <p><?php echo $status?></p>
            <p><?php echo $location?></p>
            <a href="full_profile.php?id=<?php echo $id;?>" class="btn btn-primary">View Profile</a>
          </div>

          <ul>
          <?php
          $str_arr = explode (",", $skills); 
         
        for ($i=0; $i<sizeof($str_arr);$i++)
        {?>
            <li class="text-primary">
              <i class="fas fa-check"></i>  <?php echo $str_arr[$i];?>
            </li>
            <?php
        }
            ?>
          </ul>
        </div>

       
    </section>

    <?php
        }}
    include '../footer.php';
  }
  else
  {
    header("Location:http://localhost/sample/index.php");
  }
    ?>