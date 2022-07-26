<!-- 過往紀錄 -->
<?php
   $rows=all('item_order',['acc' => $_GET['acc']]);
   $userid = $_GET['userid'];
?>

<h1 class="ct">過往紀錄</h1>
<table class="all ct">
   <tr class="tt">
      <td>訂單編號</td>
      <td>金額</td>
      
      <td>下單時間</td>
      <td>管理</td>
   </tr>
   <?php
   foreach($rows as $row){
   ?>
   <tr class="pp">
      <td><?=$row['number'];?></td>
      <td><?=$row['total'];?></td>
      <td><?=$row['date'];?></td>
      <td>
      <button onclick="location.href='?do=look_user_items_detail&userid=<?=$userid;?>&itemid=<?=$row['id'];?>&acc=<?=$_GET['acc'];?>'">查看</button>
      
      </td>
   </tr>
   <?php
   }
   ?>
</table> 
<div class="ct">
    <button onclick="location.href='?do=edit_user&acc=<?=$_GET['acc'];?>&userid=<?=$userid;?>'">返回</button>
</div>