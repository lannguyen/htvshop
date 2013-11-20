<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
<title>Đăng nhập vào trang quản trị</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
	content="Login and Registration Form with HTML5 and CSS3" />
<meta name="keywords"
	content="html5, css3, form, switch, animation, :target, pseudo-class" />
<meta name="author" content="Codrops" />
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style_login.css" />
<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
<script type="text/javascript" src="admin/js/jquery-1.7.1.min.js"></script>
</head>
<body>
	<div class="container">
		<header>
			<h1>
				<span>Đăng nhập vào trang quản trị</span>
			</h1>
		</header>
		<section>
			<div id="container_demo">
				<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
				<a class="hiddenanchor" id="toregister"></a> <a class="hiddenanchor"
					id="tologin"></a>
				<div id="wrapper">
					<div id="login" class="animate form">
						<form action="<?php echo $_SERVER["PHP_SELF"];?>"
							autocomplete="on" method="post">
							<h1>ĐĂNG NHẬP</h1>
							<p>
								<label for="username" class="uname" data-icon="u"> Tên đăng nhập
									hoặc email </label> <input id="username" name="username"
									required="required" type="text"
									placeholder="myusername or mymail@mail.com" />
							</p>
							<p>
								<label for="password" class="youpasswd" data-icon="p"> Mật khẩu</label>
								<input id="password" name="password" required="required"
									type="password" placeholder="eg. abc123" />
							</p>
							<!-- <p class="keeplogin">
								<input type="checkbox" name="loginkeeping" id="loginkeeping"
									value="loginkeeping" /> <label for="loginkeeping">Ghi nhớ</label>
							</p> -->
							<p class="login button">
								<input type="submit" value="Login" />
							</p>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>

<?php
ob_start();
session_start();

include ("includes/config.php");
include ("includes/function.php");

if(isset($_SESSION["user"]) && isset($_SESSION["userid"]) && isset($_SESSION["groupid"])){
	unset($_SESSION["user"]);
	unset($_SESSION["userid"]);
	unset($_SESSION["groupid"]);
}

if(isset($_POST["username"]) && isset($_POST["password"])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$str = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
	$result = mysql_query($str);
	$rows = mysql_fetch_array($result);
	if($rows){
	
		$_SESSION["user"] = $username;
	 	$_SESSION["userid"] = $rows["id"];
		$_SESSION["groupid"] = $rows["id_group_user"];  
	
		header('location: index.php');
}
else{
	echo "<script>alert('Ban sai username hoac password!')".";</script>";
	header('location: login.php');
}
}
?>

