<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Browse Items</title>
		<script type="text/javascript" src="shopScript.js"></script>
		<link rel="stylesheet" href="shopstyle.css">
	</head>
	<body>
		<a id="cartlink" href="viewCart.php">Cart</a>
		<h1>Candies!</h2>
		<p>Simply specify how much you want of each and then press the "add to cart" button at the bottom.</p>
			<table>
				<tr>
					<th></th>
					<th>Item</th>
					<th>Quantity</th>
					<th>Price</th>	
				</tr>
				<form method="post" action="">
				<tr>
					<td><img src="https://smartlabel.hersheys.com/images/0c75f9d4-4a51-4f2e-bcc9-3c7dae4d69c3.png" alt="kitkat" width="300" height="300"></td>
					<td>Kit-Kat</td>
					<td><input type="number" name="thing1" value="0" min="0" max="100"></td>
					<td name="price1" value="1" id="price1">$1.00</td>	
				</tr>
				<tr>
					<td><img src="https://images-na.ssl-images-amazon.com/images/I/71%2Br1gAwsZL._SL1500_.jpg" alt="snickers" width="300" height="300"></td>
					<td>Snickers</td>
					<td><input type="number" name="thing2" value="0" min="0" max="100"></td>
					<td>$2.00</td>
				</tr>
				<tr>
					<td><img src="http://www.sweetservices.com/images/P/hershey%20bar.jpg" alt="hersheys" width="300" height="300"></td>
					<td>Hershey's</td>
					<td><input type="number" name="thing3" value="0" min="0" max="100"></td>
					<td>$3.00</td>
				</tr>
				<tr>
					<td><img src="https://images-na.ssl-images-amazon.com/images/I/71aMHKhes2L._SL1500_.jpg" alt="twix" width="300" height="300"></td>
					<td>Twix</td>
					<td><input type="number" name="thing4" value="0" min="0" max="100"></td>
					<td>$4.00</td>
				</tr>
<?php
if ($_SESSION['thing1'] == 0) {
	unset($_SESSION['thing1']);
}
if ($_SESSION['thing2'] == 0) {
	unset($_SESSION['thing2']);
}
if ($_SESSION['thing3'] == 0) {
	unset($_SESSION['thing3']);
}
if ($_SESSION['thing4'] == 0) {
	unset($_SESSION['thing4']);
}
if (isset($_POST['submit'])) {
	if (!isset($_SESSION['thing1'])) {
		$_SESSION['thing1'] = $_POST['thing1'];
	}
	else {
		$_SESSION['thing1'] = $_SESSION['thing1'] + $_POST['thing1'];
	}
	if (!isset($_SESSION['thing2'])) {
		$_SESSION['thing2'] = $_POST['thing2'];
	}
	else {
		$_SESSION['thing2'] = $_SESSION['thing2'] + $_POST['thing2'];
	}
	if (!isset($_SESSION['thing3'])) {
		$_SESSION['thing3'] = $_POST['thing3'];
	}
	else {
		$_SESSION['thing3'] = $_SESSION['thing3'] + $_POST['thing3'];
	}
	if (!isset($_SESSION['thing4'])) {
		$_SESSION['thing4'] = $_POST['thing4'];
	}
	else {
		$_SESSION['thing4'] = $_SESSION['thing4'] + $_POST['thing4'];
	}
	echo "Items added!";
}

?> 
			</table><br>
			<input type="submit" name="submit" value="add to cart">
		</form>
	</body>
</html>