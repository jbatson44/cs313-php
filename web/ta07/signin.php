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
		<title>Fit - Login</title>
	</head>
	<body>
		<h1>Sign In</h1>
		<div id="login">
			<form action="testNewLogin.php" method="post">
				Username: 
				<input type="text" name="username"><br><br>
				Password: 
				<input type="password" name="password"><br><br>
				<input type="submit" value="login"><br>
				<a href="createAccount.php">Create an account</a>
			</form>
		</div>
	</body>
</html>