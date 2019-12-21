<?php session_start();?>
<?php
include_once('../Utilities/Router.php');
include_once('../Utilities/CDN.php');
include_once('../Utilities/DB.php');
include_once('../views/MessageCard.php');
$sender=$_SESSION['User'];
if(isset($_POST['Send']))
	{   
		
			$sender=$_SESSION['User'];
			if ($_GET['type']=='Message')
			{
				$reciever=select("User",$_POST['email'],$conn);
				if($reciever==null)
				{
					Route("Create.php");
				}
				$obj=new Message(null,$reciever->get_id(),$_POST['text'],$sender);
				insert('Message',$obj,$conn);
				$_POST['Send']=false;
			}

			else if ($_GET['type']=='reply')
			{
				$obj=new reply(null,$_GET['messageId'],$_POST['text']);
				insert('reply',$obj,$conn);
				Route('messageDetail.php?id='.$_GET['messageId']);
			}
		
		
		
		
		
	}


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
  <li role="presentation" class="active"><a  style="color:white"  href="#">Sent</a></li>
  <li role="presentation"><a style="color:white" href="Recieved.php">Recieved</a></li>
  <li role="presentation" style="margin-top:90%;border-radius:24px;margin-bottom:35px;background:white;text-align:center">
  <a href="Login.php?signOut=1"> <span class="glyphicon glyphicon-log-out"> </span>Sign out</a></li>
</ul>
<div class="col-lg-9">
<?php
$list=view("Message",$_SESSION['User'],$conn);	
messageCardCreator($list,'Message','sent',$conn);
?>
</div>
</div>
</body>
</html>

