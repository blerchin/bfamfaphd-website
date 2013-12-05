
<?php
filter_var_array($_POST, FILTER_SANITIZE_STRING);
if(!empty($_POST["email"])){
	$userdata = $_POST["name"] . ", " 
	. $_POST["email"] . ", " . $_POST["inschool"] . ", " . $_POST["as"]
	. ", " . $_POST["bfa"] . ", "
	. $_POST["mfa"] . ", " . $_POST["phd"]
	. ", " . $_POST["self-taught"] . ", " .$_POST["apprenticeship"]
	. ", " . $_POST["alt"] . ", " . $_POST["ndg"]
	. ", " . $_POST["zipcode"] . "\n";
	//echo $userdata;

	$addresses = fopen('../addresses-v2.csv','a');
	$status = fwrite($addresses, $userdata);
	fclose($addresses);
	if ($status == FALSE) {
		echo "Sorry, your registration didn't go through. Try again or e-mail 
			info@bfamfaphd.com to request an invitation.";
	} else {
		echo "<p class='small confirmation'>Thanks! Mark your calendar and we'll be in touch.</p>";
	}
} else if(isset($_POST["email"])) {
	echo "<p class='small confirmation'>We can't add you to the list without 
		an email! Please enter your email address and re-submit the form.</p>";
}

?>
					<form action="#rsvp" method="post">
						<dl>
							<dt>Name:</dt><dd><input type="text" name="name"></dd>
							<dt>Email:*</dt><dd><input type="text" name="email"></dd>
							<dt>Do you have a degree?</dt>
							<dd>
								<input type="checkbox" name="inschool" value="x">currently in school</input>
								<input type="checkbox" name="as" value="x">Associates</input>
								<input type="checkbox" name="bfa" value="x">BFA</input>
								<input type="checkbox" name="mfa" value="x">MFA</input>
								<input type="checkbox" name="phd" value="x">PhD</input>
<br />
								<input type="checkbox" name="self-taught" value="x">self-taught</input>
								<input type="checkbox" name="apprenticeship" value="x">apprenticeship</input>
								<input type="checkbox" name="alt" value="x">alternative 
								school</input>
								<br />
								<input type="checkbox" name="ndg" value="x">non-degree-granting school</input>
							</dd>
							<dt>Current Zip / Postal Code:</dt>
							<dd><input type="text" name="zipcode"></input></dd>

							<dt><input type="submit" value="Join" name="Join"></input></dt>
						</dl>
						
					</form>
