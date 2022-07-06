<?php include_once "../base_inc.php";
#顯示大分類
#from back/category
#暫時用不到

$primary = all('category',['parent'=>0]);

foreach($primary as $key => $value){
   echo "<option value='{$value['id']}'>{$value['name']}</option>";
} 

?>