<?php include_once "../base_inc.php";
//新增修改商品
//from back/add_item

if(isset($_FILES['file_img']['tmp_name'])){
   move_uploaded_file($_FILES['file_img']['tmp_name'],"../img/".$_FILES['file_img']['name']);
   $_POST['file_img']=$_FILES['file_img']['name'];
}
insert('item_detail',$_POST);
to("../back.php?do=category"); 
?>
