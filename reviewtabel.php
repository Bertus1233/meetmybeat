<!DOCTYPE html>
<html>
    <head>

<?php
include ('meetmybeatfunctie.php');
include ('headerRuben.php');
?>
<table border="5" width="50%" cellpadding="5" cellspacing="3">
<tr>
	<th colspan="4"><h2> Overzicht Beat Reviews </h2></th>
</tr>
<tr> <td><b>Naam Beat</b></td> <td><b>Rating</b></td> <td><b>Review</b></td></tr>

<?php
$query = "SELECT * FROM reviews";
$result = mysqli_query($db, $query) or die('Error querying
database.');


while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['audio_file'] . "</td>";
echo "<td>" . $row['rating'] . "</td>";
echo "<td>" . $row['review'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>
</br>
<h4><a href="reviewform.php">LAAT ZELF OOK EEN REVIEW ACHTER</a></h4><p>
<h4><a href="uploadtabel.php">NAAR BEAT LIJST</a></h4>
<?php
include ('footer.php');
?>
	</body>
</html>