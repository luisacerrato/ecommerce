<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-commerce</title>
</head>
<style>
	body {
		font-family: verdana;
	}
	.header {
		width:970px;
		margin: 0 auto;
	}

	h2 {
		display: inline-block;
		margin-right: 400px;
	}

	a {
		font-weight: bold;
		color: black;
		font-size: 18px;
		display: inline-block;
	}
	
	.table {
		width: 900px;
		margin: 0 auto;
		margin-top: 30px;
		font-size: 18px;	
	}

	th, tr, td {
		padding-right: 50px;
		padding-bottom: 20px;
	}

	.green {
		background-color: green;
		color: white;
	}

</style>
<body>

	<div class='header'>
		<h2>Products</h2>
		<a href='/products/cart'>Your cart (
<?php
$cart = $this->session->userdata('cart');
if ($cart)
{
	echo array_sum($cart);
}
else
{
	echo 0;
}
?> )
		</a>
	</div>
	<div class='table'>
	
		<table>
			<thead>
				<th>Description</th>
				<th>Price</th>
				<th>Qty</th>
				<th></th>
			</thead>
			<tbody>
				<tr>
<?php 
				foreach($product as $row) { ?>
					<form action='/products/add_to_cart' method='post'>
						<td><?php echo $row['description'] ?></td>
						<td>$<?php echo $row['price'] ?></td>
						<td>
						<select name='qty'>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						</td>
						<input type='hidden' name='id' value='<?php echo $row['id']?>'>
						<td>
						<input class='green' type='submit' name='submit' value='Buy'>
						</td>
					</form>
				</tr>
<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>