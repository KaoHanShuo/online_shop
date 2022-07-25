<?php include_once "../base_inc.php";
//匯入或更新管理員帳號
//from back/add_admin.php 
//from back/edit_admin.php 

if($_POST['permit']){//有權限才序列化
    $_POST['permit'] = serialize($_POST['permit']);
}

update('admin',$_POST,['id'=>$_POST['id']]);


to("../back.php?do=admin");
?>