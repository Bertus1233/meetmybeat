<!DOCTYPE html>
<html>
<body>

<?php


include 'databaseproject.php';
include 'headerRob.php';

$query4 = "SELECT rol FROM user";

$result4 = mysqli_query($db, $query4) or die ('query fout');

$stringuser = "";
while($raw = mysqli_fetch_assoc($result4)) {
	$stringuser .= $raw['rol'];
}

 if (isset($_POST['confirmation'])){
	if($_POST['rol'] == 'user') {
		if(substr_count($stringuser, "admin") > 1) {

		$query = "UPDATE user SET 
				email = '".$_POST['email']."',
				first_name = '".$_POST['first_name']."',
				last_name = '".$_POST['last_name']."',
				description = '".$_POST['description']."',
				rol = '".$_POST['rol']."'
				WHERE username = '".$_POST['username']."'
				";
		$result = mysqli_query($db, $query) or die ('help');
	} else { echo "er moet 1 admin zijn";}
} else {
		$query = "UPDATE user SET 
				email = '".$_POST['email']."',
				first_name = '".$_POST['first_name']."',
				last_name = '".$_POST['last_name']."',
				description = '".$_POST['description']."',
				rol = '".$_POST['rol']."'
				WHERE username = '".$_POST['username']."'
				";
$result = mysqli_query($db, $query) or die ('help');
}}
$query1 = "SELECT * FROM user WHERE username='".$_GET['username']."'";

	$result = mysqli_query($db, $query1) or die ('query mislukt');
	if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$username = $row['username'];
		$email = $row['email'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$password = $row['password'];
		$description = $row['description'];
		$rol = $row['rol'];
	}
	}
	?>
	<h3>Gegevens wijzigen?</h3>
	<form method='post'>
	<input type='hidden' name='confirmation' value='1'>
	<input type='hidden' name='username' value='<?php echo($_GET['username']);?>'>
	<table>
	<tr><td>Email:</td><td><input type='text' name='email' value='<?php echo($email);?>'></td></tr>
	<tr><td>Voornaam:</td><td><input type='text' name='first_name' value='<?php echo($first_name);?>'></td></tr>
	<tr><td>Achternaam:</td><td><input type='text' name='last_name' value='<?php echo($last_name);?>'></td></tr>
	<tr><td>Beschrijving:</td><td><textarea name='description' cols="50" rows="10"><?php echo($description);?></textarea></td></tr>
	<tr><td>Rol:</td><td><input type='text' name='rol' value='<?php echo($rol);?>'></td></tr>
	</table>
	<hr>
	
	<input type='submit' value='Wijzigen'>
	<input type='button' value='Niet wijzigen' onclick="window.location.href='http://localhost/testsite/project/gegevens_overzicht.php'">
	</form>
	

<form>
<input type="button" value="Terug naar overzicht" onclick="window.location.href='http://localhost/testsite/project/gegevens_overzicht.php'"/>
</form>
<?php

	mysqli_free_result($result);

mysqli_close($db);

	include 'footer2.php';?>
	
</body>
</html>