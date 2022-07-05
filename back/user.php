<!-- 會員管理 -->
<div class="ct">會員管理</div>
<table class="all ct">
   <tr class="tt">
      <td>姓名</td>
      <td>會員帳號</td>
      <td>註冊日期</td>
      <td>操作</td>
   </tr>
   <?php
   $rows=all('user');
   foreach($rows as $row){
   ?>
   <tr class="pp">
      <td><?=$row['name'];?></td>
      <td><?=$row['acc'];?></td>
      <td><?=$row['register_data'];?></td> <!--date("Y-m-d",strtotime($row['regdate']))-->
      <td>
         <button onclick="location.href='?do=edit_user&id=<?=$row['id'];?>'">修改</button>
         <button onclick="del('member',<?=$row['id'];?>)">刪除</button>
      </td>
   </tr>
   <?php
   }
   ?>
</table> 