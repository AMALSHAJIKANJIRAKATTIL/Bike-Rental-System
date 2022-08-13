<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['AdminLoginid'])) {
    header("Location: adminlogin.php");
}



if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $image=$_POST['image'];
    $mileage=$_POST['mileage'];
    $price=$_POST['price'];

    $query="INSERT INTO products (title,image,mileage,price) VALUES ('$title','$image','$mileage','$price') ";
    $result=mysqli_query($conn, $query);

    if ($result) {
        header('location:adminpanel.php');
        $title = "";
        $image = "";
        $mileage="";
        $price="";
        $_POST['title'] = "";
        $_POST['image'] = "";
        $_POST['mileage'] = "";
        $_POST['price'] = "";

        
    } else {
        echo "<script>alert('Error! Addition failed')</script>";
    }


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
    <title>Update</title>
</head>
<body>
<nav class="navbar fixed-top " style="background-color:#00aeff;">
  
  <p class="login-text" style="font-size: 2rem; font-weight: 800; color:white; margin-left:50px; margin-top:10px; ">Admin Panel</p>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link text-light " href="adminpanel.php">Bike List</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link active" href="update.php">Add New Bike</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light " href="adminbookings.php">Bookings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="adminusers.php">Users</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link text-muted" href="logoutadmin.php">Logout</a>
  </li>
</ul>
</nav><br>
<div class="container" style="margin-top: 100px;">
            <form method="POST" class="login-email">
            <p class="login-text" style=" font-size: 2rem; font-weight: 800;">Add New Bike</p>
            <div class="input-group">
                
                <input type="text" name="title" placeholder="Enter bike title"  required></div>
                <div class="input-group">
                <label for="file">Upload bike image :</label>
                <input type="file" name="image" accept="image/*"  required></div><br>
                <div class="input-group">
                
                <input type="number" name="mileage" placeholder="Enter bike mileage" required></div>
                <div class="input-group">
                
                <input type="number" name="price" placeholder="Enter bike rent per day"  required></div>
                <div class="input-group">
				<button name="submit" class="btn">Add</button>
			</div> </form>
</div>
</body>
</html>