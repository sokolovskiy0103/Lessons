<?php
	require_once ('model/articles.php');
    require_once('model/logs.php');

    $articles = getArticles();

   addLog()
?>

<a href="add.php">Add article</a>
<hr>
<div class="articles">
    <?php foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="article.php?id=<?=$article['id_article']?>">Read more</a>
		</div>
    <?php endforeach; ?>
</div>
