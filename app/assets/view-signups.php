<html>
<head>
	<style>
		tr{
		}
		th, td {
			min-width: 50px;
			border-bottom: 1px solid #aaa;
			border-left: 1px solid #aaa;
		}
	</style>


</head>
<body>
	<?php
	filter_var_array($_POST, FILTER_SANITIZE_STRING);
		if( empty($_POST['password']) || $_POST['password'] !== "ArtistsUnit3"):
?>
	<form method="post">
	<p>Please enter your password:</p>
	<input name="password" type="password"/>
	</form>
<?php else: 
	
	$row = 1;
	echo "<table>";
	echo "<tr><th>Name</th><th>Email</th><th>In School</th><th>Associates</th>
		<th>BFA</th><th>MFA</th><th>PhD</th><th>Self-Taught</th>
		<th>Apprenticeship</th><th>Alt School</th><th>NDG School</th>
		<th>Zip/Postal</th><th>Freedom School</th></tr>";
	if (($handle = fopen("../addresses-v2.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					echo "<tr>";
					$num = count($data);
					$row++;
					for ($c=0; $c < $num; $c++) {
							echo "<td>" . $data[$c] . "</td>";
					}
					echo "</tr>";
			}
			fclose($handle);
	}
	echo "</table>";

	endif;
	?>
</body>
</html>
