<?php include_once "../base_inc.php";
    include_once "../Library/ECPay.Payment.Integration.php";

    $obj = new ECPay_AllInOne();
   
                 
    $arParameters = $_POST;
    $ECPay_MerchantID = "2000132";
    $ECPay_HashKey = "5294y06JbISpM5x9";
    $ECPay_HashIV = "v77hoKGq4kWxNNIS";
     
    //進行驗證碼檢查，將POST陣列, HashKey, HashIV, 以及當初設定的加密方式($obj->EncryptType = "1";)作為參數，
    //傳給 ECPay_CheckMacValue::generate 來產生驗證碼
    $CheckMacValue = ECPay_CheckMacValue::generate( $arParameters, $ECPay_HashKey, $ECPay_HashIV, 1);
    //$_POST['RtnCode'] == 1表示刷卡成功
    //比對傳來的POST中的驗證碼與這邊剛計算出來的驗證碼是否相同，相同才進行後續處理，若不同，則表示這份POST可能是偽造的，或是錯誤的交易紀錄
    if ( $_POST['RtnCode'] =='1' && $CheckMacValue == $_POST['CheckMacValue'] ){
        $user = find('user',['acc'=>$_SESSION['user']]);
        $array = array("number"=>$_POST['MerchantTradeNo'], "total"=>$_POST['TradeAmt'], "acc"=>$user['acc'], "name"=>$user['name'],
            "addr"=>$user['addr'], "email"=>$user['email'], "tel"=>$user['tel'], "items"=>serialize($_SESSION['cart']));
     
        insert('item_order',$array);
        unset($_SESSION['cart']);

        //最後一定要回傳這一行，告知綠界說：「我的商店網站確實有收到綠界的通知了！」才算完成。
        echo '1|OK';
        to("http://localhost/online_shop");
    }

    /**
     * 
     * 回傳$_POST參數
     * Array
    (
        [CustomField1] => AAAAAAAAAA
        [CustomField2] => BBBBBBBBBB
        [CustomField3] => 
        [CustomField4] => 
        [MerchantID] => 2000132
        [MerchantTradeNo] => TNO1576830000
        [PaymentDate] => 2019/12/20 16:20:43
        [PaymentType] => Credit_CreditCard
        [PaymentTypeChargeFee] => 154
        [RtnCode] => 1
        [RtnMsg] => 交易成功
        [SimulatePaid] => 0
        [StoreID] => 
        [TradeAmt] => 7700
        [TradeDate] => 2019/12/20 16:20:00
        [TradeNo] => 1912201620000523
        [CheckMacValue] => EF31FB1BD4E367E9E95CD188B64DE38D1EC3E0A4A81880D9E5A87BB1AB0D8AAF
    )
    */
?>