<td>
<?php
$id = $_GET['id'];
if(isset($_SESSION['cart']))
	$_SESSION['cart'] = $_SESSION['cart'].','.$id;
else
	$_SESSION['cart'] = $id;
	
header('location: index.php?mod=cart');

?>
</td>