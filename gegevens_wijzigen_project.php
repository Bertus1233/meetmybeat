<?php session_start(); //als men is ingelogd gaat de sessie verder
?> 

<!doctype html>
<html>
<head>
</head>
<body>
<?php include 'databaseproject.php';
include 'headerRob.php';


if($_SESSION) {
?>

<fieldset style="max-width:60px">rol: <?php echo $_SESSION["rol"]?></fieldset><fieldset style="max-width:60px">Gebruiker: <?php echo $_SESSION["username"]?></fieldset><br/><br/>
<?php

//de php code die aanpast staat hier boven aan, zodat als men het wijzigt het meteen op het scherm is te zien

if(isset($_POST['submit'])){

//voor controlles weer variabelen gemaakt
$user_exp = '/[^a-z0-9 ]+/i';
$string_exp = "/^[A-Za-z .'-]+$/";



if($_SESSION["first_name"] != $_POST['voornaam']) {
		if(!empty($_POST['voornaam'])) {
			$voornaam = mysqli_real_escape_string($db, $_POST['voornaam']);

			if(!preg_match($string_exp,$voornaam)) {
				echo "De voornaam die u heeft ingevoerd heeft invalide karakters.<br/>";
				
					} else {
						$query2 = "UPDATE user SET first_name = '$voornaam' WHERE email = '".$_SESSION["email"]."'";
						$result = mysqli_query($db, $query2) or die ("In de database is iets fout gegaan bij het aanpassen van uw voornaam.<br/>");
							
							if($result) {
								echo "Uw voornaam is succesvol aangepast.<br/>";
								$_SESSION["first_name"] = $voornaam;
							}
					}
			}
}
//weer controle of het anders eerst dan wat het eerst was
if($_SESSION["last_name"] != $_POST['achternaam']) {
	if(!empty($_POST['achternaam'])){
	$achternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
	
		if(!preg_match($string_exp,$achternaam)) {
		echo "De achternaam die u heeft ingevoerd heeft invalide karakters.<br/>";
	} else {
	
	$query3 = "UPDATE user SET last_name = '$achternaam' WHERE email = '".$_SESSION["email"]."'";
	$result = mysqli_query($db, $query3) or die ("In de database is iets fout gegaan bij het aanpassen van uw achternaam.<br/>");
	if($result) {
			echo "Uw achternaam is succesvol aangepast.<br/>";
			$_SESSION["last_name"] = $achternaam;
	}
	}
	}
}

if($_SESSION["description"] != $_POST['beschrijving']) {
	
	$beschrijving = mysqli_real_escape_string($db, $_POST['beschrijving']);

	$query4 = "UPDATE user SET description = '$beschrijving' WHERE email = '".$_SESSION["email"]."'";
	$result = mysqli_query($db, $query4) or die ("In de database is iets fout gegaan bij het aanpassen van uw beschrijving.<br/>");
	if($result) {
		echo "Uw beschrijving is succesvol aangepast";
		$_SESSION["description"] = $beschrijving;
	}
}
}

?>

<form method="post">
<fieldset style="max-width:50%">
<legend>Gegevens aanpassen:</legend>
<table width="1000px">
<tr><td valign="top">Pas voornaam aan: </td><td valign="top"><input type="text" name="voornaam" value="<?php echo $_SESSION["first_name"]?>"></td></tr>
<tr><td valign="top">Pas achternaam aan: </td><td valign="top"><input type="text" name="achternaam" value="<?php echo $_SESSION["last_name"]?>"></td></tr>
<tr><td valign="top">Pas beschrijving aan:</td><td valign="top"><textarea name="beschrijving" cols="50" rows="10"><?php echo $_SESSION["description"]?></textarea></td></tr>
<tr><td valign="top"><input type="submit" name="submit" value="Aanpassingen voltooien"></td></tr>
</table>
</fieldset>
</form>


<form action="logged_out.php" method="POST">
  <input type="submit" name="loguit" value="loguit">
</form>
<?php } else {
	?>
U moet ingelogd zijn om deze pagina te kunnen zien.
<form action="login.php">
  <input type="submit" name="login" value="login">
</form>

<?php }
include 'footer2.php'; ?>
</body>
</html>