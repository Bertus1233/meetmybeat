<?php 
session_start();


  session_unset();
  session_destroy();
  echo "uitgelogd.<br/>";
  echo "<a href=\"login.php\">Terug naar inlogpagina<a>";


?>