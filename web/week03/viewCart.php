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
//if(!empty($_POST['cart'])){
//foreach($_POST['cart'] as $selected){
//echo "<tr><td>" . $selected . "</td><td>" .  . "</tr>";}}
$items = $_POST["item"];
$amounts = $_POST["number"];
$price = $_POST["price1"];
for ($i = 0; $i < count($items); $i++) {
	echo "<tr><td>" . $items[$i] . "</td><td>" . $amounts[$i] . "</td><td>" . $price[$i] * $amounts[$i] . "</td></tr>";
}
?>
		</table>
	</body>
</html>