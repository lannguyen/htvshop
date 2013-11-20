<form method="post" action="index.php?mod=contact" id="contact">
	<div class="center_title_bar">Liên hệ</div>
	<div class="prod_box_big">
		<div class="center_prod_box_big">
			<div class="contact_form">
				<div class="form_row">
					<label class="contact"><strong>Họ tên:</strong> </label> <input
						type="text" name="name" class="contact_input" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Email:</strong> </label> <input
						type="text"  name="email" placeholder="Your email" class="contact_input" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Điện thoại:</strong> </label> <input
						type="text" class="contact_input" name="mobile" />
				</div>
				<div class="form_row">
					<label class="contact"><strong>Tin nhắn:</strong> </label>
					<textarea class="contact_textarea" name="message"></textarea>
				</div>
				<div class="form_row">
					<a href="#" class="prod_details" id="btn_submit">Gửi</a>
				</div>
			</div>
		</div>
	</div>
</form>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$msg = $_POST['message'];
		$to = "ngoclan.cotqhi2008@gmail.com";
		$subject = "Mail support client!";
		$headers = "Email from: " . $email;
		/* mail($to,$subject,$msg,$headers); */
		if(mail($to,$subject,$msg,$headers))
			echo "Bạn đã gửi thành công";
		else 
			echo "Gửi tin nhắn thất bại! Xin hãy gửi lại";
	}
?>


