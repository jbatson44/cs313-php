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
$username = "Jake";
$statement = $db->prepare("SELECT * FROM users INNER JOIN routines ON routines.userid=userid WHERE username='" . $username . "'");
$statement->execute();
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="projectStyle.css">
<?php
$routine = array();
$routineid = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$userid = $row['userid'];
	$username = $row['username'];
	$heightfeet = $row['heightfeet'];
	$heightinch = $row['heightinch'];
	$weight = $row['weight'];
	$routineid[] = $row['routineid'];
	//$routine = $row['routine'];
	$routine[] = $row['routine'];
	echo "<title>User " . $username . "</title>";
}


//while($row = $statement->fetch(PDO::FETCH_ASSOC)){
//    $routine[] = $row['routine'];
//}
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

//$statement = $db->prepare("SELECT * FROM routines WHERE userid = '" . $userid . "'");
//$statement->execute();
// Go through each result

//while ($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
foreach ($routine as $value) {
    echo "<h3>" . $value . "</h3>";
}
echo "Works?";

//}
/*$statement = $db->prepare("SELECT * FROM exercises WHERE routineid='1'");
$statement->execute();
echo "<ul class='routine'>";
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