
<div class="row px-5 products">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        if(!isset($_SESSION['user'])){
            echo "<p>Đăng nhập để xem giỏ hàng</p>";
            exit();
        }
        if(!isset($_SESSION['cart']) || $_SESSION['number_of_item']==0){
            echo "<p>Chưa có sản phẩm trong giỏ hàng</p>";
        }
        else{
        
    ?>
    <h1 class="title-product">Your Cart</h1>
    <div class="col-md-12 cart"  >
        <form action="<?= PATH ?>page=cart" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                    <th>Id</th>
                </tr>
            <?php
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
                foreach($result as $c):
                    if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $q=$_POST['amount'.$i];
                        $_SESSION['amount'][$i]=$q;
                    }
                    else{
                        $q=$a[$i];
                    }
                    if ($c['is_on_sale'] == 1 && $c['sale_price'] !== null) {
                        $price = $c['sale_price'];
                    } else {
                        $price = $c['price'];
                    }
            ?>
            <tr>
                <td class="imgPro" >
                    <center>
                        <img src="asset/images/<?= $c['image'] ?>" width="60px" height="80px" alt="Sản phẩm">
                    </center>
                </td>
                <td><?= $c['name'] ?></td>
                <td><?= number_format($price) ?>đ</td>
                <td>
                    <input class="text-center" type="number" name="amount<?= $i ?>" value="<?= $q; ?>" min="1" max="5" />
                </td>
                <td><?= number_format($price*$q)?>đ</td>
                <td>
                    <center>
                    <a href="<?= PATH ?>page=delItemCart&id=<?= $c['id']?>">
                        <button type="button" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can" ></i>
                        </button>
                    </a>
                    </center>
                </td>
                <td><?= $c['id'] ?></td>
            </tr>
             
            <?php 
                $s += $price*$q;
                $i++;
                endforeach;
            ?>
            <tr>
                <th colspan="5" >Tổng cộng</th>
                <th colspan="3"><?= number_format($s); ?>đ</th>
            </tr> 
            </table>
            <div class="p-2 text-end">
                <p>
                    <button type="submit" class="btn btn-success" >Cập nhật</button>
                    <a href="<?= PATH ?>page=delCart"><button type="button" class="btn btn-success" >Huỷ giỏ hàng</button></a>
                    <a href="<?= PATH ?>page=checkout"><button type="button" class="btn btn-success">Thanh toán</button></a>
                </p>
            </div>    
        </form>
    </div>
        
    <?php
        }
    ?>
</div>  