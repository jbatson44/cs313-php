<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<table>
			<tr>
				<th>Item</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr>
<?php
if ($_SESSION['thing1'] > 0) {
	$_SESSION['thing1price'] = $_SESSION['thing1'] * 1;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing1</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1price'] . "</td>
	<td><input type='submit' name='one' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing2'] > 0) {
	$_SESSION['thing2price'] = $_SESSION['thing2'] * 2;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing2</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2price'] . "</td>
	<td><input type='submit' name='two' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing3'] > 0) {
	$_SESSION['thing3price'] = $_SESSION['thing3'] * 3;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing3</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3price'] . "</td>
	<td><input type='submit' name='three' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing4'] > 0) {
	$_SESSION['thing4price'] = $_SESSION['thing4'] * 4;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing4</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4price'] . "</td>
	<td><input type='submit' name='four' value='Delete item'></td></tr>";
	echo "</form>";
}


if (isset($_POST['one'])) {
	$_SESSION['thing1'] = 0;
	unset($_SESSION['thing1price']);
	unset($_POST['one']);
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['two'])) {
	$_SESSION['thing2'] = 0;
	unset($_SESSION['thing2price']);
	unset($_POST['two']);
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['three'])) {
	$_SESSION['thing3'] = 0;
	unset($_SESSION['thing3price']);
	unset($_POST['three']);
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['four'])) {
	$_SESSION['thing4'] = 0;
	unset($_POST['four']);
	unset($_SESSION['thing4price']);
	echo "<meta http-equiv='refresh' content='0'>";
}
//echo $_SESSION["thing1"];
//echo $_SESSION["thing2"];
//echo $_SESSION["thing3"];
//echo $_SESSION["thing4"];
?>
		</table>
		<?php
		$_SESSION['total'] = $_SESSION['thing1price'] + $_SESSION['thing2price'] + $_SESSION['thing3price'] + $_SESSION['thing4price'];
		echo "<p><b>Total: $" . $_SESSION['total'] . "</b></p>";
		?>
		<a href="shop.php">Return to browse page</a>
		<a href="checkout.php">Move on to checkout</a>
	</body>
</html>