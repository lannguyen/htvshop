<div class="center_title_bar">
	Danh sách tin tức
</div>
<table border="0" align="center" cellspacing="10" class="list_news">

<?php
$sotin = 16;
$base_url= 'index.php?mod=news&';

$query = "SELECT * FROM tbl_news";
$result = mysql_query($query);

if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;
$tongsodong = mysql_num_rows($result);
$str = mysql_query($query ." limit $s,$sotin");

while($rows = mysql_fetch_array($str)){
	$id = $rows['id'];
	$header = $rows['header'];
	$content = $rows['content'];	
	$sumary = $rows['sumary'];
?>
<tr>
	<td align="justify"><b><a href="index.php?mod=news&act_news=detail&id_news=<?php echo $id; ?>"><?php echo $header;?></a></b> <br/>
	</td>	
</tr>
<tr>
	<td><?php echo $rows['sumary'];?></td>
</tr>	
<?php
}
?>
</table>
<div id="nav_page">
	Trang &nbsp;<?php echo pagenav($base_url, $s, $tongsodong, $sotin);?>
</div>