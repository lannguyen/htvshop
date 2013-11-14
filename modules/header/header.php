<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Computer Store</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="/htvshop/css/style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="/htvshop/css/iecss.css" />
<![endif]-->
<script type="text/javascript" src="/htvshop/js/boxOver.js"></script>
<script type="text/javascript" src="/htvshop/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/htvshop/js/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".title_box a").live('click', function(){
		$(this).parent().parent().children('.left_menu').toggle();

		if($(this).hasClass('close')){ 
			$(this).removeClass('close');
		}
		else
			$(this).addClass('close');
		});

	$( "#btn_submit" ).click(function() {
		$( "#contact" ).submit();
		});
}); 
</script>
</head>

<body>
	<div id="main_container">
		<div id="header">
			<div class="top_right">
				<div class="languages">
					<div class="lang_text">Ngôn ngữ:</div>
					<a href="#" class="lang"><img src="images/en.gif" alt="No images!" border="0" />
					</a> <a href="#" class="lang"><img src="images/de.gif" alt="No images!"
						border="0" /> </a>
				</div>
				<!-- <div class="big_banner">
					<a href="#"> <img src="/htvshop/images/banner728.jpg" alt=""
						border="0" />
					</a>
				</div> -->
			</div>
			<!-- <div id="logo">
				<a href="#"><img src="/htvshop/images/logo.png" alt="" border="0"
					width="182" height="85" /> </a>
			</div> -->
		</div>
		<div id="main_content">
			<div id="menu_tab">
				<ul class="menu">
					<li><a href="http://localhost/htvshop" class="nav"> Trang Chủ </a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=product" class="nav">Sản Phẩm</a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=news" class="nav">Tin Tức</a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=about" class="nav">Giới Thiệu</a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=contact" class="nav">Liên Hệ</a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=cart" class="nav">Giỏ Hàng </a></li>
					<li class="divider"></li>
					<li><a href="index.php?mod=login" class="nav">Đăng Nhập</a></li>
					<li class="divider"></li>										
				</ul>
				
				<form class="search" method="post" action="index.php?mod=product">
					<input type="text" value="" "Nhập tên sản phẩm" name="search" placeholder="Tìm kiếm..." />
				</form>
			</div>
			<!-- end of menu tab -->

			<div class="left_content">
				<div id="product">
					<div class="title_box">
						<a href="#" style="text-decoration: none;" class="link_title_box">Danh mục sản phẩm</a>
					</div>
					<ul class="left_menu">
					<?php
						$str = "SELECT * FROM tbl_group_product";
						$result = mysql_query($str);
						$d = 0;

						while($rows = mysql_fetch_array($result)){
							$d = $d + 1;
					?>					
						<li class="even"><a href="index.php?mod=product&category=<?php echo $rows['id'];?>"><?php echo $rows['name'];?></a></li>										
					<?php }?>
					</ul>
				</div>
				<!-- Danh sach nha san xuat -->
				<div id="manufacture">
					<div class="title_box" style="clear: both;">
						<a href="#" style="text-decoration: none;" class="link_title_box">Hãng sản xuất</a>
					</div>
					<ul class="left_menu">
					<?php
						$str = "SELECT * FROM tbl_manufacture";
						$result = mysql_query($str);
						$d = 0;

						while($rows = mysql_fetch_array($result)){
							$d = $d + 1;					 
					?>
						<li class="even"><a href="index.php?mod=product&manufacture=<?php echo $rows['id'];?>"><?php echo $rows['name'];?></a></li>
						<?php }?>				
					</ul>
				</div>

				<div class="shopping_cart">
					<div class="title_box">
						<a href="index.php?mod=cart" style="text-decoration: none; margin: 0 0 0 15px; color: #0955B2;">Hỗ trợ khách hàng</a>
					</div> <br />
										
					<div class="cart_icon">
						<a href="#"><img src="images/support.png" alt="" width="35"
							height="35" border="0" /> </a>
					</div>					
					<div class="cart_details">
						Nguyễn Ngọc Lân <br /> <span class="border_cart"></span> <span>ĐT: 0973954165</span>			
					</div>
					<div style="clear:both; height: 10px;"></div>
					<div class="cart_icon">
						<a href="#"><img src="images/support_woman.png" alt="" width="35"
							height="35" border="0" /> </a>
					</div>					
					<div class="cart_details">
						Lê Xuân Trường <br /> <span class="border_cart"></span> <span>ĐT: 0973954165</span>			
					</div>
										
				</div>
				
			
				
			

			</div>
			<!-- end of left content -->
			<div class="center_content">