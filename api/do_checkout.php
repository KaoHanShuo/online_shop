<?php include_once "../base_inc.php";
include_once "../Library/ECPay.Payment.Integration.php";
//require __DIR__ . '../../vendor/autoload.php';

//$LOL=new ECPay_AllInOne();


//因為本地端無法刷綠界，模擬用
$_POST['number'] = date("YmdHi").rand(1,99);
$_POST['items'] = serialize($_SESSION['cart']);
insert('item_order',$_POST);
//

$_POST['number'] = date("YmdHi").rand(1,99);

try {
        
    $obj = new ECPay_AllInOne();

    //服務參數
    $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
    $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
    $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
    $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
    $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密

    
    //基本參數(請依系統規劃自行調整)
    $MerchantTradeNo = $_POST['number'] ;

    //本地網址要換成"http://localhost/online_shop/api/ecpay_callback.php"
    //線上"http://localhost/online_shop/api/ecpay_callback.php"
    
    $obj->Send['ReturnURL']         = "http://localhost/online_shop/api/ecpay_callback.php" ;    //付款完成通知回傳的網址
    //$obj->Send['ClientRedirectURL'] = "http://localhost/online_shop";
    //$obj->Send['ClientBackURL']     = "http://localhost/online_shop" ;
    $obj->Send['OrderResultURL'] = "http://localhost/online_shop/api/ecpay_callback.php";//自動跳轉回頁面並POST
    $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
    $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
    $obj->Send['TotalAmount']       = $_POST['total'];                                      //交易金額
    $obj->Send['TradeDesc']         = "thank you" ;                          //交易描述
    $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit ;              //付款方式:Credit
    $obj->Send['IgnorePayment']     = ECPay_PaymentMethod::GooglePay ;           //不使用付款方式:GooglePay

    //訂單的商品資料
    foreach($_SESSION['cart'] as $id => $quantity){
        $item = find('item_detail',$id);
        array_push($obj->Send['Items'], array('Name' => $item['name'], 'Price' => (int)$item['price'],'Currency' => "元", 'Quantity' => (int)$quantity, 'URL' => "dedwed"));
    }

    // unset($_SESSION['cart']);
    // array_push($obj->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
    //            'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
              

    //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
    //以下參數不可以跟信用卡定期定額參數一起設定
    $obj->SendExtend['CreditInstallment'] = '' ;    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24
    
    $obj->SendExtend['Redeem'] = false ;           //是否使用紅利折抵，預設false
    $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

    //產生訂單(auto submit至ECPay)
    $obj->CheckOut();
} catch (Exception $e) {
    echo $e->getMessage();
}

// //綠界測試信用卡：4311-9522-2222-2222 背後安全三碼: 222

?>