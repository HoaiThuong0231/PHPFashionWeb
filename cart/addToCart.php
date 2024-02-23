<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['amount'] = array();
    $_SESSION['number_of_item'] = 0;
}

$id = $_GET['id'];
$k = array_search($id, $_SESSION['cart']);
$sql = 'SELECT * FROM product WHERE id = ' . $id;
$result = $f->getOne($sql);



if ($k === false) {
    array_push($_SESSION['cart'], $id);
    array_push($_SESSION['amount'], 1);
    $_SESSION['number_of_item']++;
} else {
    $_SESSION['amount'][$k]++;
}

header("Location: index.php");
?>
