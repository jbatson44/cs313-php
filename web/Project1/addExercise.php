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

$newExercise = $_POST['addExName'];
$routineId = $_POST['addExRoutid'];
try {
	$query = 'INSERT INTO exercises(exercise, routineid) VALUES(:exercise, :routineid)';
	$statement = $db->prepare($query);
	
	$statement->bindValue(':exercise', $newExercise);
	$statement->bindValue(':routineid', $routineId);
	$statement->execute();
	header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
	exit();
} catch(Exception $ex) {
	echo "Error with DB. Details: $ex";
	die();
}
?>