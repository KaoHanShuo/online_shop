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
        <div class="ct " style='padding:10px;width:35%;'>
            <a href="#"><img src='img/<?=$row['file_img'];?>' style='width:100%;height:100%'></a>
        </div>

        <div style="width:60%; margin-top:10px;" class="">
            <div class="ct tt "><?=$row['name'];?></div>
            <div class="black">
                價格:<?=$row['price'];?>
            </div>
            <div class="black">規格:<?=$row['type'];?></div>
            <div class="black">簡介:<?=mb_substr($row['introduce'],0,20);?></div>
            <a href="?do=detail&id=<?=$row['id'];?>" style="margin-top:10px;" class="card-footer btn btn-sm text-dark px-2 black"><i class="fas fa-shopping-cart text-primary mr-1" style="font-size: 20px"></i> add</a>
        </div>
        
    </div>
<?php
    }
?>