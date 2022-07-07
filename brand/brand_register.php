<?php

if(isset($_POST['btn_register']))
{
   require("../config.php");

   $name=$_POST['name'];
   $username= $_POST['username'];
   $pass= $_POST['password'];
   $pass2=$_POST['password2'];
   if($pass == $pass2)
   {

   $sql = "SELECT username FROM brands where username='{$username}'";
   $result=mysqli_query($conn,$sql) or die("Query failed");

   if(mysqli_num_rows($result)>0)
   {
       echo "Brand already exists";
   }
   else
   {
       $sql1="INSERT INTO brands (brand_name,username,password)VALUES('$name','$username','$pass')";
       if(mysqli_query($conn,$sql1)or die(mysqli_error($conn)))
       {
          header("Location:http://localhost/sample/brand/brand_login.php");
       
       }
       else
       {
           echo "Brand not registered";
       }
   }
}
else
{
    echo 'PASSWORD MISMATCH';
}
}
?>
<html>
<head>
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
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
        <div class="container" style="margin-top:130px;">
            <div class="mb-3">
            <label  style="width:100%; margin-top:10px; text-align:left;border-radius: 5px;" class="btn btn-primary" >Brand Sign up</label>
            <form action="" method="post">

                <input name="name" type="text" style="background:none; border:none;" class="form-control" id="name" placeholder="Brand Name" required>
                <input name="username" type="text" style="background:none; border:none;" class="form-control" id="user-name" placeholder="Username" required>
               
                <input name="password" type="password"  style="margin-top:10px; background:none; border:none;" class="form-control" id="password" placeholder="Password" required>

                <input name="password2" type="password"  style="margin-top:10px; background:none; border:none;" class="form-control" id="password" placeholder="Confirm Password" required>
                <input name="btn_register" class="btn btn-primary" style="margin-left:4vh;border-radius: 5px;" type="submit" value="Register"/>
             </form>
                <hr style="margin-top: 15px;margin-bottom: 15px;">
                <a button href="brand_login.php" class="btn btn-dark" style="margin-left:4vh;border-radius: 5px;margin-bottom: 30px;" type="button">Login here</a></button>
        </div>
        </div>

</body>
</html>