<?php
$id =  $_GET["id"];
$groupId = $id;
$query = "SELECT * FROM tbl_group_user WHERE id=" . $id;
$rows = mysql_fetch_array(mysql_query($query));

?>

<div id="box">
			<h3 id="modify_group">CHỈNH SỬA THÔNG TIN NHÓM NGƯỜI DÙNG</h3>
			<form id="form" action="index.php?mod=user&act=modgroup&id=<?php echo $id;?>" method="post">
				<fieldset id="personal">
					<legend>Thông tin nhóm</legend>
					<label for="groupname">Tên nhóm :</label>
					<input name="groupname" type="text" value="<?php echo $rows["name"];?>" <?php if($groupId == 1)echo " disabled ";?> tabindex="1" /><br>
					<label for="groupdetail">Mô tả : </label> 
					<textarea name="groupdetail"> <?php echo $rows["detail"];?></textarea> <br />
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
							$result = mysql_query("SELECT * FROM tbl_permission, tbl_permission_group WHERE permissionId=id AND groupId={$groupId}");
							$tbl_permission = array("QUẢN LÝ NGƯỜI DÙNG","QUẢN LÝ SẢN PHẨM","QUẢN LÝ ĐƠN HÀNG","QUẢN LÝ QUYỀN");
							$tbl_permission_id = array("MANAGEMENT_USER","MANAGEMENT_PRODUCT","MANAGEMENT_ORDER","MANAGEMENT_PERMISSION");
							$group_permission = array();
							$i=0;
							while($rows = mysql_fetch_array($result))
								$group_permission[$i++] = $rows["name"];														
							
							for($i=0; $i < sizeof($tbl_permission); $i++){
								if(contain($tbl_permission[$i],$group_permission)){															
								 	if($groupId == 1){
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

<?php 
	//Xu ly khi nhan nut modify
	
				
	if(isset($_POST["groupdetail"])){					
		$groupname = isset($_POST["groupname"])?$_POST["groupname"] : "";
		$groupdetail = $_POST["groupdetail"];
		
		$permission = array();
		$i=0;
		if(!empty($_POST['permission'])) {			
			$query = "DELETE FROM tbl_permission_group WHERE groupId={$groupId}";
			mysql_query($query);
			
			foreach($_POST['permission'] as $check) {
				 $permission[$i++] = $check;
				 $query = "INSERT INTO tbl_permission_group(permissionId, groupId) VALUES('{$check}','{$groupId}')";
				 $success = mysql_query($query);				
			}				
		}
				
		
		if(isset($_POST["groupname"]) && $groupname == ""){
			$msg = "<script>"."alert('Tên nhóm không được trống!');"."</script>";
			echo $msg;
		} else {
		
		
		if($id != 1)
			$query = "UPDATE tbl_group_user SET name='$groupname',detail='$groupdetail' WHERE id='$id'";
		else 
			$query = "UPDATE tbl_group_user SET detail='$groupdetail' WHERE id='$id'";
		$success = mysql_query($query);
			
		if($success){
			$msg = "<script>"."alert('Chỉnh sửa nhóm tin thành công!');"."$(window).attr('location','index.php?mod=user');"."</script>";
		} else {
			$msg = "<script>"."alert('Tên nhóm đã tồn tại!');"."</script>";
		}
		echo $msg;
		}						 				
	}	
?>

