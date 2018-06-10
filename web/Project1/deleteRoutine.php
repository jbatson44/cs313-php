<?php
session_start();
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$delRoutine = $_POST['deleteRoutid'];

try {
	$query = "DELETE FROM exercises WHERE routineid = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':id', $delRoutine);
	$statement->execute();
	
	
	$query = "DELETE FROM routines WHERE routineid = :id";
	$statement = $db->prepare($query);
	
	$statement->bindValue(':id', $delRoutine);
	//$statement->bindValue(':userid', $_SESSION['userid']);
	$statement->execute();
	header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
	exit();
} catch(Exception $ex) {
	echo "Error with DB. Details: $ex";
	die();
}
?>