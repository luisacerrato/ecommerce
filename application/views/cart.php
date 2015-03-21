<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
</head>
<style>
	body {
		font-family: verdana;
	}
	
	h2 {
		width: 1000px;
		margin: 0 auto;
		padding-top: 30px;
	}

	h3 {
		width: 990px;
		margin: 0 auto;
		padding-top: 30px;

	}
	.table {
		width: 900px;
		margin: 0 auto;
		margin-top: 50px;
		font-size: 18px;
	}
	
	table {
		border-bottom: 1px solid black;
	}

	th, tr, td {
		padding-right: 50px;
		padding-bottom: 15px;
	}

	.red {
		background-color: red;
		color: white;
	}

	p {
		font-size: 20px;
		font-weight: bold;
		margin-left: 150px;
	}

	.blue {
		background-color: blue;
		color: white;
		margin-left: 200px;
	}

	form {
		width: 400px;
		margin-top: 50px;
		line-height: 30px;
	}

	ul {
		list-style: none;
	}
	
	.table input {
		float: right;
	}

</style>
<body>
	<h2>Check Out</h2>
	<div class='table'>
		<table>
			<thead>
				<th>Qty</th>
				<th>Description</th>
				<th>Price</th>
			</thead>
			<tbody>
<?php
				foreach ($all_products as $product) { ?>
				<tr>
					<td><?php echo $product['qty']?></td>
					<td><?php echo $product['description']?></td>
					<td><?php echo $product['price']?></td>
					<td><a class='red' href="/products/destroy/<?php echo $product['id'] ?>">Delete</a></td>
				</tr>
<?php } ?>

			</tbody>
		</table>
		<p>Total= $<?php echo $total ?></p>	
	</div>

	<h3>Billing Info</h3>
	<div class='table'>
		
<?php echo $this->session->flashdata('message'); ?>

		<form action='/products/submit_order' method='post'>
			<ul>
				<li>Name:<input type='text' name='name'>
				</li>
			</ul>
			<ul>	
				<li>Address:<input type='text' name='address'>
				</li>
			</ul>
			<ul>
				<li>Card #:<input type='text' name='card'>
				</li>
			</ul>
			<br>
			<input type='hidden' name='action' value='order'>
			<input class='blue' type='submit' name='submit' value='Order'>
		</form>
	</div>
</body>
</html>