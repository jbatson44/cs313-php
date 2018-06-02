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

$newRoutine = $_POST['newRoutine'];
$query = 'INSERT INTO routines(routine) VALUES(:routine)';
$statement = $db->prepare($query);
	
$statement->bindValue(':username', $newRoutine);
header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
exit();
?>