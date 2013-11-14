<td>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$id_group = $_POST['id_group'];
$photo = $_POST['photo'];
$sumary = $_POST['sumary'];
$detail = $_POST['detail'];
//echo "$name - $price - $id_group - $photo - $sumary - $detail";
$str = "UPDATE tbl_product SET name = '$name', price='$price',
		id_group = '$id_group', photo = '$photo', sumary='$sumary',
		detail = '$detail' WHERE id = $id";
$result = mysql_query($str);
if($result)
	echo "Sua san pham thanh cong!";
else
	echo "Sua san pham that bai!";
?>
</td>