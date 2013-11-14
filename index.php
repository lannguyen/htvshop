<?php
header("Content-type: text/html; charset=utf-8");
ob_start();
session_start();
include("includes/config.php");
include("includes/function.php");
include("modules/header/header.php");

$module = "";
if(isset($_GET['mod']))
	$module = $_GET['mod'];		

switch($module){	
	case 'order':
		include("modules/orders.php");
		break;
	case 'user':
		include("modules/users.php");
		break;
	case 'product':
		include("modules/product.php");
		break;	
	default:
		include("modules/home/home.php");
		break;		
}

?>