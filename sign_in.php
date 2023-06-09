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
            <h1>sign_up</h1>
        <form action="#.php" method="post">
                <input type="text" name="fname" required placeholder="First Name" class="shortinput"> 
               <input type="text" name="lname" required placeholder="Last Name" class="shortinput"><br><br>
                <input type="email" name="email" required placeholder="Email Address" class="longinput"><br><br>
                <input type="password" name="password" required placeholder="create password" class="longinput"><br><br>
                <input type="password" name="retype" required placeholder="retype password" class="longinput"><br><br>
            <input type="submit" name="register" value="sign_up" class="btn">
            <p>Already a member? <a href="log_in.php">Log_in</a></p>
            
        </form>
</div>
    <?php

    $con=mysqli_connect("localhost","root","","bookdatabase");
    if(!$con){
       die("connection failed".mysqli_connect_error());
    }

    if(isset($_POST['register'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $retype=$_POST['retype'];

        if($password==$retype){
            $sql="INSERT INTO user(Fname,Lname,email,password)
            VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$sql);
            mysqli_stmt_bind_param($stmt,"ssss",$fname,$lname,$email,$password);

             if(mysqli_stmt_execute($stmt))
             {
                echo"successfully registerd";
             }
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }else{
            echo"password missmuch!";
        }


    }
    ?>
</body>
</html>