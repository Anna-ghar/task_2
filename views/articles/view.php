<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>View</title>
    <link rel="stylesheet" href="../views/css/view.css">
</head>
<body>

<?php session_start(); ?>

    <div class="container">
        <h2><?php echo $article['name'] . ' --- ' . $_SESSION['username']; ?></h2>
        <p><?php echo $article['content']; ?></p>
        <p class="created-at">Created at: <?php echo $article['date']; ?></p>
        <a href="<?php echo  "../public/index.php?route=delete&id={$article["id"]}" ?>">Delete</a>
        <a href="<?php echo  "../public/index.php?route=update&id={$article["id"]}" ?>">Update</a>
    </div>

</body>
</html>
