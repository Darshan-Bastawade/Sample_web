

<?php
if(isset($_SESSION['creator_id']))
{
include 'header.php';
include 'config.php';
$current_user=$_SESSION['creator_username'];
if(isset($_POST['btn_submit']))
{


  $username= $_SESSION['creator_username'];
  $status= $_POST['status'];
  $location=$_POST['location'];
  $skills=$_POST['skills'];
  $github_username=$_POST['githubusername'];
  $bio=$_POST['bio'];
  
  $sql1="INSERT INTO profile (username,status,location,skills,github_username,bio)VALUES('$username','$status','$location','$skills','$github_username','$bio')";
       if(mysqli_query($conn,$sql1)or die(mysqli_error($conn)))
       {
          header("Location:http://localhost/sample/index.php");
       
       }
       else
       {
           echo "Error";
       }
}



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
            <option value="Influencer Manager">Influencer Manager</option>
            <option value="Social Media Influencer">Social Media Influencer</option>
            <option value="Reality TV stars">Reality TV stars</option>
            <option value="Other">Other</option>
          </select>
          <small class="form-text"
            >Give us an idea of where you are at in your career</small
          >
        </div>

        <div class="form-group">
          <input type="text" placeholder="Location" name="location" />
          <small class="form-text"
            >City & state suggested (eg. Boston, MA)</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="* Skills" name="skills" />
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
          />
          <small class="form-text"
            >For refernce</small
          >
        </div>
        <div class="form-group">
          <textarea placeholder="A short bio of yourself" name="bio"></textarea>
          <small class="form-text">Tell us a little about yourself</small>
        </div>

      
        <input type="submit" name="btn_submit" class="btn btn-primary my-1" />
        <a class="btn btn-light my-1" href="dashboard.html">Go Back</a>
      </form>
    </section>



<?php
}
else
{
  header("Location:http://localhost/sample/index.php");
}
include 'footer.php';
?>
