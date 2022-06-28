<?php

include_once('model/articles.php');
$articles = getArticles();
$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);
addLog();

if ($hasPost) {
    removeArticle($id);
    echo "Article is deleted";
} else echo "ERROR";
?>

<hr>
<a href="index.php">Move to main page</a>