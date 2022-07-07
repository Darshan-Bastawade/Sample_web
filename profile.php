<?php
include 'header.php';
include 'config.php';
if(isset($_SESSION['creator_id']))
{

$current_user=$_SESSION['creator_username'];
$sql="SELECT * FROM profile where username='{$current_user}'";

$result=mysqli_query($conn,$sql) or die("Query Failed");


if(!mysqli_num_rows($result)>0)
{
  
    

?>

<section class="container">
<div className="dashboard">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <h1 className="display-4"> Dashboard </h1>
                           
<div>
                    <p class="lead text-muted"> Welcome <?php echo $current_user;?></p>
                 <p>You have not setup your profile,please add some info</p>
                    <a href="create_profile.php" class="btn btn-lg btn-primary">
                        Create Profile 
                    </a>
                    
                    </div>

    
                        </div>
                    </div>
                </div>
            </div>
</section>
<?php
}
else
{
    while ($row=mysqli_fetch_assoc($result))
  {
    $id=$row["id"];
    $name=$row["username"];
    $status=$row["status"];
    $location=$row["location"];
    $skills=$row["skills"];
    $bio=$row["bio"];

?>
    <section class="container">
      <a href="index.php" class="btn btn-primary" style="margin-bottom:10px;">Back </a>
      <a href="edit_profile.php?id=<?php echo $id;?>" class="btn btn-primary" style="margin-bottom:10px;float:right;">Edit Profile </a>
      <div class="profile-grid my-1">
         <!-- Top -->
        <div class="profile-top bg-primary p-2">
          <img
            class="round-img my-1"
            src="http://www.gravatar.com/avatar/05434e5d678bc30625550497804f6d0e?s=200&r=pg&d=mm"
            alt=""
          />
          <h1 class="large"><?php echo $name?></h1>
          <p class="lead"><?php echo $status?></p>
          <p><?php echo $location?></p>
        
        </div>

        <!-- About -->
        <div class="profile-about bg-light p-2">
          <h2 class="text-primary"><?php echo $name;?> Bio</h2>
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
include 'footer.php';
}
else
{
  header("Location:http://localhost/sample/index.php");
}
?>
