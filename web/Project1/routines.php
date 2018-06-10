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
	$_SESSION['sex'] = $row['sex'];
	$_SESSION['age'] = $row['age'];
}

$statement = $db->prepare("SELECT * FROM routines FULL OUTER JOIN users WHERE routines.userid = '{$_SESSION['userid']}'");
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
echo "<div class='middle'><div class='info'>";	
echo "<b>User Information</b><br><br>";
echo "Age: " . $_SESSION['age'] . "<br>";
echo "Sex: " . $_SESSION['sex'] . "<br>";
echo "Height: " . $_SESSION['heightfeet'] . "'" . $_SESSION['heightinch'] . "\"<br>";
echo "Weight: " . $_SESSION['weight'] . " lbs<br></div>";
	//echo "Userid: " . $_SESSION['userid'];
echo "<a href='login.php' style='float:right'>Logout</a>";
echo "<div class='routines'>";
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
			<form method="post" action="addRoutine.php">
				<input type="text" class="edits" name="newRoutine" style="visibility:hidden">
				<input type="submit" class="edits" value="Add Routine" name="submitRoutine" style="visibility:hidden">
			</form>
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
		if ($key == $newArray[$i][2]) {
			echo "<tr><td>" . $newArray[$i][0] . "</td><td><form method='post' action='deleteExercise.php'>
	 <input type='text' value='" . $newArray[$i][1] . "' name='deleteExid[". $i ."]' style='display:none'>
	 <input type='text' value='" . $i . "' name='delEx' style='display:none'>
	 <input type='submit' class='deletions' value='Delete Exercise' name='deleteExercise'>
	 </form></td>";
	 /* Input statements for exercise stats
	 echo "<td><form method='post' action='addstats.php'>Weight: <input type='number' name='weight' min='1' max='2000'><br>
	 Sets: <input type='number' name='set' min='1' max='99'><br> Reps: <input type='number' name='rep' min='1' max='99'><br>";
	 echo "<input type='text' value='" . $i . "' name='exId' style='display:none'>";
	 echo "<input type='submit' value='Add Stats'></form></td></tr>"; */
		}
	}
	//echo "</ul>";
	echo "</table>";
	
	echo "<form method='post' action='deleteRoutine.php'>";
	echo "<input type='text' value='" . $key . "' name='deleteRoutid' style='display:none'>";
	echo "<input type='submit' class='deletions' value='Delete Routine' name='deleteRoutine' onclick='deleteRoutines()'>";
	echo "</form><br>";

	echo "<form method='post' action='addExercise.php'>";
	echo "<input type='text' value='" . $key . "' name='addExRoutid' style='display:none'>";
	echo "<input type='text' name='addExName[". $key ."]'>";
	echo "<input type='submit' class='additions' value='Add Exercise' name='addExercise[]'>"; //style='visibility:hidden'
	echo "</form><br></div>";
}

session_write_close();
?>		
		</div>
<?php
echo "</div>";
?>
		
	</body>
</html>