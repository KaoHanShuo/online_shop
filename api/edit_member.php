<?php include_once "../base_inc.php";
include_once "../vendor/autoload.php";
//編輯會員 
//from front/edit_member
$gump = new GUMP();

//移除跨站攻擊的不安全代碼
$_POST = GUMP::xss_clean($_POST);

$pattern = " /[(\~\!\@\#\$\%\^\&\*\(\)\_\+\{\:\"\|\<\>\?\[\]\;\'\\\,\.\/\]\-\=\})]+/ ";
if(preg_match($pattern,$_POST['name'])){
    echo 1;
    exit();
}
$gump->validation_rules([
    'name' => 'required',
    'addr' => 'required',
    'tel' => 'required|phone_number',
    'email' => 'required|valid_email'
]);

$gump->set_fields_error_messages([
    'name' => ['required' => 'name1'],
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
    update('user',$_POST,['id'=>$_POST['id']]);
    echo 0;
}
//update('user',$_POST,['id'=>$_POST['id']]);


?> 
