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
$query = 'INSERT INTO routines(routine, userid) VALUES(:routine, :userid)';
$statement = $db->prepare($query);
	
$statement->bindValue(':routine', $newRoutine);
$statement->bindValue(':userid', $_SESSION['userid']);
header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
exit();
?>