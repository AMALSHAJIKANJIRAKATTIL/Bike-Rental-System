<?php 

include 'config.php';


session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}


$id=$_GET['productid'];
$fetch="SELECT * FROM products WHERE id=$id";
$execfetch=mysqli_query($conn,$fetch);
$rows=mysqli_fetch_assoc($execfetch);

$productid=$_GET['productid'];
    $userid=$_SESSION['id'];


 if(isset($_POST['booked']))
 {

    $date=$_POST['bookdate'];
    

    $book="INSERT INTO bookings (userid,productid,date) VALUES ('$userid','$productid','$date') ";
    $bookquery=mysqli_query($conn,$book);

    if($bookquery){

        echo "<script>alert('Congratulations on your booking!')</script>";
        echo "<script> window.location.assign('bookings.php'); </script>";

    }
    else{


        

        echo "<script>alert('Booking failed!')</script>";
        echo "<script> window.location.assign('home.php'); </script>";

    }


 }






?>

<!DOCTYPE html>
<html lang="en">


    <?php 
    
    include('header.php');
    

     ?>

 <script>

     function calculate(){

        var a=document.getElementById('days').value;
        var b="<?php echo $rows['price']?>";

        document.getElementById('result').innerHTML=(a*b);

     }




 </script>



<div class="container">
<h3 class="text-center login-text" style="font-size: 1.8rem;"><b><?php echo $rows['title']; ?></b></h3>
<div class="text-center" >
<img style="border-radius:60px" src="uploads/<?php echo $rows['image']; ?>" width=200px height=150px></div><br>
<h5 class="text-center">Mileage :<?php echo $rows['mileage']; ?> Km/L</h5>
<h1 class="text-center"><b><?php echo "₹"; echo $rows['price'];?></b></h1><p class="text-center"><b> (per day) </b></p>

<p class="text-center" style="color: red;">*Enter how many days*</p>
<div class="text-center"><input  type="number" placeholder="Total days" id="days" name="days" min="1" onclick="return calculate()" required></div></p>
<p class="text-center" style="color: red;">*Choose pickup date*</p>
<form method="POST">
<div class="text-center"><input  type="date" placeholder="Pick your date" name="bookdate" min="2022-03-21" onclick="return calculate()" required></div></p>
<h1 class="text-center" style="color: red;"><b><?php echo "₹"; ?><span id="result"></span></b></h1><p class="text-center"><b> (Total Amount) </b></p>
<br><div class="text-center"><button name="booked" class="btn btn-danger ">Place Order</button></div>
</div></form>


</body>
</html>


    