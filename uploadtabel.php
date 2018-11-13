<html>
<body>

<?php
include ('meetmybeatfunctie.php');
include ('headerRuben.php');
?>
<table border="5" width="50%" cellpadding="5" cellspacing="3">
<tr>
	<th colspan="6"><h2> Beat lijst: </h2></th>
</tr>
<tr> <td><b>Bestand Naam</b></td> <td><b>Beat Naam</b></td> <td><b>Prijs (€)</b></td> <td><b>Genre</b></td> <td><b>Descriptie</b></td> <td><b>Actie</b></td> </tr>

<?php
$query = "SELECT * FROM music";
$result = mysqli_query($db, $query) or die('Error querying
database.');


while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['audio_file'] . "</td>";
echo "<td>".'<a href="play.php?audio_file='.$row['audio_file'].'">'.$row['naam'].'</a>'."</td>";
echo "<td>" . $row['prijs'] . "</td>";
echo "<td>" . $row['genre'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td> <a href=\"beat_verwijderen.php?audio_file=".$row['audio_file']."\">
Verwijder</a> </br> <a href=\"beat_kopen.php?audio_file=".$row['audio_file']."\">
Koop</a> </td>";
echo "</tr>";
}
echo "</table>";
?>

<p>Click op de <b>Beat zijn Naam</b> om hem af te spelen!</br>
<h4><a href="reviewtabel.php">BEKIJK DE LAATSTE REVIEWS</a></h4>
<h4><a href="uploadform.php">UPLOAD JOUW CREATIE</a></h4><p>

<?php
include ('footer.php');
?>
</body>
</html>