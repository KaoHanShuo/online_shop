<!-- 編輯會員資料 -->
<?php
$row=find('user',$_GET['id']);
?>

<h1 class="ct">編輯會員資料</h1>
<form action="api/save_user.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?=$row['acc'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?=str_repeat('*',strlen($row['pw']));?>
                <input type="hidden" name="id" id="id" value="<?=$row['id'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">總交易量</td>
            <td class="pp"><?=$row['total'];?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">編輯</button>
        <button type="reset">重製</button>
        <button onclick="location.href='?do=user'">取消</button>
    </div>
</form>