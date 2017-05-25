<?php
	$con = new mysqli('localhost','root','','web_service');
	
	if(!empty($_COOKIE)){
		$cart = $_COOKIE['cart'];
		
		foreach($cart as $product){
			echo $product."<br/>";
		}	
	}else{
		echo "Cart is Empty";
	}
?>
