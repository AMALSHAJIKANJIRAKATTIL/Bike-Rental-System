<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['AdminLoginid'])) {
    header("Location: adminlogin.php");
}

if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];

    $deletequery="DELETE FROM products WHERE id=$id";

    $deleteresult=mysqli_query($conn,$deletequery);

    if($deleteresult){

        header('Location: adminpanel.php');
    }
    else{
        die(mysqli_error($conn));
    }


}

if(isset($_GET['cancelid']))
{
    $id=$_GET['cancelid'];

    $cancelquery="UPDATE bookings SET status='cancelled' WHERE id=$id";

    $cancelresult=mysqli_query($conn,$cancelquery);

    if($cancelresult){

        header('Location: adminbookings.php');
    }
    else{
        die(mysqli_error($conn));
    }


}
if(isset($_GET['approveid']))
{
    $id=$_GET['approveid'];

    $approvequery="UPDATE bookings SET status='approved' WHERE id=$id";

    $approveresult=mysqli_query($conn,$approvequery);

    if($approveresult){

        header('Location: adminbookings.php');
    }
    else{
        die(mysqli_error($conn));
    }


}
if(isset($_GET['completeid']))
{
    $id=$_GET['completeid'];

    $completequery="UPDATE bookings SET status='completed' WHERE id=$id";

    $completeresult=mysqli_query($conn,$completequery);

    if($completeresult){

        header('Location: adminbookings.php');
    }
    else{
        die(mysqli_error($conn));
    }


}

if(isset($_GET['deleteuserid']))
{
    $id=$_GET['deleteuserid'];

    $deletequery="DELETE FROM users WHERE id=$id";

    $deleteresult=mysqli_query($conn,$deletequery);

    if($deleteresult){

        header('Location: adminusers.php');
    }
    else{
        die(mysqli_error($conn));
    }


}
?>
