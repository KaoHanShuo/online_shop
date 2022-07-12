<?php
//檢測驗證碼
//from front/login.php
if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}

if($_SESSION['ans'] == $_POST['ans']){
    echo 1;     
}else{
    echo 0;
}

?>