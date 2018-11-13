<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include 'databaseproject.php'; //een link naar de database wordt via dit bestand gemaakt
include 'headerRob.php';
?>

<form method="post">
<fieldset>
<legend>Contactform:</legend>
<table width="450px">
<tr><td valign="top">E-mail *</td><td valign="top"><input type="text" name="email"></td></tr>
<tr><td valign="top">First name *</td><td valign="top"><input type="text" name="first_name"></td></tr>
<tr><td valign="top">Last name *</td><td valign="top"><input type="text" name="last_name"></td></tr>
<tr><td valign="top">Message *</td><td valign="top"><textarea name="message" cols="25" rows="6"></textarea></td></tr>
<tr><td valign="top"><input type="submit" value="Send"></td></tr>
</table>
</fieldset>
</form>




<?php
if(isset($_POST['email'])) {
	//een functie die het script stopt en een bericht geeft wat er fout gaat
	function died($error) {
		echo $error . "<br/>";
		die();
	}
	//als iets niet is ingevuld
  if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
	//hier wordt van de ingevoerde waarden een variabele gemaakt
	$email_from = mysqli_real_escape_string($db, $_POST['email']);
	$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
	$message = mysqli_real_escape_string($db, $_POST['message']);

	$error_message = "";
	//dit zijn variabelen die later worden gebruikt voor het controlleren van ingevoerde waarden
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$string_exp = "/^[A-Za-z .'-]+$/";
	//de controlles van de ingevoerde waarden
	if(!preg_match($email_exp,$email_from)) {
		$error_message .= 'The Email you entered does not appear to be valid.<br/>';
	}
	
 if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered does not appear to be valid.<br />';
  }
 //als error_message minimaal 1 character heeft wordt er laten zien wat er fout is
  if(strlen($error_message) > 0) {
    died($error_message);
  } else {

		$query = "INSERT INTO contactform (email, first_name, last_name, question, date) VALUES ('$email_from', '$first_name', '$last_name', '$message', now())";
	
	mysqli_query($db, $query) or die ('Error querying database');
	
	echo "Het berich is succesvol verstuurd";
}
}
//de database wordt gesloten

mysqli_close($db);

include 'footer2.php';
?>
</br></br>
<a href="contact_form_overzicht.php">Overzicht contactformulieren</a>
</body>
</html>