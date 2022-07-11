<?php include_once "../base_inc.php";
//檢測帳號密碼正確
//from front/login.php

//$check = math('user','count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}

$table = $_POST['table'];
$check = rows($table,['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($check){
    echo 1;
    switch($_POST['table']){
        case "admin":
            $_SESSION['admin']=$_POST['acc'];
            break;
        case "user":
            $_SESSION['user']=$_POST['acc'];
            break;
    }
}else{
   echo 0;
}
?> 