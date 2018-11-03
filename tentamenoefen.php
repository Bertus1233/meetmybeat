<h3>Opdracht 1</h3>
<?php

	$stoppen=rand(0,10);
	$begin=0;
	while($begin <= $stoppen){
		echo $begin . " ";
		$begin=$begin+1;
	}
	
	echo "<br>";
	
	for($b=0; $b<=$stoppen; $b=$b+1){
		echo $b . " ";
	}	
?>

<h3>Opdracht 2</h3>
<div align="center">
<?php
$x=7;
$bands=array("Mission","Reigning Sound","Slow Readers Club","War on Drugs","Strand of Oaks","Madrugada");
rsort($bands);
foreach($bands as $b){
	$x--;
	echo "<h$x>$b is a great band<br></h$x>";
	}
	
?>
</div>



<?php
// de gewenste uitvoer is gecentreerd en maakt gebruik van de verschillende headers h1 tm h6
// <h3>Tekst 1</h3>
// de bovenste regel in uitvoer hoort bij <h6>
// de laatste regel in uitvoer hoort bij <h1>
// in for loop begin je dus met hoogste waarde


//de namen in de array zetten
$namen = array("Mission","Reigning Sound","Slow Readers Club","War on Drugs","Strand of Oaks","Madrugada");

//de namen op alfabetische volgorde zetten
sort($namen);

?>
<html>
<body>
<?php
//de namen een voor een op het scherm zetten
for ($i=count($namen); $i>0; $i--){
?>
    <h<?php echo($i);?> align="center"> <?php echo $namen[$i-1]. " is a great band"; ?></h<?php echo($i);?>>
<?php
}
?>
</body>
</html>






























