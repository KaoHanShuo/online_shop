<?php include_once "../base_inc.php";
//新增大分類與中分類
//from back/category

//新增
switch($_POST['type']){
    case "primary":
        insert('category',['name'=>$_POST['primary']]);
    break;
    case "secondary":
        insert('category',['name'=>$_POST['secondary'],'parent'=>$_POST['primary']]);
    break;
}

//更新
if($_POST['update']){
    update('category',['name'=>$_POST['name']],['id'=>$_POST['id']]);
}

?> 