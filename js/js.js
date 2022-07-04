function del(table,id){
	$.post("api/delete_admin.php",{table,id},function(){ 
		location.reload();
	})
} 