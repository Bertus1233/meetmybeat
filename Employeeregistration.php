<?php include 'headerDZ.php';?>
<form method="post" action="DaBaseConnect.php" inc>
    <fieldset>
        <legend><h2>Werknemer registreren:</h2></legend>

        Voornaam:<br>
        <input type="text" name="first_name" required>  <br>

        Achternaam:<br>
        <input type="text" name="last_name" required>  <br>

        Geboortedatum:<br>
        <input type="date" name="birth_date" required> <br>

        Functie:<br>
        <input type="text" name="functie" required> <br>

        Datum van intreding:<br>
        <input type="date" name="hire_date" required> <br>

        Salaris (euro per uur):<br>
        <input type="number" step="any" name="salaris" required> <br>

        Geslacht: <br>
        <select name="gender" required>
            <option value="M">Man</option>
            <option value="F">Vrouw</option>

        </select><br><br>


        <input type="submit" value="Registreren">
        <input name="reset" type="reset" value="Leegmaken">
    </fieldset>
</form>
<?php include 'footerDZ.php'; ?>

