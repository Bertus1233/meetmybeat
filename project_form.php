<?php  session_start(); 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; //alleen als er een wachtwoord is toegepast
$dbname = "project2018"; //naam van de database 
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}
?>
<html>
<meta charset="utf-8">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
</head>
<body>
<!--begin code hier-->

<!--Replace the & character with &amp;
Replace the < character with &lt;
Replace the > character with &gt;  -->
<br><br><br>
<?php
// Database connectie met localhost
if (isset($_POST['submitee'])){
  
  $gebruiker = mysqli_real_escape_string($db, $_POST['gebruikersnaam']); 
   $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
  $query = "SELECT * FROM gebruikers WHERE USERNAME ='$gebruiker'AND PASSWORD='$wachtwoord ' "; 
  $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
  if (mysqli_num_rows($result) > 0){// gebruikersnaam gevonden, registreer gegevens in session 
    $_SESSION["ingelogd"]=true; //auth controleert of een klant is ingelogd
    $_SESSION["timeout"]=time() + 120; 
   while($row = mysqli_fetch_assoc($result)) { 
      $rol = $row['rol']; 
   }
     if(($rol) == "admin") {
       header("Location:infoveld.php");
       $_SESSION["gebruiker"]="admin";
        exit(); 
   
     }
        elseif(($rol =="user")) { 
          echo "je bent skeer haha";
          header("lol.php");
          $_SESSION["gebruiker"]="user";
        } 
  }else{
    echo "Uw wachtwoord/gebruikersnaam is niet correct!";
  } 
} 

?>
<div align="center">
<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loggie" >Log in</button>

</div>

<div class="modal fade" id="loggie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel" align="center">Welkom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form  method="POST" align="center">

  <h3 >inlognaam: </h3>
  <input  type="text" name="gebruikersnaam" class="form-control" required> <br>
    <br>

  <h3 class="ntxt"> wachtwoord: </h3>  
  <input type="password" name="wachtwoord" class="form-control" required><br><br>
  <input type="submit" name="submitee" value="login" class="btn btn-danger">

</form> 
      </div>
      <div class="modal-footer">
        <div align="center">
<button  type="button" class="btn btn-primary" data-toggle="collapse" data-target="#p12">Registreer</button>


      </div>
      
          <div id="p12" class="collapse" align="center"><br><br>
<form method="POST">
  <input  type="text" name="naam" class="form-control" placeholder="Voornaam"> <br><br>
  <input  type="text" name="email" class="form-control" placeholder="email"> <br><br>
  <input  type="text" name="achternaam" class="form-control" placeholder="Achternaam"> <br><br>
  <input  type="text" name="gebruikersnaam" class="form-control" placeholder="Gebruikersnaam"> <br><br>
  <input  type="text" name="wachtwoord" class="form-control" placeholder="wachtwoord"> <br><br>
  <input  type="text" name="wachtwoord1" class="form-control" placeholder="Wachtwoord opnieuw"> <br><br>

<input type="submit" name="regis" value="Registreer" class="btn btn-danger">



</form>

          </div>
      </div>

</div>
  </div>    
    </div>
<?php
if (isset($_POST['regis'])) {
  if ($_POST['wachtwoord'] == $_POST['wachtwoord1']) {
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $achternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $gebruikersnaam = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
      //username email password first_name last_name description
    $query = "INSERT INTO finaluser(gebruikersnaam, naam, achternaam, email, wachtwoord)";
    $query .="VALUES ('$gebruikersnaam','$naam', '$achternaam', '$email', '$wachtwoord')";
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));  
     echo "Uw account is succesvol aangemaakt";
  }
}

?>

</body>
<!--geen code hieronder-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
</body>
</html>