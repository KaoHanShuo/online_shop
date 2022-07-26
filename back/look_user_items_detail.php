<!-- 訂單詳細  來自look_user_items -->
<?php include_once "./base_inc.php";

    $order = find('item_order',['id'=>$_GET['itemid']]);//撈一筆商品資料
    $items = unserialize($order['items']);
    $userid = $_GET['userid'];
?>
<h1 class="ct">訂單詳細</h1>
<table class="all">
    <tr class="tt ct">
        <td>項次</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>規格</td>
        <td>單價</td>
        <td>小計</td>
    </tr>

    <?php
        $num=0;
        $total=0;
        foreach($items as $item => $quantity){
        $row = find('item_detail',['id' => $item]);
        $num++;
    ?>        
  
    <tr class="tt ct">
        <td><?=$num;?></td>
        <td><?=$row['name'];?></td>
        <td><?=$quantity;?></td>
        <td><?=$row['type'];?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$quantity;?></td>
    </tr>

    <?php
        $total = $total+$row['price']*$quantity;
        }
    ?>
</table>
<div class="all tt ct">
    總額:<?=$total;?>
</div> 
<div class="ct">
    <button onclick="location.href='?do=look_user_items&acc=<?=$_GET['acc'];?>&userid=<?=$userid;?>'">返回</button>
</div>
