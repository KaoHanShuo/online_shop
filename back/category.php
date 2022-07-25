<?php
    $primary = all('category',['parent'=>0]);
    
?>
<!-- 商品管理 -->


<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="location.href='?do=add_item'">新增商品</button></div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
<?php
    $rows = all('item_detail');//撈所有商品
    foreach($rows as $row){
?>
    <tr class="pp ct">
    <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['stock'];?></td>
        <td><?=($row['sell_state']==1)?'販賣中':'已下架';?></td>
        <td>
            <button onclick="location.href='?do=edit_item&id=<?=$row['id'];?>'">修改</button>
            <button onclick="del('item_detail',<?=$row['id'];?>)">刪除</button>
            <button onclick="upDown(<?=$row['id'];?>,1)">上架</button>
            <button onclick="upDown(<?=$row['id'];?>,0)">下架</button>
        </td>
    </tr>
<?php
    }
?>
</table> 