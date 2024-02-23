<?php 
    $productId= $_GET['id']; 
    $sql_cat="SELECT category_name FROM category WHERE id =$productId";
    $resultCat=$f->getOne($sql_cat);
    $sql = "SELECT * FROM product WHERE cat_id =$productId";
    $result=$f->getAll($sql);
?>

<div class="row px-5 products">
    <h1 class="title-product"><?= $resultCat['category_name']?></h1>
    <?php
        foreach($result as $value):
    ?>
    <div class="col-md-3">
        <img src="asset/images/<?= $value['image'] ?>" class="card-img-top" alt="sản phẩm" >
        <h5 class="card-title" ><?= $value['name'] ?></h5>
        <div class="d-flex justify-content-between mb-3">
            <?php if($value['is_on_sale'] == 1): ?>
                <div class="p-2">
                    <p>
                        <span class="fw-bold text-danger " ><?= number_format($value['sale_price']) ?>đ</span> <br>
                        <a href="<?= PATH?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ</button>
                    </p>    
                </div>
                <div class="p-2 text-end">
                    <p>
                        <span class="text-muted text-decoration-line-through "><?= number_format($value['price']) ?>đ</span> <br>
                        <a href="<?= PATH?>page=detail&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success" >Chi tiết</button></a>
                    </p>
                </div>
            <?php else: ?>
                <div class="p-2">
                    <p>
                        <span class="fw-bold text-danger " ><?= number_format($value['price']) ?>đ</span> <br>
                        <a href="<?= PATH?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ</button>
                    </p>    
                </div>
                <div class="p-2 text-end">
                    <p>
                        </br><a href="<?= PATH?>page=detail&id=<?= $value['id'] ?>">
                        <button type="button" class="btn btn-success" >Chi tiết</button></a>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
        <?php endforeach; ?>
</div>