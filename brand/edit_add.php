
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
    <style>
    
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/add.css" />
  
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
$id=$_GET['id'];
include ("../config.php");
if(isset($_SESSION['brand_id']))
{
if(isset($_POST["btn_save"]))
{
  
    $role=$_POST["roles"];
    $requirement=$_POST["requirements"];
    $location=$_POST["location"];
    
    $sql="UPDATE adds SET `role`='{$role}',`requirement`='$requirement',`location`='$location' WHERE id='$id'";
    
    if(mysqli_query($conn,$sql)or die(mysqli_error($conn)))
    {
        header("Location:http://localhost/sample/index.php");
    }
}

?>
<style>
    .container
{
    
    border: 1px solid #ffa500;
    box-shadow: gray 1px 1px 20px;
    border-radius: 10px #ffa500;
    width: 45vh;
    min-height: 77vh;
    margin: auto;
}
</style>
<body>
<?php 
  
  $sql2="SELECT * FROM adds WHERE id='{$id}'";
  $result=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
  if(mysqli_num_rows($result)>0)
  {
      while($row=mysqli_fetch_assoc($result))
      {
$role=$row['role'];
$requirement=$row['requirement'];
$location=$row['location'];

     
  ?>
<div class="container" style="margin-top:100px;margin-bottom:20px;">
<label  style="width:100%; margin-top:10px; text-align:left; font-weight:700;" class="btn btn-warning" >Create Add </label>
<div class="row g-2">
  <div class="col-md">
 
  <form action="" method="post">
    <div class="form-floating">
        
      <select class="form-select" id="category" name="roles" aria-label="Floating label select example" style="margin-top:10px">
        
        <option value="Influencer" <?php if($row['role']=='Influencer') echo 'selected="selected"';?>>Influencer </option>
        <option value="Digital Marketing" <?php if($row['role']=='Digital Marketing') echo 'selected="selected"';?>>Digital Marketing</option>
        <option value="Influencer Manager" <?php if($row['role']=='Influencer Manager') echo 'selected="selected"';?>>Influencer Manager</option>
        <option value="Social Media Influencer" <?php if($row['role']=='Social Media Influencer') echo 'selected="selected"';?>>Social Media Influencer</option>
       
      
      </select>
      <label for="floatingSelectGrid">Select Role</label>
    </div>
  </div>
</div>
<input type="text" style="width:100%;margin-top:10px;border-radius:5px;border:1px solid black;" name="location" id="location" placeholder="Enter the location" value="<?php echo $location;?>" required>
<pre>
<textarea  id="text_blog" name="requirements" cols="31" rows="15" style="margin-top:10px"  required><?php echo $requirement;?></textarea>
</pre>
<hr>
<input type="submit" name="btn_save" id="btn_save" class="btn btn-warning" style="margin-bottom:15px;" value="Save">
</form>
</div>

</body>
</html>

<?php
 }
}

include ("../footer.php");
}
else
{
  header("Location:http://localhost/sample/index.php");
}
?>