<!-- 會員登入 -->
<?php include_once "base_inc.php";?>
<h1>會員登入</h1>

<table class='all'>
    <tr>
        <td class="ct ct_a">帳號</td>
        <td class="pp ct_a"><input type="text" name="acc" id="acc" ></td>
    </tr>
    <tr>
        <td class="ct ct_a">密碼</td>
        <td class="pp ct_a"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct ct_a">驗證碼</td>
        <td class="pp ct_a">
            <input type="text" name="ans" id="ans">
            <p><img id="imgcode" src="./api/create_captcha.php" onclick="refresh_code()"/>可點擊圖片刷新</p>
        </td>
        
    </tr>
    
</table>

<div class="ct">
    <a href="?do=reg"><button>註冊</button></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <button onclick="login()">確認</button>
</div> 

<script>
    function refresh_code(){ //驗證碼刷新
        document.getElementById("imgcode").src="./api/create_captcha.php"; 
    } 

    function login(){ //登入
        //取值
        let data={
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        ans:$('#ans').val(),
        }

        $.post("./api/check_captcha.php",{ans:data.ans},function(check){ //  ./api/check_captcha.php
            if(parseInt(check)){
                //alert("驗證碼正確");
            $.post("./api/check_pw.php",{table:'user', acc:data.acc, pw:data.pw},function(res){ //  ./api/check_pw.php
                if(parseInt(res)){
                  location.href="./index.php";//假設登入成功跳轉
                }else{
                    alert("帳號或密碼錯誤");
                    location.reload();
                }
            })
        }else{
            location.reload();
            alert("驗證碼輸入錯誤");
        }
        })
    }
</script>