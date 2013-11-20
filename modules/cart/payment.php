<!-- <div class="center_title_bar">
	MỜI KHÁCH HÀNG ĐIỀN THÔNG TIN ĐỂ THỰC HIỆN THANH TOÁN
</div>
<br /><br />
<form action="index.php?mod=cart&act=xl_payment" method="POST">
<br/>
<table border="0" align="center">
<tr>
	<td>	
	Tên khách hàng:
	</td>
	<td>
		<input type="text" name="fullname" value="" />
	</td>
</tr>
<tr>
	<td>	
	Số điện thoại:
	</td>
	<td>
		<input type="text" name="tel" value="" />
	</td>
</tr>
<tr>
	<td>	
	Email:
	</td>
	<td>
		<input type="text" name="email" value="" />
	</td>
</tr>
<tr>
	<td>	
	Địa chỉ:
	</td>
	<td>
		<input type="text" name="add" value="" />
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
		<input type="submit" value="Thanh Toan" />
		<input type="reset" value="Huy" />
	</td>
</tr>
</table>
</form> -->

<form method="post" action="index.php?mod=cart&act=xl_payment" id="contact">
	<div class="center_title_bar">MỜI KHÁCH HÀNG ĐIỀN THÔNG TIN ĐỂ THỰC HIỆN THANH TOÁN</div>
	<div class="prod_box_big">
		<div class="center_prod_box_big">
			<div class="contact_form">
				<div class="form_row">
					<label class="contact"><strong>Tên khách hàng:</strong> </label> <input
						type="text" name="fullname" class="contact_input" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Email:</strong> </label> <input
						type="text"  name="email" placeholder="Your email" class="contact_input" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Số điện thoại:</strong> </label> <input
						type="text" class="contact_input" name="tel" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Địa chỉ:</strong> </label>
					<input type="text" class="contact_input" name="add"/>
				</div>
				<div style="margin: 30px 0 20px 90px;">
					<input type="submit" value="Thanh Toan" />
					<input type="reset" value="Huy" />
				</div>
			</div>
		</div>
	</div>
</form>