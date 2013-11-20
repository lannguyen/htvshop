<?php
$a = isset($_GET['act_news'])?$_GET['act_news']:"";
//echo $a;
switch($a){
	case "detail":
		include("modules/news/news_detail.php");
		break;
	default:
		include("modules/news/news_list.php");
		break;
}
?>