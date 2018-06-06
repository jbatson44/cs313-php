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
		<title>Create Account</title>
	</head>
	<body>
		<h1>Create An Account</h1>
		<div id="login">
			<form action="testAccount.php" method="post">
				Username: 
				<input type="text" name="username"><br><br>
				Password: 
				<input type="text" name="password"><br><br>
				<input type="submit" value="Create account"><br>
			</form>
		</div>
	</body>
</html>