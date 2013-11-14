<?php


$act = $_GET["act"];
$id = $_GET["id"];
$query = "DELETE FROM tbl_payment WHERE id IN ({$id})";
echo $query;
mysql_query($query);
echo "<script>";
echo "alert('Xóa đơn hàng thành công!');";
echo "$(window).attr('location','index.php?mod=order');";
echo "</script>";

?>
