
<!DOCTYPE html>
<html>
<head>
	<title>Junia Fashion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link href="asset/css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
		.list-group{
			width: 300px;
		}
		.form-group a{
			text-decoration: none;
		}
	</style>

</head>
<body>
	<div class="container-fluid border-warning">
		<div class="row bg-white">
			<div class="col-md-4">
				<div class="logo py-2"><a href="<?= PATH?>"><img src="asset/images/logo2.png" style="width: 300px; height:150px;"/></a></div>
			</div>
			<div class="col-md-4 pt-3">
				<form action="" method="get">
					<div class="input-group">
						<input type="hidden" name="page" value="search">
						<?php 
							$product="";
							if(isset($_GET['product']))
								$product=$_GET['product'];
						?>
						<input type="text" class="form-control" placeholder="Search products" name="product"
						value="<?=$product?>" id="txtProduct"/>
						<input type="submit" class="btn btn-success" onclick="<?= PATH?>page=search&product=<?= $key ?>"/>	
					</div>
					<div class="form-group" style="border:1px solid #ccc; margin-top:1px; border-radius: 5px;" id="history">
						<div class="row" id="lstHistory">

						</div>
					</div>
				</form>
			</div>
			
			<div class="col-md-4 text-end pt-3">
				<?php 
					if(!isset($_SESSION['user']))
					{
						echo "<a href='' class='btn border'>
						<i class='fa-solid fa-face-laugh text-success'></i>
						<span class='badge text-black'></span></a>";
					}
					else
					{
						echo "<a href='".PATH."page=account&id=".$_SESSION['userId']."' class='btn border'>
							<i class='fa-solid fa-face-laugh text-success'></i>
							<span class='badge text-black'>".
							$_SESSION['user']."
							</span>
							</a>";
					}
					
				?>


                <a href="" class="btn border">
                    <i class="fas fa-heart text-success"></i>
                    <span class="badge text-black">1</span>
                </a>
                <a href="<?=PATH?>page=cart" class="btn border">
                    <i class="fas fa-shopping-cart text-success"></i>
                    <span class="badge text-black"><?php echo isset($_SESSION['cart']) ? $_SESSION['number_of_item']: 0 ?></span>
                </a>
            </div>
		</div>
		<div class="row header">
			
			<div class="col-md-12">
				<ul>
					<li class="active"><a href="<?=PATH?>">Trang chủ</a></li>
					<li><a href="<?=PATH?>page=product">Shop</a>
						<ul>
							<?php
								$sql = "SELECT * FROM category";
								$result=$f->getAll($sql);
								foreach($result as $c):
							?>
								<li><a href="<?=PATH?> page=catProduct&id=<?= $c['id']?>"><?= $c['category_name'] ?></a></li>
							<?php 
								endforeach;
							?>									
						</ul>
					</li>
					<li><a href="<?=PATH?>page=blog">Blog</a></li>
					<li><a href="<?=PATH?>page=contact">Liên hệ</a></li>
					<?php if(!isset($_SESSION['userId'])):?>
						<li><a href="<?=PATH?>page=register">Đăng ký</a></li>
						<li><a href="<?=PATH?>page=login">Đăng nhập</a></li>
						<li><a href="<?=PATH?>page=account"">Tài khoản</a></li>
					<?php else: ?>
						<li><a href="<?=PATH?>page=logout">Đăng xuất</a></li>
						<li><a href="<?=PATH?>page=account"">Tài khoản</a></li>
					<?php endif; ?>						
				</ul>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-12 banner">
				<img src="asset/images/banner.jpg" />
			</div>
		</div>
<script>
	document.addEventListener('click', function(event) {
		// Kiểm tra xem sự kiện click đã xảy ra bên ngoài thẻ div có ID "a" hay không
		var divA = document.getElementById('history');
		if (divA && !divA.contains(event.target)) {
			// Ẩn thẻ div "a" nếu click bên ngoài
			divA.style.display = 'none';
		}
	});
	
var timeout;

$('#txtProduct').on('keyup',function(){
  //if you already have a timout, clear it
  if(timeout){ clearTimeout(timeout);}
	let keyword=$(this).val();
	if(keyword=="")
		return;
		$("#lstHistory").empty();
  //start new time, to perform ajax stuff in 500ms
  timeout = setTimeout(function() {
	$.ajax({
		url:"http://localhost/nguyenthihoaithuong/ajax/searchProduct.php",    //the page containing php script
		type: "post",    //request type,
		dataType: 'json',
		data: {keyword: keyword},
		success:function(result){
			for(var item of result){
				$("#lstHistory").append("<div class='col-md-12'><a href='<?= PATH?>page=search&product="+item["name"]+"'>"+item["name"]+"</a></div>")
			}
			$("#history").show();
		}
	});
  },500);
})
</script>