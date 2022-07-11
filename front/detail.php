<!-- 商品細節 -->
<?php

$item = find('item_detail',$_GET['id']);
echo "<h1 class='ct'>".$item['name']."</h1>";

?> 

<div class="all black" style="display:flex">
    <div class=" ct" style="margin:10px;">
        <img src="img/<?= $item['file_img']; ?>" style="max-height:600px;max-width:600px;">
    </div>
    <div class="" style="margin:10px;padding-top:10px;">
        <div>編號:<?=$item['no'];?></div>
        <div>價格:<?=$item['price'];?></div>
        <div><p class="mb-4">詳細說明:<?=$item['introduce'];?></p></div>
        <div>庫存量:<?=$item['stock'];?></div>
    </div>
</div>
<div class="d-flex align-items-center  justify-content-center    black">
    購買數量: 
    <div class="input-group quantity mr-3" style="width: 130px;">
        <div class="input-group-btn">
            <button class="btn btn-primary btn-minus" onclick="minus()">
                <i class="input-group-btn fa fa-minus"></i> 
            </button>
        </div>

        <input type="text" name="quantity" id="quantity" value="1" class="form-control text-center">

        <div class="input-group-btn">
            <button class="btn btn-primary btn-plus"  onclick="plus()">
                <i class="input-group-btn fa fa-plus"></i> 
            </button>
        </div>
    </div>
    <!-- <img src="icon/0402.jpg" onclick="buy(<?=$item['id'];?>)"> -->
</div>

<script>
    function minus(){
        $number=$("#quantity").val();
        $number--;
        $("#quantity").val($number);
    }
    function plus(){
        $number=$("#quantity").val();
        $number++;
        $("#quantity").val($number);
    }
</script>