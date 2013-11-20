<?php

$act = $_GET["act"];
$id = $_GET["id"];
$userId = $id;

if($userId != 1){
	$query = "DELETE FROM tbl_user WHERE id IN ({$id})";
	mysql_query($query);
	$msg = "<script>". "alert('Xóa người dùng thành công!');" . "$(window).attr('location','index.php?mod=user');". "</script>";   
}
else {
	$msg = "<script>". "alert('Không thể xóa người dùng admin!');" . "$(window).attr('location','index.php?mod=user');". "</script>";
}

echo $msg;
 
?>


