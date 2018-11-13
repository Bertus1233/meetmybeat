<!DOCTYPE html>
<html>
<body>

<?php
session_start();
include 'databaseproject.php';
include 'headerRob.php';

if($_SESSION) {
	if($_SESSION['rol'] == 'admin') {
?>
<table border="1" width="80%" align="left">
<tr>
<td colspan="100"><h2 align="center">Overzicht users</h2></td>
</tr>
<tr><th>Gebruikersnaam</th><th>Email</th><th>Voornaam</th><th>Achternaam</th><th>Wachtwoord</th><th>Beschrijving</th><th>Rol</th><th>Actie</th></tr>
<?php
//query voor het ophalen van de gegevens
$query = "SELECT email, username, first_name, last_name, password, description, rol
FROM user
";
$result = mysqli_query($db, $query) or die('Error querying
database.');

//alle gegevens worden op het scherm weergegeven met nog een extra functie om gegevens aan te passen
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td><p align='center'>". $row['username']."</p></td>";
echo "<td><p align='center'>". $row['email']."</p></td>";
echo "<td><p align ='center'>". $row['first_name']."</p></td>";
echo "<td><p align ='center'>". $row['last_name']."</p></td>";
echo "<td><p align ='center'>". $row['password'] ."</p></td>";
echo "<td><p align ='center'>". $row['description']."</p></td>";
echo "<td><p align ='center'>". $row['rol']."</p></td>";
echo ("<td><a href=\"user_wijzigen.php?username=".$row['username']."\"><p align ='center'>wijzigen</p></a></td>");
echo "</tr>";
$i++;
}
echo "</table>";



mysqli_free_result($result);

mysqli_close($db);
} else { echo "U moet als admin ingelogd zijn om deze pagina te kunnen zien"; }
}	else {?>
	U moet als admin ingelogd zijn om deze pagina te kunnen zien.
<form action="login.php">
  <input type="submit" name="login" value="login">
</form>
<?php ;}
include 'footer2.php';
?>


</body>
</html>