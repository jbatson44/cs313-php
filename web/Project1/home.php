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
		<title>FIT</title>
	</head>
	<body>
		<h1>FIT</h1>
		
<?php
$statement = $db->prepare("SELECT username FROM users");
$statement->execute();
// Go through each result
echo "<ul>";
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<li>" . $row['username'] . "</li>";
}
echo "</ul>";
/*
$statement = $db->prepare("SELECT username, password, weight, heightfeet, heightinch FROM users");
$statement->execute();
// Go through each result

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<table>";
	echo "<tr><td>Username: " . $row['username'] . "</td></tr>";
	echo "<tr><td>Password: " . $row['password'] . "</td></tr>";
	echo "<tr><td>Height: " . $row['heightfeet'] . "'" . $row['heightinch'] . "\"" . "</td></tr>";
	echo "<tr><td>Current weight: " . $row['weight'] . " lbs</td></tr>";
	echo "</table><br>";
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	
}*/
?>
		
<table>
	<tr>
		<th>Exercises</th>
	</tr>
<?php

$statement = $db->prepare("SELECT exercise FROM exercises");
$statement->execute();
// Go through each result

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr><td>" . $row['exercise'] . "</td></tr>";
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	
}
?>
</table>
