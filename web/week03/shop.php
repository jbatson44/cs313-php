<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Browse Items</title>
		<script src="shopScript.js"></script>
	</head>
	<body>
		<a href="viewCart.php">Cart</a>
		<h1>Items</h2>
		
			<table>
				<tr>
					<th>Item</th>
					<th>Price</th>
					<th></th>
				</tr>
				<form method="post" action="">
				<tr>
					<td name="thing1" value="thing1">thing1</td>
					<td name="price1" value="1" id="price1">$1.00<td>
					<td><input type="submit" name="one" value="add to cart"></td>
				</tr>
				</form>
				<form method="post" action="">
				<tr>
					<td name="thing2" value="thing2">thing2</td>
					<td>$2.00<td>
					<td><input type="button" name="two" value="add to cart"></td>
				</tr>
				</form>
				<form method="post" action="">
				<tr>
					<td name="thing3" value="thing3">thing3</td>
					<td>$3.00<td>
					<td><input type="button" name="three" value="add to cart"></td>

				</tr>
				</form>
				<form method="post" action="">
				<tr>
					<td name="thing4" value="thing4">thing4</td>
					<td>$4.00<td>
					<td><input type="button" name="four" value="add to cart"></td>
				</tr>
				</form>
<?php
if (isset($_POST['one'])) {
     $_SESSION['thing1'] = $_POST['thing1'];
	 
	 echo "Session: " . $_SESSION['thing1'];
}
if (isset($_POST['two'])) {
     $_SESSION['thing2'] = $_POST['thing2'];
}
if (isset($_POST['three'])) {
     $_SESSION['thing3'] = $_POST['thing3'];
}
if (isset($_POST['four'])) {
     $_SESSION['thing4'] = $_POST['thing4'];
}
?> 
			</table>
			
		
	</body>
</html>