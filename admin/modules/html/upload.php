<?php 
function uploadImg(){
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			/* && in_array($extension, $allowedExts) */)
	{
		if ($_FILES["file"]["error"] > 0){
			$msg="<script> alert('Tải lên file lỗi!');"."</script>";
		}
		else{
			/* $msg="<script> alert(Tải lên file '". $_FILES["file"]["name"]." thành công!');"."</script>"; */

			if (file_exists("../upload/" . $_FILES["file"]["name"]))
			{
				$msg = "<script>". $_FILES["file"]["name"] . " đã tồn tại!"."</script>";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"../upload/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
				$msg="<script> alert(Tải lên file '". $_FILES["file"]["name"]." thành công!');"."</script>";
			}
		}
	}
	else
	{
		$msg = "<script>"."alert('Sai định dạng file!')"."</script>";
	}

	return "../upload/" . $_FILES["file"]["name"];
}
?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
	<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<input type="file" name="upload"/>
		<input type="submit" value="Tai len" />
	</form>	
</body>
</html>
<?php 
	if(isset($_GET["upload"])){
		$rs = uploadImg();
		echo  $rs;
	}
?>
