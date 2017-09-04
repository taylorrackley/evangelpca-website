<?php

	include('includes/connect.php');

	$stmt = $db->prepare('SELECT COUNT(*) FROM sermons');
	$stmt->execute();

	$total = $stmt->fetchColumn();
	$limit = 5;
	$pages = ceil($total / $limit);
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		if($page > $pages){
			header('location: audio.php');
		}
	} else {
		$page = 1;
	}

	$offset = ($page - 1) * $limit;
	$backPage = $page-1;
	$nextPage = $page+1;

	$stmt = $db->prepare("SELECT id, preacher, title, summary, series, post_date, nt_verse, ot_verse, audio_link FROM sermons ORDER BY post_date DESC LIMIT $limit OFFSET $offset");
	$stmt->execute();

	while($row = $stmt->fetch()){

		$date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
		$date = $date->format('F d,<br> Y');

		echo '
        <div class="home-item">

        	<div class="col-sm-3">
        		<h3 class="home-item-subtitle">'.$date.'</h3>
        	</div>
        	<div class="col-sm-9">
	            <h2 class="home-item-title">
	                '.$row['title'].'
	            </h2>
	            <h3 class="post-subtitle">
	             	'.$row['preacher'].' / '. $row['series'] .' <br> '. $row['nt_verse'] .' / '. $row['ot_verse'] .' <br> '. $row['summary'] .'
	            </h3>
	            <audio controls style="width: 90%">
								<source src="'.$row['audio_link'].'" type="audio/mpeg">
				  			Your browser does not support the audio element.
							</audio>
							<br>
							<a href="'.$row['audio_link'].'" download>Download</a>
					</div>
      </div>
      <hr style="margin-left:0px;width:70%">
		';
	}

	if($page < $pages){
		$next = '
		<li class="next">
        	<a href="audio.php?page='.$nextPage.'">Older Sermons &rarr;</a>
    	</li>';
	} else {
		$next = '';
	}
	if($page > 1){
		$back = '
		<li class="previous">
        	<a href="audio.php?page='.$backPage.'">&larr; Newer Sermons</a>
    	</li>';
	} else {
		$back = '';
	}


?>
