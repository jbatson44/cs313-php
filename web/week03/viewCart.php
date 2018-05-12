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
echo "Session1: " . $_SESSION['thing1'] . "<br>";
echo "Session2: " . $_SESSION['thing2'] . "<br>";
echo "Session3: " . $_SESSION['thing3'] . "<br>";
echo "Session4: " . $_SESSION['thing4'] . "<br>";

if ($_SESSION['thing1'] > 0) {
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing1</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1'] * 1 . "</td>
	<td><input type='submit' name='one' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing2'] > 0) {
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing2</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2'] * 2 . "</td>
	<td><input type='submit' name='two' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing3'] > 0) {
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing3</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3'] * 3 . "</td>
	<td><input type='submit' name='three' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing4'] > 0) {
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Thing4</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4'] * 4 . "</td>
	<td><input type='submit' name='four' value='Delete item'></td></tr>";
	echo "</form>";
}


if (isset($_POST['one'])) {
	$_SESSION['thing1'] = 0;
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['two'])) {
	$_SESSION['thing1'] = 0;
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['three'])) {
	$_SESSION['thing1'] = 0;
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['four'])) {
	$_SESSION['thing1'] = 0;
	echo "<meta http-equiv='refresh' content='0'>";
}
//echo $_SESSION["thing1"];
//echo $_SESSION["thing2"];
//echo $_SESSION["thing3"];
//echo $_SESSION["thing4"];
?>
		</table>
		<a href="shop.php">Return to browse page</a>
		<a href="checkout.php">Move on to checkout</a>
	</body>
</html>