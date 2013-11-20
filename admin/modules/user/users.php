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
    top.location.href = '#form';

	/* $("#add").click(function(){
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
	); */

	/*mantipulate user section*/
	$( "#modify" ).click(function() {
		var n = $( "#list input:checkbox:checked" ).length;
		if(n > 1)
			alert("Bạn chỉ được chọn một người dùng!");
		else if(n == 1) {
			var url = "index.php?mod=user&act=modify&id=" + $("#list input:checkbox:checked").val();
			//alert($( "#select:checked").val());
			//index.php?mod=user&act=modify
			$(window).attr("location",url);
			$(window).scrollTo(100,500);
		} else {
			alert("Bạn chưa chọn người dùng!");
		}
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
				alert("Bạn chưa chọn người dùng!");
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
				alert("Bạn chỉ được chọn một người dùng!");
			else if(n == 1) {
				var url = "index.php?mod=user&act=modify&id=" + $("#list input:checkbox:checked").val();
				//alert($( "#select:checked").val());
				//index.php?mod=user&act=modify
				$(window).attr("location",url);
			} else {
				alert("Bạn chưa chọn người dùng!");
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
					alert("Bạn chưa chọn người dùng!");
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

	/*mantipulate group section*/
	$( "#group_modify" ).click(function() {
		var n = $( "#list_group input:checkbox:checked" ).length;
		if(n > 1)
			alert("Bạn chỉ được chọn một nhóm!");
		else if(n == 1) {
			var url = "index.php?mod=user&act=modgroup&id=" + $("#list_group input:checkbox:checked").val();
			$(window).attr("location",url);
			$(window).scrollTo(100,500);
		} else {
			alert("Bạn chưa chọn nhóm!");
		}
	}); 

	$( "#group_add" ).click(function() {
		var url = "index.php?mod=user&act=addgroup";
		$(window).attr("location",url);	
	});

	$( "#group_delete" ).click(function() {
		var n = $( "#list_group input:checkbox:checked" ).length;
		if( n > 0){
                var value = "";
                $( "#list_group input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=user&act=delgroup&id=" + value;
                $(window).attr("location",url);
		} else {
				alert("Bạn chưa chọn nhóm!");
		}
	}); 

	$('#checkall_group').click(function() {
		if ($("#checkall_group").is(':checked')) {
            $(".select_group").prop("checked", true);
        } else {
            $(".select_group").prop("checked", false);
        }
	});

	$(".alter_group").click(function(){
		var val = $(this).val();
		var n = $( "#list_group input:checkbox:checked" ).length;
		if(val == "modgroup"){
			if(n > 1)
				alert("Bạn chỉ được chọn một nhóm!");
			else if(n == 1) {
				var url = "index.php?mod=user&act=modgroup&id=" + $("#list_group input:checkbox:checked").val();
				//alert($( "#select:checked").val());
				//index.php?mod=user&act=modify
				$(window).attr("location",url);
			} else {
				alert("Bạn chưa chọn nhóm!");
			}
		}
		else if(val == "delgroup"){
			if( n > 0){
                var value = "";
                $( "#list_group input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=user&act=delgroup&id=" + value;
                $(window).attr("location",url);
				} else {
					alert("Bạn chưa chọn nhóm!");
				}		
		} else {
			$(window).attr("location","index.php?mod=user&act=addgroup");
		}
	});

	$(".modify_link").click(function(){
		var value = $(this).parent().parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=user&act=modify&id=" + value;		
		$(window).attr("location",url);  			
	});

	$(".delete_link").click(function(){
		var value = $(this).parent().parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=user&act=del&id=" + value;		
		$(window).attr("location",url);  			
	});

	$(".add_link").click(function(){
		var url = "index.php?mod=user&act=add";
		$(window).attr("location",url); 			
	});

	$(".modify_link_group").click(function(){
		var value = $(this).parent().parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=user&act=modgroup&id=" + value;		
		$(window).attr("location",url);  			
	});

	$(".delete_link_group").click(function(){
		var value = $(this).parent().parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=user&act=delgroup&id=" + value;		
		$(window).attr("location",url);  			
	});

	$(".add_link_group").click(function(){
		var url = "index.php?mod=user&act=addgroup";
		$(window).attr("location",url); 			
	});
		
}); 
</script>

<div id="top-panel">
	<div id="panel">
		<ul>
			<li><a href="index.php?mod=user&act=add" class="useradd" id="add">Tạo người dùng</a></li>
			<li><a href="#" class="user_edit" id="modify">Sửa người dùng</a></li>
			<li><a href="#" class="delete" id="delete">Xóa người dùng</a></li>						
			<li><a href="#" class="group" id="group_add">Tạo nhóm</a></li>
			<li><a href="#" class="group_modify" id="group_modify">Sửa nhóm</a></li>
			<li><a href="#" class="group_delete" id="group_delete">Xóa nhóm</a></li>
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
						<th width="20px">&nbsp;</th>
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
							<a href="#" class="add_link"><img src="../admin/img/icons/user_add.png" title="Thêm mới" width="16" height="16" /> </a>
							<a href="#" class="modify_link"><img src="../admin/img/icons/user_edit.png" title="Chỉnh sửa" width="16" height="16" /> </a>
							<a href="#" class="delete_link"><img src="../admin/img/icons/user_delete.png" title="Xóa" width="16" height="16" /> </a>
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
					 <select name="alter">
						<option class="alter" selected="selected" label="none" value="modify" >Chỉnh sửa</option>
						<option class="alter" label="none" value="add" >Thêm mới</option>
						<option class="alter" label="none" value="del" >Xóa bỏ</option>
					</select>
			</div>

			<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
				Trang &nbsp;
				<?php echo pagenav($base_url, $s,"start", $tongso, $sousers);?>
			</div>
		</div>
		<br/>

		
<?php 
$query = "SELECT * FROM tbl_group_user";
$result = mysql_query($query);
$sogroups = 10;
$base_url= 'index.php?mod=user&';

if(isset($_GET['group']))
	$s = $_GET['group'];
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
						<th width="20px">&nbsp;</th>
						<th width="150px"><a href="#">Tên nhóm</a></th>					
						<th width="70px"><a href="#">Thao tác</a></th>
						<th ><a href="#">Thành viên</a></th>
						<th ><a href="#">Mô tả nhóm</a></th>											
					</tr>
				</thead>
				<tbody>
					<?php while($rows = mysql_fetch_array($result)){						
						$_result = mysql_query("SELECT * FROM tbl_user WHERE id_group_user={$rows["id"]}");
					?>
					<tr>
						<td align="center"><input type="checkbox" name="select_group" class="select_group" value="<?php echo $rows["id"];?>" /></td>
						<td><a href="#"><?php echo $rows["name"];?></a></td>
						<td align="center">
							<a href="#" class="add_link_group"><img src="../admin/img/icons/group.png" title="Thêm mới" width="16" height="16" /> </a>
							<a href="#" class="modify_link_group"><img src="../admin/img/icons/group_edit.png" title="Chỉnh sửa" width="16" height="16" /> </a>
							<a href="#" class="delete_link_group"><img src="../admin/img/icons/group_delete.png" title="Xóa" width="16" height="16" /> </a>
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
							<td><?php echo $rows["detail"];?></td>
					</tr>	
					<?php }?>									
				</tbody>
			</table>
			<div class="addition">
					<span>Chọn tất:</span>&nbsp; <input type="checkbox" name="select" id="checkall_group"/>
					 <select name="alter">
						<option class="alter_group" selected="selected" label="none" value="modgroup" >Chỉnh sửa</option>
						<option class="alter_group" label="none" value="addgroup" >Thêm mới</option>
						<option class="alter_group" label="none" value="delgroup" >Xóa bỏ</option>
					</select>
			</div>

			<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
				Trang &nbsp;
				<?php echo pagenav($base_url, $s,"group", $tongso, $sogroups);?>
			</div>
		</div>
		<br/>
		
<?php 
$act = isset($_GET['act'])?$_GET['act']:"";

switch($act){
	case "del":
		include("modules/user/users_del.php");
		break;
	case "modify":
		include("modules/user/users_modify.php");
		break;
	case "add":
		include("modules/user/users_add.php");
		break;
	case "addgroup":
		include("modules/user/groups_add.php");
		break;
	case "modgroup":
		include("modules/user/groups_mod.php");
		break;
	case "delgroup":
		include("modules/user/groups_del.php");
		break;
	default: 
		break;
}
?>
	</div>
</div>
		