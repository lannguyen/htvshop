<div id="box">
	<h3 id="add_group">TẠO MỚI NHÓM NGƯỜI DÙNG</h3>
	<form id="form" action="index.php?mod=user&act=addgroup" method="post">
		<fieldset id="personal">
			<legend>Thông tin nhóm</legend>
			<label for="groupname">Tên nhóm :</label> <input name="groupname"
				type="text" value="<?php echo $rows["name"];?>" tabindex="1" /><br>
			<label for="groupdetail">Mô tả : </label>
			<textarea name="groupdetail"> <?php echo $rows["detail"];?></textarea>
			<br/>
		</fieldset>

		<fieldset id="opt">
			<legend>Phân quyền nhóm </legend>
			<table border="0">

				<tr>
					<td align="right"><span>Quản lý người dùng</span>
					</td>
					<td align="left" class="checkbox"><input type="checkbox" />
					</td>
					<td align="right"><span>Quản lý nhóm</span>
					</td>
					<td align="left" class="checkbox"><input type="checkbox" />
					</td>
					<td align="right"><span>Quản lý đơn hàng</span>
					</td>
					<td align="left" class="checkbox"><input type="checkbox" />
					</td>
					<td align="right"><span>Quản lý bài viết</span>
					</td>
					<td align="left" class="checkbox"><input type="checkbox" />
					</td>
					<td align="right"><span>Quản lý quyền</span>
					</td>
					<td align="left" class="checkbox"><input type="checkbox" />
					</td>
				</tr>
			</table>
			<!-- <ul id="permission">
						<li><span>Quản lý người dùng</span> <input type="checkbox"/></li>						
						<li><span>Quản lý đơn hàng</span> <input type="checkbox"/></li>						
						<li><span>Quản lý sản phẩm</span> <input type="checkbox"/></li>	
											
					</ul> -->

		</fieldset>
		<div align="center">
			<input id="button1" type="submit" value="Xác nhận" /> <input
				id="button2" type="reset" value="Xóa dữ liệu" />
		</div>

	</form>
</div>

<?php 
	//Xu ly khi nhan nut modify
	if(isset($_POST["groupname"]) && isset($_POST["groupdetail"])){					
		$groupname = $_POST["groupname"];
		$groupdetail = $_POST["groupdetail"];
		
		if($groupname != ""){
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
