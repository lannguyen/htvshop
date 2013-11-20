<?php 
$query = "SELECT * FROM tbl_product";
$base_url= 'index.php?mod=product&';
$soproduct = 10;

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$tongso = mysql_num_rows(mysql_query($query));
$str = mysql_query($query ." limit $s,$soproduct");

?>

<script>
$(document).ready(function(){
    top.location.href = '#form';

	/*mantipulate product section*/
	$( "#pro_modify" ).click(function() {
		var n = $( "#list_prod input:checkbox:checked" ).length;
		if(n > 1)
			alert("Bạn chỉ được chọn một sản phẩm!");
		else if(n == 1) {
			var url = "index.php?mod=product&act=modprod&id=" + $("#list_prod input:checkbox:checked").val();
			$(window).attr("location",url);
			$(window).scrollTo(100,500);
		} else {
			alert("Bạn chưa chọn nhóm!");
		}
	}); 

	$( "#prod_add" ).click(function() {
		var url = "index.php?mod=product&act=addprod";
		$(window).attr("location",url);	
	});

	$( "#prod_delete" ).click(function() {
		var n = $( "#list_prod input:checkbox:checked" ).length;
		if( n > 0){
                var value = "";
                $( "#list_prod input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=product&act=delprod&id=" + value;
                $(window).attr("location",url);
		} else {
				alert("Bạn chưa chọn sản phẩm!");
		}
	}); 

	$('#checkall_prod').click(function() {
		if ($("#checkall_prod").is(':checked')) {
            $(".select_prod").prop("checked", true);
        } else {
            $(".select_prod").prop("checked", false);
        }
	});

	$(".alter_prod").click(function(){
		var val = $(this).val();
		var n = $( "#list_prod input:checkbox:checked" ).length;
		if(val == "modprod"){
			if(n > 1)
				alert("Bạn chỉ được chọn một sản phẩm!");
			else if(n == 1) {
				var url = "index.php?mod=product&act=modprod&id=" + $("#list_prod input:checkbox:checked").val();
				$(window).attr("location",url);
			} else {
				alert("Bạn chưa chọn sản phẩm!");
			}
		}
		else if(val == "delprod"){
			if( n > 0){
                var value = "";
                $( "#list_prod input:checkbox:checked" ).each( function(idx,el){
                    value += $(el).val() +",";
                    }
                );
                value = value.substr(0,value.lastIndexOf(","));
                var url = "index.php?mod=product&act=delprod&id=" + value;
                $(window).attr("location",url);
				} else {
					alert("Bạn chưa chọn sản phẩm!");
				}		
		} else {
			$(window).attr("location","index.php?mod=product&act=addprod");
		}
	});
	
}); 
</script>

<div id="top-panel">
	<div id="panel">
		<ul>
			<li><a href="#" class="prod_add" id="prod_add">Thêm mới</a></li>
			<li><a href="#" class="prod_modify" id="prod_modify">Xóa</a></li>
			<li><a href="#" class="prod_delete" id="prod_del">Tìm kiếm</a></li>
		</ul>
	</div>
</div>
<div id="wrapper">
	<div id="content">
		<div id="box">
			<h3>DANH SÁCH SẢN PHẨM</h3>
			<table id="list_prod"width="100%">
				<thead>
					<tr>
						<th width="20px">&nbsp;</th>
						<th width="180px"><a href="#">Tên sản phẩm</a></th>
						<th width="140px"><a href="#">Nhóm sản phẩm</a></th>
						<th width="70px"><a href="#">Thao tác</a></th>
						<th width="110px"><a href="#">Hãng sản xuất</a></th>
						<th width="100px"><a href="#">Đơn giá</a></th>
						<th width="100px"><a href="#">Tình trạng</a></th>
						<th width="80px"><a href="#">Bảo hành</a></th>
						<th><a href="#">Lượt mua</a></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($rows = mysql_fetch_array($str)){							
							$category = mysql_fetch_array(mysql_query("SELECT * FROM tbl_group_product WHERE id={$rows["id_group"]}"));
							$manufacture = mysql_fetch_array(mysql_query("SELECT * FROM tbl_manufacture WHERE id={$rows["id_manufacture"]}"));
					?>
					<tr>
						<td align="center"><input type="checkbox" class="select_prod"/></td>
						<td><a href="#"><?php echo $rows["name"];?></a></td>
						<td><?php echo $category["name"];?></td>
						<td align="center"><a href="#"><img src="../img/icons/user.png"
								title="Show profile" width="16" height="16" /> </a><a href="#"><img
								src="../img/icons/user_edit.png" title="Edit user" width="16"
								height="16" /> </a><a href="#"><img
								src="../img/icons/user_delete.png" title="Delete user"
								width="16" height="16" /> </a></td>
						<td><?php echo $manufacture["name"];?></td>
						<td><?php echo $rows["price"];?> VNĐ</td>
						<td><?php $status = ($rows["status"] == "yes")?"Còn hàng":"Hết hàng";echo $status;?></td>
						<td><?php echo $rows["warranty"];?></td>
						<td><?php echo $rows["buytimes"];?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<div class="addition">
				<span>Chọn tất:</span>&nbsp; <input type="checkbox" name="select" id="checkall_prod" /> 
				<select name="alter">
					<option class="alter_prod" selected="selected" label="none" value="modprod">Chỉnh sửa</option>
					<option class="alter_prod" label="none" value="addprod">Thêm mới</option>
					<option class="alter_prod" label="none" value="delprod">Xóa bỏ</option>
				</select>
			</div>
			<br/> 
			<div style="margin: 15px 0 0 2px; padding-bottom: 10px;"> Trang &nbsp;
					<?php echo pagenav($base_url, $s,"start", $tongso, $soproduct);?>
			</div>	
		</div>
		<br />
		<?php 
			if(isset($_GET['group']))
				$s = $_GET['group'];
			else
				$s = 0;
			
			$query = "SELECT * FROM tbl_group_product "; 
			$tongso = mysql_num_rows(mysql_query($query));
			$sogroups = 5;
			$str = mysql_query($query ." limit $s,$sogroups");
			
		?>
		<div id="infobox" class="margin-left">
                    <h3>NHÓM SẢN PHẨM</h3> 
                    <table>
						<thead>
							<tr>
                            	<th>Tên nhóm</th>
                            	<th>Thao tác</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                            </tr>
						</thead>
						<tbody>
							<?php
								$d=0;
								while($rows=mysql_fetch_array($str)){
									$d++;
									$sosanpham = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS sosanpham FROM tbl_product WHERE id_group={$rows["id"]}"));
							?>
								
							<tr>
                            	<td><a href="#"><?php echo $rows["name"];?></a></td>
                            	<td></td>
                                <td><?php echo $rows["description"];?></td>
                                <td><?php echo $sosanpham["sosanpham"];?></td>
                            </tr>
                            <?php }
                            for($i = $d+1; $i <= $sogroups; $i++){ ?>
                            	<tr>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            	</tr>	
                            <?php }?>                						
						</tbody>
					</table>
					<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
						Trang &nbsp;
						<?php echo pagenav($base_url, $s,"group", $tongso, $sogroups);?>
				  </div>
                  </div>
           
                  
                  <div id="infobox" style="float: right;">
                    <h3>HÃNG SẢN XUẤT</h3>
                    <table>
						<thead>
							<tr>
                            	<th>Tên hãng</th>
                            	<th>Thao tác</th>                             
                                <th>Số sản phẩm</th>
                                <th>Tổng giá trị</th>
                            </tr>
						</thead>
						<tbody>
						<?php 
						if(isset($_GET['manufacture']))
							$s = $_GET['manufacture'];
						else
							$s = 0;
							
						$query = "SELECT * FROM tbl_manufacture ";
						$tongso = mysql_num_rows(mysql_query($query));
						$somanufacture = 5;
						$str = mysql_query($query ." limit $s,$sogroups");
						$d=0;
						while($rows=mysql_fetch_array($str)){
							$d++;
							$sosanpham = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS sosanpham FROM tbl_product WHERE id_manufacture={$rows["id"]}"));
							$total = mysql_fetch_array(mysql_query("SELECT SUM(price) AS total FROM tbl_product WHERE id_manufacture={$rows["id"]}"));
							
						?>
							<tr>
                            	<td><a href="#"><?php echo $rows["name"];?></a></td>
                            	<td></td>
                                <td><?php echo $sosanpham["sosanpham"];?></td>                               
                                <td><?php echo $total["total"];?> VNĐ</td>
                            </tr>
                             <?php }
                            for($i = $d+1; $i <= $somanufacture; $i++){ ?>
                            	<tr>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            		<td>&nbsp;</td>
                            	</tr>	
                            <?php }?> 						
						</tbody>
						
					</table>    
					<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
						Trang &nbsp;
						<?php echo pagenav($base_url, $s,"manufacture", $tongso, $somanufacture);?>
				  </div>             
                  </div>
                  <br/>
<?php 
$act = isset($_GET['act'])?$_GET['act']:"";

switch($act){
	case "delprod":
		include("modules/product/product_del.php");
		break;
	case "modprod":
		include("modules/product/product_modify.php");	
		break;		
	case "addprod":
		include("modules/product/product_add.php");
		break;
}
?>
</div>
</div>		