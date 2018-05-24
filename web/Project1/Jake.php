<!DOCTYPE html>
<html>
	<head>
		<title>User Jake</title>
	</head>
	<body>
<?php
$statement = $db->prepare("SELECT username FROM users WHERE username = 'Jake'");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	echo "<h1>" . $row['username'] . "</h1>"; 
}
?>
	</body>
</html>