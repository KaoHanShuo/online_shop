<h1 class="ct">新增管理帳號</h1>

<table class="all">
    <tr>
        <td class="tt ct_a ct">帳號</td>
        <td class="pp ct_a"><input type="text" name="acc" id="acc"></td>
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
    <button onclick="addAdmin()">新增</button>|
    <button onclick="reset()">重置</button>
</div>

<script>

    function reset(){
        $("#acc,#pw").val("");
        $("input[type='checkbox']").prop('checked',false);
    }

    function addAdmin(){
        let permit = new Array();
        $("input[type='checkbox']:checked").each((idx,dom)=>{
            permit.push($(dom).val());
        })
        $.post("./api/save_admin.php",{acc:$("#acc").val(), pw:$("#pw").val(), permit},function(){
            
            //location.href="";
            location.href="?do=admin";
        })
    }
</script> 

