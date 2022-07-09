<?php include_once "./base_inc.php";

$type = isset($_GET['type']) ? $_GET['type'] : 0;
    if($type == 0){
        $big = "全部商品";
        $rows = all('item_detail',['sell_state'=>1]);//全部
    }else{
        $cate = find('category',$type);//找一筆id符合
        $second = find('category',$cate['parent']);//找cate的大類
        $big = $second['name'] . " > " . $cate['name'];
        $rows = all('item_detail',['sell_state'=>1, 'secondary'=>$type]);//中分類
    }
?>

<h1><?= $big; ?></h1>
<?php
    foreach ($rows as $row) {
?>
    <div class="all black" style="display:flex;justify-content:center;height:100%;">
        <div class="pp ct " style='padding:10px;width:35%;'>
            <a href="#"><img src='img/<?=$row['file_img'];?>' style='width:100%;height:100%'></a>
        </div>

        <div style="width:65%" class="pp">
            <div class="ct tt "><?=$row['name'];?></div>

            <div class="black">
                價格:<?=$row['price'];?>
                <a href="#" style='float:right'><img src="./icon/0402.jpg" alt=""></a>
            </div>
            <div class="black">規格:<?=$row['type'];?></div>
            <div class="black">簡介:<?=mb_substr($row['introduce'],0,20);?></div>
        </div>
    </div>
<?php
    }
?>