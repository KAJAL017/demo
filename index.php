<?php
session_start();
$conn=mysqli_connect('localhost','root','','signin');
if(isset($_POST['signin'])){
   $umail= $_POST['umail'];
   $upass= $_POST['upass'];
   if($umail==""||$upass==""){
   $_SESSION['warning']="Field Must Be Needed";
   header('LOCATION:index.php');
   die();}
   $query="INSERT INTO `users`(`umail`, `upass`) VALUES ('$umail',' $upass')";
mysqli_query($conn,$query);
$_SESSION['success']="Data insert Success Fully";
header('LOCATION:index.php');
die();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="sign-up-form">
     <img src="2037710.png" alt="">
     <h1>Sign Up Now</h1>
     <?php
     if(isset($_SESSION['warning'])){
         echo  $_SESSION['warning'];
         unset($_SESSION['warning']);
     }
     ?>
     <?php
     if(isset($_SESSION['success'])){
         echo  $_SESSION['success'];
         unset($_SESSION['success']);
     }
     ?>
     <form action="" method="post">
         <input type="email" class="input-box" placeholder="Enter Your Email" name="umail">
         <input type="password" class="input-box" placeholder="Enter Your Password" name="upass">
         <p><span><input type="checkbox"></span> I agree to terms if services</p>
         <button type="submit"class="sign-up-btn" name="signin">Sign up</button>
         <hr>
         <p class="or">OR</p>
         <button type="button"class="log-in-with-btn">Login with facebook</button>
         <p>Do you have an account ?<a href="#"> Sign in</a></p>
     </form>
   
 </div>
</body>
</html>