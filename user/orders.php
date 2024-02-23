
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
    <div class="container">
        <div class="col-md-12 cart" style="padding-left:20px;">
            <form action="<?= PATH ?>page=cart" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại người nhận</th>
                            <th>Địa chỉ người nhận</th>
                            <th>Email người nhận</th>
                            <th>Ngày đặt hàng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <?php
                    $userId=$_SESSION['userId'];
                    $sql="SELECT * FROM orders WHERE user_Id=".$userId;
                    $result=$f->getAll($sql);
                    foreach($result as $val):
                        
                ?>
                <tbody>
                    <tr>
                        <td><?= $val['Id']?></td>
                        <td><?= $val['receiverName'] ?></td>
                        <td><?= $val['receiverPhone'] ?></td>
                        <td><?= $val['receiverAddress'] ?></td>
                        <td><?= $val['receiverEmail'] ?></td>
                        <td><?= $val['order_date'] ?></td>
                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong" onclick="fOrderDetail(<?= $val['Id']?>)">Chi tiết</button></td>
                    </tr>
                </tbody>
                <?php 
                   endforeach;
                ?>
                </table>   
            </form>
        </div>
    
    </div>
</div>  
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody id="dataOrderDetail">

        </tbody>
      </table>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    function fOrderDetail(orderId){
        $("#dataOrderDetail").empty();
        $.ajax({
            url:"http://localhost/nguyenthihoaithuong/ajax/orderDetail.php",    //the page containing php script
            type: "get",    //request type,
            dataType: 'json',
            data: {orderId: orderId},
            success:function(result){
                for(var item of result){
                    $("#dataOrderDetail").append(`<tr>
                                                    <td>${item["product_id"]}</td>
                                                    <td>${item["product_name"]}</td>
                                                    <td>${item["price"]}</td>
                                                    <td>${item["quantity"]}</td>
                                                    <td>${item["total_price"]}</td>
                                                </tr>`);
                }
                // $("#dataOrderDetail").append(`<tr>
                //                                     <td>${item["product_id"]}</td>
                //                                     <td>${item["product_name"]}</td>
                //                                     <td>${item["price"]}</td>
                //                                     <td>${item["quantity"]}</td>
                //                                     <td>${item["total_price"]}</td>
                //                                   </tr>`);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>