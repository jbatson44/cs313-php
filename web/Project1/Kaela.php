<!DOCTYPE html>
<html>
	<head>
		<title>User Kaela</title>
	</head>
	<body>
<?php
$statement = $db->prepare("SELECT * FROM users WHERE username = 'Kaela' ");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo $row['username'];
}
?>
	</body>
</html>