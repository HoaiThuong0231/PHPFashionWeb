<?php
  if (isset($_SESSION['userId'])){
    exit(header('Location: index.php'));
  }
?>
<h1 class="text-success"><center> LOGIN </center></h1>
<form action="<?=PATH?>page=doLogin" method="POST" id ="formLogin">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Nhập địa chỉ email" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" autocomplete="new-password" class="form-control">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember" value="">
    <label class="form-check-label" for="remember" >Remember me</label>
  </div>
  <p><a href="">Quên mật khẩu?</a></p>
  <button type="submit"  class="btn btn-primary">Submit</button><br><br>
</form>