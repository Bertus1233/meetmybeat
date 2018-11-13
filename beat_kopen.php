<html>
<body>

<?php

include ('meetmybeatfunctie.php');

include ('headerRuben.php');

$query = "SELECT * FROM music WHERE audio_file='" .$_GET["audio_file"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0){

	while($row = mysqli_fetch_assoc($result)){
	
		echo "<h3>Beat kopen</h3>" . "<p />";
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
<h3>Let op: weet je zeker dat je deze Beat wilt kopen?</h3>
<form method="POST">
<input type="Submit" value="Ja, kopen">
<input type="Button" value="Nee, terug naar Beat lijst" onclick="window.location.href='http://localhost/testsite/project/uploadtabel.php'"/>
</form>

<?php
include ('footer.php');
?>

</body>
</html>
