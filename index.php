<?php

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	$uri.=$_SERVER['REQUEST_URI'];
	switch ($_SERVER['REQUEST_URI']) {
    case '/':
		header('Location: '.$uri.'views/Home.php');
        break;
	case '/GeustBook/':
		header('Location: '.$uri.'views/Home.php');
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require '404.php';
	break;}
?>
