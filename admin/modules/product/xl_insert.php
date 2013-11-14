<td>
<?php
$name = $_POST['name'];
$price = $_POST['price'];
$id_group = $_POST['id_group'];
$photo = $_POST['photo'];
$sumary = $_POST['sumary'];
$detail = $_POST['detail'];
//echo "$name - $price - $id_group - $photo - $sumary - $detail";
$str = "INSERT INTO tbl_product VALUES
		('','$name','$price','$id_group','$photo','$sumary','$detail',NOW())";
$result = mysql_query($str);
if($result)
	echo "Them san pham thanh cong!";
else
	echo "Them san pham that bai!";
?>
</td>