<!DOCTYPE html>
<html>
<body>

<?php

include 'databaseproject.php'; //connecting naar de database
include 'headerRob.php'
?>
<table border="1" width="80%" align="left">
<tr>
<td colspan="100"><h2 align="center">Overzicht verzonden contactformulieren</h2></td>
</tr>
<tr><th>id</th> <th>Email</th><th>Voornaam</th><th>Achternaam</th><th>Datum</th><th>Bericht</th><th>Actie</th></tr>
<?php
//de query voor het selecten van de gegevens
$query = "SELECT id, email, first_name, last_name, date, question
FROM contactform
";
$result = mysqli_query($db, $query) or die('Error querying
database.');
//hij laat alle gevonden gegevens zien op het scherm
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td><p align='center'>". $row['id']."</p></td>";
echo "<td><p align ='center'>". $row['email']."</p></td>";
echo "<td><p align ='center'>". $row['first_name']."</p></td>";
echo "<td><p align ='center'>". $row['last_name']."</p></td>";
echo "<td width='10%'><p align ='center'>". $row['date']."</p></td>";
echo "<td><p align ='center'>". $row['question']."</p></td>";
echo ("<td> <a href=\"contact_form_verwijderen.php?id=".$row['id']."\"><p align ='center'>Verwijder</p></a></td>");
echo "</tr>";
}
echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><a href=\"contact_form_project.php\"><p align ='center'>Naar contactformulier</p></a></tr></tr>";
echo "</table>";



mysqli_free_result($result);

mysqli_close($db);
include 'footer2.php';

?>


</body>
</html>