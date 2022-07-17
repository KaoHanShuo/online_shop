//刪除
function del(table,id){
	$.post("api/delete_admin.php",{table,id},function(){ 
		location.reload();
	})
} 
//新增分類
function addCate(type){
    let primary,parent,secondary;
    switch(type){
        case "primary":
            primary=$("#primary").val()
            $.post("api/edit_category.php",{type,primary},function(){
                location.reload();
            })
        break;
        case "secondary":
            secondary=$("#secondary").val()
            primary=$("#parent").val()
            $.post("api/edit_category.php",{type,secondary,primary},function(){
                location.reload();
            })
        break;
    }
}
//更新分類
function editType(id){
	let update=1;
	let change=prompt("請輸入要修改的分類名稱",$("#t"+id).html());
	if(change!=null){
		$.post("api/edit_category.php",{id,"name":change,update},function(){
		$("#t"+id).html(change);
		})
	}
}

//即時更新商品分類api
function changeType(type){
    let primary,secondary;
    switch(type){
        case "primary":
            primary=$("#primary").val();
            $("#secondary").load("api/get_type.php",{type,primary},function(){
                changeType('secondary');
                //alert(primary);
            })
        break;
        case "secondary":
            primary=$("#primary").val();
            secondary=$("#secondary").val();
            $.post("api/get_type.php",{type,secondary,primary},function(res){
                $("#no").html(res+"<input type='hidden' name='no' value='"+res+"'>");
            })
        break;
    }
}

function upDown(id,sell_state){//商品上下架
    $.post("api/edit_item.php",{'id':id,'sell_state':sell_state,'logic':"upDown"},function(){
        location.reload();
    })
}

function minus(){// front/detail
    $number=$("#quantity").val();
    if($number>0){$number--;}
    //$number--;
    $("#quantity").val($number);
}
function plus(max){// front/detail
    $number=$("#quantity").val();
    if(max>$number){$number++;}
    $("#quantity").val($number);
}

function refresh_code(){ //驗證碼刷新
    document.getElementById("imgcode").src="./api/create_captcha.php"; 
} 


function lookName(){
    let name = $("#name").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'name':name},function(res){
        $("#valid_name").html(res);
    })
}
//front/reg
function lookAcc(){
    //$("#valid_name").html("<p>*124</p>");
    let acc = $("#acc").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'acc':acc},function(res){
        if(word.test(res)){
            $("#valid_acc").html("*至少六個字母");
        }else{
            $("#valid_acc").html(res);
        }
    })
    //console.log(test);
}
function lookPw(){
    let pw = $("#pw").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'pw':pw},function(res){
        if(word.test(res)){
            $("#valid_pw").html("*至少六個字母");
        }else{
            $("#valid_pw").html(res);
        }
    })
}
function lookTel(){
    let tel = $("#tel").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'tel':tel},function(res){
        $("#valid_tel").html(res);
    })
}
function lookAddr(){
    let addr = $("#addr").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'addr':addr},function(res){
        $("#valid_addr").html(res);
    })
}
function lookEmail(){
    let email = $("#email").val();
    let word = RegExp("least");
    $.post("./api/valid.php",{'email':email},function(res){
        $("#valid_email").html(res);
    })
}

function editMember(){//fron/edit_member
    let data={
        id:$("#id").val(),
        name:$("#name").val(),
        addr:$("#addr").val(),
        tel:$("#tel").val(),
        email:$("#email").val(),
    }
    $.post("api/edit_member.php",data,function(res){ 
        if(res==0){//驗證成功
            alert("修改成功");
        }else if(res==1){
            alert("修改失敗");
            location.reload();
        }
    })
}


/**
 * 好像用不到
 * front/checkout
function checkout(){
    let data={
        total:<?=$total;?>,
        acc:'<?=$member['acc'];?>',
        name:$("#name").val(),
        addr:$("#addr").val(),
        email:$("#email").val(),
        tel:$("#tel").val(),
        
    }
    $.post("api/checkout.php",data,function(){
        alert("訂購成功\n感謝您的選購");
        location.href="index.php";
    })
}
*/
