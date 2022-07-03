<!-- 會員登入 -->
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
            <p><img id="imgcode" src="./back/captcha.php" onclick="refresh_code()"/></p>

            <?php
                //echo $_SESSION['ans'];
            ?>
        </td>
    </tr>
</table>


<!-- include "./back/captcha.php" -->


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
    function refresh_code(){ 
        document.getElementById("imgcode").src="./back/captcha.php"; 
    } 

    function login(){
      $.post("api/check_captcha.php",{ans:$("#ans").val()},function(check){
         if(parseInt(check)){
            alert("驗證碼對了");
         }else{
            alert("驗證碼不對");
            //alert("對不起，您輸入的驗證碼有誤請您重新輸入");
         }
      })
   }
</script>