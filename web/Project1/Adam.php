<!DOCTYPE html>
<html>
	<head>
		<title>User Adam</title>
	</head>
	<body>
<?php
$statement = $db->prepare("SELECT username FROM users WHERE username = 'Adam'");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	echo "<h1>" . $row['username'] . "</h1>"; 
}
?>
	</body>
</html>