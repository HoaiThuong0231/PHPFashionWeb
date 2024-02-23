
<?php
    if(!isset($_SESSION['userId']) || empty($_SESSION['userId'])){
        exit(header("Location: index.php?page=login"));
    }
    require('lib/file.php');

    $userId = $_SESSION['userId'];

    $passOldErr =  $passNewErr = '';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $image = $_FILES['avatar'];
        $pass_old = $_POST['password-old'];
        $pass_new = $_POST['password-new'];
        $flag = false;
        $a=array(
            'name'=> $_POST['name'],
            'email'=> $_POST['email'],
            'phone'=> $_POST['phone'],
            'address'=> $_POST['address'],
            'gender'=> $_POST['gender'],
            'username'=> $_POST['username'],
        );
        if($image['size'] != 0)
        {
            $a['avatar'] = $image['name'];
            $u = new Upload;
            $u->doUpload($image);
        }
        if(!empty($pass_old) && !empty($pass_new)){
            if($result['password'] = sha1($pass_old)){
                $a['password'] = sha1($pass_new);
                $flag = true;
            } else{
                $flag = false;
                $passOldErr = "Password is Incorrect";
            }
        } 
        if(empty($pass_old)) {
            $flag = false;
            $passOldErr = "Password is Empty";
        }
        if(empty($pass_new)){
            $flag = false;
            $passNewErr = "Password is Empty";
        }
        if($flag == 2){  
            $f->editRecord("user", $userId, $a);
        }
    }
    $sql="SELECT * FROM user WHERE id = $userId";
    $result = $f->getOne($sql);
?>

<div class="row px-5">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item active"><a class= "btn" href="<?=PATH?>page=account">Cập nhật tài khoản </a></li>
            <li class="list-group-item"><a class= "btn text-dark" href="<?=PATH?>page=orders" >Quản lý đơn hàng</a></li>
            <li class="list-group-item"> <a class="btn text-dark" href="<?=PATH?>page=blog">Blog</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <h1 style="font-size:50px;" class="text-success"><center>Cập nhật tài khoản</center></h1> 
        <form style="font-size: 25px !important" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=account&id=<?= $userId ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Họ tên<span class="text-danger">(*)</span></label>
                <input type="text" class="form-control" placeholder="Họ tên" name="name" value="<?= $result['name']?>" />
            </div>
            <div class="mb-3 mt-3">
                <label for="gender" class="form-label">Giới tính</label></br>
                Nam: <input type="radio" class="form-check-input" name="gender" value= 1 <?php if($result['gender']==1) echo "checked"; ?> > 
                Nữ: <input type="radio" class="form-check-input" name="gender" value= 0  <?php if($result['gender']==0) echo "checked"; ?> > 
            </div>
            <div class="mb-3 mt-3">
                <label for="phone" class="form-label"> Điện thoại</label> 
                <input type="text" class="form-control" placeholder="Điện thoại" name="phone" value="<?= $result['phone']?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value= "<?= $result['email']?>"/>
            </div>
            <div class="mb-3 mt-3"> 
                <label for="address" class="form-label">Địa chỉ</label> 
                <input type="text" class="form-control" placeholder="Dia chi" name="address" value="<?= $result['address']?>"/>
            </div>
            <div class="mb-3 mt-3">
                <label for="fileInput" class="form-label">Avatar</label> 
                <input type="file" class="form-control" id="fileInput" name="avatar"/>
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Tên đăng nhập<span class="text-danger">(*)</span></label>
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" value= "<?= $result['username']?>" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Old<span class="text-danger">(*)</span></label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password-old" />
                <span class="error"><?= $passOldErr ?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password New</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password-new" />
                <span class="error"><?= $passNewErr ?></span>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
        </form>
      
    </div>
</div>