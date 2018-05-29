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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fit</title>
	</head>
	<body>
<?php
$user = $_POST['username'];
$pass = $_POST['password'];
$statement = $db->prepare("SELECT * FROM users");
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($row['username'] == $user)
		echo "Welcome " . $user;
}
?>
		
	</body>
</html>