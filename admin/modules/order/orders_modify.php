<?php
$id =  $_GET["id"];
$query = "SELECT * FROM tbl_payment WHERE id=" . $id;
$rows = mysql_fetch_array(mysql_query($query));

$query = "SELECT * FROM tbl_product WHERE id IN(".$rows["cart"].")";
$rs = mysql_query($query);
$sosanpham = mysql_num_rows($rs);
$total=0;
	
while($_rows = mysql_fetch_array($rs)){
	$total += $_rows["price"];
}
?>

<div id="box">	
		<h3 id="adduser">Chỉnh sửa đơn hàng</h3>
		<form id="form" action="index.php?mod=order&act=modify&id=<?php echo $id;?>" method="post">			
			<fieldset id="personal">
				<legend>Thông tin khách hàng</legend>
				<label for="name">Họ tên : </label> <input name="name" id="name"
					value="<?php echo $rows["fullname"];?>" type="text" tabindex="1" />
				<br /> <label for="address">Địa chỉ: </label> <input name="address"
					id="address" type="text" value="<?php echo $rows["address"];?>"
					tabindex="2" /> <br /> <label for="email">Email : </label> <input
					name="email" id="email" type="text" tabindex="2"
					value="<?php echo $rows["email"];?>" />
			</fieldset>

			<fieldset id="opt">
				<legend>Thông tin đơn hàng</legend>
				<label for="product">Số lượng sản phẩm : </label> <input
					name="product" disabled="disabled" id="product" type="text"
					tabindex="2" value="<?php echo $sosanpham;?>" /> <br /> <label
					for="pay">Giá tiền : </label> <input name="pay" id="pay"
					disabled="disabled" "text" tabindex="2"
					value="<?php echo $total." VNĐ";?>" /> <br /> <label for="status">Trạng
					thái đơn hàng : </label> <select name="status">
					<option <?php $select = ($rows["status"] == "yes")? "selected " : " "; echo $select;?>
						label=" none" value="yes"">Đã thanh toán</option>
					<option <?php $select = ($rows["status"] == "no")?  "selected " : " "; echo $select;?>
						label="none" value="no">Chưa thanh toán</option>
				</select>
			</fieldset>
			<div align="center">
				<input id="button1" type="submit" value="Xác nhận" /> 
				<input id="button2" type="reset" value="Tải lại" />
			</div>
		</form>

		<?php 
		//Xu ly khi nhan nut modify
		if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["email"]) && isset($_POST["status"])){			
			$name = $_POST["name"];
			$address = $_POST["address"];
			$email = $_POST["email"];
			$status = $_POST["status"];
			$query = "UPDATE tbl_payment SET fullname='$name',address='$address',email='$email',status='$status' WHERE id={$id}";		
			mysql_query($query);
			
			echo "<script>";
			echo "alert('Thay đổi đơn hàng thành công!');";
			echo "$(window).attr('location','index.php?mod=order');";
			echo "</script>";
		}
		?>
</div>


