<?php
    require("../lib/coreFunction.php");
	$f=new CoreFunction();
    $orderId = $_GET['orderId'];
    $sql="SELECT p.id as product_id,p.name as product_name,FORMAT(od.price, 0) as price,od.quantity,FORMAT(od.total_price, 0) as total_price FROM order_detail od INNER JOIN product p ON od.product_id = p.id WHERE od.order_id=".$orderId;
    $result=$f->getAll($sql);
    echo json_encode($result);
?>