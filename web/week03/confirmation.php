<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
		<script type="text/javascript" src="shopScript.js"></script>
	</head>
	<body>
	<h1>Confirmation</h1>
	<table>
		<tr>
			<th>Item</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
<?php
if ($_SESSION['thing1'] > 0) {
	echo "<tr><td>Thing1</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1'] * 1 . "</td></tr>"
}
if ($_SESSION['thing2'] > 0) {
	echo "<tr><td>Thing2</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2'] * 2 . "</td></tr>"
}
if ($_SESSION['thing3'] > 0) {
	echo "<tr><td>Thing3</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3'] * 3 . "</td></tr>"
}
if ($_SESSION['thing4'] > 0) {
	echo "<tr><td>Thing4</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4'] * 4 . "</td></tr>"
}
?>

	</body>
</html>