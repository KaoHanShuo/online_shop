<?php include_once "../base_inc.php";
//from front/detail

$_SESSION['cart'][$_POST['id']]=$_POST['qt'];//存成2維陣列，裡面的每個陣列=[商品(id)=>幾個(qt)]

?>