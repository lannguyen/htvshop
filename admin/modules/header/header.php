<?php 
	$deci = isset($_GET["mod"]) ? $_GET["mod"] : "";
	switch ($deci) {
		case "order":
			$header = "Trang quản lý đơn hàng";
			$class = "current";
			break;
		case "user":
			$header = "Trang quản lý người dùng";
			$class = "current";
			break;
		case "product":
			$header = "Trang quản lý sản phẩm";
			$class = "current";
			break;			
		default:
			$header = "Trang quản trị hệ thống";
			$class = "current";
			break;
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $header;?></title>
<link rel="stylesheet" type="text/css" href="../admin/css/theme1.css" />
<link rel="stylesheet" type="text/css" href="../admin/css/style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
	var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
	document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>

<body>
	<div id="container">
		<div id="header">
			<h2><?php echo $header;?></h2>
			<div id="topmenu">
				<ul>
					<li <?php if($deci == "") echo "class='current'"; ?>><a href="index.php">Thống kê</a></li>
					<li <?php if($deci == "order") echo "class='current'";?>><a href="index.php?mod=order">Đơn đặt hàng</a></li>
					<li <?php if($deci == "user") echo "class='current'"; ?>><a href="index.php?mod=user">Người dùng</a></li>
					<li <?php if($deci == "product") echo "class='current'"; ?>><a href="index.php?mod=product">Sản phẩm</a></li>
				</ul>
			</div>
		</div>