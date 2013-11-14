<div id="box">
			<h3 id="add_user">THÊM MỚI NGƯỜI DÙNG</h3>
			<form id="form" action="..." method="post">
				<fieldset id="personal">
					<legend>Thông tin cá nhân</legend>
					<label for="username">Tên đăng nhập :</label>
					<input name="username" type="text" value="" tabindex="1" /> <br/>
					<label for="fullname">Tên đầy đủ : </label> 
					<input name="fullname" id="fullname" type="text" tabindex="1" /> <br /> 
					<label for="pass">Nhập mật khẩu : </label> 
					<input name="pass" id="pass" type="password" tabindex="2" /> <br /> 
					<label for="pass-2">Xác nhận mật khẩu: </label>
					<input name="pass-2" id="pass-2" type="password" tabindex="2" /> <br />
					<label for="email">Email : </label> 
					<input name="email" id="email" type="text" tabindex="2" /> <br />
				</fieldset>
				<fieldset id="opt">
					<legend>Nhóm người dùng</legend>
					<label for="group">Nhóm : </label> 
					<select name="group">
						<option selected="selected" label="none" value="none">General</option>
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


