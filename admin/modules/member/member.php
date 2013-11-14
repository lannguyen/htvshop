<?php
$a = $_GET['act'];
switch ($a){
	case 'login':
		include('modules/member/login.php');
		break;
	case 'xl_login':
		include('modules/member/xl_login.php');
		break; 
	case 'logout':
		include('modules/member/logout.php');
		break;	
	default:
		header('location: index.php');
		break;		
}
?>