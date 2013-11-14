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
			<h3>SẢN PHẨM BÁN CHẠY</h3>
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
							$num_of_orders = countrecord("tbl_payment","fullname",$rows["fullname"]);							
							
					?>
					<tr>
						<td><a href="#"><?php echo $rows["fullname"];?></a></td>
						<td><?php echo $num_of_orders;?></td>
						<td></td>
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
		</div>
		<div id="box">
			<h3>DANH SÁCH ĐƠN HÀNG</h3>
			<table width="100%">
				<thead>
					<tr>
						<th width="20px"><input type="checkbox" /></th>
						<th width="170px"><a href="#">Tên khách hàng</a></th>
						<th width="200px"><a href="#">Tên sản phẩm</a></th>
						<th width="200px"><a href="#">Địa chỉ liên hệ</a></th>
						<th width="200px"><a href="#">Email</a></th>
						<th><a href="#">Đơn giá</a></th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Jennifer Hodes</a></td>
						<td>jennifer.hodes@gmail.com</td>
						<td>General</td>
						<td>1000</td>
						<td>July 2, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Mark Kyrnin</a></td>
						<td>mark.kyrnin@hotmail.com</td>
						<td>Affiliate</td>
						<td>8310</td>
						<td>June 17, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Virgílio Cezar</a></td>
						<td>virgilio@somecompany.cz</td>
						<td>General</td>
						<td>6200</td>
						<td>June 31, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Todd Simonides</a></td>
						<td>todd.simonides@gmail.com</td>
						<td>Wholesale</td>
						<td>2010</td>
						<td>June 5, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Carol Elihu</a></td>
						<td>carol@herbusiness.com</td>
						<td>General</td>
						<td>3120</td>
						<td>May 23, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Jennifer Hodes</a></td>
						<td>jennifer.hodes@gmail.com</td>
						<td>General</td>
						<td>1000</td>
						<td>July 2, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Mark Kyrnin</a></td>
						<td>mark.kyrnin@hotmail.com</td>
						<td>Affiliate</td>
						<td>8310</td>
						<td>June 17, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Virgílio Cezar</a></td>
						<td>virgilio@somecompany.cz</td>
						<td>General</td>
						<td>6200</td>
						<td>June 31, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Todd Simonides</a></td>
						<td>todd.simonides@gmail.com</td>
						<td>Wholesale</td>
						<td>2010</td>
						<td>June 5, 2008</td>
					</tr>
					<tr>
						<td align="center"><input type="checkbox" /></td>
						<td><a href="#">Carol Elihu</a></td>
						<td>carol@herbusiness.com</td>
						<td>General</td>
						<td>3120</td>
						<td>May 23, 2008</td>
					</tr>
				</tbody>
			</table>
			<div id="pager">
				Page <a href="#"><img src="img/icons/arrow_left.gif" width="16"
					height="16" /> </a> <input size="1" value="1" type="text"
					name="page" id="page" /> <a href="#"><img
					src="img/icons/arrow_right.gif" width="16" height="16" /> </a>of 42
				pages | View <select name="view">
					<option>10</option>
					<option>20</option>
					<option>50</option>
					<option>100</option>
				</select> per page | Total <strong>420</strong> records found
			</div>
	</div>
</div>

