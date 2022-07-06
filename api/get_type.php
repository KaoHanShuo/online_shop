<?php include_once "../base_inc.php";
#顯示大分類
#from back/category
#from back/add_item


// $parent = isset($_POST['parent']) ? $_POST['parent'] : 0;
// $options = all('category',['parent'=>$parent]);

// foreach($options as $opt){
//    echo "<option value='{$opt['id']}'>{$opt['name']}</option>";
// } 

switch($_POST['type']){//type=primary,$_post['primary']=key
   case "primary":
      $options=all('category');
      foreach($options as $value){
         if(($_POST['primary']+1) == $value['parent']){
         echo "<option value='{$value['id']}'>".$value['name']."</option>";
         }
      }
   break;
   case "secondary":
      //產生編號
      $no=sprintf("%02d",($_POST['primary']+1)).sprintf("%02d",$_POST['secondary']).rand(10,99);
      echo $no;
   break;
}
?>