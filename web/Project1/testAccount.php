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
		<title>Fit</title>
	</head>
	<body>
<?php
$user = $_POST['username'];
$_SESSION['user'] = $user;
$pass = $_POST['password'];
$heightfeet = $_POST['heightfeet'];
$heightinch = $_POST['heightinch'];
$weight = $_POST['weight'];
$sex = $_POST['sex'];
$age = $_POST['age'];
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
		$query = 'INSERT INTO users(username, password, heightfeet, heightinch, weight, age, sex) VALUES(:username, :password, :heightfeet, :heightinch, :weight, :age, :sex)';
		$statement = $db->prepare($query);
	
		$statement->bindValue(':username', $user);
		$statement->bindValue(':password', $pass);
		$statement->bindValue(':heightfeet', $heightfeet);
		$statement->bindValue(':heightinch', $heightinch);
		$statement->bindValue(':weight', $weight);
		$statement->bindValue(':age', $age);
		$statement->bindValue(':sex', $sex);
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