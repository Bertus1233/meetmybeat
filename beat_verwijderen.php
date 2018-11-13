<?php
include ('meetmybeatfunctie.php');

include ('headerRuben.php');

$query = "SELECT * FROM music WHERE audio_file='" .$_GET["audio_file"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {

	while($row = mysqli_fetch_assoc($result)) {
	
echo "<h3>Beat verwijderen</h3>" . "<p />";
echo "<table>";
echo "<tr><td>Bestand Naam:</td><td> " . $row["audio_file"]. "</td></tr> ";
echo "<tr><td>Naam:</td><td> ".$row["naam"]. "</td></tr> " ;
echo "<tr><td>Prijs (€):</td><td> ".$row["prijs"]. "</td></tr> " ;
echo "<tr><td>Genre:</td><td> ". $row["genre"] ."</td></tr>";
echo "<tr><td>Descriptie:</td><td> ". $row["description"] ."</td></tr>";
echo "</table><p><hr>";
	}
}

?>
<h3>Let op: weet je zeker dat je deze Beat wilt verwijderen?</h3>
<form method="POST">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="audio_file" value="<?php echo($_GET["audio_file"]);?>">
<input type="Submit" value="Verwijderen">
<input type="Button" value="Terug naar Beat lijst" onclick="window.location.href='http://localhost/testsite/project/uploadtabel.php'"/>
</form>

<?php
if (isset($_POST["confirmation"])){
$query="DELETE FROM music WHERE audio_file='" .$_POST["audio_file"] ."'";
$result = mysqli_query($db, $query) or die (mysqli_error());
echo("Het volgende commando is uitgevoerd: <b>$query</b><br>\n");
if ($result){
echo ("Bestand Naam " ."<b>".$_POST["audio_file"] ."</b>". " is verwijderd.<p>\n");
}}

include ('footer.php');
?>