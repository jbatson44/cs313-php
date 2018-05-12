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
<?php
function confirm() {
  if ($_POST["submit"] == 'Confirm') {
    echo "<h3>Your purchase has been completed</h3>";
  }
  else {
    echo "<h3>Your purchase has been canceled</h3>";
  } 
}

confirm();
?>

	</body>
</html>