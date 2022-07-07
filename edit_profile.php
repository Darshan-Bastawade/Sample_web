

<?php
include 'header.php';
include 'config.php';
$id=$_GET['id'];
if(isset($_SESSION['creator_id']))
{

$current_user=$_SESSION['creator_username'];
if(isset($_POST['btn_submit']))
{


  $username= $_SESSION['creator_username'];
  $status= $_POST['status'];
  $location=$_POST['location'];
  $skills=$_POST['skills'];
  $github_username=$_POST['githubusername'];
  $bio=$_POST['bio'];
  
  $sql1="UPDATE profile SET `status`='$status',`location`='$location',`skills`='$skills',`github_username`='$github_username',`bio`='$bio' WHERE id='$id'";
       if(mysqli_query($conn,$sql1)or die(mysqli_error($conn)))
       {
          header("Location:http://localhost/sample/index.php");
       
       }
       else
       {
           echo "Error";
       }
}

  
  $sql2="SELECT * FROM profile WHERE id='{$id}'";
  $result=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
  if(mysqli_num_rows($result)>0)
  {
      while($row=mysqli_fetch_assoc($result))
      {
$status=$row['status'];
$skills=$row['skills'];
$location=$row['location'];
$github_username=$row['github_username'];
$bio=$row['bio'];
     
  ?>



 <section class="container">
      <h1 class="large text-primary">
        Create Your Profile
      </h1>
      <p class="lead">
        <i class="fas fa-user"></i> Let's get some information to make your
        profile stand out
      </p>
      <small>* = required field</small>
      <form class="form" method="post">
        <div class="form-group">
          <select name="status">
            <option value="0">* Select Professional Status</option>
            <option value="Influencer Manager"  <?php if($row['status']=='Influencer Manager') echo 'selected="selected"';?>>Influencer Manager</option>
            <option value="Social Media Influencer" <?php if($row['status']=='Social Media Influencer') echo 'selected="selected"';?>>Social Media Influencer</option>
            <option value="Reality TV stars" <?php if($row['status']=='Reality TV stars') echo 'selected="selected"';?>>Reality TV stars</option>
            <option value="Other" <?php if($row['status']=='Other') echo 'selected="selected"';?>>Other</option>
          </select>
          <small class="form-text"
            >Give us an idea of where you are at in your career</small
          >
        </div>

        <div class="form-group">
          <input type="text" placeholder="Location" name="location" value="<?php echo $location;?>"/>
          <small class="form-text"
            >City & state suggested (eg. Boston, MA)</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="* Skills" name="skills" value="<?php echo $skills;?>"/>
          <small class="form-text"
            >Please use comma separated values (eg.
            Digital Marketing,Content Writing)</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="Github Username"
            name="githubusername"
            value="<?php echo $github_username;?>"
          />
          <small class="form-text"
            >For refernce</small
          >
        </div>
        <div class="form-group">
          <textarea placeholder="A short bio of yourself" name="bio"><?php echo $bio;?></textarea>
          <small class="form-text">Tell us a little about yourself</small>
        </div>

      
        <input type="submit" name="btn_submit" class="btn btn-primary my-1" />
        <a class="btn btn-light my-1" href="dashboard.html">Go Back</a>
      </form>
    </section>



<?php
      }}
}
else
{
  header("Location:http://localhost/sample/index.php");
}
include 'footer.php';
?>
