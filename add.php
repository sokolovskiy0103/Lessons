<?php

require_once('model/articles.php');
require_once('model/logs.php');


addLog();
$err = false;
$title = "";
$content = "";
$id_cat = "";
$cats = getCats();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id_cat = $_POST['id_cat'];

    if ($title !== "" && $content !== "" && $id_cat !== "") {
        addArticle($title, $content, $id_cat);
        $last_id = dbLastId();
        header("Location: article.php?id=$last_id");
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
    <br>
    <label> Category
        <SELECT name="id_cat">
            <?php
            foreach ($cats as $cat) {
                echo "<option value=\"$cat[id_cat]\" ";
                if ($id_cat == $cat['id_cat']) echo "selected";
                echo "> $cat[title]</option>";
            }
             ?>
        </SELECT>
    </label>

    <button>OK</button>
</form>
<?php if ($err === true) echo "<h1>Error</h1>"; ?>
<hr>
<a href="index.php">Move to main page</a>