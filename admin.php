<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <link rel="stylesheet" href="userstyle.css">
</head>
<body>
<nav class="navbar">
        <div class="brand-name">
            <span style="color: green;">ጥበብ </span>BookStore</div>
            <div class="adminfunction">
            <a href="addbook.php" class="logoutbtn">Add book</a>
             <a href="log_out.php" class="logoutbtn">Log_out</a>
            </div>
        
    </nav>



    <?php
    $con=mysqli_connect("localhost","root","","bookdatabase");
    if(!$con){
        die("connection failed".mysqli_connect_error());
    }
                echo' <div class="adminpage">
                        <h1>All Books</h1>
                        <table>
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action</th>
                            </tr>
                        </thead><tbody>';
            $sql="SELECT BID,Name,Type,author,description FROM books";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
              echo'
                    <tr>
                    <td>'.$row["BID"].'</td>
                    <td>'.$row["Name"].'</td>
                    <td>'.$row["author"].'</td>
                    <td>'.$row["description"].'</td>
                    <td>'.$row["Type"].'</td>
                    <td>
                        <a href="#" class="editbtn">Edit</a>
                        <a href="#" class="deletebtn">Delete</a>
                    </td>
                    </tr>
                
                ';

            }
            }else{
            echo"o result";
            }
                echo'</tbody></table></div>';
    ?>
</body>
</html>