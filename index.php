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
	case 'news':
		include("modules/news/news.php");
		break;
	case 'about':
		include("modules/about/about.php");
		break;
	case 'product':
		include("modules/product/product.php");
		break;
	case 'contact':
		include("modules/contact/contact.php");
		break;
	case 'cart':
		include("modules/cart/cart.php");
		break;		
	default:
		include("modules/home/home.php");
		break;		
}

include("modules/footer/footer.php");

?>