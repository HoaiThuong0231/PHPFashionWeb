<?php
    require("../lib/coreFunction.php");
	$f=new CoreFunction();
    $keyword = $_POST['keyword'];
    $sql="SELECT name FROM product WHERE name LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'";
    $result=$f->getAll($sql);
    echo json_encode($result);
?>