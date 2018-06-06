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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TA 07</title>
	</head>
	<body>
<?php
$user = $_POST['username'];
$_SESSION['user'] = $user;
$pass = $_POST['password'];

$statement = $db->prepare("SELECT * FROM users");
$statement->execute();
$userExists = false;

while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($row['username'] == $_SESSION['user']) {
		$userExists = true;
	}
}
if ($userExists == true) {
	echo "Username already exists!<br>";
	echo "<a href='createAccount.php'>Retry new account</a><br>";
	echo "<a href='login.php'>Login as existing user</a><br>";
}
else {
	try
	{
		$passwordHash = password_hash($pass);
		$query = 'INSERT INTO users07(username, password) VALUES(:username, :password)';
		$statement = $db->prepare($query);
	
		$statement->bindValue(':username', $user);
		$statement->bindValue(':password', $passwordHash);
		
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
	}
}
?>
		
	</body>
</html>