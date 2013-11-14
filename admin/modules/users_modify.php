<?php
$id =  $_GET["id"];
$query = "SELECT * FROM tbl_user WHERE id=" . $id;
$rows = mysql_fetch_array(mysql_query($query));

$query = "SELECT * FROM tbl_group_user";

?>

<div id="box">
			<h3 id="modify_user">CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h3>
			<form id="form" action="index.php?mod=user&act=modify&id=<?php echo $id;?>" method="post">
				<fieldset id="personal">
					<legend>Thông tin cá nhân</legend>
					<label for="username">Tên đăng nhập :</label>
					<input name="username" type="text" value="<?php echo $rows["username"];?>" tabindex="1" /><br>
					<label for="fullname">Tên đầy đủ : </label> 
					<input name="fullname" type="text" value="<?php echo $rows["fullname"];?>" tabindex="1" /> <br /> 
					<label for="pass">Nhập mật khẩu : </label> 
					<input name="pass" id="pass" type="password" tabindex="2" /> <br /> 
					<label for="retypepass">Xác nhận mật khẩu: </label>
					<input name="retypepass" type="password" tabindex="2" /> <br />
					<label for="email">Email : </label> 
					<input name="email" type="text" tabindex="2" value="<?php echo $rows["email"];?>"/> <br />
				</fieldset>
				<?php 
					$result = mysql_query($query); 										
				?>
				<fieldset id="opt">
					<legend>Nhóm người dùng</legend>
					<label for="group">Nhóm : </label> 
					<select name="group">
					<?php
					while ($_rows = mysql_fetch_array($result)){ 
					?>
						<option <?php $select = ($rows["id_group_user"] == $_rows["id"])? "selected" : ""; echo $select;?> value="<?php echo $_rows["id"];?>"><?php echo $_rows["name"];?></option>
					<?php }?>	
					</select>
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
				
	if(isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["pass"]) && isset($_POST["retypepass"]) && isset($_POST["email"])){			
		$username = $_POST["username"];
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$retypepass = $_POST["retypepass"];
		$group = $_POST["group"];
		if($pass == $retypepass){
			$pass = md5($pass);
			$query = "UPDATE tbl_user SET username='$username',password='$pass',id_group_user='$group',email='$email',fullname='$fullname' WHERE id='$id'";		
			mysql_query($query);
			echo "<script>";
			echo "alert('Thay đổi thông tin thành công!');";
			echo "$(window).attr('location','index.php?mod=user');";
			echo "</script>";
			
		} else {
			echo "<script>";
			echo "alert('Mật khẩu đã nhập không khớp!');";
			echo "$(window).attr('location','index.php?mod=user&act=modify&id=${id}');";
			echo "</script>";
		}
			
	
	}	
?>


