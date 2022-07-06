function del(table,id){
	$.post("api/delete_admin.php",{table,id},function(){ 
		location.reload();
	})
} 

function addCate(type){
    let primary,parent,secondary;
    switch(type){
        case "primary":
            primary=$("#primary").val()
            $.post("api/add_category.php",{type,primary},function(){
                location.reload();
            })
        break;
        case "secondary":
            secondary=$("#secondary").val()
            primary=$("#parent").val()
            $.post("api/add_category.php",{type,secondary,primary},function(){
                location.reload();
            })
        break;
    }
}