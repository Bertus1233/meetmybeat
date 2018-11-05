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

$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
$birth_date = mysqli_real_escape_string($db, $_POST['birth_date']);
$hire_date = mysqli_real_escape_string($db, $_POST['hire_date']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$functie = mysqli_real_escape_string($db, $_POST['functie']);
$salaris = mysqli_real_escape_string($db, $_POST['salaris']);

$sql = "INSERT INTO employees (first_name, last_name, birth_date, hire_date, gender, functie, salaris) 
VALUES ('$first_name', '$last_name', '$birth_date', '$hire_date', '$gender', '$functie', '$salaris')";

if ($db->query($sql) === TRUE){
        echo "Werknemer succesvol opgeslagen in het register!" . '<br>';
        echo '<a href="Employees%20Form.php">Klik hier voor een werknemersoverzicht.</a>';
}else{
    echo "Error" . $sql . "<br/>" . $db->error;
}
$db->close();

?>