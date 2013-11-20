<?php

$act = $_GET["act"];
$id = $_GET["id"];
$groupId = $id;

if($groupId != 1){
	$query = "DELETE FROM tbl_group_user WHERE id IN ({$id})";
	mysql_query($query);
	$msg = "<script>". "alert('Xóa nhóm thành công!');" . "$(window).attr('location','index.php?mod=user');". "</script>";   
}
else {
	$msg = "<script>". "alert('Không thể xóa nhóm Super Administrator!');" . "$(window).attr('location','index.php?mod=user');". "</script>";
}

echo $msg;
 
?>

