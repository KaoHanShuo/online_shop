<?php
    $primary = all('category',['parent'=>0]);
    
?>
<!-- 商品管理 -->
<h1 class="ct">商品分類</h1>
<div class="ct">新增大類
   <input type="text" name="primary" id="primary">
   <button onclick='addCate("primary")'>新增</button>
</div>
<div class="ct">新增中類
   <select name="parent" id="parent">
    <?php
        foreach($primary as $key => $value){
            echo "<option value='{$value['id']}'>{$value['name']}</option>";
        } 
    ?>
   </select>
   <input type="text" name="secondary" id="secondary">
   <button onclick='addCate("secondary")'>新增</button>
</div>
<!-- 分類區 -->
<hr>
<h1 class="ct">商品管理</h1>
<div class="ct"><button>新增商品</button></div>
<table class="all">
   <tr class="tt ct">
      <td>編號</td>
      <td>商品名稱</td>
      <td>庫存量</td>
      <td>狀態</td>
      <td>操作</td>
   </tr>
   <tr class="pp ct">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
         <button>修改</button>
         <button onclick="del('item_detail')">刪除</button>
         <button>上架</button>
         <button>下架</button>
      </td>
   </tr>
</table> 