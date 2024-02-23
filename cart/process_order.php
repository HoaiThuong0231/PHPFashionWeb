<?php
ob_start();
session_start();
require("../lib/coreFunction.php");
$f=new CoreFunction();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['fullName'];
    $add = $_POST['address'];
    $phone = $_POST['phoneNumber'];
    // Tạo đơn hàng trước
    $orders = [
        'user_Id'=>$_SESSION['userId'],
        'receiverName' => $name,
        'receiverEmail'=> $email,
        'receiverPhone'=> $phone,
        'receiverAddress'=> $add,
        'order_date'=> date("Y-m-d"),
    ];
    $order_id=$f->addRecordReturnId("orders", $orders);
    //Tạo chi tiết đơn hàng
    $cart=$_SESSION['cart'];
    $a=$_SESSION['amount'];
    $n=count($cart);
    $txt= "(";
    for($i= 0;$i<$n;$i++){
        $txt.= $cart[$i];
        if($i<$n-1){
            $txt.= ",";
        }
    }
    $txt.= ")"; 
    $sql = "SELECT * FROM product WHERE id IN ". $txt;
    
    $result=$f->getAll($sql);
    $i=0;
    $s=0;
    foreach($result as $c){
        if ($c['is_on_sale'] == 1 && $c['sale_price'] !== null) {
            $price = $c['sale_price'];
        } else {
            $price = $c['price'];
        }
        $s=$price*$a[$i];
        $order_detail = [
            'order_id'=>$order_id,
            'product_id' => $c['id'],
            'quantity'=> $a[$i],
            'price'=> $price,
            'total_price'=> $s,
        ];
        $f->addRecord("order_detail", $order_detail);
        $i++;
    }
echo "<center><h1>Đặt hàng thành công<h1></center><br>";
echo "<center><h1>Cảm ơn quý khách đã ủng hộ<h1></center><br>";
}

// header("Location: index.php");
?>
