<?php
    $key = $_GET["product"];
    $sql = "SELECT * FROM product WHERE name LIKE '%$key%'";
    $result=$f->getAll($sql);
?>
<div class="title-product"><?= ucfirst($key) ?></div>
            <div class="row px-5">
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
                                        <span class="fw-bold text-danger " ><?= $value['sale_price'] ?>đ</span> <br>
                                        <a href="<?= PATH?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ</button>
                                    </p>    
                                </div>
                                <div class="p-2 text-end">
                                    <p>
                                        <span class="text-muted text-decoration-line-through "><?= $value['price'] ?>đ</span> <br>
                                        <a href="<?= PATH?>page=detail&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success" >Chi tiết</button></a>
                                    </p>
                                </div>
                            <?php else: ?>
                                <div class="p-2">
                                    <p>
                                        <span class="fw-bold text-danger " ><?= $value['price'] ?>đ</span> <br>
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