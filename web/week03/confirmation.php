<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
		<script type="text/javascript" src="shopScript.js"></script>
	</head>
	<body>
	<h1>Confirmation</h1>
<?php
echo "Thing1 =" . $_SESSION['thing1'];
?>

	</body>
</html>