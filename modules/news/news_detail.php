<?php
$str = "SELECT * FROM tbl_news WHERE id=".$_GET['id_news'];
$result = mysql_query($str);
$t = 0;
while($rows = mysql_fetch_array($result)){
	$id = $rows['id'];
	$header = $rows['header'];
	$content = $rows['content'];	
	$sumary = $rows['sumary'];
?>
<div class="center_title_bar">
	<a href="index.php?mod=news&act_news=detail&id_news=<?php echo $id; ?>"><?php echo $header;?></a>
</div>
<table border="0" align="center" class="list_news"  cellspacing="10">
<tbody>
<tr>
	<td align="justify"><?php echo $content;?></td>	
</tr>
<?php
}
?>
</tbody>
</table>
