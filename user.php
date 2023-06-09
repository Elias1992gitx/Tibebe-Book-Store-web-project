
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
    <link rel="stylesheet" href="userstyle.css">
</head>
<body>
<nav class="navbar">
        <div class="brand-name">
            <span style="color: green;">ጥበብ </span>BookStore</div>
        <div class="adminfunction">
            <a href="log_out.php" class="logoutbtn">Log_out</a>
        </div>
    </nav>


    <?php
    $con=mysqli_connect("localhost","root","","bookdatabase");
    if(!$con){
        die("connection failed".mysqli_connect_error());
    }
            echo'<div class="container"> ';

            $sql="SELECT Name,cover,price FROM books";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                
                echo'<div class="content">
                        <div class="cover"><img src="'.$row["cover"].'" width="100%" height="100%"></div><br>
                        <div class="description">'.$row["Name"].'</div>
                     </div>';
                
            }
            }else{
            echo"o result";
            }
            echo'</div>';
         
         mysqli_close($con);
    ?>
    
</body>
</html>