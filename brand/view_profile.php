
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
$username1=$_GET['username'];
include '../config.php';
$sql2="SELECT * FROM profile WHERE username='{$username1}'";

$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));


if(mysqli_num_rows($result2)>0)
{

    while ($row=mysqli_fetch_assoc($result2))
  {
    $id=$row["id"];
    $username=$row["username"];
    $status=$row["status"];
    $location=$row["location"];
    $skills=$row["skills"];
    $bio=$row["bio"];

?>
    <section class="container">
      <a href="../index.php" class="btn btn-primary" style="margin-bottom:10px;">Back </a>

      <div class="profile-grid my-1">
         <!-- Top -->
        <div class="profile-top bg-primary p-2">
          <img
            class="round-img my-1"
            src="http://www.gravatar.com/avatar/05434e5d678bc30625550497804f6d0e?s=200&r=pg&d=mm"
            alt=""
          />
          <h1 class="large"><?php echo $username?></h1>
          <p class="lead"><?php echo $status?></p>
          <p><?php echo $location?></p>
        
        </div>

        <!-- About -->
        <div class="profile-about bg-light p-2">
          <h2 class="text-primary"><?php echo $username?> Bio</h2>
          <p>
           <?php
           echo $bio;
           ?>
          </p>
          <div class="line"></div>
          <h2 class="text-primary">Skill Set</h2>
          <div class="skills">
          <?php
          $str_arr = explode (",", $skills); 
         
        for ($i=0; $i<sizeof($str_arr);$i++)
        {
          ?>
            <div class="p-1"><i class="fa fa-check"></i> <?php echo $str_arr[$i];?></div>
  <?php }?>
          </div>
        </div>

     

      
      </div>
    </section>

<?php
}
}
else
{
    echo "<script>alert('oopp')</script>";
}
include '../footer.php';
}
else
{
  header("Location:http://localhost/sample/index.php");
}
?>
