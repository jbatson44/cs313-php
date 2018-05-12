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
//if(!empty($_POST['cart'])){
//foreach($_POST['cart'] as $selected){
//echo "<tr><td>" . $selected . "</td><td>" .  . "</tr>";}}
//$items = $_POST["item"];
//$amounts = $_POST["number"];
//$price = $_POST["price1"];
//for ($i = 0; $i < count($items); $i++) {
//	$total = 2 * amounts[$i];
//	echo "<tr><td>" . $items[$i] . "</td><td>" . $amounts[$i] . "</td><td>" . $total . "</td></tr>";

//}
$thing1 = $_SESSION["thing1"]
if ($thing1 > 0) {
//	echo "<tr><td>Thing1</td><td>" . $thing1 . "</td><td>$" . $thing1 * 2 . "</td></tr>";
}
echo $_SESSION["thing1"];
echo $_SESSION["thing2"];
echo $_SESSION["thing3"];
echo $_SESSION["thing4"];
?>
		</table>
	</body>
</html>