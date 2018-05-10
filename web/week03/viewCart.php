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
	for ($f = 0; $f < count($amounts); $f++) {
		if ($amounts[$f] == '0') {
			$f++;
		}
		$total = 2 * amounts[$f];
		echo "<tr><td>" . $items[$i] . "</td><td>" . $amounts[$f] . "</td><td>" . $total . "</td></tr>";
	}
}
?>
		</table>
	</body>
</html>