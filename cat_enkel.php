<?php

include 'header2.php';
include 'databaseproject.php';

 
//Selecteer de categorie met $_GET['id']
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = " . mysqli_real_escape_string($db, $_GET['id']);
 
$result = mysqli_query($db, $sql);
 
if(!$result)
{
    echo 'De categorie kan niet worden weergegeven. ' . mysqli_error($db);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'Deze categorie bestaat niet.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Onderwerpen in de ′' . $row['cat_name'] . '′ categorie</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = " . mysqli_real_escape_string($db, $_GET['id']);
         
        $result = mysqli_query($db, $sql);
         
        if(!$result)
        {
            echo 'De onderwerpen kunnen niet worden weergegeven. ';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Er zijn geen onderwerpen in deze categorie.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Onderwerp</th>
                        <th>Aangemaakt op</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="post.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
?>