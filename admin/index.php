<?php
ob_start();
session_start();
include("includes/config.php");
include("includes/function.php");
include ("modules/header/header.php");

$module = (isset($_GET["mod"]))?$_GET['mod']:"";		

switch($module){	
	case 'order':
		include("modules/order/orders.php");
		break;
	case 'product':
		include("modules/product/product.php");
		break;	
	case 'user':
		include("modules/user/users.php");
		break;			
	default:
		include("modules/home/home.php");
		break;		
}
include ("modules/footer/footer.php");
?>