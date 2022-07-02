<?php include_once "../base.php";

//$check = math('user','count','*',['acc'=>$_POST['acc']]);
$check = rows('user',['acc'=>$_POST['acc']]);
if($check){
   echo 1;
}else{
   echo 0;
}

?> 