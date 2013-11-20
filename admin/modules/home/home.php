<?php 
		$date = getcurrentDate();
		$query = "SELECT * FROM tbl_payment WHERE datebuy='$date'";
		$rs= mysql_query($query);
		$num_of_orders = mysql_num_rows($rs);
		$total=0;
		while($rows = mysql_fetch_array($rs)){
			$query = "SELECT * FROM tbl_product WHERE id IN(".$rows["cart"].")";
			$_rs = mysql_query($query);
						
			while($_rows = mysql_fetch_array($_rs)){
				$total += $_rows["price"];
			}
		}
		//Liet ke 5 san pham ban chay nhat
		$query = "SELECT * FROM tbl_product ORDER BY buytimes DESC LIMIT 5";
		$rs= mysql_query($query);
		

?>
<div id="wrapper">
	<div id="content">
		<div id="rightnow">
			<h3 class="reallynow">
				<span>THỐNG KÊ TRONG NGÀY <?php echo getcurrentDate();?></span> <br />
			</h3>
			<p class="youhave">
				Bạn có <a href="index.php?mod=order"><?php echo $num_of_orders;?> đơn đặt hàng</a>, với tổng giá trị <strong><?php echo $total;?>
					VNĐ</strong>
			</p>
		</div>

		<div id="infobox" class="margin-left">
			<h3>TOP SẢN PHẨM BÁN CHẠY</h3>
			<table>
				<thead>
					<tr>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>Đơn hàng</th>
					</tr>
				</thead>
				<tbody>
				    <?php while($rows=mysql_fetch_array($rs)){			    		
				    	?> 
						<tr>
							<td><a href="../index.php?mod=product&act=detail&id=<?php echo $rows['id']; ?>"><?php echo $rows["name"];?></a></td>
							<td align="center"><?php echo $rows["price"];?> &nbsp;VND</td>
							<td align="center"><?php echo $rows["buytimes"];?></td>
						</tr>
					<?php }?>					
				</tbody>
			</table>
		</div>
		<div id="infobox" style="float: right;">
			<h3>KHÁCH HÀNG GẦN ĐÂY</h3>
			<table>
				<thead>					
					<tr>
						<th>Họ tên</th>
						<th>Số lượng đơn hàng</th>
						<th>Tổng số tiền</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT DISTINCT fullname FROM tbl_payment ORDER BY update_date DESC LIMIT 5";
						$rs = mysql_query($query);
						$d=0;
						
						while($rows=mysql_fetch_array($rs)){
							$d++;
							$_rs = mysql_query("SELECT * FROM tbl_payment WHERE fullname='{$rows["fullname"]}'");
							$total = 0;
							$num_of_orders = mysql_num_rows($_rs);
							while($_rows = mysql_fetch_array($_rs)){
								$payments = mysql_query("SELECT * FROM tbl_product WHERE id in({$_rows["cart"]})");
								while($rows_payments = mysql_fetch_array($payments)){
									$total += $rows_payments["price"];
								} 
							}	
																																								
					?>
					<tr>
						<td><a href="#" onclick="$(window).attr('location','index.php?mod=order');"><?php echo $rows["fullname"];?></a></td>
						<td><?php echo $num_of_orders;?></td>
						<td><?php echo $total;?>&nbsp;VNĐ</td>

					</tr>
					<?php }
						for($i = $d+1; $i <= 5; $i++){ ?>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>	
						<?php }?>
			
					
				</tbody>
			</table>
		</div>
		
		<?php 		
			$query = "SELECT * FROM tbl_payment";
			$base_url= 'index.php?mod=order&';
			$soorders = 16;
		
			if(isset($_GET['order']))
				$s = $_GET['order'];
			else
				$s = 0;
			$tongso = mysql_num_rows(mysql_query($query));
			$str = mysql_query($query ." limit $s,$soorders");
		?>		
		<div id="infobox_big">
			<h3>DANH SÁCH ĐƠN HÀNG</h3>
			<table width="100%" id="list">
					<thead>
						<tr>							
							<th width="170px"><a href="#">Tên khách hàng</a></th>
							<th width="230px"><a href="#">Tên sản phẩm</a></th>							
							<th width="200px"><a href="#">Địa chỉ liên hệ</a></th>
							<th width="170px"><a href="#">Email</a></th>
							<th><a href="#">Đơn giá</a></th>

						</tr>
					</thead>
					<tbody>
						<?php 							
							while($rows=mysql_fetch_array($str)){ ?>
						<tr>							
							<td><a href="#" onclick="$(window).attr('location','index.php?mod=order&act=modify&id=<?php echo $rows["id"];?>');"><?php echo $rows['fullname'];?> </a></td>
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
							
							<td><?php echo $rows['address'];?></td>
							<td><?php echo $rows["email"];?></td>
							<td><?php echo $total. " ";?>VNĐ</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
	
				<div style="margin: 15px 0 0 2px; padding-bottom: 10px;">
					Trang &nbsp;
					<?php echo pagenav($base_url, $s,"order", $tongso, $soorders);?>
				</div>			
		</div>
	</div>
</div>

