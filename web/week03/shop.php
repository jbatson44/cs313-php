<!DOCTYPE html>
<html>
	<head>
		<title>Browse Items</title>
		<script src="shopScript.js"></script>
	</head>
	<body>
		<h1>Items</h2>
		
			<table>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Add</th>
				</tr>
				<tr>
					<td>thing1</td>
					<td><input type="number" min="0" max="100" value="0" name="number1"></td>
					<td name="price1" value="1">$1.00<td>
					<td><input type="button" name="item[]" value="add thing1" onclick="addThing1(number1, price1)"></td>
				</tr>
				<tr>
					<td>thing2</td>
					<td><input type="number" min="0" max="100" value="0" name="number[]"></td>
					<td>$2.00<td>
					<td><input type="button" name="item[]" value="add thing2"></td>
				</tr>
				<tr>
					<td>thing3</td>
					<td><input type="number" min="0" max="100" value="0" name="number[]"></td>
					<td>$3.00<td>
					<td><input type="button" name="item[]" value="add thing3"></td>

				</tr>
				<tr>
					<td>thing4</td>
					<td><input type="number" min="0" max="100" value="0" name="number[]"></td>
					<td>$4.00<td>
					<td><input type="button" name="item[]" value="add thing4"></td>
				</tr>
			</table>
			
		
	</body>
</html>