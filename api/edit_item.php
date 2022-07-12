<?php include_once "../base_inc.php";
//新增修改商品
//from back/add_item
//from back/category
//from back/edit_item

switch($_POST['logic']){
    case "editItem":
		move_uploaded_file($_FILES['file_img']['tmp_name'],"../img/".$_FILES['file_img']['name']);
		$_POST['file_img']=$_FILES['file_img']['name'];
		$_POST['primary']++;
		if($_POST['file_img2']){
			$_POST['file_img']=$_POST['file_img2'];
		}
		$array=array('no'=>$_POST['no'],'name'=>$_POST['name'],'price'=>$_POST['price'],'file_img'=>$_POST['file_img'],'primary'=>$_POST['primary']
		,'secondary'=>$_POST['secondary'],'stock'=>$_POST['stock'],'type'=>$_POST['type'],'introduce'=>$_POST['introduce']);
		update('item_detail',$array,['id'=>$_POST['id']]);   
	break;

	case "addItem":
	    move_uploaded_file($_FILES['file_img']['tmp_name'],"../img/".$_FILES['file_img']['name']);
		$_POST['file_img']=$_FILES['file_img']['name'];
		$_POST['primary']++;
		$array=array('no'=>$_POST['no'],'name'=>$_POST['name'],'price'=>$_POST['price'],'file_img'=>$_POST['file_img'],'primary'=>$_POST['primary']
		,'secondary'=>$_POST['secondary'],'stock'=>$_POST['stock'],'type'=>$_POST['type'],'introduce'=>$_POST['introduce']);
		insert('item_detail',$array);    	
	break;

	case "upDown":
		update('item_detail', ['sell_state'=>$_POST['sell_state']], ['id'=>$_POST['id']]);
	break;
}

to("../back.php?do=category"); 
?>
