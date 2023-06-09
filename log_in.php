<?php
   $con=mysqli_connect("localhost","root","","bookdatabase");
    if(!$con){
        die("connection failed".mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
   
     $sql="select * from user where email='$email' and password='$password'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    
    if($row>0){
        
        if($row['type']=='admin'){
            header("location:admin.php");
        }
        elseif($row['type']=='user'){
            header("location:user.php");
        }

    }else{
        echo"incorrect user-name or password";
    }



 }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="formstyle.css">
<body>

<div class="parent">
      <h1>Login</h1>
        <form action="#.php" method="post">
            <input type="text" name="email" required placeholder="Enter Email Address" class="longinput"><br><br>
            <input type="password" name="password" required placeholder="Enter password" class="longinput"><br>
            <p id="forget">Forget password?</p><br><br>
            <input type="submit" name="submit" value="Log-in" class="btn" class="longinput"><br><br>
            <p>Don't have Account? <a href="sign_in.php">sign_up</a></p>
            
        </form>
</div>        

</body>
</html>