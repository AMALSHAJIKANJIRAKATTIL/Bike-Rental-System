<?php 

include 'config.php';


session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">


    <?php 
    
    include('header.php');
    

     ?>

     <div class="tablecontainer">
     <p class="login-text text-center" style="font-size: 2rem; font-weight: 800;">Bookings</p>
         <table class="table table-light">

            <thead>
                    <tr><th>Booking ID</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Status</th>
                    <th>Action</th></tr>

            </thead>

            <tbody>

                <?php
                        $userid=$_SESSION['id'];
                        $bookingfetch="SELECT * FROM bookings WHERE userid=$userid";
                        $bookingfetchquery=mysqli_query($conn,$bookingfetch);




                        if($bookingfetchquery){
                            while($rows =mysqli_fetch_assoc($bookingfetchquery)){

                        $bookingid=$rows['id'];
                        $productid=$rows['productid'];
                        $bookstatus=$rows['status'];
                        $productfetch="SELECT title,price FROM products WHERE id=$productid";
                        $productfetchquery=mysqli_query($conn,$productfetch);


                        $productrow=mysqli_fetch_assoc($productfetchquery);
                        $productprice=$productrow['price'];
                        $productname=$productrow['title'];
                        $buttonaction='<button class="btn btn-danger" name="status">';

                        

                        switch($bookstatus)
                        {

                            case "pending": $bookstatuscolor='<p style="background-color:#00aeff; border-radius:80px;">'.$bookstatus.'</p>
                            ';
                            break;

                            case "approved": $bookstatuscolor='<p style="background-color:green; border-radius:80px;">'.$bookstatus.'</p> ';
                            break;

                            case "cancelled": $bookstatuscolor='<p style="background-color:red; border-radius:80px;">'.$bookstatus.'</p>';
                                              $buttonaction='<button class="btn btn-danger disabled">';
                            break;

                            case "completed": $bookstatuscolor='<p style=" background-color:#21ff00; border-radius:80px;">'.$bookstatus.'</p>';
                            $buttonaction='<button class="btn btn-danger disabled">';
                            break;

                            default: $bookstatuscolor=''.$bookstatus.'';
                            break;


                        }
                        

                            echo ' <tr>
                            <td>'.$bookingid.'</td>
                            <td>'.$productname.'</td>     
                            <td>'.$productprice.'</td> 
                            <td class="text-center text-light">'.$bookstatuscolor.'</td>     
                            <td>'.$buttonaction.'<a href="userbookcancel.php?cancelid='.$bookingid.'" class="text-light" style="text-decoration:none;">Cancel</a></button></td>                 
                            </tr>';
                        }
                            }
                        

                ?>


            </tbody>
    
     </div>




</body>
</html>