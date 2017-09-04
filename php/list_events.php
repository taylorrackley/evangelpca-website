<?php

	include('includes/connect.php');

	$stmt = $db->prepare("SELECT id, title, cordinator, details, start_date, start_time, end_time FROM events WHERE enabled = 1 ORDER BY start_date DESC");
	$stmt->execute();

	while($row = $stmt->fetch()){


		if( Date('Y-m-d') > $row['start_date']){
		 	$row['enabled'] = 0;
		 	$id = $row['id'];
		 	$stmt2 = $db->prepare("UPDATE events SET enabled = 0 WHERE id = '$id'");
		 	$stmt2->execute();
			continue;
		}

		$date = DateTime::createFromFormat("Y-m-d", $row['start_date']);
		$day = $date->format('d');
		$month = substr($date->format('F'),0,3);
		$year = $date->format('y');

		$start_time = date("g:i", strtotime($row['start_time']));
		$start_time_ampm = date("a", strtotime($row['start_time']));
		$end_time = date("g:i", strtotime($row['end_time']));
		$end_time_ampm = date("a", strtotime($row['end_time']));

		echo '
		<li>
			<time datetime="'.$row['start_date'].'">
				<span class="day">'.$day.'</span>
				<span class="month">'.$month.'</span>
			</time>
			<time>
				<span class="time" id="start_time">'.$start_time.'<span class="ampm">'.$start_time_ampm.'</span></span>
				<span class="time">'.$end_time.'<span class="ampm">'.$end_time_ampm.'</span></span>
			</time>

			<div class="info">
				<h2 class="title">'.$row['title'].'</h2>
				<p class="desc">'.$row['details'].'</p>
				<ul>
					<li>Event Cordinator: '.$row['cordinator'].'</li>
				</ul>
			</div>

		</li>
		';
	}

	if($stmt->rowCount() == 0){
		echo('<div style="width:100%;text-align:center;margin-bottom:150px;padding:35px;background-color:#cccccc;">
		    	There are currently no church events.
			</div>');
	}

?>
