<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['AdminLoginid'])) {
    header("Location: adminlogin.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Panel</title>
</head>
<body>



<nav class="navbar fixed-top " style="background-color:#00aeff;">
  
  <p class="login-text" style="font-size: 2rem; font-weight: 800; color:white; margin-left:50px; margin-top:10px; ">Admin Panel</p>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active " href="adminpanel.php">Bike List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="update.php">Add New Bike</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="adminbookings.php">Bookings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="adminusers.php">Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted" href="logoutadmin.php">Logout</a>
  </li>
  
</ul>
</nav><br>



<div class="tablecontainer">
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Added Bikes</p>
            
            <table class="table table-light">

            <thead><tr>
                <th>Id</th>
                <th>Tilte</th>
                <th>Image</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Action<th></tr>

            </thead>
            <tbody>
                
                <?php

                        $selection = "SELECT * FROM products LIMIT 20";
                        $selectionresult=mysqli_query($conn,$selection);
                        if($selectionresult){

                        while($rows =mysqli_fetch_assoc($selectionresult)){
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $image=$rows['image'];
                                $mileage=$rows['mileage'];
                                $price=$rows['price'];
                                echo '
                                
                                <tr>
                        <td>'.$id.' </td>
                        <td> '.$title.'</td>
                        <td> '.$image.'</td>
                        <td> '.$mileage.'</td>
                        <td> '.$price.'</td>
                        <td><button type="submit" name="delete" class="btn btn-danger" ><a href="delete.php?deleteid='.$id.'" style="text-decoration:none;" class="text-light">Delete</a></button>
                        <button type="button" name="edit" class="btn btn-primary"><a href="updatefetch.php?updateid='.$id.'" class="text-light" style="text-decoration:none;">Edit</a></button>
                        </td>
                    
                    </tr>';




                        }
                        
                        
                        }?>

                
                        

            


            </tbody>

            </table>
</div>



</body>
</html>