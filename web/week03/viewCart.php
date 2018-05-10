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
if(!empty($_POST['cart'])){
foreach($_POST['cart'] as $selected){
echo "<tr><td>" . $selected . "</td></tr>";}}

?>
		</table>
	</body>
</html>