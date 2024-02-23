<?php
    $sql = "SELECT id,username,name,email,phone,role FROM user"; 
    $result = $f->getAll($sql); 
?>
<table class="table table-bordered" >
    <tr>
        <th>Id</th>
        <th><center>Tên người dùng</center></th>
        <th><center>Họ tên</center></th>
        <th><center>Email</center></th>
        <th><center>Số điện thoại</center></th>
        <th><center>Vai trò</center></th>
        <th><center>Xem</center></th>
    </tr>
    <?php
        $i=1;
        foreach ($result as $value):
    ?>
    <tr>
        <td><center><?= $value['id'] ?></center></td>
        <td><?= $value['username'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['email'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><?= $value['role'] ?></td>
        <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong" onclick="fUserDetail(<?= $value['id']?>)">Chi tiết</button></td>
    </tr>


    <?php 
        $i++;
        endforeach; 
    ?>
</table>
 
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết người dùng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Tên người dùng</label>
                        <input type="email" class="form-control" disabled id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" disabled id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="fullName">Họ tên</label>
                        <input type="text" class="form-control" disabled id="fullName" aria-describedby="fullName" >
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <input type="text" class="form-control" disabled id="gender">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" disabled id="email">
                    </div>
                </div>
                <div class="col-md-6">                   
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" disabled id="phone">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh đại diện</label>
                        <img id="avatar" style="height:100px" src="" class="img-fluid" alt="Ảnh đại diện">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" disabled id="address">
                    </div>
                    <div class="form-group">
                        <label for="role">Vai trò</label>
                        <input type="text" disabled class="form-control" id="role">
                    </div>
                    <div class="form-group">
                        <label for="created_at">Ngày tạo</label>
                        <input type="text" disabled class="form-control" id="created_at">
                    </div>
                </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    function fUserDetail(userId){
        $.ajax({
            url:"http://localhost/nguyenthihoaithuong/ajax/userDetail.php",    //the page containing php script
            type: "get",    //request type,
            dataType: 'json',
            data: {userId: userId},
            success:function(result){
                $("#username").val(result["username"]);
                $("#password").val(result["password"]);
                $("#fullName").val(result["name"]);
                $("#gender").val(result["gender"]==0?"Nữ":"Nam");
                $("#email").val(result["email"]);
                $("#phone").val(result["phone"]);
                $("#avatar").attr("src","../asset/images/"+result["avatar"]);
                $("#address").val(result["address"]);
                $("#role").val(result["role"]);
                $("#created_at").val(result["created_at"]);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>