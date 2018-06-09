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
		<link rel="stylesheet" href="projectStyle.css">
		<title>Fit - Login</title>
	</head>
	<body>
		<div class="header">
			<h1 class="title">Welcome to FIT</h1>
		</div
		><div class="middle">
			<div id="login">
				<form action="testLogin.php" method="post">
					<p style='text-align:center'><b>Login</b></p>
					Username: 
					<input type="text" name="username"><br><br>
					Password: 
					<input type="password" name="password"><br><br>
					<input type="submit" value="login"><br>
					<a href="createAccount.php">Create an account</a>
				</form>
			</div>
		</div>
		<div class="bottom">
		
		</div>
	</body>
</html>