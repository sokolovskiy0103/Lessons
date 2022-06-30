<?php
	include_once('model/articles.php');
    require_once('model/logs.php');

	$id = (int)($_GET['id'] ?? '');
    $article = getOneArticle($id);
    hasArticle($article);
    addLog();

?>

<div class="content">
		<div class="article">
			<h1><?=$article['title']?></h1>
			<div><?=$article['content']?></div>
			<hr>
			<a href="delete.php?id=<?=$id?>">Remove</a>
            <hr>
            <a href="edit.php?id=<?=$id?>">Edit</a>
		</div>
</div>
<hr>
<a href="index.php">Move to main page</a>
