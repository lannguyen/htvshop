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
	
	$user = (isset($_SESSION["user"]))?$_SESSION["user"]:"";
	$userid =  (isset($_SESSION["userid"]))?$_SESSION["userid"]:"";
	$groupid = (isset($_SESSION["groupid"]))?$_SESSION["groupid"]:"";
	//Lay quyen cua nguoi dung
	$permission = array();
	if($userid != ""){
		$result = mysql_query("SELECT * FROM tbl_permission_user WHERE userId='$userid'");
		$i=0;
		while($rows = mysql_fetch_array($result)){
			$permission[$i++] = $rows["permissionId"];
		}
	}
	
	if($groupid != ""){
		$result = mysql_query("SELECT * FROM tbl_permission_group WHERE groupId='$groupid'");
		$i=sizeof($permission);
		while($rows = mysql_fetch_array($result)){
			if(!contain($rows["permissionId"],$permission))
				$permission[$i++] = $rows["permissionId"];
		}
	}
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $header;?></title>
<link rel="stylesheet" type="text/css" href="../admin/css/theme.css" />
<link rel="stylesheet" type="text/css" href="../admin/css/style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="../admin/js/jquery-1.7.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<script>
	var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
	document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>

<script>
	$(document).ready(function(){
		<?php if(!contain("MANAGEMENT_USER",$permission)){
					echo "$('#user').css('display','none');";
			  }	

			  if(!contain("MANAGEMENT_ORDER",$permission)){
					echo "$('#order').css('display','none');";
			  }	
			  
			  if(!contain("MANAGEMENT_PRODUCT",$permission)){
			  	echo "$('#product').css('display','none');";
			  }
			  
			  if(!contain("MANAGEMENT_PERMISSION",$permission)){
			  	echo "$('#permission').css('display','none');";
			  }
		?>
	});
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
					<li <?php if($deci == "") echo "class='current'"; ?>><a href="index.php" id="statis">Thống kê</a></li>
					<li <?php if($deci == "order") echo "class='current'";?>><a href="index.php?mod=order" id="order">Đơn đặt hàng</a></li>
					<li <?php if($deci == "user") echo "class='current'"; ?>><a href="index.php?mod=user" id="user">Người dùng</a></li>
					<li <?php if($deci == "product") echo "class='current'"; ?>><a href="index.php?mod=product" id="product">Sản phẩm</a></li>
				</ul>
				
				<div id="loginbar">
					
					<?php 
						if($user != ""){?>
							<span>Xin chào</span>
							<a href="#"><?php echo $user;?></a><a id="logout" href="login.php">Đăng xuất</a>							
					<?php } else {
						header('location: login.php');
					}
					
					?>
																
				</div>
			</div>
		</div>