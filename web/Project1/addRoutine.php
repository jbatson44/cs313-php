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
echo $_SESSION['userid'];
try {
	$query = 'INSERT INTO routines(routine, userid) VALUES(:routine, :userid)';
	$statement = $db->prepare($query);
	
	$statement->bindValue(':routine', $newRoutine);
	$statement->bindValue(':userid', $_SESSION['userid']);
	$statement->execute();
	header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
	exit();
} catch(Exception $ex) {
	echo "Error with DB. Details: $ex";
	die();
}
/*
try
	{
		$query = 'INSERT INTO routines(routine, userid) VALUES(:routine, :userid)';
		$statement = $db->prepare($query);
	
		$statement->bindValue(':username', $user);
		$statement->bindValue(':password', $pass);
		$statement->bindValue(':heightfeet', $heightfeet);
		$statement->bindValue(':heightinch', $heightinch);
		$statement->bindValue(':weight', $weight);
		$statement->execute();
		header("location: https://glacial-meadow-56606.herokuapp.com/Project1/routines.php");  
		exit(); 
	}
	catch (Exception $ex)
	{
		// Please be aware that you don't want to output the Exception message in
		// a production environment
		echo "Error with DB. Details: $ex";
		die();
	}*/
?>