<!-- 編輯會員本身 -->
<h1 class="ct">編輯會員資料</h1>
<?php
$member = find('user',['acc'=>$_SESSION['user']]);
?>

<table class="all">
    <tr>
        <td class="tt ct ct_a">登入帳號</td>
        <td class="pp ct_a"><?=$member['acc']?></td>
        <input type="hidden" name="id" id="id" value="<?=$member['id'];?>">
    </tr>
    <tr>
        <td class="tt ct ct_a">姓名</td>
        <td class="pp ct_a"><input type="text" name="name" id="name" value="<?=$member['name']?>" onblur="lookName()"><label><p id="valid_name"></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">電子信箱</td> 
        <td class="pp ct_a"><input type="text" name="email" id="email" value="<?=$member['email']?>"  onblur="lookEmail()"><label><p id="valid_email"></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">聯絡地址</td>
        <td class="pp ct_a"><input type="text" name="addr" id="addr" value="<?=$member['addr']?>" onblur="lookAddr()"><label><p id="valid_addr"></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">連絡電話</td>
        <td class="pp ct_a"><input type="text" name="tel" id="tel" value="<?=$member['tel']?>" onblur="lookTel()"><label><p id="valid_tel"></p></label></td>
    </tr>
</table>
<div class="ct">
    <button onclick="editMember()">確定修改</button>
</div>