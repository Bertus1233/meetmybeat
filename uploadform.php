<!DOCTYPE html>
<?php
session_start(); //als men is ingelogd gaat de sessie verder

include ('headerRuben.php');
include ('meetmybeatfunctie.php');
if($_SESSION) {
?>
<html>
    <head>
	 <title>Upload Formulier</title>
    </head>
    <body>
<h2><span>Upload jouw creatie:</span></h2>

<form action="uploadform.php" method="post" enctype="multipart/form-data">
<fieldset><legend>Vul in</legend>
<input type="file" name="audio_file"/><br/>
<input type="text" name="naam" placeholder="Geef je Beat een naam!"><br/>
<label>Kies de prijs in €:</label>
<input type = "number" name = "prijs" maxlength = "3" value = "1" ></br>
<label>Kies je Genre:</label>
<input type="text" name="genre" placeholder="Geef mij een genre!"><br/>
<input type="text" name="description" size="60" placeholder= "Geef een korte descriptie."></br>
<input type="submit" value="Upload Audio" name="save_audio"/>
<input type="reset" value="Leegmaken">
</fieldset>
</form>

<?php

if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Audio")
{
 $dir='x/';
$audio_file=$dir.basename($_FILES['audio_file']['name']);
		
		$naam = mysqli_real_escape_string($db, $_POST["naam"]);
		$prijs = mysqli_real_escape_string($db, $_POST["prijs"]);
		$genre = mysqli_real_escape_string($db, $_POST["genre"]);
		$description = mysqli_real_escape_string($db, $_POST["description"]);
		
		function saveAudio($audio_file, $naam, $prijs, $genre, $description)
	{
		$conn=mysqli_connect('localhost','root','','projectdatabase');
		if(!$conn)
		{
			die ('server not connected');
		}

		
		$query="INSERT INTO music(audio_file, naam, prijs, genre, description) VALUES('{$audio_file}', '$naam','$prijs','$genre','$description')";
		mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0)
		{
			echo"Deze bestanden zijn nu in de database opgeslagen.";
			echo(" De volgende gegevens zijn ingevoerd:<br />");
			echo("Naam Beat: <b>".$naam."</b><br>");
			echo("Prijs: <b> ".$prijs."</b></br>");
			echo("Genre: <b> ".$genre."</b><br>");
			echo("Descriptie: <b> ".$description. "</b><br>");

		}
		mysqli_close($conn);
	
	}
	
	
	function displayAudios()
{
		$conn=mysqli_connect('localhost','root','','projectdatabase');
		if(!$conn)
		{
			die ('server not connected');
		}
		$query="SELECT * FROM music";
		
		$r=mysqli_query($conn,$query);
		
		echo "<h2>Deze samples zijn reeds toegevoegd:</h2>"."</br>"."<b>(klik om af te spelen)</b>"."</br>";
		
		while($row=mysqli_fetch_array($r))
		{	
			echo '<a href="play.php?audio_file='.$row['audio_file'].'">'.$row['naam'].'</a>';
			echo "<br/>";
		}
		mysqli_close($conn);
}

if(move_uploaded_file($_FILES['audio_file']['tmp_name'],$audio_file))
{
	echo 'Het uploaden ging goed.'."</br>";
	
	saveAudio($audio_file, $naam, $prijs, $genre, $description);
	
	displayAudios();
}



}
?>
<h4><a href="uploadtabel.php">NAAR BEAT LIJST</a></h4>

<?php
} else {
	?>
U moet ingelogd zijn om deze pagina te kunnen zien.
<form action="login.php">
  <input type="submit" name="login" value="login">
</form>
<?php }
include ('footer.php');
?>
</body>
</html>



