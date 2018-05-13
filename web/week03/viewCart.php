<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="shopstyle.css">
	</head>
	<body>
		<table>
			<tr>
				<th>Item</th>
				<th>Quantity</th>
				<th>Price</th>
				<th></th>
			</tr>
<?php
if ($_SESSION['thing1'] > 0) {
	$_SESSION['thing1price'] = $_SESSION['thing1'] * 1;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>KitKat</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1price'] . "</td>
	<td><input type='submit' name='one' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing2'] > 0) {
	$_SESSION['thing2price'] = $_SESSION['thing2'] * 2;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Snickers</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2price'] . "</td>
	<td><input type='submit' name='two' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing3'] > 0) {
	$_SESSION['thing3price'] = $_SESSION['thing3'] * 3;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Hershey's</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3price'] . "</td>
	<td><input type='submit' name='three' value='Delete item'></td></tr>";
	echo "</form>";
}
if ($_SESSION['thing4'] > 0) {
	$_SESSION['thing4price'] = $_SESSION['thing4'] * 4;
	echo "<form method='post' action='viewCart.php'>";
	echo "<tr><td>Twix</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4price'] . "</td>
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
?>
		</table>
<?php
$_SESSION['total'] = $_SESSION['thing1price'] + $_SESSION['thing2price'] + $_SESSION['thing3price'] + $_SESSION['thing4price'];
echo "<p><b>Total: $" . $_SESSION['total'] . "</b></p>";
?>
		<form action="shop.php">
			<input type='submit' name='submit' value='Return to browse items'>
		</form>
		<br>
		<form action="checkout.php">
          <input type='submit' name='submit' value='Move on to checkout'>
		</form>
	</body>
</html>