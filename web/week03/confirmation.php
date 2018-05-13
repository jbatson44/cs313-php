<?php
session_start();
		
$_SESSION['city'] = $_POST['city'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['zip'] = $_POST['zip'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
		<script type="text/javascript" src="shopScript.js"></script>
		<link rel="stylesheet" href="shopstyle.css">
	</head>
	<body>
		<p class="confirm">Thank you for your purchase!</p>
		<table class="confirm">
			<tr>
				<th>Item</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr>
<?php
if ($_SESSION['thing1'] > 0) {
	echo "<tr><td>Thing1</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1'] * 1 . "</td></tr>";
}
if ($_SESSION['thing2'] > 0) {
	echo "<tr><td>Thing2</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2'] * 2 . "</td></tr>";
}
if ($_SESSION['thing3'] > 0) {
	echo "<tr><td>Thing3</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3'] * 3 . "</td></tr>";
}
if ($_SESSION['thing4'] > 0) {
	echo "<tr><td>Thing4</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4'] * 4 . "</td></tr>";
}

?>
		</table>
<?php
echo "<p class='confirm'><b>Total: $" . $_SESSION['total'] . "</b></p>";
echo "<p class='confirm'>Your order is being sent to: " . $_SESSION['address'] . " " . $_SESSION['city'] . ", " . $_SESSION['state'] . " " . $_SESSION['zip'];
?>		
	</body>
</html>