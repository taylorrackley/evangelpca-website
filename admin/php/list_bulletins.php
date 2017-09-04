<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, bulletin_date FROM bulletins ORDER BY bulletin_date DESC");
	$stmt->execute();

	$date = Date('Y-m-d');

	while($row = $stmt->fetch()){
		echo '
			<tr>
                <td>'.$row['bulletin_date'].'</td>
				<td class="table_date">
					<a href="bulletin_edit.php?id='.$row['id'].'">
						<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
					</a>
				</td>
            </tr>
		';

	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' bulletins found in '.$duration.' seconds.');

?>
