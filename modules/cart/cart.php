<?php
$a = isset($_GET['act'])?$_GET['act']:"";
switch ($a){
	case 'add_cart':
		include("modules/cart/add_cart.php");
		break;
	case 'del_cart':
		include("modules/cart/del_cart.php");
		break;	
	case 'payment':
		include("modules/cart/payment.php");
		break;		
	case 'xl_payment':
		include("modules/cart/xl_payment.php");
		break;				
	default:
		include("modules/cart/view_cart.php");
		break;				
}
?>