<?php

include_once('model/articles.php');
require_once('model/logs.php');

$id = (int)($_GET['id'] ?? '');
$article = getOneArticle($id);
hasArticle($article);

addLog();

removeArticle($id);
echo "Article is deleted";

?>

<hr>
<a href="index.php">Move to main page</a>