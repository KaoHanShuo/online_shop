<?php
/***  修改成物件模型 ***/
$dsn="mysql:host=localhost;charset=utf8;dbname=business";
$pdo=new PDO($dsn,'root','');

session_start();

//取得符合條件的一筆資料
function find($table,$id){
    global $pdo;
    $sql="SELECT * FROM `$table` WHERE ";

    if(is_array($id)){
        foreach($id as $key=>$value){
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql. implode(" AND ",$tmp);
    }else{
       $sql=$sql . "`id`='$id'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

//符合條件的資料筆數
function rows($table,$array){
    global $pdo;
    $sql="SELECT count(*) FROM `$table` WHERE ";
    foreach($array as $key=>$value){
        $tmp[]="`$key`='$value'";
    }
    $sql=$sql. implode(" AND ",$tmp);
    return $pdo->query($sql)->fetchColumn();
}

//取出指定資料表的所有資料
function all($table,...$arg){
    global $pdo;
    $sql="SELECT * FROM `$table` ";

    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key=>$value){
                $tmp[]="`$key`='$value'";
             }
        
            $sql=$sql."where " . implode(" AND ",$tmp);
        }else{
            $sql=$sql.$arg[0];
        }
    }

    if(isset($arg[1])){
        $sql=$sql.$arg[1];
    }
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    //return $pdo->query($sql)->fetchAll();
}
 
function math($table,$math,$col,...$arg){   
    global $pdo;
    $sql="SELECT $math($col) FROM `$table` ";
    switch(count($arg)){
        case 1:
            if(is_array($arg[0])){
                foreach($arg[0] as $key=>$value){
                    $tmp[]="`$key`='$value'";
                }
                $sql .=" where ".implode(" AND ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        break;
        case 2:
            foreach($arg[0] as $key=>$value){
                $tmp[]="`$key`='$value'";
            }
            $sql .=" where ".implode(" AND ",$tmp)." ".$arg[1];
        break;
    }    
    //echo $sql;
    return $pdo->query($sql)->fetchColumn();
}

//更新資料
function update($table,$column,$where){
    global $pdo;
    $sql_set='';
    foreach($column as $key => $value){
        $sql_set=$sql_set . "`$key`='$value',";
    }
    $sql_set=trim($sql_set,',');

    $sql_where='';
    foreach($where as $key => $value){
        $sql_where=$sql_where . "`$key`='$value' AND ";
    }
    $sql_where=mb_substr($sql_where,0,mb_strlen($sql_where)-5);;
    mb_substr($sql_where,0,mb_strlen($sql_where)-5);
    $sql="UPDATE `$table` SET $sql_set WHERE $sql_where ";
    $pdo->exec($sql);
}

//新增資料
function insert($table,$array){
    global $pdo;
    $sql="INSERT into $table(`" . implode('`,`',array_keys($array)) . "`) 
                    value('" . implode("','",$array) ."')";
    //echo $sql."<br>";
    return $pdo->exec($sql);
}

// public function save($array){
//     if(isset($array['id'])){
//         //update
//         foreach($array as $key=>$value){
//             if($key!='id'){

//                 $tmp[]="`$key`='$value'";
//             }
//         }
//         $sql="UPDATE $this->table SET ".implode(",",$tmp)." WHERE `id`='{$array['id']}'";
//     }else{
//         //insert
//         $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`) VALUES('".implode("','",$array)."')";
//     }
//     return $this->pdo->exec($sql);
// }


//刪除資料
function del($table,$id){
    global $pdo;
    $sql="DELETE FROM `$table` WHERE ";
    if(is_array($id)){
        foreach($id as $key=>$value){
            $tmp[]="`$key`='$value'";
        }
    
        $sql=$sql. implode(" AND ",$tmp);
    }else{
    $sql=$sql . "`id`='$id'";
    }
    return $pdo->exec($sql);
}

//導向
function to($url){
    header("location:$url");
}

//通用查詢函式
function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

//direct dump
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


// $Admin=new DB("admin");

// /*新增一次就好 
// $admin['acc']='admin';
// $admin['pw']='1234';
// $admin['pr']=serialize([1,2,3,4,5]);
// $Admin->save($admin);*/

// $Mem=new DB("member");
// $Bot=new DB("bottom");
// $Ord=new DB("ord");
// $Type=new DB("type");
// $Goods=new DB("goods");

?>

