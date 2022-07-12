<?php include_once "../base_inc.php";
//from front/checkout
$_POST['number'] = date("YmdHi").rand(1,99);
$_POST['items'] = serialize($_SESSION['cart']);
insert('item_order',$_POST);
unset($_SESSION['cart']);
?> 