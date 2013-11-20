<?php
$id =  $_GET["id"];
$query = "SELECT * FROM tbl_user WHERE id=" . $id;
$rows = mysql_fetch_array(mysql_query($query));
$query = "SELECT * FROM tbl_group_user";
$groupId = $rows["id_group_user"];



?>

<div id="box">
			<h3 id="modify_user">CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h3>
			<form id="form" action="index.php?mod=user&act=modify&id=<?php echo $id;?>" method="post">
				<fieldset id="personal">
					<legend>Thông tin cá nhân</legend>
					<label for="username">Tên đăng nhập :</label>
					<input name="username" type="text" value="<?php echo $rows["username"];?>" <?php if($rows["username"] == "admin")echo " disabled";?> tabindex="1" /><br>
					<label for="fullname">Tên đầy đủ : </label> 
					<input name="fullname" type="text" value="<?php echo $rows["fullname"];?>" tabindex="1" /> <br /> 
					<label for="pass">Nhập mật khẩu : </label> 
					<input name="pass" type="password" tabindex="2" value="" autocomplete="off"/> <br /> 
					<label for="retypepass">Xác nhận mật khẩu: </label>
					<input name="retypepass" type="password" tabindex="2" value="" autocomplete="off"/> <br />
					<label for="email">Email : </label> 
					<input name="email" type="text" tabindex="2" value="<?php echo $rows["email"];?>"/> <br />
				</fieldset>
				<?php 
					$result = mysql_query($query); 										
				?>
				<fieldset id="opt">
					<legend>Nhóm người dùng</legend>
					<label for="group">Nhóm : </label> 
					<select name="group" style="width: auto;" <?php if($groupId == 1)echo "disabled";?>>
					<?php
					
					while ($_rows = mysql_fetch_array($result)){ 
					?>
						<option  <?php $select = ($rows["id_group_user"] == $_rows["id"])? "selected" : ""; echo $select;?> value="<?php echo $_rows["id"];?>" ><?php echo $_rows["name"];?></option>
					<?php }
					?>	
					</select>
				</fieldset>
				
				<fieldset id="opt">
					<legend>Phân quyền nhóm </legend>					 
					<!-- <table border="0" id="permission">					
							<tr>
								<td align="right"><span>Quản lý người dùng</span></td>
								<td align="left" class="checkbox"><input type="checkbox" /></td>
								<td align="right"><span>Quản lý nhóm</span></td>
								<td align="left" class="checkbox"><input type="checkbox" /></td>
								<td align="right"><span>Quản lý đơn hàng</span></td>
								<td align="left" class="checkbox"><input type="checkbox" /></td>
								<td align="right"><span>Quản lý bài viết</span></td>
								<td align="left" class="checkbox"><input type="checkbox" /></td>
								<td align="right"><span>Quản lý quyền</span></td>
								<td align="left" class="checkbox"><input type="checkbox" /></td>
							</tr>										
					</table> -->
					<ul id="permission">
						<?php 
							$result = mysql_query("SELECT * FROM tbl_permission, tbl_permission_user WHERE permissionId=id AND userId={$id}");
							$tbl_permission = array("QUẢN LÝ NGƯỜI DÙNG","QUẢN LÝ SẢN PHẨM","QUẢN LÝ ĐƠN HÀNG","QUẢN LÝ QUYỀN");
							$tbl_permission_id = array("MANAGEMENT_USER","MANAGEMENT_PRODUCT","MANAGEMENT_ORDER","MANAGEMENT_PERMISSION");
							$user_permission = array();
							$i=0;
							while($rows = mysql_fetch_array($result))
								$user_permission[$i++] = $rows["name"];														
							
							for($i=0; $i < sizeof($tbl_permission); $i++){
								if(contain($tbl_permission[$i],$user_permission)){															
								 	if($id == 1){
									?> <li><span><?php echo $tbl_permission[$i] ?></span> <input name="permission[]" type="checkbox" value="<?php echo $tbl_permission_id[$i];?>" checked disabled="disabled"/></li>																				
								<?php }else{ ?> <li><span><?php echo $tbl_permission[$i] ?></span> <input name="permission[]" type="checkbox" value="<?php echo $tbl_permission_id[$i];?>" checked /></li>
									
								<?php } } else { ?>
									 <li><span><?php echo $tbl_permission[$i] ?></span> <input name="permission[]" type="checkbox" value="<?php echo $tbl_permission_id[$i];?>"  /></li>
						<?php } 
							}
						?>					
					</ul>						
				</fieldset>
				
				<div align="center">
					<input id="button1" type="submit" value="Xác nhận" /> <input
						id="button2" type="reset" value="Tải lại" />
				</div>
				
			</form>
		</div>
	</div>
</div>

<?php 
	//Xu ly khi nhan nut modify
				
	if(isset($_POST["pass"])){			
		
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$retypepass = $_POST["retypepass"];
		$group = isset($_POST["group"])?$_POST["group"] : "";
		$username = isset($_POST["username"])?$_POST["username"] : "";
			
		if(isset($_POST["username"]) && $username == ""){
			$msg = "<script>"."alert('Tên đăng nhập không được để trống!');"."</script>";
			echo $msg;
		}
		
		$permission = array();
		$i=0;
		if(!empty($_POST['permission'])) {
			$query = "DELETE FROM tbl_permission_user WHERE userId={$id}";
			mysql_query($query);
		
			foreach($_POST['permission'] as $check) {
				$permission[$i++] = $check;
				$query = "INSERT INTO tbl_permission_user(permissionId, userId) VALUES('{$check}','{$id}')";
				$success = mysql_query($query);		
			}
		}
		
		if($pass == $retypepass && $pass != ""){
			$pass = md5($pass);
			if($id == 1){
				$query = "UPDATE tbl_user SET password='$pass',fullname='$fullname',email='$email' WHERE id='$id'";
			}
			else {
					$query = "UPDATE tbl_user SET username='$username',password='$pass',id_group_user='$group',email='$email',fullname='$fullname' WHERE id='$id'";
			}		
			mysql_query($query);
			$msg = "<script>"."alert('Thay đổi thông tin thành công!');"."$(window).attr('location','index.php?mod=user');"."</script>";
			echo $msg;
			
		} else if($pass == $retypepass && $pass == ""){
			/* $query = "UPDATE tbl_user SET username='$username',id_group_user='$group',email='$email',fullname='$fullname' WHERE id='$id'";
			mysql_query($query);
			echo "<script>";
			echo "alert('Thay đổi thông tin thành công!');";
			echo "$(window).attr('location','index.php?mod=user');";
			echo "</script>"; */
			$msg = "<script>"."alert('Mật khẩu không được để trống!');"."</script>";
			echo $msg;			
		} 
		else{
			$msg = "<script>"."alert('Mật khẩu đã nhập không khớp!');"."</script>";
			echo $msg;			
		}
	}	
?>


