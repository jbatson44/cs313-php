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
		<title>Fit - Create Account</title>
	</head>
	<body>
		<h1>Create An Account</h1>
		<div id="login">
			<form action="testAccount.php" method="post">
				Username: 
				<input type="text" name="username"><br><br>
				Password: 
				<input type="text" name="password"><br><br>
				Height Feet:
				<select name="heightfeet">
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>
				Inches:
				<select name="heightinch">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
				</select><br><br>
				Weight:
				<input type="number" step="any" min="0" name="weight"/><br><br>
				<input type="submit" value="Create account"><br>
				<a href="login.php">Existing user</a>
			</form>
		</div>
	</body>
</html>