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

$statement = $db->prepare("SELECT * FROM users WHERE username='Kaela'");
$statement->execute();
?>
<!DOCTYPE html>
<html>
	<head>
<?php

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$userid = $row['userid'];
	$username = $row['username'];
	$heightfeet = $row['heightfeet'];
	$heightinch = $row['heightinch'];
	$weight = $row['weight'];
	echo "<title>User " . $username . "</title>";
}
?>
	</head>
	<body>
<?php
//$statement = $db->prepare("SELECT * FROM users WHERE username='Kaela'");
//$statement->execute();
// Go through each result
//while ($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
	echo "<h1>" . $username . "</h1>";	
	echo "Height: " . $heightfeet . "'" . $heightinch . "\"<br>";
	echo "Current weight: " . $weight . " lbs<br>";
//}
?>
		<h2>Routines</h2>
<?php

$statement = $db->prepare("SELECT * FROM routines WHERE userid=?");
$statement->execute($userid);
// Go through each result

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$routineid = $row['routineid'];
	$routine = $row['routine'];
	echo "<h3>" . $routine . "</h3>";
}/*
$statement = $db->prepare("SELECT * FROM exercises WHERE routineid=" . $routineid);
$statement->execute();
echo "<ul>";
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$exerciseid = $row['exerciseid'];
	$exercise = $row['exercise'];
	echo "<li>" . $exercise . "</li>"; 
}
echo "</ul>";
*/
?>
	</body>
</html>