<!-- 新方法重寫 -->
<h1 class="ct">新增管理帳號</h1>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct ct_a">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">密碼</td>
            <td class="pp ct_a"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct ct_a">權限</td>
            <td class="pp ct_a">
                <div><input type="checkbox" name="permit[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="permit[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="permit[]" value="3">會員管理</div>
                <div><input type="checkbox" name="permit[]" value="4">最新消息管理</div>
            </td>
        </tr>
    </table>

    <div class="ct">
        <input type="submit" value="新增">|
        <input type="reset" value="重置">
    </div>

</form>