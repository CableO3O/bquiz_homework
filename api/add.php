<?php
include_once "db.php";

$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];
switch ($table) {
    case 'admin':
        unset($_POST['pw2']);
        break;
}
if (isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
// 因為資料表內沒有table的欄位，所以save前要先將他刪掉才不會讓資料表跑掉
if ($table != 'admin') {
    $_POST['sh'] = ($table == 'title') ? 0 : 1;
}
unset($_POST['table']);
$DB->save($_POST);
to("../back.php?do=$table");