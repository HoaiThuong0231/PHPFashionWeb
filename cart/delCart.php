<?php 
    unset($_SESSION['cart']); 
    unset($_SESSION['amount']); 
    unset($_SESSION[ 'number_of_amount']); 
    header("Location: index.php?page=cart");
?>