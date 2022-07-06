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

//新增商品api
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