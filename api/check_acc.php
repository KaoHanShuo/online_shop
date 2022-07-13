<?php 
include_once "../base_inc.php";
//include_once '../gump.class.php';

 
#檢測帳號重複
#from front/reg.php

//$gump = new GUMP();


$check = rows('user',['acc'=>$_POST['acc']]);
if($check){
   echo 1;
}else{
   echo 0;
}

?> 