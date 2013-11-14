<td>
<?php
$id = $_GET['id'];
$str = "DELETE FROM tbl_product WHERE id = $id";
$result = mysql_query($str);
if($result)
	echo 'Xoa thanh cong san pham!';
else
	echo 'Xoa that bai!';
?>
</td>