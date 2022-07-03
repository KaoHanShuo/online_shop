<?php
include_once "../base.php";

//$Admin->save($_POST); 

$_POST['permit'] = serialize($_POST['permit']);
$acc = rows('admin',['acc'=>$_POST['acc']]);
if(empty($acc)){ //如果帳號不重複
    insert('admin',$_POST);
}else{
    
}

?>