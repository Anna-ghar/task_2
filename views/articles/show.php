<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Articles</title>
    <link rel="stylesheet" href="../views/css/show.css">
</head>
<body>
<form method="post">
<div class="container">
    <h1>Articles</h1>

    <a href="../public/index.php?route=create" class="createArticle">Create Article</a>

    <ul>
        <?php session_start(); ?>
        <?php foreach ($articles as $article): ?>
            <li>
                <h2><?php echo $article['name'] . ' --- ' . $_SESSION['username']; ?></h2>
                <p><?php echo $article['content']; ?></p>
                <p class="created-at">Created at: <?php echo $article['date']; ?></p>
                <a href="<?php echo  "../public/index.php?route=delete&id={$article["id"]}" ?>">Delete</a>
                <a href="<?php echo "../public/index.php?route=view&id={$article['id']}" ?>">View</a>
            </li>
        <?php endforeach; ?>
    </ul>
    </form>
    <?php

    for ($i=1; $i<=$totalPages; $i++) {
        echo "<a href='index.php?route=show&page=$i'>$i</a> ";
    };
    ?>
</div>

</body>
</html>
