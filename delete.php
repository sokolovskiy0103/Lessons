<?php

include_once('functions.php');
$articles = getArticles();
$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);

if ($hasPost) {
    removeArticle($id);
    echo "Article is deleted";
} else echo "ERROR";
?>

<hr>
<a href="index.php">Move to main page</a>