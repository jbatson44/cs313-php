<!DOCTYPE html>
<html>
	<head>
		<title>User Kaela</title>
	</head>
	<body>
<?php
$statement = $db->prepare("SELECT username FROM users");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	if ($row['username'] == "Kaela") {
		echo "<h1>" . $row['username'] . "</h1>";
	}	
}
?>
	</body>
</html>