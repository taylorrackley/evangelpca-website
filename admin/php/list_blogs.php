<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, author, title, summary, post_date FROM blog ORDER BY post_date DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
			<tr>
                <td>'.$row['title'].'</td>
                <td>'.$row['author'].'</td>
                <td>'.$row['summary'].'</td>
                <td class="table_date">'.$row['post_date'].'</td>
                <td class="table_date"><a href="blog_edit.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' blogs found in '.$duration.' seconds.');

?>