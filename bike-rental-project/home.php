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
    
    <div class="tablecontainer py-5">
        <div class="row mt-3">
            <?php

                $query="SELECT * FROM products";
                $queryrun=mysqli_query($conn,$query);

                $queryresult=mysqli_num_rows($queryrun)>0;

                if($queryresult)
                
                {


                    while($row=mysqli_fetch_assoc($queryrun))
                    {
                        
                         ?>
        
                        <div class="col-md-4">

                        <div class="card">
                            <div class="card-body">
                                    <img src="uploads\<?php echo $row['image']; ?>" width="300px" height="200px" class="card-img-top" alt="">
                                    <h2 class="card-title text-center"><?php echo $row['title']; ?> </h2>
                                    <p class="card-text text-center"><?php echo "Mileage: "; echo $row['mileage']; echo " Km\L"; ?></p>
                                    <h3 class="card-text text-center"><b><?php echo "₹"; echo $row['price'];?></b></h3>
                                    
                                    <div class="text-center"><button class="btn text-light" style="background-color: #00aeff;"><a class="text-light" href="booknow.php?productid=<?php echo $row['id']; ?>" style="text-decoration: none;">Book Now</a></button></div>
                            </div>
                            
                        </div>
                        <br>
                    </div>

                        
                    

                <?php
                    }
                }   
                
                else{

                    echo "No Data Found";
                }
                
                ?>

            
            
        </div>
    </div>


</body>
    
</html>