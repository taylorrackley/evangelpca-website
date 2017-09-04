<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, username, name FROM admin ORDER BY username DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
			<tr>
                <td>'.$row['username'].'</td>
                <td>'.$row['name'].'</td>
                <td class="table_date"><button type="button" class="btn btn-danger delete_admin" value="'.$row['id'].'">Delete Admin</button></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' Admins found in '.$duration.' seconds.');

?>
