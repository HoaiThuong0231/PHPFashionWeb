<?php 
    $id=$_GET['id'];
    $sql= "SELECT * FROM product WHERE id=$id";
    $result=$f->getOne($sql);
    $sql1="UPDATE product SET views=views+1 WHERE id=$id";
    $f->setQuery($sql1);
?>

<div class="col-md-6 ing-detail">
    <img src="asset/images/<?= $result['image'] ?>"/>
</div>
<div class="col-md-6">
    <h3 class="font-weight-semi-bold"><?= $result['name'] ?></h3>
    <div class="d-flex mb-3">
        <div class="text-primary mr-2">
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star-half-alt"></small>
            <small class="far fa-star"></small>
        </div>
            <small class="pt-1">(<?= $result['views'] ?> Reviews)</small>
    </div>
    <h3 class="font-weight-semi-bold mb-4"><?= $result['is_on_sale'] == 1 ? number_format($result['sale_price']) : number_format($result['price']) ?></h3>
    <p class="mb-4"><?= $result['description'] ?></p>
    <div class="d-flex align-items-center mb-4 pt-2">       
        <div class="input-group quantity mr-3" style="width: 130px;">
            <div class="input-group-btn">
                <button class="btn btn-primary btn-minus" style="height: 40px;" >
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="text" name="quantity" class="form-control text-center quantity" value="1"> 
            <div class="input-group-btn">
                <button class="btn btn-primary btn-plus" style="height: 40px;">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <a href="<?= PATH?>page=addToCart&id=<?= $result['id'] ?>">
        <button class="btn btn-primary" style="height: 40px; margin:20px; margin-top:74px"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
    </div>
</div>
<script>
    document.querySelector("button.btn-minus").addEventListener("click", function(){
        let quantity = Number(document.querySelector("input.quantity").value);
        document.querySelector("input.quantity").value = quantity > 1 ? (quantity - 1) : 1;
    });
    document.querySelector("button.btn-plus").addEventListener("click", function(){
        let quantity = Number(document.querySelector("input.quantity").value);
        document.querySelector("input.quantity").value = quantity + 1;
    });
</script>