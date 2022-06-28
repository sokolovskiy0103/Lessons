<?php

	include_once('model/articles.php');
	$articles = getArticles();

	$id = (int)($_GET['id'] ?? '');
	$post = $articles[$id] ?? null;
	$hasPost = ($post !== null);
    addLog();
?>
<div class="content">
    <?php if($hasPost): ?>
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
			<hr>
			<a href="delete.php?id=<?=$id?>">Remove</a>
            <hr>
            <a href="edit.php?id=<?=$id?>">Edit</a>
		</div>
    <?php else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>
