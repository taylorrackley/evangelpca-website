<?php

    include('../includes/connect.php');

    $stmt = $db->prepare("SELECT id, author, title, summary, post_date, post FROM blog ORDER BY post_date DESC LIMIT 1");
    $stmt->execute();

    $result;

    while($row = $stmt->fetch()){

        $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
        $date = $date->format('F Y');

        $title = $row['title'];
        $author = $row['author'];
        $summary = $row['summary'];
        $post = $row['post'];

        $result = array('title' => $title, 'author' => $author, 'date' => $date, 'post' => $post);

    }

    echo json_encode($result, JSON_PRETTY_PRINT);

 ?>
