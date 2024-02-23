<?php
	ob_start();
	session_start();
	require("lib/coreFunction.php");
	$f=new CoreFunction();
	define("PATH","http://localhost/nguyenthihoaithuong/index.php?");
	require("partial/header.php");
?>	
		<div class="row content">
			<?php
				$page = isset($_GET['page']) ? $_GET['page'] : '';
				$route = [
				'product' => 'product/product.php',
				'search' => 'product/search.php',
				'cart' => 'cart/cart.php',
				'contact'=>'user/contact.php',
				'register'=>'user/registration.php',
				'detail' =>'product/detail.php',
				'catProduct'=>'product/catProduct.php',
				'login'=>'user/login.php',
				'doLogin'=>'user/doLogin.php',
				'logout'=>'user/logout.php',
				'account'=>'user/account.php',
				'addToCart' => 'cart/addToCart.php',
				'delItemCart'=>'cart/delItemCart.php',
				'delCart'=>'cart/delCart.php',
				'checkout'=>'cart/checkout.php',
				'orders'=>'user/orders.php',	
				'blog'=>'user/blog.php',			
				'' => 'home.php',
				
				];
				foreach ($route as $r => $val) {
					if($r == $page){	
						require($val);
					}
				}

			?>
		</div>	
<?php
	//require("partial/footer.php");
	ob_end_flush();
?>		