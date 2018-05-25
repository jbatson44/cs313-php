<?php
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $db->prepare("SELECT * FROM users WHERE username='Jake'");
$statement->execute();
?>
<!DOCTYPE html>
<html>
	<head>
<?php
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<title>User " . $row['username'] . "</title>";
}
?>
	</head>
	<body>
<?php
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<h1>" . $row['username'] . "</h1>";
}
?>
	</body>
</html>