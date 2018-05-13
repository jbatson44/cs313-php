<?php
session_start();
		
//$_SESSION['city'] = $_POST['city'];
//$_SESSION['state'] = $_POST['state'];
//$_SESSION['address'] = $_POST['address'];
//$_SESSION['zip'] = $_POST['zip'];
$city = test_input($_POST["city"]);
$state = test_input($_POST["state"]);
$address = test_input($_POST["address"]);
$zip = test_input($_POST["zip"]);
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
	echo "<tr><td>KitKat</td><td>" . $_SESSION['thing1'] . "</td><td>$" . $_SESSION['thing1'] * 1 . "</td></tr>";
}
if ($_SESSION['thing2'] > 0) {
	echo "<tr><td>Snickers</td><td>" . $_SESSION['thing2'] . "</td><td>$" . $_SESSION['thing2'] * 2 . "</td></tr>";
}
if ($_SESSION['thing3'] > 0) {
	echo "<tr><td>Hershey's</td><td>" . $_SESSION['thing3'] . "</td><td>$" . $_SESSION['thing3'] * 3 . "</td></tr>";
}
if ($_SESSION['thing4'] > 0) {
	echo "<tr><td>Twix</td><td>" . $_SESSION['thing4'] . "</td><td>$" . $_SESSION['thing4'] * 4 . "</td></tr>";
}

?>
		</table>
<?php
echo "<p class='confirm'><b>Total: $" . $_SESSION['total'] . "</b></p>";
echo "<p class='confirm'>Your order is being sent to: " . $address . " " . $city . ", " . $state . " " . $zip;
?>		
	</body>
</html>