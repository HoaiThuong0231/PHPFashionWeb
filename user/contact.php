  <h1 class="text-success"><center> THÔNG TIN LIÊN HỆ </center></h1>
<form action="<?=PATH?>page=contact" method="POST">
  <div class="form-group">
    <label for="makh">Mã khách hàng</label>
    <input type="text" name="id" placeholder="Ma kh" class="form-control">
  </div>
  <div class="form-group">
    <label for="hoten">Họ tên</label>
    <input type="text" name="fullname" placeholder="Hoten" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Địa chỉ email</label>
    <input type="email" name="email" placeholder="Email" class="form-control">
  </div>
  <div class="form-group">
    <label for="lienhe">Nội dung liên hệ</label>
    <textarea name="contact" cols="150" rows="8" class="form-control"></textarea><br>
  </div>
  <button type="submit"  class="btn btn-success">Lấy thông tin</button><br><br>
</form>

<?php if($_SERVER['REQUEST_METHOD'] === 'POST'):
  $userid=$_POST['id'];
  $name=$_POST['fullname'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  ?>
  <table class="table table-bordered">
      <tr>
          <th>Mã khách hàng</th>
          <td><?= $userid ?></td>
      </tr>
      <tr>
          <th>Họ tên</th>
          <td><?= $name ?></td>
      </tr>
      <tr>
          <th>Địa chỉ Email</th>
          <td><?= $email ?></td>
      </tr>
      <tr>
          <th>Nội dung liên hệ</th>
          <td><?= $contact ?></td>
      </tr>
  </table>
<?php endif; ?>