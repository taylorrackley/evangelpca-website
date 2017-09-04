<?php

	include('includes/connect.php');

	$starttime = microtime(true);

	$stmt = $db->prepare("SELECT id, father_full_name, mother_full_name, father_phone, mother_phone, address, city, zip FROM vbs_families ORDER BY father_full_name DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){

        $id = $row['id'];

        $stmt2 = $db->prepare("SELECT id, child_name, completed_grade, comments FROM vbs_children WHERE family_id = '$id' ORDER BY child_name DESC");
    	$stmt2->execute();

	    while($row2 = $stmt2->fetch()){
    		echo '
    			<tr>
                    <td>'.$row['father_full_name'].'</td>
                    <td>'.$row['mother_full_name'].'</td>
                    <td>'.$row['father_phone'].'</td>
                    <td>'.$row['mother_phone'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['city'].'</td>
                    <td>'.$row['zip'].'</td>
                    <td>'.$row2['child_name'].'</td>
                    <td>'.$row2['completed_grade'].'</td>
                    <td>'.$row2['comments'].'</td>
    				<td class="table_date"><button type="button" class="btn btn-danger delete_vbs" value="'.$row2['id'].'">Delete</button></td>
                </tr>
    		';
        }
	}

	$endtime = microtime(true);
	$duration = round(($endtime - $starttime), 3);
	$row_count = $stmt->rowCount();

	array_push($alerts, $row_count.' VBS sign ups found in '.$duration.' seconds.');

?>
