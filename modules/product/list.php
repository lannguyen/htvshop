<div class="center_title_bar">
	Danh sách sản phẩm
</div>
<?php
$soproduct = 16;
$query = "SELECT * FROM tbl_product";
$base_url= 'index.php?mod=product&';

/** Chon cac san pham cua mot loai **/
if(isset($_GET['category'])){
	$query="SELECT tbl_product.* FROM tbl_product JOIN tbl_group_product ON tbl_product.id_group = tbl_group_product.id WHERE tbl_product.id_group=". $_GET['category'];
	$base_url= 'index.php?mod=product&category='.$_GET['category'].'&';
}

/** Chon cac san pham cua mot hang **/
if(isset($_GET['manufacture'])){
	$query="SELECT tbl_product.* FROM tbl_product JOIN tbl_manufacture ON tbl_product.id_manufacture = tbl_manufacture.id WHERE tbl_product.id_manufacture=". $_GET['manufacture'];
	$base_url= 'index.php?mod=product&manufacture='.$_GET['manufacture'].'&';
}

/* Tim kiem san phan */
if(isset($_POST['search'])){
	$query = "SELECT * FROM tbl_product WHERE name LIKE '%".$_POST['search']."%'";
} 

/** Tu dong lay 20 san pham moi them vao **/
if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;

$tongsodong = mysql_num_rows(mysql_query($query));
$str = mysql_query($query ." limit $s,$soproduct");
$d = 0;
while($rows = mysql_fetch_array($str)){
	$d = $d+1;
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
			Gia: <span class="price"><?php echo number_format($rows['price'],0,'.',','); ?>$</span>
		</div>
	</div>
	<div class="prod_details_tab">
		<a
			href="index.php?mod=cart&act=add_cart&id=<?php echo $rows['id']; ?>"
			class="prod_buy">Mua</a>
	</div>
</div>
<?php
	}
?>
<div id="nav_page">
	Trang &nbsp;<?php echo pagenav($base_url, $s, $tongsodong, $soproduct);?>
</div>
	
