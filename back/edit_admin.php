<?php
$row=find('admin',$_GET['id']);
if($row['permit']){
    $permit = unserialize($row['permit']);
}else{
    $permit = [];//當$row['permit']為空時，給予permit空陣列
}
?>

<h1 class="ct ">修改管理帳號</h1>
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct ct_a">帳號</td>
            <td class="pp">
                <input type="text" name="acc" id="acc" value="<?=$row['acc'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">密碼</td>
            <td class="pp ct_a">
                <input type="password" name="pw" id="pw" value="<?=$row['pw'];?>">
                <input type="hidden" name="id" id="id" value="<?=$row['id'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct ct_a">權限</td>
            <td class="pp ct_a">
                <div>
                    <input type="checkbox" name="permit[]" value="1" <?=(in_array(1,$permit))?"checked":"";?> >
                    商品分類與管理
                </div>
                <div>
                    <input type="checkbox" name="permit[]" value="2" <?=(in_array(2,$permit))?"checked":"";?> >
                    訂單管理
                </div>
                <div>
                    <input type="checkbox" name="permit[]" value="3" <?=(in_array(3,$permit))?"checked":"";?> >
                    會員管理
                </div>
                <div>
                    <input type="checkbox" name="permit[]" value="4" <?=(in_array(4,$permit))?"checked":"";?> >
                    最新消息管理
                </div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改">
    </div>
</form>