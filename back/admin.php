<!-- 帳號管理 -->
<?php  
    $rows = all('admin');//取所有admin內資料
?>

<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>    
</div>
<table class="all ct">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
        foreach($rows as $row){
    ?>

    <tr class="pp">
        <td><?php echo $row['acc'];?></td>
        <td><?php echo str_repeat("*",strlen($row['pw']));?></td>
        <td>
            <?php
                if($row['acc']=='admin'){
                    echo "主管理員";
                }else{
            ?>

            <button onclick="location.href='?do=edit_admin&id=<?=$row['id'];?>'">edit</button>
            <button onclick="del('admin',<?=$row['id'];?>)">delete</button>

            <?php    
                }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table> 

