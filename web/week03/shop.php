<!DOCTYPE html>
<html>
	<head>
		<title>Browse Items</title>
		<script src="shopScript.js"></script>
	</head>
	<body>
		<h1>Items</h2>
		<form method="post" action="<?php echo $_POST['price1'] ?>">
			<table>
				<tr>
					<th>Item</th>
					<th>Price</th>
					<th></th>
				</tr>
				<tr>
					<td>thing1</td>
					<td name="price1" value="1" id="price1">$1.00<td>
					<td><input type="submit" name="item[]" value="add to cart"></td>
				</tr>
				<tr>
					<td>thing2</td>
					<td>$2.00<td>
					<td><input type="button" name="item[]" value="add to cart"></td>
				</tr>
				<tr>
					<td>thing3</td>
					<td>$3.00<td>
					<td><input type="button" name="item[]" value="add to cart"></td>

				</tr>
				<tr>
					<td>thing4</td>
					<td>$4.00<td>
					<td><input type="button" name="item[]" value="add to cart"></td>
				</tr>
			</table>
			
		</form>
	</body>
</html>