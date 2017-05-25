<?php
	$con = new mysqli('localhost','root','','web_service');
	
	$query = $con->query("SELECT * FROM products LIMIT 1,10");
	
	if(isset($_POST['add'])){
		extract($_POST);
		$cart = $id.'.'.$title.'.'.$price;
		setcookie("cart[$id]", $cart, time() + (86400 * 30), "/"); // 86400 = 1 day
	}
		
?>

<table>
	<tr>
		<td>No</td>
		<td>Product Name</td>
		<td>Price</td>
		<td>Add</td>
	</tr>
<?php while($row = $query->fetch_object()) : ?>	
	<form method="POST">
		<tr>
			<td><?php echo $row->id;?><input type="hidden" name="id" value="<?php echo $row->id;?>" /></td>
			<td><?php echo $row->title;?><input type="hidden" name="title" value="<?php echo $row->title;?>" /></td>
			<td><?php echo $row->price;?><input type="hidden" name="price" value="<?php echo $row->price;?>" /></td>
			<td><input type="submit" value="Add" name="add" /></td>
		</tr>
	</form>
<?php endwhile; ?>	
	<tr>
		<td>No</td>
		<td>Product Name</td>
		<td>Price</td>
		<td>Add</td>
	</tr>
</table>
