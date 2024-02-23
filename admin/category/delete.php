<?php
    $productId = $_GET['catId'];
    $sql="SELECT * FROM product WHERE cat_id = $productId";
    $cat = $f->getAll($sql);
    if(count($cat)> 0){
        echo "<script>";
        echo "if (confirm('Danh mục đã có sản phẩm, không được xoá')) {";
        echo " window.location.href = 'http://localhost/NguyenThiHoaiThuong/admin/index.php?page=catList'";
        echo "} else {";
        echo " window.location.href = ''";
        echo "}";
        echo "</script>";
        exit();
    }

    $f->delRecord("category", $productId);
    header("Location:".PATH_ADMIN."page=catList");
    exit();


?>