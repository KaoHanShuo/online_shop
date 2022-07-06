<?php include_once "../base_inc.php";
//新增大分類與中分類
//from back/category

//$_POST['parent'] = 0;
switch($_POST['type']){
    case "primary":
        insert("category",['name'=>$_POST['primary']]);
    break;
    case "secondary":
        insert("category",['name'=>$_POST['secondary'],'parent'=>$_POST['primary']]);
    break;
}
//insert('category',$_POST[]);

?> 