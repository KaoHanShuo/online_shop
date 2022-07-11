<?php
if(!isset($_SESSION['user'])){
    to("?do=login");
    exit();
}

// if(isset($_GET['id']) && isset($_GET['quantity'])){
//     //存成2維陣列，裡面的每個陣列=[商品(id)=>幾個(qt)]
//     //[cart][1]=3
//     $_SESSION['cart'][$_GET['id']]=$_GET['quantity']; 
// }

if(empty($_SESSION['cart'])){
    echo "<h1 class='ct'>購物車中無商品</h1>";
}else{
    //print_r($_SESSION['cart']);
}

//echo "你要購買的商品id為".$_GET['id'];
//echo "數量為".$_GET['id'];//need fix
?> 

<h1 class="ct"><?=$_SESSION['user'];?>的購物車</h1>
<table class="all">
    <tr class="tt ct">
        <td>項次</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>規格</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    $num=0;
    foreach($_SESSION['cart'] as $id => $quantity){
        $item=find('item_detail',$id);
        $num++;
    ?>
    <tr class="pp ct">
        <td><?=$num;?></td>
        <td><?=$item['name'];?></td>
        <td><input type="number" name="qt[]" id="qt" value="<?=$quantity;?>" max="<?=$item['stock'];?>" style="width:50px" onchange="changeQt(<?=$num;?>,<?=$id;?>,<?=$quantity;?>,)"></td>
        <td><?=$item['type'];?></td>
        <td><?=$item['price'];?></td>
        <td><?=$item['price']*$quantity;?></td>
        <td>
            <img src="icon/0415.jpg" alt="刪除" onclick="delCart(<?=$id;?>)">
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <button type="button" class="btn btn-info black"  onclick="location.href='index.php'">繼續選購商品</button>
    <button type="button" class="btn btn-info black"  onclick="location.href='?do=checkout'">前往結帳畫面</button>
</div>

<script>
    function changeQt(num,id,qt){
        let number = new Array();
        $("input[type='number']").each(function(index,dom){
            number.push($(dom).val());
        })
        qt=number[num-1];
        $.post("api/change_quantity.php",{"id":id,"qt":qt},function(){
            //alert(qt);
            location.reload();
        })
    }

    function delCart(id){
        $.post("api/delete_cart.php",{id},function(){
            location.href='?do=buycart';
        })
    }
</script>