<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, name, job_title, summary FROM leaders ORDER BY name DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
			<tr>
                <td>'.$row['name'].'</td>
                <td>'.$row['job_title'].'</td>
                <td>'.$row['summary'].'</td>
                <td class="table_date"><a href="leader_edit.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' Church Leaders found in '.$duration.' seconds.');

?>