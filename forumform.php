<?php
include 'dbconnect.php';
include 'header2.php';
 
echo '<h2>Maak onderwerp aan</h2>* verplicht veld' . "</br></br>";
     
	if($_SERVER['REQUEST_METHOD'] != 'POST'){   
   
        $sql = "SELECT
                    cat_id,
                    cat_name,
                    cat_description
                FROM
                    categories";
         
        $result = mysqli_query($db, $sql);
         
        if(!$result)
        {
            echo 'Error while selecting from database. Please try again later.';
	   }else{
         
                echo '<form method="post" action="">
                    Onderwerp*: <input type="text" name="topic_subject" /><br><br>
                    Categorie:'; 
                 
                echo '<select name="topic_cat">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select>'."<br>"."<br>"; 
                     
                echo 'Bericht*: <textarea name="post_content" /></textarea><br><br>
                    <input type="submit" value="Onderwerp aanmaken" />
                 </form>';
            }
        }
    		 $required = array('topic_subject', 'post_content');


		$error = false;
		foreach($required as $field) {
		if (empty($_POST[$field])) {
		$error = true;
	}
  }
		if ($error) {
		echo "Je moet beide velden invullen.";
		}else{
    
        //Begin van de transaction
        $query  = "BEGIN WORK;";
        $result = mysqli_query($db, $query);
         
        if(!$result)
        {
            //query fout
            echo 'Error bij het aanmaken van onderwerp.';
        }
        else
        {
     
            //de form is gepost en gechecked nu opslaan
            $sql = "INSERT INTO 
                        topics(topic_subject,
                               topic_date,
                               topic_cat)
                               
                   VALUES ('". ($_POST["topic_subject"]) ."', NOW(), '" . ($_POST['topic_cat']) ."')";
                      
            $result = mysqli_query($db, $sql);
            if(!$result)
            {
                echo 'Error bij het opslaan van het onderwerp probeer opnieuw.' . mysqli_error($db);
                $sql = "ROLLBACK;";
                $result = mysqli_query($db, $sql);
            }
            else
            {
                //De eerste insert werkt nu de 2e met het ID van de topic
               
                 $topicid = mysqli_insert_id($db);
                $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
								  post_topic
                                 )
                                  
                        VALUES
                            ('" . ($_POST['post_content']) . "',  NOW(), '$topicid')";
                                
                $result = mysqli_query($db, $sql);
                 
                if(!$result)
                {
                    echo 'Error bij invoegen van de post probeer opnieuw.' . mysqli_error($db);
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($db, $sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($db, $sql);
                                     
                    echo 'Je hebt een nieuw <a href="topic.php?id=">onderwerp</a>.';
                }
            }
        }
    }

 
include 'footer2.php';
?>