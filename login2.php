<?php  session_start(); 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; //alleen als er een wachtwoord is toegepast
$dbname = "projectdatabase"; //naam van de database 
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}
?>
    <form  method="POST" align="center">

      <h3 >gebruikersnaam: </h3>
      <input  type="text" name="username" required > <br>
      <input type="hidden" name="tijd" value="<?php echo date('l jS \of F Y h:i:s A') ?>">
      <br>

      <h3 > wachtwoord: </h3>  
      <input type="password" name="password" required><br><br>
      <input type="submit" name="submitee" value="login">

    </form> 
      
<?php
// Database connectie met localhost

if (isset($_POST['submitee'])){
  /*if (!isset($_POST['gebruikersnaam']) or !isset($_POST['$wachtwoord'])) {
   echo "Vul alle velden in";
  }
  */


 $username = mysqli_real_escape_string($db, $_POST['username']); 
   $wachtwoord = mysqli_real_escape_string($db, $_POST['password']);
  $query = "SELECT * FROM user WHERE username ='$username'AND PASSWORD='$wachtwoord' "; 
  $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
  if (mysqli_num_rows($result) > 0){// gebruikersnaam gevonden, registreer gegevens in session 
    $_SESSION["ingelogd"]=true; //auth controleert of een klant is ingelogd
    $_SESSION["timeout"]=time() + 120; 
    $_SESSION["tijd"] = $_POST['tijd'];
    $_SESSION["username"] = $_POST['username'];
   while($row = mysqli_fetch_assoc($result)) { 
      $rol = $row['rol']; 
	  $first_name = $row['first_name'];
	  $last_name = $row['last_name'];
	  $email = $row['email'];
	  $description = $row['description'];
   }
	$_SESSION["description"] = $description;
	$_SESSION["last_name"] = $last_name;
	$_SESSION["rol"] = $rol;
	$_SESSION["email"] = $email;
	$_SESSION["first_name"] = $first_name;
     if(($rol) == "admin") {
       header("Location:gegevens_wijzigen_project.php");
       $_SESSION["gebruiker"]="admin";
        exit(); 
   
     }
        elseif(($rol =="user")) { 
          header("Location:gegevens_wijzigen_project.php");
          $_SESSION["gebruiker"]="user";
        } 
  }else{
    echo "<p align='center'> Uw wachtwoord/gebruikersnaam is niet correct!</p>";
  } 
}  
  



?>

<form method="POST">
  <input type="submit" name="loguit" value="loguit">
</form>
<?php 
if (isset($_POST['loguit'])) {
  session_unset();
  session_destroy();
  echo "klaar";
}

 
?>