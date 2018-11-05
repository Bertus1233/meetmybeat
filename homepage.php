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


<style>
.bord{

	width: 250px;
	height: 30px;
}
 
.ipv{
color:black;

}

.ntxt{
font-family: Lucida Sans Unicode;
color: black;

}

h2{
	font-family: Arial;
	color: white;
}	


.button {
    background-color: #3498DB; 
    border: black;
    color: white;
    padding: 14px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;

 
}

body{
	background-image: url("https://forums.unrealengine.com/filedata/fetch?id=1189160&d=1470406352");
	background-size: cover;
}

</style>
</head>
<body>
<?php  session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; //alleen als er een wachtwoord is toegepast
$dbname = "meetmybeatmusic"; //naam van de database 
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

?>

    
	

<br><br><div align="center">
<button  type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#dickie" >Log in</button>

</div>




<div class="modal fade" id="dickie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
	  
        <h5 class="modal-title" id="exampleModalLabel" align="center">Welkom</h5>
		<div id="wrapper">
    <div id="menu">
        <a class="item" href="uploadtabel.php">Beat Lijst</a> -
		<a class="item" href="reviewtabel.php">Reviews</a> -
		<a class="item" href="uploadtabel.php">Beat Uploaden</a>
		<a class="item" href="forumhome.php">Forum</a>
	
	</div>
        <div id="content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form  method="POST" align="center">

	<h3 class="ntxt">inlognaam: </h3>
	<input  type="text" name="gebruikersnaam" class="form-control"> <br>
	  <br>

	<h3 class="ntxt"> wachtwoord: </h3>  
	<input type="password" name="wachtwoord" class="form-control"><br><br>
	<input type="submit" name="submit" value="login" class="btn btn-primary">

</form> 
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>

 
  

					
<?php 

if (isset($_POST['submitee'])){
  if (!isset($_POST['gebruikersnaam'])) {
   echo "Vul gebruikersnaam in";
  }elseif (!isset($_POST['wachtwoord'])) {
    echo "Vul wachtwoord in";
  }else{

    $gebruiker = mysqli_real_escape_string($db, $_POST['gebruikersnaam']); 
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $query = "SELECT * FROM gebruikers WHERE USERNAME ='$gebruiker'AND PASSWORD='$wachtwoord ' "; 
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
    if (mysqli_num_rows($result) > 0){// gebruikersnaam gevonden, registreer gegevens in session 
      $_SESSION["ingelogd"]=true; //auth controleert of een klant is ingelogd
      $_SESSION["timeout"]=time() + 120; 
      $_SESSION["tijd"] = $_POST['tijd'];
      $_SESSION["naam"] = $_POST['gebruikersnaam'];
      while($row = mysqli_fetch_assoc($result)) { 
      $rol = $row['rol']; 
   }
      if(($rol) == "admin") {
       header("Location:tussenpagina.php");
       $_SESSION["gebruiker"]="admin";
       exit(); 
   
      }
        elseif(($rol =="user")) { 
          header("Location:tussenpagina.php");
          $_SESSION["gebruiker"]="user";
        } 
    } else{
    echo "<p align='center'> Uw wachtwoord/gebruikersnaam is niet correct!</p>";
      } 
  }  
}

if (isset($_POST['submitee'])){
  if (!isset($_POST['gebruikersnaam'])) {
   echo "Vul gebruikersnaam in";
  }elseif (!isset($_POST['wachtwoord'])) {
    echo "Vul wachtwoord in";
  }else{

    $gebruiker = mysqli_real_escape_string($db, $_POST['gebruikersnaam']); 
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $query = "SELECT * FROM gebruikers WHERE USERNAME ='$gebruiker'AND PASSWORD='$wachtwoord ' "; 
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
    if (mysqli_num_rows($result) > 0){// gebruikersnaam gevonden, registreer gegevens in session 
      $_SESSION["ingelogd"]=true; //auth controleert of een klant is ingelogd
      $_SESSION["timeout"]=time() + 120; 
      $_SESSION["naam"] = $_POST['gebruikersnaam'];
      while($row = mysqli_fetch_assoc($result)) { 
      $rol = $row['rol']; 
   }
      if(($rol) == "admin") {
       header("Location:tussenpagina.php");
       $_SESSION["gebruiker"]="admin";
       exit(); 
   
      }
        elseif(($rol =="user")) { 
          header("Location:tussenpagina.php");
          $_SESSION["gebruiker"]="user";
        } 
    } else{
    echo "<p align='center'> Uw wachtwoord/gebruikersnaam is niet correct!</p>";
      } 
  }  
}






 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
</body>
</html>
