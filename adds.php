<?php 
include 'header.php';
include 'config.php';

if(isset($_SESSION['creator_id']))
{
$sql="SELECT * FROM adds";


$result=mysqli_query($conn,$sql) or die("Query Failed");


?>
<section class="container">
    <h1 class="large text-primary">Adds</h1>
      <p class="lead">
        <i class="fab fa-connectdevelop"></i> Browse the Jobs
      </p>


</section>

<section class="container" style="width:800px;">
<?php
if(mysqli_num_rows($result)>0)
{
        while ($row=mysqli_fetch_assoc($result))
        {
          $id=$row["id"];
          $username=$row["username"];
          $role=$row["role"];
          $location=$row["location"];
          $requirement=$row["requirement"];
       
      
    ?>

        <div class="profiles" style="display:block;margin-left:0px;">
        <div class="profile bg-light">
         
          <div>
            <h2><?php echo $username;?></h2>
            <p>Role :  <?php echo $role;?></p>

              <p><?php echo $location;?></p>
            <a href="apply_now.php?id=<?php echo $id;?>" class="btn btn-primary">Apply now</a>
          </div>

          <ul>
          <li class="text-primary">
              <i class="fas fa-asterisk"></i> Requirements
              <p><?php echo $requirement;?></p>
            </li>
          </ul>
        </div>
        <?php
        }}
        ?>
    </section>
    

<?php 
include 'footer.php';
}
else
{
  header("Location:http://localhost/sample/index.php");
}
?>