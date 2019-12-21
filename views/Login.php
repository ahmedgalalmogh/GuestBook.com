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
include_once('../Utilities/Router.php');
	if(isset($_POST['RegisterSubmit']))
{  		$pass=passwordHashing($_POST['password']);
		$newUser=new User(Null,$_POST['user'],$_POST['email'],$pass);
		$result=insert('User',$newUser,$conn);
			
	}
	if(isset($_GET['signOut']))
	{  		
			session_destroy();
			Route("Login.php");
	}
	if(isset($_SESSION['User']))
	{  		Route("Home.php"); //already signed in
			
	}
	
?>
</head>
<body style="background-image:url('../imgs/Login.jpg')">	
	<div class="col-lg-5" style="background-color:black;margin-left:28%;margin-top:10%;opacity:0.7">
		  	       <h3 style="text-align:center">Log in<h3>

		<form method="post" action="Home.php" >
		
		  <div class="form-group">
			<label for="Email">Email address</label>
			<input type="email" class="form-control" id="Email" name="email" placeholder="Enter email">
			<small class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		  </div>
		  <Button type="submit"class="btn btn-danger btn-block" style="color:white" name="LoginSubmit">Log in <span class="glyphicon glyphicon-log-in"></span>	</button>
		</form>
		<a class="btn btn-primary btn-block" href="../views/Register.php" style=";color:white;margin-bottom:30px;margin-top:10px" name="Register">Register</a>

	<div>
	

</body>
</html>