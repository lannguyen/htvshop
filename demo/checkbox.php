<html>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<input type="checkbox" name="check_list[]" value="value 1">
<input type="checkbox" name="check_list[]" value="value 2">
<input type="checkbox" name="check_list[]" value="value 3">
<input type="checkbox" name="check_list[]" value="value 4">
<input type="checkbox" name="check_list[]" value="value 5">
<input type="submit" />
</form>
</html>
<?php
$checked = array();
$i=0;
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
     	$checked[$i++] = $check;
    }
}

var_dump($checked);
?>