<?php   include 'header2.php';  
		include 'dbconnect.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{  
?>
<h2> Maak een categorie aan </h2>
<form method="post" action="">
    *verplicht veld<br><br>
	Naam catagorie*: <input type="text" name="cat_name" /><span class="error"></span><br><br>
    Beschrijving*: <textarea name="cat_description" /></textarea><span class="error"></span><br><br>
    <input type="submit" value="Verstuur" />
 </form>
 
 
<?php }
		$required = array('cat_name', 'cat_description');


		$error = false;
		foreach($required as $field) {
		if (empty($_POST[$field])) {
		$error = true;
	}
  }
		if ($error) {
		echo "Je moet beide velden invullen.";
		}else{
	
	//Form post hierboven hier saven we het
    $sql = "INSERT INTO categories (cat_name, cat_description)
			VALUES ('".$_POST["cat_name"]."','".$_POST["cat_description"]."')";
	

    
	if(mysqli_query($db, $sql))
    {
        //standaard error bericht
       echo 'Nieuwe catagorie is aangemaakt.<a href="cat_overzicht.php">Ga naar categorie overzicht</a>';
    }
    else
    {
		  echo 'Error' . mysqli_error($db);
    }
}

include 'footer2.php'
?>