<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Teach03</title>
  
	</head>

	<body>
<?php
$name= $_POST["name"];
$email= $_POST["email"];
$major= $_POST["major"];
$comments= $_POST["comments"];
$places=$_POST["country"];

echo("Your name: $name <br> Your email: <a href= \"mailto:$email\">$email</a> <br> Your major: $major <br><br> Additional comments: $comments <br><br> You have visited:<br>");


if(!empty($_POST['country'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['country'] as $selected){
echo $selected."</br>";}}


?>



	</body>
</html>