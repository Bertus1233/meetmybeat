<?php
session_start();

if($_SESSION) {
include "headerhome.php";
} else {
	include "headerhome2.php";
}

?>








<?php


echo "In de muziekindustrie komt het vaak voor dat producenten en/of componisten van stukken muziek niet betaald worden voor hun werk of inbreng in een muziekproduct. Vaak ontstaan deze problemen door een gebrek aan documentatie waarin staat vastgelegd wie waarvoor verantwoordelijk is. Dit kan variëren van een klein stuk in een muziekstuk of complete instrumentele samenstelling. Het leek ons een goed idee om een platform te ontwikkelen wat er voor zorgt dat muziekproducenten eerlijk betaald krijgen voor hun werk. De site moet een plek worden waarop muziek producenten hun werk kunnen aanbieden voor een zelf vastgestelde prijs.  We willen dat je op de site je eigen producties kunt uploaden voor de verkoop maar ook dat je producties van andere producenten/componisten kunt kopen";


include "footer2.php";

?>