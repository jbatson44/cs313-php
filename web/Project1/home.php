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
?>


<table>
	<tr>
		<th>Exercises</th>
	</tr>
<?php

$statement = $db->prepare("SELECT exercise FROM exercises");
$statement->execute();
// Go through each result

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr><td>" . $row['exercise'] . "</td></tr>";
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	
}
?>
</table>
