<?php include_once "../base_inc.php";
//編輯會員 
//from back/edit_user

update('user',$_POST,['id'=>$_POST['id']]);
to("../back.php?do=user");
?> 