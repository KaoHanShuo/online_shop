<?php include_once "../base_inc.php";
//from front/buycart

    //$_POST['id']
    //$_POST['qt']
    $_SESSION['cart'][$_POST['id']]=$_POST['qt'];

    //to("../index.php?do=buycart&id=1&quantity=4"); 
?>