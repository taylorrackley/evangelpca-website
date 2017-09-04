<?php

    include('includes/connect.php');
    $stmt = $db->prepare("SELECT * FROM alerts ORDER BY id DESC");
    $stmt->execute();

    $alerts = '';
    $date = date('Y-m-d');

    while($row = $stmt->fetch()){
        if($row['end_date'] >= $date){
            $alerts .= '<div class="alert alert-danger" style="text-align:center;">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><br>
                            '.$row['message'].'
                        </div>';
            }
    }
    echo($alerts);


 ?>
