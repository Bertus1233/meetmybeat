<?php include 'headerDZ.php';?>
<form method="post" action="DabaseconnectVisitors.php">
    <fieldset>
        <legend><h2>Welkom bij MeetMyBeat!</h2></legend>
        Vul voor uw en onze veiligheid uw bezoekgegevens in:<br><br>

        Naam bezoeker:<br>
        <input type="text" name="visitor_lastname" required>  <br>

        Datum van bezoek:<br>
        <input type="date" name="visite_date" required> <br>

        Tijd van aankomst:<br>
        <input type="time" name="visit_time" required> <br>

        Verwachte duur van bezoek:<br>
        <input type="time" name="visite_length" step="any" required> <br>

        Vertegenwoordigd bedrijf:<br>
        <input type="text" name="from_company" required> <br>

       <br><br>

        <input type="submit" value="Bezoek toevoegen">
        <input name="reset" type="reset" value="Leegmaken">
    </fieldset>
</form>
<?php include 'footerDZ.php';?>