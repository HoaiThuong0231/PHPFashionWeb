<?php
    $offset=0;
   if(isset($_GET["p"]) && $_GET["p"]>0){
    $offset=($_GET["p"]-1)*10;
   }
    $sql = "SELECT name,image,price,sale_price,id FROM product group by name,image,price,sale_price,id ORDER By ID ASC LIMIT ".$offset.", 10"; 
    $result = $f->getAll($sql); 
    
    
?>
<div style="margin-bottom:20px;" >
    <div><a href="<?= PATH_ADMIN ?>page=productAdd"><button type="button" class="btn btn-primary" >Thêm</button></a></div>
</div>

<table class="table table-bordered" >
    <tr>
        <th></th>
        <th><center>Tên sản phẩm</center></th>
        <th><center>Ảnh</center></th>
        <th><center>Giá</center></th>
        <th><center>Giá khuyến mãi</center></th>
        <th><center>Sửa</center></th>
        <th><center>Xoá</center></th>
    </tr>
    <?php
        $i=1;
        foreach ($result as $value):
    ?>
    <tr>
        <td><center><?= $value['id'] ?></center></td>
        <td><?= $value['name'] ?></td>
        <td><img src="../asset/images/<?= $value['image'] ?>" style="height:50px"/></td>
        <td><?= number_format($value['price']) ?></td>
        <td><?= number_format($value['sale_price']) ?></td>
        <td><center><a href="<?= PATH_ADMIN ?>page=productEdit&productId=<?=$value['id']?>"><img src="asset/images/edit.png" alt="sửa"></a></center></td>
        <td><center><a href="<?= PATH_ADMIN ?>page=productDelete&productId=<?=$value['id']?>"><img src="asset/images/del.png" alt="xoá"></a></center></td>
    </tr>


    <?php 
        $i++;
        endforeach; 
    ?>
</table>
<div style="margin-top:20px;" class="row">
<?php
    $sql = "SELECT Count(1) as total FROM product"; 
    $result = $f->getOne($sql);
    $quantityOfPage = $result["total"]/10 + 1;
?>
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <?php
            for ($i=1; $i <= $quantityOfPage; $i++):
        ?>
                <a href="<?= PATH_ADMIN ?>page=productList&p=<?=$i?>" class="btn btn-primary"><?=$i?></a>
        <?php
            endfor;
        ?>
    </div>
    <div class="col-md-4"></div>
</div>