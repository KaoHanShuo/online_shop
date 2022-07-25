<!-- 商品修改 -->
<h1 class="ct">修改商品</h1>
<?php
$rows = find('item_detail',['id'=>$_GET['id']]);//撈一筆商品資料
?>
<form action="api/edit_item.php" method="post" enctype="multipart/form-data">
    <!-- 判斷api類型邏輯 -->
    <input type="text" name="logic" value="editItem" hidden>
    <table class="all">
        <tr>
            <td class="tt ct ct_a">所屬大分類</td>
            <td class="pp ct_a">
                <select name="primary" id="primary"  onchange="changeType('primary')" size="1">
                <?php
                    $primary = all('category',['parent'=>0]);//撈所有大分類
                    foreach($primary as $key => $value){
                        if($rows['primary']==$value['id']){
                            echo "<option value='$key' selected>";
                            echo $value['name'];
                            echo "</option>";
                        }else{
                            echo "<option value='$key'>";
                            echo $value['name'];
                            echo "</option>";
                        }
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">所屬中分類</td>
            <td class="pp ct_a">
            <select name="secondary" id="secondary" onchange="changeType('secondary')" size="1">
                <?php
                    $secondary = all('category',['parent'=>$rows['primary']]);//撈所有大分類
                    foreach($secondary as $key2 => $value2){
                        if($rows['secondary']==$value2['id']){
                            echo '<option value="';
                            echo $value2["id"];
                            echo '" selected>';
                            echo $value2['name'];
                            echo "</option>";
                        }else{
                            echo '<option value="';
                            echo $value2["id"];
                            echo '">';
                            echo $value2['name'];
                            echo "</option>";
                        }
                    }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品編號</td>
            <td class="pp ct_a">
            <input type="text" name="no" id="no" value="<?=$rows['no']?>" hidden>
                <?php
                    echo  $rows['no'];
                ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a" >商品名稱</td>
            <td class="pp ct_a">
            <input type="text" name="name" id="name" value="<?=$rows['name']?>">
            <input type="hidden" name="id" id="id" value="<?=$rows['id']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品價格</td>
            <td class="pp ct_a">
                <input type="text" name="price" id="price" value="<?=$rows['price']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">規格</td>
            <td class="pp ct_a">
            <input type="text" name="type" id="type" value="<?=$rows['type']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">庫存量</td>
            <td class="pp ct_a">
            <input type="text" name="stock" id="stock" value="<?=$rows['stock']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品圖片</td>
            <td class="pp ct_a">
            <input type="text" name="file_img2" id="file_img2" value="<?=$rows['file_img']?>" hidden>
            <img src="img/<?=$rows['file_img']?>" width="10%" height="10%" alt="logo">
            <input type="file" name="file_img" id="file_img">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品介紹</td>
            <td class="pp ct_a">
            <input type="text" name="introduce" id="introduce" value="<?=$rows['introduce']?>" hidden>
            <textarea name="introduce" id="introduce" style="width:90%;height:100px"><?=$rows['introduce']?></textarea>
            </td>
        </tr>

    </table>
    <div class="ct">
    <button type="submit" onclick="modifySuccess()">修改</button> | 
        <button type="button" onclick="location.href='?do=category'">返回</button>
    </div>
</form>


