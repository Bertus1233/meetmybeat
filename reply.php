
<?php
include "header2.php";
include "databaseproject.php";
session_start();
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //File direct oproepen moet niet mogen
    echo 'Je kan deze pagina niet direct oproepen.';
}else{
	
	$sql= "INSERT INTO posts (post_content,
							  post_date,
							  post_topic,
							  post_by)
							VALUES
							 ('" . $_POST['reply'] . "', NOW(), '" . mysqli_real_escape_string($db, $_GET['id']) . "', '" .mysqli_real_escape_string($db, $_SESSION['username']). "')";

$result = mysqli_query($db, $sql);


if(!$result){
	echo "Uw opmerking is niet opgeslagen probeer opnieuw.";
	echo "$sql";	
}else{
	
	echo 'Uw opmerking is opgeslagen <a href="post.php?id=' . htmlentities($_GET['id']) . '">Terug naar onderwerp</a>.';
	
	}
}


include "footer2.php";

?>