<?php

include "header2.php";
include "dbconnect.php";

$sql = "SELECT cat_id, cat_name, cat_description FROM categories";
 
$result = mysqli_query($db, $sql);

       
        echo '<table border="1">
              <tr>
                <th>categorieën</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="cat_enkel.php?id='.$row['cat_id'] .'">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
            echo '</tr>';
        }  
		
		 mysqli_free_result($result);
		 mysqli_close($db);
 
include "footer2.php";
?>