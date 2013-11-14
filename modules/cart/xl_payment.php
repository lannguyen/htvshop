<?php
$fullname = $_POST['fullname'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$add = $_POST['add'];
$cart = $_SESSION['cart'];

$str = "INSERT INTO tbl_payment(fullname,tel,email,address,cart) VALUES('$fullname','$tel','$email','$add','$cart')";

$result = mysql_query($str);
if($result){
	session_destroy();
	
	/* Update order in tbl_product */
	$str =  "SELECT * from tbl_product WHERE id IN (".$cart.")";
	
	$result = mysql_query($str);
	while ($rows = mysql_fetch_array($result)){
		$buytimes = $rows['buytimes'] + 1;		
		mysql_query("UPDATE tbl_product SET buytimes=".$buytimes." WHERE id =" . $rows['id']);
	}
	$msg="Đặt hàng thành công!";
}
else
	$msg = "Đặt hàng thất bại!";
?>
<div class="feedback_msg"><h2 style="color: red;"> <?php echo $msg;?> </h2>
</div>