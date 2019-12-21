<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('../Utilities/CDN.php');
include_once('../Utilities/Hashing.php');
include_once('../Utilities/CDN.php');
include_once('../Utilities/DB.php');



?>


</head>
<body style="background-image:url('../imgs/Login.jpg')">	
	<div class="col-lg-5" style="background-color:black;margin-left:28%;margin-top:10%;opacity:0.7">
			  	       <h3 style="text-align:center">Register<h3>

		<form method="post" action="Login.php" >
		<div class="form-group"style="margin-top:30px">
			<label for="user">user Name</label>
			<input type="text" class="form-control" id="user" name="user" placeholder="Enter email">
		  </div>
		  <div class="form-group">
			<label for="Email">Email address</label>
			<input type="email" class="form-control" id="Email" name="email" placeholder="Enter email">
			<small class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		  </div>
		  <Button type="submit"class="btn btn-danger btn-block" style="color:white;margin-bottom:30px" name="RegisterSubmit">Register</button>
		</form>
	<div>

</body>
</html>