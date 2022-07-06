<h1 class="ct">新增商品</h1>
<form action="api/edit_item.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct ct_a">所屬大分類</td>
            <td class="pp ct_a">
                <select name="primary" id="primary" onchange="changeType('primary')" size="3">
                    <?php
                        $primary = all('category',['parent'=>0]);
                        foreach($primary as $key => $value){
                            echo "<option value='$key'>".$value['name']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">所屬中分類</td>
            <td class="pp ct_a">
            <select name="secondary" id="secondary" onchange="changeType('secondary')"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品編號</td>
            <td class="pp ct_a" id="no">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品名稱</td>
            <td class="pp ct_a">
            <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品價格</td>
            <td class="pp ct_a">
                <input type="text" name="price" id="price">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">規格</td>
            <td class="pp ct_a">
            <input type="text" name="type" id="type">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">庫存量</td>
            <td class="pp ct_a">
            <input type="text" name="stock" id="stock">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品圖片</td>
            <td class="pp ct_a">
            <input type="file" name="file_img" id="file_img">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">商品介紹</td>
            <td class="pp ct_a">
            <textarea  name="introduce" id="introduce" style="width:400px;height:80px"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">新增</button> | 
        <button type="button" onclick="location.href='?do=category'">返回</button>
    </div>
</form>