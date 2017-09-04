<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, preacher, title, summary, series, post_date, nt_verse, ot_verse FROM sermons ORDER BY post_date DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
			<tr>
                <td>'.$row['title'].'</td>
                <td>'.$row['preacher'].'</td>
                <td>'.$row['summary'].'</td>
                <td>'.$row['series'].'</td>
                <td>'.$row['nt_verse'].'</td>
                <td>'.$row['ot_verse'].'</td>
                <td class="table_date">'.$row['post_date'].'</td>
                <td class="table_date"><a href="sermon_edit.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' sermons found in '.$duration.' seconds.');

?>