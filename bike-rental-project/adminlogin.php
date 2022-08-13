<?php 
    include 'config.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>



	<div class="container">
		<form method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="admin_name" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="Password" name="admin_password">
			</div>
			<div class="input-group">
				<button name="signin" class="btn">Login</button>
			</div>
		</form>
	</div>

    <?php

    if(isset($_POST['signin']))
    {
		$name = $_POST['admin_name'];
		$password = $_POST['admin_password'];
	
		$sql = "SELECT * FROM adminlogin WHERE admin_name='$name' AND admin_password='$password'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['AdminLoginid'] = $row['admin_name'];
			header("Location: adminpanel.php"); }
        else{
            echo "<script>alert('Incorrect Credentials!')</script>";
        }
    }



?>
</body>
</html>