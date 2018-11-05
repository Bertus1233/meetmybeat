<!DOCTYPE html>
<html>
    <head>
        <title>Review Formulier</title>
    </head>
    <body>
<?php
include ('headerRuben.php');
?>
<h1><span>Laat een review achter:</span></h1>

<form method="post" action="reviewform.php">
    <fieldset><legend>Review deze Beat</legend>
Naam Beat:
<input type="text" name="audio_file" placeholder="Wat is de naam van de Beat"><br/>
Rating:
<input type="radio" name="rating" value="5"> 5 ster
<input type="radio" name="rating" value="4"> 4 ster
<input type="radio" name="rating" value="3"> 3 ster
<input type="radio" name="rating" value="2"> 2 ster
<input type="radio" name="rating" value="1"> 1 ster</br>
Review<textarea name="review" rows="8" cols="40" placeholder="Wat denk je over deze tune?"></textarea></br></br>
<input type="submit" name="Submit" id="Submit" value="Stuur Review"/><input type="reset" value="Leegmaken"></p>
</fieldset>
</form>

<?php
include ('meetmybeatfunctie.php');


if(isset($_POST['Submit']))
{

$audio_file = mysqli_real_escape_string($db, $_POST["audio_file"]);
$rating = mysqli_real_escape_string($db, $_POST["rating"]);
$review = mysqli_real_escape_string($db, $_POST["review"]);

$query = "INSERT INTO reviews(audio_file, rating, review)";
$query .="VALUES ('$audio_file','$rating','$review')";

$controle = mysqli_query($db,$query);

if ($controle == TRUE) {

echo("De volgende gegevens zijn ingevoerd:<br />");
echo("Naam Beat: <b> ".$audio_file."</b><br>");
echo("Rating: <b> ".$rating." ster</b><br>");
echo("Review: <b>".$review."</b><br>");
}
else{
die("Foutje geconstateerd.");
}


}

?>
<h4><a href="reviewtabel.php">KIJK NAAR BEAT REVIEWS</a></h4><p>
<h4><a href="uploadtabel.php">NAAR BEAT LIJST</a></h4>
<?php
include ('footer.php');
?>
	</body>
</html>