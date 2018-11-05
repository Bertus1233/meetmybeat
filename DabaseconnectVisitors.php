<?php
// Database connectie met localhost
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; //alleen als er een wachtwoord is toegepast
$dbname = "projectpo"; //naam van de database

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
    die("De verbinding met de database is mislukt: " .
        mysqli_connect_error() . " (" .
        mysqli_connect_errno() . ")" );
}

$visitor_lastname = mysqli_real_escape_string($db,$_POST['visitor_lastname']);
$visite_date = mysqli_real_escape_string($db, $_POST['visite_date']);
$visit_time = mysqli_real_escape_string($db, $_POST['visit_time']);
$visite_length = mysqli_real_escape_string($db, $_POST['visite_length']);
$from_company = mysqli_real_escape_string($db, $_POST['from_company']);


$sql = "INSERT INTO visitors (visitor_lastname, visite_date, visit_time, visite_length, from_company) 
VALUES ('$visitor_lastname', '$visite_date', '$visit_time', '$visite_length', '$from_company')";

if ($db->query($sql) === TRUE){
    echo "Uw bezoek is succesvol opgeslagen. Veel plezier bij MeetMyBeat!" . '<br>';
    echo '<a class="item" href="Visitorform.php">Klik hier om terug te gaan</a>';

}else{
    echo "Error" . $sql . "<br/>" . $db->error;
}
$db->close();

?>