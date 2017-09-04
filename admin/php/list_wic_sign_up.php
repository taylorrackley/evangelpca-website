<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, full_name, address, city, zip, email, phone, money FROM wic_sign_up ORDER BY full_name DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

        if($row['money'] == 'overnight-35'){
            $money = '<div class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></div>';
        } else {
            $money = '<div class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></div>';
        }

		echo '
			<tr>
                <td>'.$row['full_name'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['city'].'</td>
                <td>'.$row['zip'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$money.'</td>
				<td class="table_date"><button type="button" class="btn btn-danger delete_wic" value="'.$row['id'].'">Delete</button></td>
            </tr>
		';
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' WIC sign ups found in '.$duration.' seconds.');

?>
