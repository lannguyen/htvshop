	<td>
	<br />
	<b style="color: red; font-size: 20px;">
		DANH SÁCH SẢN PHẨM:
	</b>
	<br />
	<br />
<?php
$soproduct = 6;
$base_url= 'index.php?mod=product&';

if($_GET['start'])
	$s = $_GET['start'];
else
	$s = 1; 
$query = mysql_query("SELECT * FROM tbl_product"); 
$tongsodong = mysql_num_rows($query);
$str = mysql_query("SELECT * FROM tbl_product limit $s,$soproduct");
?>
<table width="100%" border="0">
	<?php
	while($rows = mysql_fetch_array($str)){		
	?>
		<tr>
		<td align="center">
		<img src="<?php echo $rows['photo']; ?>" width="50" height="50"/>
		</td>
		<td>
		<font style="color: blue; font-weight: bold;">
		<a href="index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>">
			<?php echo $rows['name']; ?>
		</a>	
		</font>
		</td>
		<td>
		<font style="color: red; font-weight: bold;">
			Giá: <?php echo $rows['price']; ?>
		</font>
		</td>
		<td>
			<a href="index.php?mod=product&act=edit&id=<?php echo $rows['id']; ?>">
				[Sửa]
			</a>
		</td>

		<td>
			<a onclick="return confirm('Chac chan xoa khong?')" href="index.php?mod=product&act=delete&id=<?php echo $rows['id']; ?>">
				[Xóa]
			</a>
		</td>
	</tr>
<?php
}
?>
<tr>
	<td colspan="5" align="center">
		<?php
		echo pagenav($base_url, $s, $tongsodong, $soproduct);
		?>
	</td>
</tr>
</table>
	
	</td>