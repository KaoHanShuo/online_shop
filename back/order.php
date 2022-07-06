<!-- 訂單管理 -->
<?php
   $rows=all('item_order');
?>

<h1 class="ct">訂單管理</h1>
<table class="all ct">
   <tr class="tt">
      <td>訂單編號</td>
      <td>金額</td>
      <td>會員帳號</td>
      <td>姓名</td>
      <td>下單時間</td>
      <td>管理</td>
   </tr>
   <?php
   
   foreach($rows as $row){
   ?>
   <tr class="pp">
      <td><?=$row['number'];?></td>
      <td><?=$row['total'];?></td>
      <td><?=$row['acc'];?></td>
      <td><?=$row['name'];?></td>
      <td><?=$row['date'];?></td>
      <td>
      <button onclick="del('item_order',<?=$row['id'];?>)">刪除</button>
      </td>
   </tr>
   <?php
   }
   ?>
</table> 