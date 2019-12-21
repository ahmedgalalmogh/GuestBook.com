<?php session_start();?>
<?php
include_once('../Utilities/Router.php');
include_once('../Utilities/CDN.php');
include_once('../Utilities/DB.php');
include_once('../views/MessageCard.php');
?>
<html>
<head>
</head>
<body style="background-image: url('../imgs/bck2.jpg');">
<?php
 if(!isset($_SESSION['User']))
 {
	 Route("Login.php");
 }

?>


<div class="row" style="col-lg-12 ;margin-top:8%;margin-left:10px;">

<ul class="nav nav-pills nav-stacked col-lg-2">
   <li role="presentation" style="border-radius:24px;margin-bottom:35px;background:white;text-align:center">
  <a href="Create.php?type=Message">Compose <span class="glyphicon glyphicon-plus"></span></a></li>
    <li role="presentation" ><a style="color:white" href="Home.php">Home</a></li>
  <li role="presentation"><a style="color:white" href="Sent.php">Sent</a></li>
  <li role="presentation"class="active"><a  style="color:white" href="#">Recieved</a></li>
  <li role="presentation" style="margin-top:90%;border-radius:24px;margin-bottom:35px;background:white;text-align:center">
  <a href="Login.php?signOut=1"> <span class="glyphicon glyphicon-log-out"> </span>Sign out</a></li>
</ul>

<div class="col-lg-9">
<?php
$list=Recieved($_SESSION['User'],$conn);	
messageCardCreator($list,'Message','Recieved',$conn);
?>

</div>
</div>


</body>
</html>

