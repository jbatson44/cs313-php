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
	<link rel="stylesheet" href="projectStyle.css">
	<script src="fitscript.js"></script>
<?php
echo "<title>User " . $_SESSION['user'] . "</title>";
?>
	</head>
	<body>
<?php
$statement = $db->prepare("SELECT * FROM users WHERE username = '{$_SESSION['user']}'");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$_SESSION['userid'] = $row['id'];
	//echo $row['userid'];
	//$username = $row['username'];
	$_SESSION['heightfeet'] = $row['heightfeet'];
	$_SESSION['heightinch'] = $row['heightinch'];
	$_SESSION['weight'] = $row['weight'];
}
//$statement = $db->prepare("SELECT * FROM users FULL OUTER JOIN routines ON routines.userid=userid WHERE userid = '5'");
//$statement->execute();
$statement = $db->prepare("SELECT * FROM routines WHERE userid = '{$_SESSION['userid']}'");
$statement->execute();
$routine = array();
$routineid = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	//$userid = $row['userid'];
	//$username = $row['username'];
	//$heightfeet = $row['heightfeet'];
	//$heightinch = $row['heightinch'];
	//$weight = $row['weight'];
	
	$routid[] = $row['routineid'];
	
	$rout[] = $row['routine']; 
}
//echo "<title>User " . $username . "</title>";
$routine = array_unique($rout);
$routineid = array_unique($routid);
$routReal = array_combine($routineid, $routine);


	//echo $_SESSION['user'];
	echo "<h1>" . $_SESSION['user'] . "</h1>";	
	echo "Height: " . $_SESSION['heightfeet'] . "'" . $_SESSION['heightinch'] . "\"<br>";
	echo "Current weight: " . $_SESSION['weight'] . " lbs<br>";
	//echo "Userid: " . $_SESSION['userid'];
?>
		<h2>Routines</h2>
<?php
//$in = join(',', array_fill(0, count($routineid), '?'));
//$select = <<<SQL
   // SELECT *
   // FROM exercises
 //   WHERE id IN ($in);
//SQL;
//$statement = $pdo->prepare($select);
//$statement->execute($routineid);
$statement = $db->prepare("SELECT * FROM exercises");
$statement->execute();
$exercises = array();
$exRoutid = array();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	//if (row['routineid'] == '2')
		$exercises[] = $row['exercise'];
		$exRoutid[] = $row['routineid'];
		$exid[] = $row['routineid'];
}
//$routine = array_unique($rout);
//$routineid = array_unique($routid);
$exReal = array_combine($exercises, $exRoutid);
//while ($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
//foreach ($routine as $value) {
//    echo "<h3>" . $value . "</h3>";
//}

?>
<input type="button" name="edit" value="+" onclick="editRoutines()"/>
<?php
/*
foreach ($routReal as $key => $value) {
	echo "<h3>" . $value . "</h3>";
	echo "<ul>";
	foreach ($exReal as $exkey => $exvalue) {
		if ($key == $exvalue)
			echo "<li>" . $exkey . "</li>";
	}
	echo "</ul>";
}
*/
$newArray = array();
for ($i = 0; $i < count($exercises); $i++) {
	$newArray[$i] = array($exercises[$i], $exid[$i], $exRoutid[$i]);
}

foreach ($routReal as $key => $value) {
	echo "<h3>" . $value . "</h3>";
	echo "<ul>";
	for ($i = 0; $i < count($newArray); $i++) {
		if ($key == $newArray[$i][2])
			echo "<li>" . $newArray[$i][0] . "</li>";
	}
	echo "</ul>";
	echo "<form method='post' action='deleteRoutine.php'>";
	echo "<input type='text' value='$key' name='deleteRoutid' style='display:none'>"
	echo "<input type='submit' value='Delete Routine' name='deleteRoutine'>";// style='visibility:hidden'>"
	echo "</form>";
}

session_write_close();
?>
<form method="post" action="addRoutine.php">
	<input type="text" class="edits" name="newRoutine" style="visibility:hidden">
	<input type="submit" value="Add Routine" name="submitRoutine" style="visibility:hidden">
</form>
<?php
//foreach ($routineid as $value) {
//	echo $value;
//}
//foreach ($routReal as $key => $value) {
//	echo "<h3>" . $key . " " . $value . "</h3>";
//}
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