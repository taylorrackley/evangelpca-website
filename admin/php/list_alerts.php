<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, end_date FROM alerts ORDER BY end_date DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
			<tr>
                <td>'.$row['end_date'].'</td>
                <td class="table_date"><a href="alert_edit.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' Alerts found in '.$duration.' seconds.');

?>
