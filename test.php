<?php include_once "base_inc.php";
    print_r($_POST);
    echo '1|OK';

    if($_POST){update('user',['name'=>"test777"],['id'=>16]);}
?>

<form action="index.php" method="POST">
    <input id="test" name="test">
    <button type="submit">確認</button>
</form>