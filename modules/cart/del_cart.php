<td>
<?php
$id = $_GET['id'];
if($id == 'all'){
		unset($_SESSION['cart']);
}	
else{
	$cart = $_SESSION['cart'];
	$_SESSION['cart'] = str_replace($id,0,$cart);
}
header('location: index.php?mod=cart');
?>
</td>