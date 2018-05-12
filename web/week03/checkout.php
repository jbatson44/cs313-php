<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checkout</title>
		<script type="text/javascript" src="shopScript.js"></script>
	</head>
	<body>
		<h1>Checkout</h1>
		<form method="post" action="confirmation.php">
			<div id="cityName">
            City: <br>
            <input oninput="validateCity()" type="text" name="city"><span style="color:red"> * </span>
            <span class="city" style="color:red">Don't leave blank</span>
          </div>
          <div id="stateid">
            State: <br>
            <input oninput="validateState()" type="text" name="state" maxlength="2">
            <span style="color:red">* </span>
            <span class="sta" style="color:red">Not a state</span><br>
          </div>
          <div id="billAddress">
            Billing address: <br>
            <input oninput="validateAddress()" type="text" name="address">
            <span style="color:red">* </span>
            <span class="address" style="color:red">Don't leave blank</span>
          </div>
          <div id="zipCode">
            Zip or postal code: <br>
            <input oninput="validateZip()" 
                   type="text" name="zip">
            <span style="color:red">* </span>
            <span class="zip" style="color:red">Invalid</span>
          </div>
		  <input type='submit' name='submit' value='Confirm'>
          <input type='submit' name='submit' value='Cancel'>
		</form>
	</body>
</html>