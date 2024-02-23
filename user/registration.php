<?php
    if (isset( $_SESSION['userId'])){
      exit(header('Location: index.php'));
    }
    $nameErr = $emailErr = $genderErr = $addErr =$phoneErr=$userErr=$passErr=$birthErr= "";
    $name = $email = $gender = $add = $phone =$user=$pass=$birth= "";
    $flag=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      //name
      if (empty($_POST["fullname"])) {
        $nameErr = "Name is required";
        $flag=0;
      } else {
        $name = test_input($_POST["fullname"]);
        $flag+=1;
      }

      //gender
      if (is_null($_POST["gender"])) {
        $genderErr = "Gender is required";
        $flag=0;
      } else {
        $gender = test_input($_POST["gender"]);
        $flag+=1;
      }

      //email
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag=0;
      } else {
        $email = test_input($_POST["email"]);
        $flag+=1;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $flag=0;
        }
      }
      //birthday
      if (empty($_POST["dateofbirth"])) {
        $birthErr = "Birthday is required";
        $flag=0;
      } else {
        $dd = $mm = $yyyy = 0;
        $birth = test_input($_POST["dateofbirth"]);
        list($yyyy, $mm, $dd) = explode('-', $birth);
        if (!checkdate($mm,$dd,$yyyy)){
          $birthErr = "Birthday is required";
          $flag=0;
        } else if ($yyyy < 1945 || $yyyy > 2005) { //tuổi từ 18-78 được xem là hợp lệ
          $birthErr = "Year of Birthday is between 1945 - 2023";
          $flag=0;
        } else{
          $flag+=1;
        }
        
      }
      //phone
      if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $flag=0;
      } else {
        $phone = test_input($_POST["phone"]);
        $flag+=1;
        $phone_pattern="/^\d+$/";
        if(!preg_match($phone_pattern,$phone)){
          $phoneErr = "Only number are allowed";
          $flag=0;
        }
      }
      //address
      if (empty($_POST["address"])) {
        $addErr = "Address is required";
        $flag=0;
      } else {
        $add = test_input($_POST["address"]);
        $flag+=1;
      }
      //username
      if (empty($_POST["username"])) {
        $userErr = "Username is required";
        $flag=0;
      } else {
        $user = test_input($_POST["username"]);
        $sql_name = 'SELECT username FROM user WHERE username = "'.$user.'"';
        $result_user = $f->getAll($sql_name);
        if(count($result_user) == 1){
          $userErr = "Username is already exists";
          $flag=0;
        } else {
          $flag+=1;
        }
      }
      //password
      if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $flag=0;
      } else {
        $pass = test_input($_POST["password"]);
        $flag+=1;
      }

      if($flag==8){
        $i="temp.png";
        if($_FILES['image']['size']==0){
          echo $_FILES['image']['error'];
        }
        else{
          require("lib/file.php");
          $file=$_FILES['image'];
          $i=$file['name'];
          $u=new Upload();
          $u->doUpload($file);
        }
        $user = array(
          'username' => $_POST['username'],
          'password' =>sha1( $_POST['password']),
          'name' => $_POST['fullname'],
          'email' => $_POST['email'],
          'phone' => $_POST['phone'],
          'address' => $_POST['address' ],
          'gender' => $_POST['gender'],
          'avatar' =>$i
        );
        $f->addRecord("user", $user);
        $nameErr = $emailErr = $genderErr = $addErr =$phoneErr=$userErr=$passErr=$birthErr= "";
        $name = $email = $gender = $add = $phone =$user=$pass=$birth= "";
        //header("Location: index.php");
      }  
  }
?>
<h1 class="text-success"><center> ĐĂNG KÝ THÀNH VIÊN </center></h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=register" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="hoten">Họ tên</label>
    <input type="text" name="fullname" placeholder="Nhập họ tên" class="form-control" value="<?= $name?>"/>
    <span class="error"><?= $nameErr ?></span>
  </div>
  <div class="form-group">
    <?php 
      if(isset($gender) && $gender==1)
      {
        echo "<label for='gender'>Giới tính</label><br>
        <label class='form-check-label' for='male'>
            Nam <input type='radio' class='form-check-input' id='rdmale' name='gender' value='1' checked>
        </label>
        <label class='form-check-label' for='female'>
            Nữ <input type='radio' class='form-check-input' id='rdfemale' name='gender' value='0'>
        </label>";
      }
      else 
      {
        echo "<label for='gender'>Giới tính</label><br>
        <label class='form-check-label' for='male'>
            Nam <input type='radio' class='form-check-input' id='rdmale' name='gender' value='1' >
        </label>
        <label class='form-check-label' for='female'>
            Nữ <input type='radio' class='form-check-input' id='rdfemale' name='gender' value='0' checked>
        </label>";
      } 
    ?>
    <span class="error"><?= $genderErr ?></span>
  </div>
  <div class="form-group">
    <label for="dateofbirth">Ngày sinh</label>
    <input type="date" name="dateofbirth" value="<?= $birth ?>"  id="dateofbirth" class="form-control">
    <span class="error"><?= $birthErr ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $email ?>" placeholder="Nhập địa chỉ email" class="form-control">
    <span class="error"><?= $emailErr ?></span>
  </div>
  <div class="form-group">
    <label for="sdt">Số điện thoại</label>
    <input type="number" name="phone" placeholder="Nhập số điện thoại" value="<?= $phone ?>" class="form-control">
    <span class="error"><?= $phoneErr ?></span>
  </div>
  <div class="form-group">
    <label for="diachi">Địa chỉ</label>
    <input type="text" name="address" value="<?= $add ?>" placeholder="Nhập địa chỉ" class="form-control">
    <span class="error"><?= $addErr ?></span>
  </div>
  <div class="form-group">
    <label class="form-label" for="customFile">Ảnh đại diện</label>
    <input type="file" name="image" class="form-control" id="customFile" />
  </div>
  <div class="form-group">
    <label for="username">Tên đăng nhập</label>
    <input type="text" name="username" value="<?php is_array($user) ? $user['user'] : $user ?>" placeholder="Nhập tên đăng nhập" class="form-control">
    <span class="error"><?= $userErr ?></span>
  </div>
  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" name="password" value="<?= $pass ?>" placeholder="Nhập mật khẩu" class="form-control"/>
    <span class="error"><?= $passErr ?></span><br>
  </div>
  <button type="submit"  class="btn btn-success">Đăng ký</button><br><br>
</form>

<?php if($flag == 8):
  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
 
    $name=$_POST['fullname'];
    $date=$_POST['dateofbirth'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phone'];
    $address=$_POST['address'];
    $user=$_POST['username'];
    $pass=$_POST['password'];
    
  }
  ?>
    <table class="table table-bordered">
        <tr>
            <th>Họ tên</th>
            <td><?= $name ?></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td><?= $gender ?></td>
        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><?= $date ?></td>
        </tr>
        <tr>
            <th>Địa chỉ Email</th>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?= $address ?></td>
        </tr>
        <tr>
            <th>Tên đăng nhập</th>
            <td><?= $user ?></td>
        </tr>
        <tr>
            <th>Mật khẩu</th>
            <td><?= $pass ?></td>
        </tr>
    </table>
<?php endif; ?>