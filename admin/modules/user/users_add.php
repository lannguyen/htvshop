<?php 
$username = isset($_POST["username"])?$_POST["username"]:"";
$fullname = isset($_POST["fullname"])?$_POST["fullname"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
$retypepass = isset($_POST["retypepass"]) ? $_POST["retypepass"] : "";
$group = isset($_POST["group"]) ? $_POST["group"] : "";
?>
<div id="box">
			<h3 id="add_user">THÊM MỚI NGƯỜI DÙNG</h3>
			<form id="form" action="index.php?mod=user&act=add" method="post">
				<fieldset id="personal">
					<legend>Thông tin cá nhân</legend>
					<label for="username">Tên đăng nhập :</label>
					<input name="username" type="text" value="<?php echo $username;?>" tabindex="1" /> <br/>
					<label for="fullname">Tên đầy đủ : </label> 
					<input name="fullname" id="fullname" type="text" tabindex="1" value="<?php echo $fullname;?>"/> <br /> 
					<label for="pass">Nhập mật khẩu : </label> 
					<input name="pass" type="password" tabindex="2" autocomplete="off"/> <br /> 
					<label for="retypepass">Xác nhận mật khẩu: </label>
					<input name="retypepass" type="password" tabindex="2" autocomplete="off"/> <br />
					<label for="email">Email : </label> 
					<input name="email" id="email" type="text" tabindex="2" value="<?php echo $email;?>"/> <br />
				</fieldset>
				<fieldset id="opt">
					<legend>Nhóm người dùng</legend>
					<label for="group">Nhóm : </label> 
					<select name="group" style="width: auto;">
						<?php
							$result = mysql_query("SELECT * FROM tbl_group_user");
							while ($rows = mysql_fetch_array($result)){ 
						?>
							<option <?php $select = ($group == $rows["id"])? "selected" : ""; echo $select;?> value="<?php echo $rows["id"];?>"><?php echo $rows["name"];?></option>
							
						<?php }?>	
					</select>
				</fieldset>
				<div align="center">
					<input id="button1" type="submit" value="Xác nhận" /> <input
						id="button2" type="reset" value="Xóa dữ liệu" />
				</div>
			</form>

		</div>
	</div>
</div>

<?php 
	//Xu ly khi nhan nut add
				
	if(isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["pass"]) && isset($_POST["retypepass"]) && isset($_POST["email"])){			
		/* $username = $_POST["username"];
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$retypepass = $_POST["retypepass"];
		$group = $_POST["group"]; */
		if($pass == $retypepass && $pass != ""){
			$pass = md5($pass);
			$query = "INSERT INTO tbl_user(username, password, id_group_user, email, fullname) VALUES('$username','$pass',{$group},'$email','$fullname')";
			/* $query = "UPDATE tbl_user SET username='$username',password='$pass',id_group_user='$group',email='$email',fullname='$fullname' WHERE id='$id'"; */		
			$success = mysql_query($query);			
			
			if($success){
				 $msg = "<script>"."alert('Thêm người dùng thành công!');"."$(window).attr('location','index.php?mod=user');"."</script>"; 
				
			} else {
				$msg = "<script>"."alert('Tên đăng nhập hoặc email đăng ký đã tồn tại!');"."$(window).attr('location','index.php?mod=user');"."</script>";
			}
			
			 echo $msg; 
		} else if($pass == $retypepass && $pass == ""){
			$msg = "<script>"."alert('Mật khẩu không được để trống!');"."</script>";
			echo $msg;
		} else {
			$msg = "<script>"."alert('Mật khẩu đã nhập không khớp!');"."</script>";
			echo $msg;
		}
	} 
		
?>


