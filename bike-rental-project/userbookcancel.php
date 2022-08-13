<?php 

include 'config.php';

session_start();



if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}



if(isset($_GET['cancelid']))
{
    $id=$_GET['cancelid'];

    $cancelquery="UPDATE bookings SET status='cancelled' WHERE id=$id";

    $cancelresult=mysqli_query($conn,$cancelquery);

    if($cancelresult){

        header('Location: bookings.php');
    }
    else{
        die(mysqli_error($conn));
    }


}
?>