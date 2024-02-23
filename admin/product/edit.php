
<?php
    $sql="SELECT * FROM product WHERE id=".$_GET['productId'];
    $listProduct=$f->getOne($sql);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $imageRequest=$_POST['image'];
        if($_POST['image']=="")
            $imageRequest= $listProduct["image"];
        $product = [
            'name' => $_POST['productName'],
            'cat_id'=> $_POST['catId'],
            'image'=> $imageRequest,
            'price'=> $_POST['price'],
            'description'=> $_POST['description'],
            'is_on_sale'=> $_POST['isOnSale']=='on'?1:0,
            'sale_price'=> $_POST['salePrice'],
            'created_at'=> $listProduct['created_at'],
            'views'=> $listProduct['views'],
        ];
        $messenge=$f->checkExist("product","name",$product['name']);
        if($messenge != 1){
            $f->message($messenge);
        }
        else{
                require('../lib/file.php');
                $image = $_FILES['image'];
                if($image['size'] != 0)
                {
                    $a['image'] = $image['name'];
                    $u = new Upload;
                    $u->doUpload($image);
                }
            }
        $f->editRecord("product",$listProduct["id"], $product);
        header("Location: ".PATH_ADMIN. "page=productList"); 
        exit();
    }
?>
<div style="width:400px">
    <form method="post" action="">
        <div class="form-group">
            <label for ="name">Tên sản phẩm</label>
            <input type="text" class="form-control" value="<?=$listProduct['name']?>" name="productName" />
        </div>
        
        <div class="form-group">
            <label for ="catId">Danh mục sản phẩm</label>
            <select type="text" class="form-control" name="catId">
                <?php
                    $sqlCategory = "SELECT category_name,id FROM category"; 
                    $category = $f->getAll($sqlCategory); 
                    foreach ($category as $cat){
                        if($cat["id"] == $listProduct["cat_id"])
                            echo "<option selected value='".$cat['id']."'>".$cat['category_name']."</option>";
                        else
                            echo "<option value='".$cat['id']."'>".$cat['category_name']."</option>";
                    }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for ="price">Giá</label>
            <input type="text" class="form-control" value="<?=$listProduct['price']?>" name="price" />
        </div>
        <div class="form-group">
            <input type="checkbox" checked id="isOnSale" name="isOnSale" onchange="fIsOnSale(this)"/>
            <label for ="isOnSale">Is On Sale</label>
        </div>
        <div class="form-group">
            <label for ="salePrice">Giá giảm</label>
            <input type="text" value="<?=$listProduct['sale_price']?>" class="form-control" name="salePrice" id="salePrice"/>
        </div>
        <div class="form-group">
            <label for ="image">Ảnh</label>
            <input type="file" class="form-control" name="image" />
        </div>
        <div class="form-group">
            <label for ="description">Mô tả</label>
            <textarea class="form-control" name="description"><?=$listProduct['name']?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit"/>
    </form>
</div>
<script>
    function fIsOnSale(el){
        if($(el).is(":checked"))
            $("#salePrice").prop("disabled",false);
        else
            $("#salePrice").prop("disabled",true);
    }
</script>