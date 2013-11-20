<!-- Create a slider to present list product -->

<div class="center_title_bar">Sản phẩm hot</div>
<div id="slider">
	<div id="some-div-id">
		<?php
			$str = "SELECT * FROM tbl_product ORDER BY buytimes DESC LIMIT 5";
			$result = mysql_query($str);
			$d = 0;

			while($rows = mysql_fetch_array($result)){
				$d = $d + 1;					 
		?>
		<div class="oferta">
			<img src="<?php echo $rows['photo'];?>" width="300" height="200" border="0"
				class="oferta_img" alt="No image!" />
			<div class="oferta_details">
				<div class="oferta_title"><?php echo $rows['name'];?></div>
				<div class="oferta_text"><?php echo $rows['detail']?></div>
				<a href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>" class="prod_buy" style="margin-left: 0px;">Chi tiết</a>
			</div>
		</div>
		<?php 
			};
		?>
	</div>
	
	<div id="slider-button-border">
	</div>
	
	<script type="text/javascript">
					$(document).ready(function(){
						$("#some-div-id").cycle({
						    //Các tùy chọn của jQuery cycle
						    fx:  'fade', //Hiệu ứng
						    speed:  2000, //Tốc độ diễn ra hiệu ứng 1/1000s
						    timeout: 1000, //Thời gian thay đổi giữa các trong 3s
						    pager:  '#slider-button-border' //Tạo phân trang
						});
						$("#slider-button-border a").each(function(){
							$(this).html('&nbsp;');
						});
					});

					$(".oferta").mouseover(function(){
						$('#some-div-id').cycle('pause');
					});
					$(".oferta").mouseout(function(){
						$('#some-div-id').cycle('resume');
					});
	</script>
</div>

<div class="center_title_bar">
	Danh sách sản phẩm mới
</div>
<?php
$soproduct = 16;
$base_url= 'index.php?mod=product&';

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$query = mysql_query("SELECT * FROM tbl_product ORDER BY post_date DESC LIMIT 20");
$tongsodong = mysql_num_rows($query);
$str = mysql_query("SELECT * FROM tbl_product ORDER BY post_date DESC LIMIT $s,$soproduct");
$d = 0;

while($rows = mysql_fetch_array($str)){
	$d = $d + 1;
	?>
<div class="prod_box">
	<div class="center_prod_box">
		<div class="product_title">
			<a
				href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?>
			</a>
		</div>

		<div class="product_img">
			<a href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>"><img alt="No image!" width="100" height="100" border="0"
				src="<?php echo $rows['photo']; ?>" /></a>
		</div>
		<div class="prod_price">
			Giá: <span class="price"><?php echo number_format($rows['price'],0,'.',','); ?>$</span>
		</div>
	</div>
	<div class="prod_details_tab">
		<a
			href="index.php?mod=cart&act=add_cart&id=<?php echo $rows['id']; ?>"
			class="prod_buy">Mua</a>
	</div>
</div>
<?php
	} ?>
<div id="nav_page">
	Trang &nbsp;<?php echo pagenav($base_url, $s, $tongsodong, $soproduct);?>
</div>		


