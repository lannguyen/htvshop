<?php
	$id = $_GET['id'];
	$str = "SELECT * FROM tbl_product WHERE id = $id";
	$result = mysql_query($str);
	$d = 0;
?>
<div class="center_content">
<?php
while($rows = mysql_fetch_array($result)){
	$d = $d + 1;
	?>

	<div class="center_title_bar">
		<?php echo $rows["name"];?>
	</div>
	<div class="prod_box_big">
		<div class="center_prod_box_big">
			<div class="product_img_big">
				<a href="javascript:popImage('images/big_pic.jpg','Some Title')"
					title="header=[Zoom] body=[&nbsp;] fade=[on]"> <img
					src="<?php echo $rows["photo"];?>" alt="" border="0" />
				</a>
			</div>
			<div class="details_big_box">
				<div class="product_title_big">
					<a
						href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>"><?php echo $rows['name'];?>
					</a>
				</div>
				<div class="specifications">
					Tình trạng:&nbsp; <span class="blue"><?php $status = ($rows["status"] == "yes")? "Còn hàng": "Hết hàng"; echo $status;?></span><br /> 
					Bảo hành:&nbsp;<span class="blue"><?php echo $rows["warranty"];?></span><br /> 
					Thông số:&nbsp;<span class="blue"><?php echo $rows["detail"];?></span><br />
				</div>
				<div class="prod_price_big">Giá bán:
					<span class="price"><?php echo $rows["price"];?> </span>
				</div>
				<a href="index.php?mod=cart&act=add_cart&id=<?php echo $rows['id']; ?>" class="prod_buy_alter">Mua</a>

			</div>
		</div>
	</div>	
	<?php
	 }?>

<!-- end of center content -->