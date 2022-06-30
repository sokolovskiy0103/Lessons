<?php

include_once('model/articles.php');
require_once('model/logs.php');

$err = false;
$id = $_GET['id'];
$article = getOneArticle($id);
hasArticle($article);

$title = $article['title'];
$content = $article['content'];

addLog();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($title !== "" && $content !== "") {
        editArticle($id,$title, $content,1);
        header("Location: article.php?id=$id");
        exit();
    } else $err = true;
}
?>

<form method="post">
    <label>
        Title <input type="text" value="<?= $title ?>" name="title" placeholder="Title">
    </label><br>
    <label>
        Content <input type="text" value="<?= $content ?>" name="content" placeholder="Content">
    </label>
    <button>OK</button>
</form>
<?php if ($err === true): ?>
    <h1>Error</h1>
<?php endif ?>
<hr>
<a href="index.php">Move to main page</a>