<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Browse Items</title>
		<script type="text/javascript" src="shopScript.js"></script>
	</head>
	<body>
		<a href="viewCart.php">Cart</a>
		<h1>Items</h2>
		
			<table>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Price</th>
					
				</tr>
				<form method="post" action="">
				<tr>
					<td>thing1</td>
					<td><input type="number" name="thing1" value="0" min="0" max="100"></td>
					<td name="price1" value="1" id="price1">$1.00<td>
					
				</tr>
		
				<tr>
					<td>thing2</td>
					<td><input type="number" name="thing2" value="0" min="0" max="100"></td>
					<td>$2.00<td>
					
				</tr>
			
				<tr>
					<td>thing3</td>
					<td><input type="number" name="thing3" value="0" min="0" max="100"></td>
					<td>$3.00<td>
					

				</tr>
				
				<tr>
					<td>thing4</td>
					<td><input type="number" name="thing4" value="0" min="0" max="100"></td>
					<td>$4.00<td>
					
				</tr>
				<td><input type="submit" name="submit" value="add to cart"></td>
				</form>
<?php
if ($_SESSION['thing1'] < 1) {
	unset($_SESSION['thing1']);
}
if ($_SESSION['thing2'] < 1) {
	unset($_SESSION['thing2']);
}
if ($_SESSION['thing3'] < 1) {
	unset($_SESSION['thing3']);
}
if ($_SESSION['thing4'] < 1) {
	unset($_SESSION['thing4']);
}
if (isset($_POST['submit'])) {
	if (!isset($_SESSION['thing1'])) {
		$_SESSION['thing1'] = $_POST['thing1'];
		if ($_SESSION['thing1'] < 1)
			unset($_SESSION['thing1']);
	}
	if (!isset($_SESSION['thing1'])) {
		$_SESSION['thing2'] = $_POST['thing2'];
		if ($_SESSION['thing2'] < 1)
			unset($_SESSION['thing2']);
	}
	if (!isset($_SESSION['thing1'])) {
		$_SESSION['thing3'] = $_POST['thing3'];
		if ($_SESSION['thing3'] < 1)
			unset($_SESSION['thing3']);
	}
	if (!isset($_SESSION['thing1'])) {
		$_SESSION['thing4'] = $_POST['thing4'];
		if ($_SESSION['thing4'] < 1)
			unset($_SESSION['thing4']);
	}
	//$_SESSION['thing2'] = $_POST['thing2'];
	//$_SESSION['thing3'] = $_POST['thing3'];
	//$_SESSION['thing4'] = $_POST['thing4'];
	echo "Items added!";
	//if ($_SESSION['thing1'] > 0) {
	//	echo "Session1: " . $_SESSION['thing1'] . "<br>";
	//}
	//if ($_SESSION['thing2'] > 0) {
	//	echo "Session2: " . $_SESSION['thing2'] . "<br>";
	//}
	//if ($_SESSION['thing3'] > 0) {
	//	echo "Session3: " . $_SESSION['thing3'] . "<br>";
	//}
	//if ($_SESSION['thing4'] > 0) {
	//	echo "Session4: " . $_SESSION['thing4'] . "<br>";
	//}
}

?> 
			</table>
			
		
	</body>
</html>