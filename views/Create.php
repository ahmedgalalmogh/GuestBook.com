<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<?php

include_once('../Utilities/Router.php');
include_once('../Utilities/CDN.php');
include_once('../Utilities/DB.php');
if(!isset($_SESSION['User']))
{
	 Route("Login.php");
}
?>
</head>
<body style="background-image: url('../imgs/bck2.jpg');opacity:0.7">


<?php
if($_GET['type']=='Message')
{
echo '<form  style="background-color:black;margin:11%;margin-bottom:0%;padding:2%" action="Sent.php?type=Message" method="post">';
echo '<h3 style="text-align:center"> <span class="glyphicon glyphicon-plus"></span> New Message </h3>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
  </div>';
}
else
{
	echo '<form style="background-color:black;margin:11%;margin-bottom:0%;padding:2%"action="Sent.php?type=reply&messageId='.$_GET['messageId'].'" method="post">';

	echo '<h3 style="text-align:center"> <span class="glyphicon glyphicon-plus"></span>  reply </h3>';
}
?>
  <div class="form-group">
    <label for="text">Message</label>
    <textarea class="form-control" id="text"name="text" rows="5"></textarea>
  </div>
   <Button type="submit"class="btn btn-warning btn-block" name="Send">Send</button>

</form>

</body>
</html>

