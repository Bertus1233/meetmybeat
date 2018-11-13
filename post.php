<?php

include "header2.php";
include "databaseproject.php";


$sql= "SELECT 
		 topic_id,
		 topic_subject
	  FROM
		topics
	  WHERE
		topics.topic_id = " . mysqli_real_escape_string($db, $_GET['id']);
		
$result = mysqli_query($db, $sql);

		while($row = mysqli_fetch_assoc($result)){
			
			echo '<table border="1">
              <tr>
                <th>' .$row['topic_subject'] . '</th>
				<th>Geplaatst op</th>
				<th>Door</th>
              </tr>'; 
		}
	
	$sql= "SELECT
			post_topic,
			post_content,
			post_date,
			post_by
		   FROM posts
		   WHERE post_topic = " . mysqli_real_escape_string($db, $_GET['id']);
		   
$result = mysqli_query($db, $sql);

		while($row = mysqli_fetch_assoc($result)){
			echo '<tr>';
				echo '<td class="leftpart">';
					echo $row['post_content'];
				echo '</td>';
				echo '<td class="rightpart">';
					echo $row['post_date'];
				echo '</td>';
				echo '<td>'.$row['post_by'].'</td>';
			echo '</tr>';
		}
?>
<h3>Antwoorden op onderwerp:</h3>
<form method="post" action="reply.php?id=<?php echo mysqli_real_escape_string($db, $_GET['id']); ?>">
    <textarea name="reply"></textarea>
    <input type="submit" value="Verzend" />
</form>



