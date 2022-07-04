<?php include_once "../base.php";
//檢測帳號重複
//from front/reg.php

$check = rows('user',['acc'=>$_POST['acc']]);
if($check){
   echo 1;
}else{
   echo 0;
}

?> 