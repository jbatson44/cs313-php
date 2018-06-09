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
	<div class="header">
<?php
$statement = $db->prepare("SELECT * FROM users WHERE username = '{$_SESSION['user']}'");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$_SESSION['userid'] = $row['id'];
	$_SESSION['heightfeet'] = $row['heightfeet'];
	$_SESSION['heightinch'] = $row['heightinch'];
	$_SESSION['weight'] = $row['weight'];
}

$statement = $db->prepare("SELECT * FROM routines WHERE userid = '{$_SESSION['userid']}'");
$statement->execute();
$routine = array();
$routineid = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$routid[] = $row['routineid'];
	$rout[] = $row['routine']; 
}

$routine = array_unique($rout);
$routineid = array_unique($routid);
$routReal = array_combine($routineid, $routine);


	//echo $_SESSION['user'];
echo "<h1 class='title'>User: " . $_SESSION['user'] . "</h1></div>";
echo "<div class='middle'>";	
echo "Height: " . $_SESSION['heightfeet'] . "'" . $_SESSION['heightinch'] . "\"<br>";
echo "Current weight: " . $_SESSION['weight'] . " lbs<br>";
	//echo "Userid: " . $_SESSION['userid'];
?>
			<h2>Routines</h2>
		
<?php

$statement = $db->prepare("SELECT * FROM exercises");
$statement->execute();
$exercises = array();
$exRoutid = array();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	$exercises[] = $row['exercise'];
	$exRoutid[] = $row['routineid'];
	$exid[] = $row['routineid'];
}

$exReal = array_combine($exercises, $exRoutid);
?>
<input type="button" name="edit" value="+" onclick="addRoutines()"/>
<input type="button" name="edit" value="-" onclick="deleteRoutines()"/>
<?php
$newArray = array();
for ($i = 0; $i < count($exercises); $i++) {
	$newArray[$i] = array($exercises[$i], $exid[$i], $exRoutid[$i]);
}

foreach ($routReal as $key => $value) {
	echo "<div class='routine'><h3>" . $value . "</h3>";
	//echo "<ul>";
	echo "<table>";
	for ($i = 0; $i < count($newArray); $i++) {
		if ($key == $newArray[$i][2])
			echo "<tr><td>" . $newArray[$i][0] . "</td><td><form method='post' action='deleteExercise.php'>
	 <input type='text' value='" . $newArray[$i][1] . "' name='deleteExid[]' style='display:none'>
	 <input type='submit' class='deletions' value='Delete Exercise' name='deleteExercise' onclick='deleteRoutines()'>
	 </form></td>" . "</tr>";
	}
	//echo "</ul>";
	echo "</table></div><br>";
	
	echo "<form method='post' action='deleteRoutine.php'>";
	echo "<input type='text' value='" . $key . "' name='deleteRoutid' style='display:none'>";
	echo "<input type='submit' class='deletions' value='Delete Routine' name='deleteRoutine' onclick='deleteRoutines()'>";// style='visibility:hidden'>"
	echo "</form>";
}

session_write_close();
?>
			<form method="post" action="addRoutine.php">
				<input type="text" class="edits" name="newRoutine" style="visibility:hidden">
				<input type="submit" class="edits" value="Add Routine" name="submitRoutine" style="visibility:hidden">
			</form>
		</div>
<?php

?>
		<div class="bottom">
		
		</div>
	</body>
</html>