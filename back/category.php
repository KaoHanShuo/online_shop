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
<table class="all ">
    <?php
        foreach($primary as $primary_value){
    ?>

    <tr class="tt">
        <td id="t<?=$primary_value['id'];?>"><?=$primary_value['name'];?></td>
        <td class="ct">
            <button onclick="editType(<?=$primary_value['id'];?>)">修改名稱</button>
            <button onclick="del('category',<?=$primary_value['id'];?>)">刪除</button>
        </td>
    </tr>

    <?php
        $secondary=all('category',['parent'=>$primary_value['id']]);
        if(count($secondary)>0){
            foreach($secondary as $secondary_value){
    ?>

    <tr class="pp ct pink">
        <td id="t<?=$secondary_value['id'];?>"><?=$secondary_value['name'];?></td>
        <td>
            <button onclick="editType(<?=$secondary_value['id'];?>)">修改名稱</button>
            <button onclick="del('category',<?=$secondary_value['id'];?>)">刪除</button>
        </td>
    </tr>

    <?php
            }
        }
    }
    ?>

</table>

<hr>
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