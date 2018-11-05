<!DOCTYPE html>
<html>
<?php
include ('headerRuben.php');
?>
<h1>Speel af!</h1>
<body>
<audio controls>
<source src="<?php echo $_GET['audio_file']; ?>" type="audio/ogg">
<source src="<?php echo $_GET['audio_file']; ?>" type="audio/mpeg">
</audio><p>

<?php
include ('meetmybeatfunctie.php');

$query = "SELECT * FROM music WHERE audio_file='" .$_GET["audio_file"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
	
echo "<h3>Details over deze Beat:</h3>" . "<p />";
echo "<table>";
echo "<tr><td>Bestand Naam:</td><td> " . $row["audio_file"]. "</td></tr> ";
echo "<tr><td>Naam:</td><td> ".$row["naam"]. "</td></tr> " ;
echo "<tr><td>Prijs (€):</td><td> ".$row["prijs"]. "</td></tr> " ;
echo "<tr><td>Genre:</td><td> ". $row["genre"] ."</td></tr>";
echo "<tr><td>Descriptie:</td><td> ". $row["description"] ."</td></tr>";
echo "</table><p><hr>"; }
}

?>

<a href="uploadtabel.php">NAAR BEAT LIJST</a>

<?php
include ('footer.php');
?>

</body>
</html>