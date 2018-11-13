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
        <th>Dienstnummer</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Geboortedatum</th>
        <th>Datum van intreding</th>
        <th>Geslacht</th>
        <th>Functie</th>
        <th>Salaris(€ per uur)</th>
    </tr>
    <?php
    $db = mysqli_connect("localhost", "root", "", "projectdatabase");
    if ($db->connect_error){
        die("Verbinding met database mislukt:". $db->connect_error);
    }

    $sql = "SELECT emp_id, first_name, last_name, birth_date, hire_date, gender, functie, salaris FROM employees";
    $result = $db->query($sql);

    if ($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><td align='center'>" . $row["emp_id"] .
                "</td><td align='center'>" . $row["first_name"] .
                "</td><td align='center'>" . $row["last_name"] .
                "</td><td align='center'>" . $row["birth_date"] .
                "</td><td align='center'>" . $row["hire_date"] .
                "</td><td align='center'>" . $row["gender"] .
                "</td><td align='center'>" . $row["functie"] .
                "</td><td align='center'>" . $row["salaris"] .
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
    <a class="item" href="Employeeregistration.php">Terug</a>
</table>
</body>
</html>
<?php include 'footerDZ.php';?>