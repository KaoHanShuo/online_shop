<!-- 會員註冊 -->
<h1 class="">會員註冊</h1>

<table class="all" >
    <tr>
        <td class="tt ct ct_a">姓名</td>
        <td class="pp ct_a"><input type="text" name="name" id="name"  onblur="lookName()"><label><p id="valid_name"></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">帳號</td>
        <td class="pp ct_a">
            <input type="text" name="acc" id="acc" onblur="lookAcc()">
            <button onclick="checkAcc()">檢測帳號</button>
            <label><p id="valid_acc"></p></label>
        </td>
    </tr>
    <tr>
        <td class="tt ct ct_a">密碼</td>
        <td class="pp ct_a"><input type="password" name="pw" id="pw" onblur="lookPw()">
            <label><p id="valid_pw"></p></label>
        </td>
        
    </tr>
    <tr>
        <td class="tt ct ct_a">電話</td>
        <td class="pp ct_a"><input type="text" name="tel" id="tel" onblur="lookTel()">
            <label><p id="valid_tel"></p></label>
        </td>
    </tr>
    <tr>
        <td class="tt ct ct_a">住址</td>
        <td class="pp ct_a"><input type="text" name="addr" id="addr" onblur="lookAddr()"><label><p id="valid_addr" ></p></label></td>
    </tr>
    <tr>
        <td class="tt ct ct_a">電子信箱</td>
        <td class="pp ct_a"><input type="text" name="email" id="email" onblur="lookEmail()"><label><p id="valid_email"></p></label></td>
    </tr>
</table>

<div class="ct">
    <button onclick="reg()">註冊</button>
</div> 


<!-- onclick反應,jqury -->
<script>
    // 檢測帳號
    function checkAcc(){
        $.post("./api/check_acc.php",{acc:$("#acc").val()},function(check){ //  ./api/check_acc.php
            if(($("#valid_acc").text()).length < 6 ){
                if(parseInt(check) || $("#acc").val()=='admin'){ //if(check>0)
                    alert("帳號已存在");
                }else{
                    alert("此帳號沒有重複");
                }
            }else
                alert("此帳號太短或含有錯誤字元");
        })
    }
    //註冊帳號
    function reg(){
        //取值
        let data={
            acc:$("#acc").val(),
            name:$("#name").val(),
            pw:$("#pw").val(),
            addr:$("#addr").val(),
            tel:$("#tel").val(),
            email:$("#email").val(),
        }
        $.post("./api/check_acc.php",{acc:data.acc},function(check){ //  
            if(parseInt(check) || data.acc=='admin'){ //if(check>0)
                alert("帳號已存在");
            }else{
                $.post("./api/reg.php",data,function(res){ //無法回傳物件
                if(res==0){//驗證成功
                    alert("註冊成功");
                    location.href='?do=login';
                }else if(res==1){
                    alert("註冊失敗");
                }
                //typeof
                })
            }
        })
    }
</script> 

