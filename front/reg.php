<!-- 會員註冊 -->
<h1 class="">會員註冊</h1>

<table class="all" >
   <tr>
      <td class="tt ct ct_a">姓名</td>
      <td class="pp ct_a"><input type="text" name="name" id="name"></td>
   </tr>
   <tr>
      <td class="tt ct ct_a">帳號</td>
      <td class="pp ct_a">
         <input type="text" name="acc" id="acc">
         <button onclick="checkAcc()">檢測帳號</button>
      </td>
   </tr>
   <tr>
      <td class="tt ct ct_a">密碼</td>
      <td class="pp ct_a"><input type="password" name="pw" id="pw"></td>
   </tr>
   <tr>
      <td class="tt ct ct_a">電話</td>
      <td class="pp ct_a"><input type="text" name="tel" id="tel"></td>
   </tr>
   <tr>
      <td class="tt ct ct_a">住址</td>
      <td class="pp ct_a"><input type="text" name="addr" id="addr"></td>
   </tr>
   <tr>
      <td class="tt ct ct_a">電子信箱</td>
      <td class="pp ct_a"><input type="text" name="email" id="email"></td>
   </tr>
</table>

<div class="ct">
   <button onclick="reg()">註冊</button>
   
</div> 


<!-- onclick反應,jqury -->
<script>
   // 檢測帳號
   function checkAcc(){
      $.post("api/check_acc.php",{acc:$("#acc").val()},function(check){
         if(parseInt(check) || $("#acc").val()=='admin'){ //if(check>0)
            alert("帳號已存在");
         }else{
            alert("此帳號可使用");
         }
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

      $.post("api/check_acc.php",{acc:data.acc},function(check){
         if(parseInt(check) || data.acc=='admin'){ //if(check>0)
            alert("帳號已存在");
         }else{
            $.post("api/reg.php",data,function(){
               alert("註冊成功");
               location.href='?do=login';
            })
         }
      })
   }
</script> 