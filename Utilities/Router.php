<?php

function Route($location)
{
	if(isset($location))
	{
		$uri ='../views/';
		header('Location:'.$uri.$location);
	
	die();
	}
	else
	{
		header('Location:'.$_SERVER['PHP_SELF']);
	}
	

}
?>



