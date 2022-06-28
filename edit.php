<?php

include_once('model/articles.php');
$articles = getArticles();

$err = false;
$id = $_GET['id'];

$title = $articles[$id]['title'];
$content = $articles[$id]['content'];
$message = "";
addLog();


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($title !== "" && $content !== "") {
        editArticle($id,$title, $content);
        $message = "Job is done";
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
<?php elseif ($message !== ""): ?>
    <h1><?= $message ?></h1>
<?php endif ?>
<hr>
<a href="index.php">Move to main page</a>