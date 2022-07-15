<?php include_once "../base_inc.php";
include_once __DIR__ . "/../vendor/autoload.php";
//come from front/reg.php

$gump = new GUMP();

//移除跨站攻擊的不安全代碼
$_POST = GUMP::xss_clean($_POST);
//regex=中英數字都可
//regex = /[0-9a-zA-Z\u4e00-\u9fa5]+/
//" /[(\~\!\@\#\$\%\^\&\*\(\)\_\+\{\:\"\|\<\>\?\[\]\;\'\\\,\.\/\]\-\=\})]+/ "  #含特殊字元

if(isset($_POST['name'])){
    $pattern = " /[(\~\!\@\#\$\%\^\&\*\(\)\_\+\{\:\"\|\<\>\?\[\]\;\'\\\,\.\/\]\-\=\})]+/ ";
    if(preg_match($pattern,$_POST['name'])){
        echo "*不可含特殊字元";
    }else{
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
}
if(isset($_POST['acc'])){
    $gump->validation_rules(['acc' => 'required|max_len,20|min_len,6|alpha_numeric_dash']);
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
    $gump->validation_rules(['pw' => 'required|max_len,20|min_len,6|alpha_numeric']);
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
    $gump->validation_rules(['email' => 'required|valid_email|regex,/[0-9a-zA-Z@]+/']);
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