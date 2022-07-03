<!-- 會員登入 -->
<?php include_once "base.php";?>
<h1>會員登入</h1>

<table class='all'>
    <tr>
        <td class="ct ct_a">帳號</td>
        <td class="pp ct_a"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="ct ct_a">密碼</td>
        <td class="pp ct_a"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct ct_a">驗證碼</td>
        <td class="pp ct_a">
            <input type="text" name="ans" id="ans">
            <p><img id="imgcode" src="./api/create_captcha.php" onclick="refresh_code()"/></p>
        </td>
    </tr>
    
</table>

<div class="ct">
    <a href="?do=reg"><button>註冊</button></a>
    <button onclick="login()">確認</button>
</div> 

<!-- <i class="bi bi-person-plus"></i> -->
<!-- <div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="login()">確認</button>
</div>  -->

<script>
    function refresh_code(){ //驗證碼刷新
        document.getElementById("imgcode").src="./api/create_captcha.php"; 
    } 

    function login(){
        let data={
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        ans:$('#ans').val(),
        }

        $.post("./api/check_captcha.php",{ans:data.ans},function(check){
            if(parseInt(check)){
                //alert("驗證碼正確");
            $.post("./api/check_pw.php",{table:'user', acc:data.acc, pw:data.pw},function(res){
                if(parseInt(res)){
                  location.href="./index.php";//假設登入成功跳轉
                }else{
                    alert("帳號或密碼錯誤");
                }
            })
        }else{
            alert("驗證碼輸入錯誤");
        }
        })
    }
</script>