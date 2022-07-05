<?php include_once "../base_inc.php";
//匯入或更新管理員帳號
//from back/add_admin.php 
//from back/edit_admin.php 

if($_POST['permit']){//有權限才序列化
    $_POST['permit'] = serialize($_POST['permit']);
}

$acc = rows('admin',['acc'=>$_POST['acc']]);//有沒有該一筆帳號
$id = find('admin',$_POST['id']);//有沒有該帳號
if(empty($acc)){ //如果帳號不重複
    insert('admin',$_POST);
}else if($id){
    update('admin',$_POST,['id'=>$_POST['id']]);
}

to("../back.php?do=admin");
?>