
<?php
session_start();

    
if(isset($_POST['btn_login']))
{
    include ("config.php");

    $username= $_POST['username'];
    $pass= $_POST['password'];

    $sql = "SELECT id,username,password FROM users WHERE username='{$username}' AND password='{$pass}'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());

    if(mysqli_num_rows($result)>0)
    {
        while ($row=mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["creator_id"]=$row['id'];
            $_SESSION["creator_username"]=$row['username'];

            header("Location:http://localhost/sample/index.php");
        }
    }
    else
    {
        echo "Username and Password mismatched";
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
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
        <div class="container" style="margin-top:130px;">
            <div class="mb-3">
            <label  style="width:100%; margin-top:10px; text-align:left;border-radius: 5px;" class="btn btn-primary" >Creator Sign in</label>
            <form action="" method="post">
                <input name="username" type="text" style="background:none; border:none;" class="form-control" id="user-name" placeholder="Username" required>
               
                <input name="password" type="password"  style="margin-top:10px; background:none; border:none;" class="form-control" id="password" placeholder="Password" required>
               
                <input name="btn_login" class="btn btn-primary" style="margin-left:4vh;border-radius: 5px;" type="submit" value="Login"/>
             </form>
                <hr style="margin-top: 15px;margin-bottom: 15px;">
                <a button href="creator_register.php" class="btn btn-dark" style="margin-left:4vh;border-radius: 5px;" type="button">Create Account</a></button>
        </div>
        </div>
      
    
</body>
</html>