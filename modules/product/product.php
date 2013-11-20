<?php
$a = isset($_GET['act'])?$_GET['act']:"";
//echo $a;
switch($a){
	case "detail":
		include("modules/product/detail.php");
		break;
	default:
		include("modules/product/list.php");
		break;
}
?>