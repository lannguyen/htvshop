<?php 
$query = "SELECT * FROM tbl_payment";
$base_url= 'index.php?mod=order&';
$soorders = 16;

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$tongso = mysql_num_rows(mysql_query($query));
$str = mysql_query($query ." limit $s,$soorders");
?>


<script>
$(document).ready(function(){
    top.location.href = '#modify_order';
    top.location.href = '#add_order';
	$("#add").click(function(){
			$( "#add_order" ).dialog({
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
			 				
			$("#add_order").dialog("open");
		}
	);
	
	$( "#modify" ).click(function() {
		var n = $( "#list input:checkbox:checked" ).length;
		if(n > 1)
			alert("Bạn chỉ được chọn một đơn hàng!");
		else if(n == 1) {
			var url = "index.php?mod=order&act=modify&id=" + $("#list input:checkbox:checked").val();
			//alert($( "#select:checked").val());
			//index.php?mod=order&act=modify
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
                var url = "index.php?mod=order&act=del&id=" + value;
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
				var url = "index.php?mod=order&act=modify&id=" + $("#list input:checkbox:checked").val();
				//alert($( "#select:checked").val());
				//index.php?mod=order&act=modify
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
                var url = "index.php?mod=order&act=del&id=" + value;
                $(window).attr("location",url);
				} else {
					alert("Bạn chưa chọn đơn hàng!");
				}		
		} else {
			$(window).attr("location","index.php?mod=order&act=add");
		}
	});

	$("#modify_link").click(function(){
		/* var value = $(this).parent("tr").find("input:checkbox").val();
		var url = "index.php?mod=order&act=modify&id=" + value;
		$(window).attr("location",url); */
		
		alert("Yes");		
	});
	
}); 
</script>

<div id="top-panel">
	<div id="panel">
		<ul>
			<li><a href="index.php?mod=order&act=add" class="order_add" id="new">Tạo mới</a></li>
			<li><a href="#" class="order_modify" id="modify">Chỉnh sửa</a></li>
			<li><a href="#" class="order_delete" id="delete">Xóa đơn hàng</a></li>
		</ul>
	</div>
</div>

<div id="wrapper">
	<div id="content">
		<div id="box">
			<h3>Danh sách đơn đặt hàng</h3>
			<form action="index.php?mod=order" method="get" id="alter">
				<table width="100%" id="list">
					<thead>
						<tr>
							<th width="20px">&nbsp;</th>
							<th width="170px"><a href="#">Tên khách hàng</a></th>
							<th width="170px"><a href="#">Tên sản phẩm</a></th>
							<th width="70px"><a href="#">Thao tác</a></th>
							<th width="160px"><a href="#">Địa chỉ liên hệ</a></th>
							<th width="150px"><a href="#">Email</a></th>
							<th><a href="#">Đơn giá</a></th>

						</tr>
					</thead>
					<tbody>
						<?php 							
							while($rows=mysql_fetch_array($str)){ ?>
						<tr>
							<td align="center"><input type="checkbox" name="select" class="select" value="<?php echo $rows["id"];?>" /></td>
							<td><a href="#"><?php echo $rows['fullname'];?> </a></td>
							<?php 
							$query = "SELECT * FROM tbl_product WHERE id IN (" . $rows['cart'] . ")";
							$rs = mysql_query($query);
							$total=0;
							?>
							<td><?php
							$tongsodong = mysql_num_rows($rs);
							$d=0;
							while($_rows = mysql_fetch_array($rs)){
										$d++;
										$total += $_rows["price"];?> <a
								href="../index.php?mod=product&act=detail&id=<?php echo $_rows['id']; ?>"
								class="product_name"><?php echo $_rows["name"];?> </a> <?php
								if($d != $tongsodong)
									echo ", ";
								else
									echo " ";
								}
								?>
							</td>
							<td align="center">
							<a href="#" id="add_link "><img src="../admin/img/icons/order_add.png" title="Thêm mới" width="16" height="16" /> </a> 
							<a href="#" id="modify_link"><img src="../admin/img/icons/order_edit.png" height="16" title="Chỉnh sửa" /> </a> 
							<a href="#" id="delete_link"> <img src="../admin/img/icons/order_del.png" title="Xóa bỏ" width="16" height="16" /></a>
							</td>
							<td><?php echo $rows['address'];?></td>
							<td><?php echo $rows["email"];?></td>
							<td><?php echo $total. " ";?>VNĐ</td>
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
					<?php echo pagenav($base_url, $s, $tongso, $soorders);?>
				</div>
			</form>
		</div>
		<br />
<?php 
$act = isset($_GET['act'])?$_GET['act']:"";

switch($act){
	case "del":
		include("modules/orders_del.php");
		break;
	case "modify":
		include("modules/orders_modify.php");
		break;		
	case "add":
		include("modules/orders_add.php");
		break;
	default:	
		break;
}
?>		
		