<!DOCTYPE html>
<html>
<body>

<?php


include 'databaseproject.php'; //connectie naar database
include 'headerRob.php'
//query
$query1 = "SELECT * FROM contactform WHERE id='".$_GET['id']."'";

	$result = mysqli_query($db, $query1) or die ('query mislukt');
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			echo "<h3>Verwijder dit record?</h3>" . "<p/>";
			echo "<table>";
			echo "<tr><td>id</td><td>".$row['id']."</td></tr>";
			echo "<tr><td>email</td><td>".$row['email']."</td></tr>";
			echo "<tr><td>Voornaam</td><td>".$row['first_name']."</td></tr>";
			echo "<tr><td>Achternaam</td><td>".$row['last_name']."</td></tr>";
			echo "<tr><td>Datum</td><td>".$row['date']."</td></tr>";
			echo "<tr><td>Bericht</td><td width='500px'>".$row['question']."</td></tr>";
		echo "</table><p><hr>";}
	}
 ?>
	<form method="post">
	<input type="hidden" name="confirmation" value="1">
	<input type="hidden" name="id" value="<?php echo($_GET['id']);?>">
				<input type="submit" value="verwijderen">
	<input type="Button" value="niet verwijderen" onclick="window.location.href='http://localhost/testsite/project/contact_form_overzicht.php'">
	</form><?php
//de verwijdering wordt voltooid
if(isset($_POST["confirmation"])){
	$query2 = "DELETE FROM contactform WHERE id ='".$_POST['id']."'";
	$result = mysqli_query($db, $query2) or die (mysqli_error());
	echo("Het volgende commando is uitgevoerd: <b>$query2</><br>\n");
	if($result){
		echo("Het contactformulier met id ".$_POST['id']." is verwijderd.<p>\n");
		
?>
<form>
<input type="button" value="Terug naar overzicht" onclick="window.location.href='http://localhost/testsite/project/contact_form_overzicht.php'"/>
</form>
<?php
}}include 'footer2.php';
	?>




</body>
</html>