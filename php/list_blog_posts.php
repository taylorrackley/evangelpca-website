<?php

    include('includes/connect.php');

    $stmt = $db->prepare('SELECT COUNT(*) FROM blog');
    $stmt->execute();

    $total = $stmt->fetchColumn();
    $limit = 10;
    $pages = ceil($total / $limit);
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page > $pages){
            header('location: blog.php');
        }
    } else {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;
    $backPage = $page-1;
    $nextPage = $page+1;

    $stmt = $db->prepare("SELECT id, author, title, summary, post_date FROM blog ORDER BY post_date DESC LIMIT $limit OFFSET $offset");
    $stmt->execute();

    while($row = $stmt->fetch()){

        $date = DateTime::createFromFormat('Y-m-d', $row['post_date']);
        $date = $date->format('F Y');

        echo '
        <div class="post-preview">
            <a href="post.php?id='.$row['id'].'">
                <h2 class="post-title">
                    '.$row['title'].'
                </h2>
                <h3 class="post-subtitle">
                    '.$row['summary'].'
                </h3>
            </a>
            <p class="post-meta">Posted by <a href="#">'.$row['author'] .'</a> on '.$date.'</p>
        </div>
        <hr>
        ';
    }

    if($page < $pages){
        $next = '
        <li class="next">
            <a href="blog.php?page='.$nextPage.'">Older Blog Posts &rarr;</a>
        </li>';
    } else {
        $next = '';
    }
    if($page > 1){
        $back = '
        <li class="previous">
            <a href="blog.php?page='.$backPage.'">&larr; Newer Blog Posts</a>
        </li>';
    } else {
        $back = '';
    }


?>