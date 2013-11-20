<div id="box">	
		<h3 id="adduser">THÊM MỚI ĐƠN HÀNG</h3>
		<form id="form" action="index.php?mod=order&act=add method="post">			
			<fieldset id="personal">
				<legend>Thông tin khách hàng</legend>
				<label for="name">Họ tên : </label> <input name="name" id="name" value="" type="text" tabindex="1" />
				<br /> 
				<label for="address">Địa chỉ: </label> <input name="address"
					id="address" type="text" value=""
					tabindex="2" /> <br /> 
				<label for="email">Email : </label> <input
					name="email" id="email" type="text" tabindex="2" value="" /> <br/>
				<label for="tel">Điện thoại: </label> <input
					name="tel" id="tel" type="text" tabindex="2" value="" />
			</fieldset>

			<fieldset id="opt">
				<legend>Thông tin đơn hàng</legend>
				<label for="product">Sản phẩm đã mua : </label> 
				<input name="product" id="product" type="text" tabindex="2" value="" /> <br />  
				<label for="status">Trạng thái đơn hàng : </label> 
				<select name="status" style="width: 140px;">
					<option label=" none" value="yes"">Đã thanh toán</option>
					<option label="none" value="no" selected>Chưa thanh toán</option>
				</select>
			</fieldset>
			<div align="center">
				<input id="button1" type="submit" value="Xác nhận" /> <input
					id="button2" type="reset" value="Nhập lại" />
			</div>
		</form>

		<?php 
		//Xu ly khi nhan nut modify
		if(isset($_POST["name"])){			
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
