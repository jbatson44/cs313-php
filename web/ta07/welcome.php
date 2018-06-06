<?
session_start();
unset($_SESSION['user']);
if(isset($_SESSION['user'])) {
	echo "Welcome " . $_SESSION['user'];
} else {
	header("location: https://glacial-meadow-56606.herokuapp.com/ta07/signin.php");  
}

?>

