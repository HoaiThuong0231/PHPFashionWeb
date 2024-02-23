<?php
    //$sql="SELECT * FROM product ORDER BY `created_at` DESC LIMIT 0,4";//fail
    $sql="SELECT * FROM `product` ORDER BY `created_at` DESC LIMIT 0,4;";
    $new = $f->getAll($sql);
    $sql1="SELECT * FROM `product` WHERE `is_on_sale`= 1  LIMIT 0,4";
    $sale = $f->getAll($sql1);
    $sql_view="SELECT *FROM product ORDER BY views DESC LIMIT 0,4";
    $result=$f->setQuery($sql_view);
?>
<div class="title-product">News Products</div>
    <div class="row px-5">
        <?php
            foreach($new as $value):
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

<div class="title-product">Sale Products</div>
    <div class="row px-5">
        <?php
            foreach($sale as $value):
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


<div class="title-product">Most Viewed Products</div>
    <div class="row px-5 products">  
        <?php
            foreach($result as $value):
        ?>
        <div class="col-md-3">
            <img src="asset/images/<?= $value['image'] ?>" class="card-img-top" alt="sản phẩm">
            <h5 class="card-title" ><?=$value['name']?></h5>
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