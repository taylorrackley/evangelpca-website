<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id,  title, details, fee, start_date, end_date FROM events ORDER BY start_date DESC");
	$stmt->execute();

	$date = Date('Y-m-d');

	while($row = $stmt->fetch()){

		if($row['end_date'] > $date){
			$enabled = '<div class="btn btn-success" style="height:25px;width:25px;cursor:default;"></div>';
		} else {
			$enabled = '<div class="btn btn-danger" style="height:25px;width:25px;cursor:default;"></div>';
		}

		echo '
			<tr>
                <td>'.$row['title'].'</td>
                <td>'.$row['fee'].'</td>
                <td>'.$row['details'].'</td>
                <td class="table_date">'.$row['start_date'].'</td>
				<td class="table_date">'.$row['end_date'].'</td>
                <td class="table_date"><a href="event_edit.php?id='.$row['id'].'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
                <td>'.$enabled.'</td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' events found in '.$duration.' seconds.');

?>
