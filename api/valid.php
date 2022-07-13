<?php include_once "../base_inc.php";
include_once "../vendor/autoload.php";
//come from front/reg.php
//use wixel\Gump;
$gump = new GUMP();

//移除跨站攻擊的不安全代碼
$_POST = GUMP::xss_clean($_POST);

if(isset($_POST['name'])){
    $gump->validation_rules(['name' => 'required']);
    $gump->set_fields_error_messages(['name' => ['required' => '*姓名不得為空']]);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["name"];
    }else{
        echo "";
    }
}
if(isset($_POST['acc'])){
    $gump->validation_rules(['acc' => 'required|max_len,20|min_len,6']);
    $gump->set_fields_error_messages(['acc' => ['required' => '*帳號不得為空']]);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["acc"];
    }else{
        echo "";
    }
}
if(isset($_POST['pw'])){
    $gump->validation_rules(['pw' => 'required|max_len,20|min_len,6']);
    $gump->set_fields_error_messages(['pw' => ['required' => '*密碼不得為空'] ]);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["pw"];
    }else{
        echo "";
    }
}
if(isset($_POST['tel'])){
    $gump->validation_rules(['tel' => 'required|phone_number']);
    $gump->set_fields_error_messages(['tel' => ['required' => '*電話不得為空']]);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["tel"];
    }else{
        echo "";
    }
}
if(isset($_POST['addr'])){
    $gump->validation_rules(['addr' => 'required']);
    $gump->set_fields_error_messages(['addr' => ['required' => '*地址不得為空']]);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["addr"];
    }else{
        echo "";
    }
}
if(isset($_POST['email'])){
    $gump->validation_rules(['email' => 'required|valid_email']);
    $gump->set_fields_error_messages(['email' => ['required' => '*email不得為空']]);
    $gump->filter_rules(['email' => 'trim|sanitize_email']);
    $valid_data = $gump->run($_POST);
    if($gump->errors()){
        $arr = $gump->get_errors_array();
        echo $arr["email"];
    }else{
        echo "";
    }
}
?> 