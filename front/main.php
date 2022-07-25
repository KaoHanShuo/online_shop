<?php include_once "./base_inc.php";

$type = isset($_GET['type']) ? $_GET['type'] : 0;
    if($type == 0){
        $big = "全部商品";
        $totalitem = rows('item_detail',['sell_state'=>1]);
        //每頁三個，
        $per = 3;
        $number_of_pages = ceil($totalitem/$per);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page2=($page-1)*$per;
        $rows = alllimit('item_detail',$page2,['sell_state'=>1]);//全部
    }else{
        $per = 3;
        $cate = find('category',$type);//找一筆id符合
        $second = find('category',$cate['parent']);//找cate的大類
        $big = $second['name'] . " > " . $cate['name'];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $rows = all('item_detail',['sell_state'=>1, 'secondary'=>$type]);//中分類
        $totalitem = rows('item_detail',['sell_state'=>1, 'secondary'=>$type]);
        $number_of_pages = ceil($totalitem/$per);
    }
?>

<h1><?= $big; ?>  第<?= $page;?>頁</h1>
<?php
    foreach ($rows as $row) {     
?>
    <div class="all black" style="display:flex;justify-content:center;height:100%;">
        <div class="ct " style='padding:10px;width:35%;'>
            <a href="#"><img src='img/<?=$row['file_img'];?>' style='width:100%;height:100%;max-height:200px;width:auto;'></a>
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


<?php
if(isset($_GET['page'])){
    
}
if($totalitem>$per){
    $prev = $page -1;
    $next = $page +1;
    echo "<div class='ct'>";
    if($prev>0){
        echo ' <a href="index.php?page=' . $prev . '"> < </a> ';
    }
    
    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
    }

    if($number_of_pages >= $next){
        echo ' <a href="index.php?page=' . $next . '"> > </a> ';
    }
    echo "</div>";
}


?>