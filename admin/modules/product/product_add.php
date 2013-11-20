<div id="box">
	<h3>THÊM MỚI SẢN PHẨM</h3>
	<form id="form" action="..." method="post" enctype="multipart/form-data">
		<fieldset id="personal">
			<legend>Thông tin sản phẩm</legend>
			<label for="name">Tên sản phẩm: </label> 
			<input name="name" type="text" tabindex="1" /> <br /> 
			<label for="price">Đơn giá : </label>
			<input name="price" type="text" tabindex="2" /> <br />
			<label for="warranty">Bảo hành : </label> 
			<input name="warranty" type="text" tabindex="2" /> <br/><br/>
			<label for="sumary">Mô tả : </label> 
			<textarea name="sumary" type="text" tabindex="2" ></textarea> <br/> <br/>
			<label for="detail">Thông số kỹ thuật : </label> 
			<textarea name="detail" type="text" tabindex="2"></textarea> <br/><br/>
			<label for="img">Ảnh sản phẩm : </label> 
			<input id="img" name="img" type="url" placeholder="Nhập vào đường dẫn ảnh..." tabindex="2" /><br/>
			<input type="file" id="upload" name="upload"/>
			<br />
		</fieldset>
		<fieldset id="opt">
			<legend>Thông tin bổ sung</legend>
			<label for="manufacture">Hãng sản xuất : </label> 
			<select name="manufacture">
				<?php 
					$manufacture = mysql_query("SELECT * FROM tbl_manufacture");
					while($rows = mysql_fetch_array($manufacture)){
				?>
				<option label="none" value="<?php echo $rows["id"];?>"><?php echo $rows["name"];?></option>
				<?php }?>
			</select> <br/> 
			
			<label for="category">Nhóm sản phẩm: </label> 
			<select name="category">
				<?php 
					$category = mysql_query("SELECT * FROM tbl_group_product");
					while($rows = mysql_fetch_array($category)){
				?>
					<option label="none" value="<?php echo $rows["id"];?>"><?php echo $rows["name"];?></option>
				<?php }?>	
			</select> <br /> 
			<label for="status">Tình trạng: </label> 
			<select name="status">
				<option selected="selected" label="none" value="yes">Còn hàng</option>
				<option selected="selected" label="none" value="no">Hết hàng</option>
			</select> <br /> <br />

		</fieldset>

		<div align="center">
			<input id="button1" type="submit" value="Xác nhận" /> <input
				id="button2" type="reset" value="Xóa dữ liệu" />
		</div>
	</form>
</div>

<script>
	CKEDITOR.inline( 'sumary');
</script>

<?php 
	//Xu ly khi nhan nut add
	if(isset($_POST["name"])){					
		$name = $_POST["name"];
		$price = $_POST["price"];
		$warranty = $_POST["warranty"];
		$manufacture = $_POST["manufacture"];
		$category = $_POST["category"];
		$img = $_POST["img"];
		$upload = $_POST["upload"];		
		
		if($name != ""){
			if($img != "" && filter_var($img, FILTER_VALIDATE_URL) && $upload == ""){
				$query = "INSERT INTO tbl_product(name,price,id_group,photo,sumary,detail,id_manufacture,status,warranty) VALUES('$groupname','$groupdetail')";
			}
			$query = "INSERT INTO tbl_group_user(name,detail) VALUES('$groupname','$groupdetail')";		
			$success = mysql_query($query);
			if($success){
				$msg = "<script>"."alert('Thêm mới nhóm thành công!');"."$(window).attr('location','index.php?mod=user');"."</script>";
			} else {
				$msg = "<script>"."alert('Tên nhóm đã tồn tại!');"."$(window).attr('location','index.php?mod=user');"."</script>";
			}
		} 
			
		else {
			$msg = "<script>"."alert('Tên nhóm không được trống!');"."</script>";
		}
		echo $msg;
	}
?>
