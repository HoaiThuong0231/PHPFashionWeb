<?php
    require("../lib/coreFunction.php");
	$f=new CoreFunction();
    $userId = $_GET['userId'];
    $sql="SELECT * FROM user WHERE id=".$userId;
    $result=$f->getOne($sql);
    echo json_encode($result);
?>