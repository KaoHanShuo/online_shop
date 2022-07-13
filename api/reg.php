<?php include_once "../base_inc.php";
include_once "../vendor/autoload.php";
//匯入帳戶資料
//come from front/reg.php
//use wixel\Gump;
$gump = new GUMP();

//移除跨站攻擊的不安全代碼
$_POST = GUMP::xss_clean($_POST);

$gump->validation_rules([
    'acc' => 'required|max_len,20|min_len,6',
    'name' => 'required',
    'pw' => 'required|max_len,20|min_len,6',
    'addr' => 'required',
    'tel' => 'required|phone_number',
    'email' => 'required|valid_email'
]);

$gump->set_fields_error_messages([
    'acc' => ['required' => 'acc1'],
    'name' => ['required' => 'name1'],
    'pw' => ['required' => 'pw1'],
    'addr' => ['required' => 'addr1'],
    'tel' => ['required' => 'tel1'],
    'email' => ['required' => 'email1']
]);

$valid_data = $gump->run($_POST);
//$arr;
if($gump->errors()){
    echo 1;
    //gettype,json.encode
}else{
    //echo var_dump($valid_data);
    insert('user',$_POST);//acc,name,pw,addr,tel,email
    echo 0;
}
?> 