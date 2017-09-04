<?php

	include('includes/connect.php');

	$stmt = $db->prepare("SELECT id, name, job_title, summary, image_link FROM leaders ORDER BY name ASC");
	$stmt->execute();

	while($row = $stmt->fetch()){

		echo '
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="'.$row['image_link'].'" alt="Evangel Presbyterian Elder or Deacon">
            <h3>'.$row['name'].'
                <small>'.$row['job_title'].'</small>
            </h3>
            <p>'.$row['summary'].'</p>
        </div>
		';
	}

?>
