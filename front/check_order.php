<!-- 確認訂單 -->
<?php include_once "base_inc.php";
    $member = find('user',['acc'=>$_SESSION['user']]);
    $items = all('item_order',['acc'=>$member['acc']]) 
?>

<h1 class="ct">訂單查詢</h1>

<table class="all">
    <tr class="tt ct">
        <td>項次</td>
        <td>訂單編號</td>
        <td>總金額</td>
        <td>下單時間</td>
        <td></td>
    </tr>
    <?php
    $num=0;
        foreach($items as $key => $value){
            $num++;
    ?>
    <tr class="pp ct">
        <td><?=$num;?></td>
        <td><?=$value['number'];?></td>
        <td><?=$value['total'];?></td>
        <td><?=$value['date'];?></td>
        <td>
            <button onclick="location.href='?do=check_detail&id=<?=$value['id'];?>'">查看</button>
        </td>
    </tr>
    <?php
        }
        
    ?>
</table>
