<!-- 結帳畫面 -->
<h1 class="ct">填寫資料</h1>
<?php
$member = find('user',['acc'=>$_SESSION['user']]);
if(!isset($_SESSION['cart'])){
    to("?");
}
?>
<form  action="api/do_checkout.php" method="POST">
    <table class="all">
        <tr>
            <td class="tt ct ct_a">登入帳號</td>
            <td class="pp ct_a"><input type="text" name="acc" id="acc" value="<?=$member['acc']?>" hidden><?=$member['acc']?></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">姓名</td>
            <td class="pp ct_a"><input type="text" name="name" id="name" value="<?=$member['name']?>" hidden><?=$member['name']?></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">電子信箱</td> 
            <td class="pp ct_a"><input type="text" name="email" id="email" value="<?=$member['email']?>" hidden><?=$member['email']?></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">聯絡地址</td>
            <td class="pp ct_a"><input type="text" name="addr" id="addr" value="<?=$member['addr']?>" hidden><?=$member['addr']?></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">連絡電話</td>
            <td class="pp ct_a"><input type="text" name="tel" id="tel" value="<?=$member['tel']?>" hidden><?=$member['tel']?></td>
        </tr>
    </table>
    <table class="all">
        <tr class="tt ct">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        
        <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $quantity){
            $item = find('item_detail',$id);
        ?>

        <tr class="pp ct ">
            <td><?=$item['name'];?></td>
            <td><?=$item['no'];?></td>
            <td><?=$quantity;?></td>
            <td><?=$item['price'];?></td>
            <td><?=$item['price']*$quantity;?></td>
        </tr>

        <?php
        $total = $total+($item['price']*$quantity);
        }
        ?>

    </table>
    <div class="all tt ct">
    總價:<input type="text" name="total" id="total" value="<?=$total;?>" hidden><?=$total;?>
    </div>
    <div class="ct">
        <button type="submit">確定送出</button>
        <button type="button" onclick="location.href='?do=buycart'">返回修改訂單</button>
    </div>

</form>