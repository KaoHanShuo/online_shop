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