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
    <a class="nav-link text-light " href="adminpanel.php">Bike List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="update.php">Add New Bike</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active" href="adminbookings.php">Bookings</a>
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
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Users</p>
            
            <table class="table table-light">

            <thead><tr>
                <th>Id</th>
                <th>Userid</th>
                <th>Productid</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-center">Action</th>
                </tr>

            </thead>
            <tbody>
                
                <?php

                        $selection = "SELECT * FROM bookings";
                        $selectionresult=mysqli_query($conn,$selection);
                        if($selectionresult){

                        while($rows =mysqli_fetch_assoc($selectionresult)){
                                $id=$rows['id'];
                                $userid=$rows['userid'];
                                $productid=$rows['productid'];
                                $date=$rows['date'];
                                $status=$rows['status'];
                                
                                switch($status)
                                {
        
                                    case "pending": $bookstatuscolor='<p style="background-color:#00aeff; ">'.$status.'</p>
                                    ';
                                    break;
        
                                    case "approved": $bookstatuscolor='<p style="background-color:green; ">'.$status.'</p> ';
                                    break;
        
                                    case "cancelled": $bookstatuscolor='<p style="background-color:red; ">'.$status.'</p>';
                                                      
                                    break;
        
                                    case "completed": $bookstatuscolor='<p style=" background-color:#21ff00; ">'.$status.'</p>';
                                    
                                    break;
        
                                    default: $bookstatuscolor=''.$status.'';
                                    break;
        
        
                                }


                                
                                echo '
                                
                                <tr>
                        <td>'.$id.' </td>
                        <td> '.$userid.'</td>
                        <td> '.$productid.'</td>
                        <td> '.$date.'</td>
                        <td> <div class="text-light text-center">'.$bookstatuscolor.'</div></td>
                        <td><div class="text-center"><form method="post">

                        <button type="submit" name="approve" class="btn" style="background-color:green; border-radius:80px;"><a href="delete.php?approveid='.$id.'" class="text-light" style="text-decoration:none;">Approve</a></button>
                        <button type="submit" name="cancel"  class="btn"  style="background-color:red; border-radius:80px;"><a href="delete.php?cancelid='.$id.'" class="text-light" style="text-decoration:none;">Cancel</button>
                        <button type="submit" name="complete" class="btn" style=" background-color:#21ff00; border-radius:80px;"><a href="delete.php?completeid='.$id.'" class="text-light" style="text-decoration:none;">Complete</button></form></div>
                        </td>
                    
                    </tr>';




                        }
                        
                        
                        }?>

                
                        

            


            </tbody>

            </table>
</div>



</body>
</html>