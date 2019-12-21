<?php session_start();
include_once('../Utilities/Router.php');
include_once('../Utilities/CDN.php');
include_once('../Utilities/DB.php');
 
 if(isset($_POST['edit']))
 {
	 $data=select($_GET['type'],$_GET['id'],$conn);
	 $data[0]->set_content($_POST['text']);
	 echo $data[0]->get_content();
	 Update($_GET['type'],$data,$conn);

	 Route("Home.php");
 }

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-image: url('../imgs/bck2.jpg');opacity:0.7;">
<?php
 if(!isset($_SESSION['User']))
 {
	 Route("Login.php");
 }

$obj=select($_GET['type'],$_GET['id'],$conn);

?>
<form  style="background-color:black;margin:11%;margin-bottom:0%;padding:2%" action="edit.php?type=<?php echo $_GET['type'].'&id='.$_GET['id'].''; ?>" method="post">
<div class="form-group">
    <label for="text">Message</label>
    <textarea class="form-control" id="text"name="text"rows="5"><?php echo $obj[0]->get_content(); ?> </textarea>
  </div>
   <Button type="submit"class="btn btn-warning btn-block" name="edit">Save</button>

</form>