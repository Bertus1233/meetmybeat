<?php include 'headerDZ.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Overzicht medewerkers</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            color: black;
            font-family: monospace;
            font-size: 14px;

        }
        th{
            border-style: groove;
            background-color: darkgrey;
            color: ;
        }
        td{
            border-style: groove;
            color: black;
        }
        tr:nth-child(even) {background-color: gainsboro;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Bezoeknummer</th>
        <th>Naam bezoeker</th>
        <th>Datum bezoek</th>
        <th>Tijd van bezoek</th>
        <th>Duur van bezoek</th>
        <th>Vertegenwoordigd bedrijf</th>

    </tr>

    <?php
    $db = mysqli_connect("localhost", "root", "", "projectdatabase");
    if ($db->connect_error){
        die("Verbinding met database mislukt:". $db->connect_error);
    }

    $sql = "SELECT visite_id, visitor_lastname, visite_date, visit_time, visite_length, from_company FROM visitors";
    $result = $db->query($sql);

    if ($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><td align='center'>" . $row["visite_id"] .
                "</td><td align='center'>" . $row["visitor_lastname"] .
                "</td><td align='center'>" . $row["visite_date"] .
                "</td><td align='center'>" . $row["visit_time"] .
                "</td><td align='center'>" . $row["visite_length"] .
                "</td><td align='center'>" . $row["from_company"] .
                "</td></tr>";

        }
        echo "</table>";
    }
    else {
        echo "0 resultaten";
    }

    $db->close();

    ?>
    <br>
    <a class="item" href="Visitorform.php">Terug </a>
</table>
</body>
</html>
<?php include 'footerDZ.php';?>