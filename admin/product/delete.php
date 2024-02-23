<?php
    $productId = $_GET['productId'];
    $sql="SELECT * FROM order_detail WHERE product_id = $productId";
    $cat = $f->getAll($sql);
    if(count($cat)> 0){
        echo "<script>";
        echo "if (confirm('Sản phẩm đang có người mua, không được xoá')) {";
        echo " window.location.href = 'http://localhost/NguyenThiHoaiThuong/admin/index.php?page=ProductList'";
        echo "} else {";
        echo " window.location.href = ''";
        echo "}";
        echo "</script>";
        exit();
    }

    $f->delRecord("product", $productId);
    header("Location:".PATH_ADMIN."page=productList");
    exit();


?>