<div class="center_title_bar">
	Danh sách sản phẩm đã mua
</div>
<table border="1px" align="center" id="list_cart">
<thead>
	<th width="450" colspan="2">Tên sản phẩm</th>
	<th>Giá sản phẩm</th>
	<th>Xóa</th>
</thead>
<?php
$cart = isset($_SESSION['cart'])?$_SESSION['cart']:"";
if($cart != ""){
$str = "SELECT * FROM tbl_product WHERE id in ($cart)";
$result = mysql_query($str);
$t = 0;
while($rows = mysql_fetch_array($result)){
	$id = $rows['id'];
	$name = $rows['name'];
	$price = number_format($rows['price'],0,'.',',');
	$photo = $rows['photo'];
	$t = $t + $rows['price'];	
?>
<tbody>
<tr>
	<td align="center">
		<img src="<?php echo $photo; ?>" width="50" height="50" />
	</td>
	<td>
		<?php echo $name; ?>
	</td>
	<td>
		<b style="color: red;"><?php echo $price; ?></b>
	</td>
	<td>
		<a onclick="return confirm('Bạn chắc chắn muốn xóa?');" href='index.php?mod=cart&act=del_cart&id=<?php echo $id;?>'>Xóa</a>
	</td>
</tr>
<?php
}
?>
<tr>
	<td colspan="2">
		<b>Tổng số:</b>
	</td>
	<td colspan="2">
		 <b style="color: red;"><?php echo number_format($t,0,'.',','); ?></b>
	</td>	
</tr>
<tr>
	<td colspan="4" align="center">	
		<b>
			<a href="index.php?mod=product">[Mua Tiếp]</a>
			<a href="index.php?mod=cart&act=del_cart&id=all">[Xóa Hết]</a>
			<a href="index.php?mod=cart&act=payment">[Đặt hàng]</a>
		</b>
	</td>
</tr>
<?php
}
else{
?>
<tr>
 <td colspan="4" style="font-weight: bold; text-align: center;">
	Không có sản phẩm nào trong giỏ hàng!
	Mời bạn mua hàng <a href="index.php?mod=product">tại đây!</a>
 </td>
</tr>
<?php
}
?>
</tbody>
</table>
