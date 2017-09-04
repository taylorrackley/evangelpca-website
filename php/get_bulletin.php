<?php

    function get_current_bulletin(){
        include('includes/connect.php');
        $stmt = $db->prepare("SELECT pdf_link, pdf_inserts_link FROM bulletins ORDER BY bulletin_date DESC Limit 1");
        $stmt->execute();
        while($row = $stmt->fetch()){
            $result['bulletin_link'] = $row['pdf_link'];
            $result['inserts_link'] = $row['pdf_inserts_link'];
        }
        return $result;
    }


?>
