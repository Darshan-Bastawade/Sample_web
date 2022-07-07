<script>
function pop_up() {
  var txt;
  if (confirm("You have Already Applied")) {
    window.location.href="http://localhost/sample/index.php";
  }
  else
  {
    window.location.href="http://localhost/sample/index.php";
  }
}
function pop_up2() {
  var txt;
  if (confirm("You have Successfully Applied")) {
    window.location.href="http://localhost/sample/index.php";
  }
  else
  {
    window.location.href="http://localhost/sample/index.php";
  }
}
</script>
<?php
session_start();
if(isset($_SESSION['creator_id']))
{
include 'config.php';
$id_creator=$_SESSION['creator_id'];
$id_addid=$_GET['id'];

$sql="SELECT * FROM adds WHERE id='{$id_addid}'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{
    while ($row=mysqli_fetch_assoc($result))
    {
        $username1=$row['username'];

        $sql2 ="SELECT add_id,applicant FROM applicants WHERE add_id='{$id_addid}' AND applicant='{$id_creator}'";
        $result2=mysqli_query($conn, $sql2) or die(mysqli_error());
        if(mysqli_num_rows($result2)>0)
        {
            
            echo "<script>pop_up()</script>";
           
        }
        else
        {
            $sql3="INSERT INTO applicants (add_id,username,applicant)VALUES('$id_addid','$username1','$id_creator')";
            if(mysqli_query($conn,$sql3)or die(mysqli_error($conn)))
            {
               echo "<script>pop_up2()</script>";
               
            }
            else
            {
                echo "Something went wrong";
            }
        }
    }

}
}
else
{
  header("Location:http://localhost/sample/index.php");
}
?>