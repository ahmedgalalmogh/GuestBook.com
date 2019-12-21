<?php
include_once('../Utilities/DB.php');
include_once('../Utilities/Router.php');
	
	remove($_GET['type'],$_GET['id'],$conn,$_GET['call']);
	route("Home.php");
?>