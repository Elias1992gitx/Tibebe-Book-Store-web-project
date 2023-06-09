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
            <h1>Add Book</h1>
        <form action="#.php" method="post">
                <input type="text" name="name" required placeholder="book Title" class="longinput"><br><br>
                <input type="text" name="Author" required placeholder="Author name" class="shortinput">
                <select name="Type" class="shortinput">
                    <option value="fiction">fiction</option>
                    <option value="biography">biography</option>
                    <option value="educational">educational</option>
                    <option value="novel">novel</option>
                    <option value="kids">kids</option>
                </select><br><br>
               <!-- <input type="text" name="Type" required placeholder="Type" class="shortinput"><br><br> -->
                <input type="text" name="cover" required placeholder="name of cover image" class="shortinput">
                <input type="number" name="price" required placeholder="price" class="shortinput"><br><br>
                <input type="text" name="description" required placeholder="Description about the book" class="longinput"><br><br>
            <input type="submit" name="register" value="Add book" class="btn">
            
            
        </form>
</div>
    <?php

    $con=mysqli_connect("localhost","root","","bookdatabase");
    if(!$con){
       die("connection failed".mysqli_connect_error());
    }

    if(isset($_POST['register'])){
        $name=$_POST['name'];
        $author=$_POST['Author'];
        $type=$_POST['Type'];
        $cover=$_POST['cover'];
        $price=$_POST['price'];
        $description=$_POST['description'];

        
            $sql="INSERT INTO books(Name,author,Type,cover,price,description)
            VALUES (?,?,?,?,?,?)";
            $stmt=mysqli_prepare($con,$sql);
            mysqli_stmt_bind_param($stmt,"ssssss",$name,$author,$type,$cover,$price,$description);

             if(mysqli_stmt_execute($stmt))
             {
                echo"successfully registerd";
             }
             mysqli_stmt_close($stmt);
    }
    
    mysqli_close($con);

    ?>
</body>
</html>