
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

    <section class="container">
    <div className="dashboard">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <h1 className="display-4"> Applicants  </h1>
                           
<div>
                  
                    
                 

                    <table class="table table-striped table-hover">
  <thead  >
    <tr>
      <th>Sr No</th>
      <th>Name</th>
      <th>Actions</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
   if(isset($_SESSION['brand_id']))
   {
  $id=$_GET['id'];
                    include '../config.php';
                    $current_user = $_SESSION['brand_username'];
                    $sql="SELECT * FROM applicants where add_id='{$id}'";

$result=mysqli_query($conn,$sql) or die("Query Failed");


if(mysqli_num_rows($result)>0)
{
    while ($row=mysqli_fetch_assoc($result))
  {
    $applicant_id=$row['applicant'];
   $sql2="SELECT * FROM users WHERE id='{$applicant_id}'";
   $result2=mysqli_query($conn,$sql2) or die("Query Failed");


if(mysqli_num_rows($result2)>0)
{
    while ($row=mysqli_fetch_assoc($result2))
  {
      $username=$row['username'];
      $name=$row['name'];
      
                    ?>
  <tr>
    
    <td>1</td>
    <td><?php echo $name;?></td>
    <td><a href="view_profile.php?username=<?php echo $username;?>" button type="button" class="btn btn-success">View Profile</button></a>
    
    </td>
  </tr>
  <?php
  }
}
  }}
  ?>
    
  </tbody>
</table>
                    </div>

    
                        </div>
                    </div>
                </div>
            </div>
    </section>
</html>

<?php
    include '../footer.php';
  }
  else
  {
    header("Location:http://localhost/sample/index.php");
  }
?>