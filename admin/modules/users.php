<?php

$query = "SELECT * FROM tbl_user";
$result = mysql_query($query);

$base_url= 'index.php?mod=user&';
$sousers = 10;

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$tongso = mysql_num_rows($result);
$result = mysql_query($query ." limit $s,$sousers");

?>

<script>
$(document).ready(function(){
    top.location.href = '#modify_user';
    top.location.href = '#add_user';
	$("#add").click(function(){
			$( "#add_user" ).dialog({
			 	autoOpen: false,
			 	show: {
			 		effect: "blind",
			 		duration: 1000
			 	},
			 	hide: {
			 		effect: "explode",
			 		duration: 1000
			 	},
			 
				height: 440,
				width: 640
				 
			 });
			 				
			$("#add_user").dialog("open");
		}
	);
	
	$( "#modify" ).click(function() {
		var n = $( "#list input:checkbox:checked" ).length;
		if(n > 1)
			alert("Bạn chỉ được chọn một đơn hàng!");
		else if(n == 1) {
			var url = "index.php?mod=user&act=modify&id=" + $("#list input:checkbox:checked").val();
			//alert($( "#select:checked").val());
			//index.php?mod=user&act=modify
			$(window).attr("location",url);
			$(window).scrollTo(100,500);
		} else {
			alert("Bạn chưa chọn đơn hàng!");
		}
		
		/* $( "#alter" ).submit();
		window.scrollTo(100,500);
		
		  */
	}); 

	$( "#delete" ).click(function() {
		var n = $( "#list input:checkbox:checked" ).length;
		if( n > 0){
                var value = "";
                $( "#list input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=user&act=del&id=" + value;
                $(window).attr("location",url);
		} else {
				alert("Bạn chưa chọn đơn hàng!");
		}
	}); 

	$('#checkall').click(function() {
		if ($("#checkall").is(':checked')) {
            $(".select").prop("checked", true);
        } else {
            $(".select").prop("checked", false);
        }
	});

	$(".alter").click(function(){
		var val = $(this).val();
		var n = $( "#list input:checkbox:checked" ).length;
		if(val == "modify"){
			if(n > 1)
				alert("Bạn chỉ được chọn một đơn hàng!");
			else if(n == 1) {
				var url = "index.php?mod=user&act=modify&id=" + $("#list input:checkbox:checked").val();
				//alert($( "#select:checked").val());
				//index.php?mod=user&act=modify
				$(window).attr("location",url);
			} else {
				alert("Bạn chưa chọn đơn hàng!");
			}
		}
		else if(val == "del"){
			if( n > 0){
                var value = "";
                $( "#list input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=user&act=del&id=" + value;
                $(window).attr("location",url);
				} else {
					alert("Bạn chưa chọn đơn hàng!");
				}		
		} else {
			$(window).attr("location","index.php?mod=user&act=add");
		}
	});

	$("#modify_link").click(function(){
		/* var value = $(this).parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=user&act=modify&id=" + value;
		$(window).attr("location",url); */
		
		alert("Yes");		
	});
	
}); 
</script>

<div id="top-panel">
	<div id="panel">
		<ul>
			<li><a href="index.php?mod=user&act=add" class="useradd" id="add">Thêm mới</a></li>
			<li><a href="#" class="delete" id="delete">Xóa</a></li>
			<li><a href="#" class="group" id="group">Tạo nhóm</a></li>
			<li><a href="#" class="user_edit" id="modify">Thay đổi</a></li>
		</ul>
	</div>
</div>
<div id="wrapper">
	<div id="content">
		<div id="box">
			<h3>DANH SÁCH NGƯỜI DÙNG</h3>
			<table width="100%" id="list">
				<thead>
					<tr>
						<th width="20px"><input type="checkbox" /></th>
						<th width="150px"><a href="#">Tên đăng nhập</a></th>
						<th width="170px"><a href="#">Tên đầy đủ</a></th>
						<th width="70px"><a href="#">Thao tác</a></th>
						<th width="170px"><a href="#">Mật khẩu</a></th>
						<th width="130px"><a href="#">Nhóm người dùng</a></th>
						<th><a href="#">Email liên hệ</a></th>						
					</tr>
				</thead>
				<tbody>
					<?php while($rows = mysql_fetch_array($result)){						
						$_result = mysql_query("SELECT * FROM tbl_group_user WHERE id={$rows["id_group_user"]}");
						$_rows = mysql_fetch_array($_result);	
					?>
					<tr>
						<td align="center"><input type="checkbox" name="select" class="select" value="<?php echo $rows["id"];?>" /></td>
						<td><a href="#"><?php echo $rows["username"];?></a></td>
						<td><a href="#"><?php echo $rows["fullname"];?></a></td>
						<td align="center">
							<a href="#" id="add_link"><img src="../admin/img/icons/user_add.png" title="Thêm mới" width="16" height="16" /> </a>
							<a href="#" id="modify_link"><img src="../admin/img/icons/user_edit.png" title="Chỉnh sửa" width="16" height="16" /> </a>
							<a href="#" id="delete_link"><img src="../admin/img/icons/user_delete.png" title="Xóa" width="16" height="16" /> </a>
						</td>
						<td><?php echo $rows["password"];?></td>
						<td><?php echo $_rows["name"];?></td>
						<td><?php echo $rows["email"];?></td>
					</tr>	
					<?php }?>				
				</tbody>
			</table>
			<div class="addition">
					<span>Chọn tất:</span>&nbsp; <input type="checkbox" name="select" id="checkall"/>
					 <select name="alter" id="alter">
						<option class="alter" selected="selected" label="none" value="modify" >Chỉnh sửa</option>
						<option class="alter" label="none" value="add" >Thêm mới</option>
						<option class="alter" label="none" value="del" >Xóa bỏ</option>
					</select>
			</div>

			<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
				Trang &nbsp;
				<?php echo pagenav($base_url, $s, $tongso, $sousers);?>
			</div>
		</div>
		<br />
<?php 
$query = "SELECT * FROM tbl_group_user";
$result = mysql_query($query);
$sogroups = 10;
$base_url= 'index.php?mod=user&';

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$tongso = mysql_num_rows($result);
$result = mysql_query($query ." limit $s,$sogroups");
?>		
		<div id="box">
			<h3>DANH SÁCH NHÓM NGƯỜI DÙNG</h3>
			<table width="100%" id="list_group">
				<thead>
					<tr>
						<th width="20px"><input type="checkbox" /></th>
						<th width="150px"><a href="#">Tên nhóm</a></th>					
						<th width="70px"><a href="#">Thao tác</a></th>
						<th ><a href="#">Thành viên</a></th>											
					</tr>
				</thead>
				<tbody>
					<?php while($rows = mysql_fetch_array($result)){						
						$_result = mysql_query("SELECT * FROM tbl_user WHERE id={$rows["id"]}");
					?>
					<tr>
						<td align="center"><input type="checkbox" name="select_group" class="select_group" value="<?php echo $rows["id"];?>" /></td>
						<td><a href="#"><?php echo $rows["name"];?></a></td>
						<td align="center">
							<a href="#" id="add_link"><img src="../admin/img/icons/user_add.png" title="Thêm mới" width="16" height="16" /> </a>
							<a href="#" id="modify_link"><img src="../admin/img/icons/user_edit.png" title="Chỉnh sửa" width="16" height="16" /> </a>
							<a href="#" id="delete_link"><img src="../admin/img/icons/user_delete.png" title="Xóa" width="16" height="16" /> </a>
						</td>
						<td><?php
							$d=0;
							$tongsokq = mysql_num_rows($_result);
							while($_rows = mysql_fetch_array($_result)){
								$d++; ?>
								<a href="index.php?mod=user&act=modify&id=<?php echo $_rows['id']; ?>"
								class="product_name"><?php echo $_rows["username"];?> </a>
							<?php 
								if($d != $tongsokq)
									echo ", ";
								else
									echo " ";							
							}?></td>
					
					</tr>	
					<?php }?>				
				</tbody>
			</table>
			<div class="addition">
					<span>Chọn tất:</span>&nbsp; <input type="checkbox" name="select" id="checkall_group"/>
					 <select name="alter" id="alter">
						<option class="alter" selected="selected" label="none" value="modify" >Chỉnh sửa</option>
						<option class="alter" label="none" value="add" >Thêm mới</option>
						<option class="alter" label="none" value="del" >Xóa bỏ</option>
					</select>
			</div>

			<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
				Trang &nbsp;
				<?php echo pagenav($base_url, $s, $tongso, $sogroups);?>
			</div>
		</div>
		
<?php 
$act = isset($_GET['act'])?$_GET['act']:"";

switch($act){
	case "del":
		include("modules/users_del.php");
		break;
	case "modify":
		include("modules/users_modify.php");
		break;
	case "add":
		include("modules/users_add.php");
		break;
	default: break;
}
?>
		