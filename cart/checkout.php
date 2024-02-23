<style>
    table tr, td{
        text-align: center;
    }
    .products div{
        float: left;
    }
    .form-group{
        width: 100%;
    }
    .cart{
        padding-top: 100px;
    }
</style>
<div class="row px-5 products">
    <?php
    $user=null;
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        if(!isset($_SESSION['user'])){
            echo "<p>Đăng nhập để xem giỏ hàng</p>";
            exit();
        }
        $id=$_SESSION['userId'];
        $sql= "SELECT * FROM user WHERE id=$id";
        $user=$f->getOne($sql);
        if(!isset($_SESSION['cart']) || $_SESSION['number_of_item']==0){
            echo "<p>Chưa có sản phẩm trong giỏ hàng</p>";
        }
        else{
        
    ?>
    <div class="container">
        <div class="col-md-7" style="padding-right:20px;">
            <h1 class="text-success" style="font-family: var(--bs-body-font-family); ">Thông tin đặt hàng</h1>
            <form action="cart/process_order.php" method="post">
                <div class="form-group">
                    <label for="fullName">Họ và Tên:</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nhập họ và tên" value="<?=$user["name"]?>"/>
                </div>
                <div class="form-group">
                    <label for="address">Địa Chỉ:</label>
                    <input type="text" class="form-control" id="address"  name="address" placeholder="Nhập địa chỉ" value="<?=$user["address"]?>">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="phoneNumber"  name="phoneNumber" placeholder="Nhập số điện thoại" value="<?=$user["phone"]?>"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email"  name="email" placeholder="Nhập email" value="<?=$user["email"]?>"/>
                </div>
                <div class="form-group">
                    <label for="payment">Phương thức thanh toán:</label>
                    <select name="payment" id="payment" class="form-control">
                        <option value="cash">Tiền mặt</option>
                        <option value="credit_card">Thẻ tín dụng</option>
                    </select>
                </div>
                <div class="p-2 text-end">
                    <p>
                        <a href="<?= PATH ?>page=cart"><button type="button" class="btn btn-primary" >Quay về giỏ hàng</button></a>
                        <button type="submit" name="submit" class="btn btn-success">Thanh toán</button>
                    </p>
                </div> 
            </form>
        </div>
        <div class="col-md-5 cart" style="padding-left:20px;">
            <form action="<?= PATH ?>page=cart" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
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
                    <td><?= $c['name'] ?></td>
                    <td><?= number_format($price) ?>đ</td>
                    <td>
                        <?= $q; ?>
                    </td>
                    <td><?= number_format($price*$q) ?>đ</td>
                </tr>
                
                <?php 
                    $s += $price*$q;
                    $i++;
                    endforeach;
                ?>
                <tr>
                    <th colspan="3" >Tổng cộng</th>
                    <th colspan="3"><?= number_format($s); ?> đ</th>
                </tr> 
                </table>   
            </form>
        </div>
    
    </div>
    <?php
        }
    ?>
</div>  