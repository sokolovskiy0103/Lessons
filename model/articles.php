<?php

require_once "db.php";
require_once "cats.php";


function getArticles(): array
{
    $sql = "SELECT * FROM articles";
    return dbQuery($sql)->fetchAll();
}

function getOneArticle($id): ?array
{
    $sql = "SELECT * FROM articles WHERE id_article = :id";
    $params = ['id' => $id];
    $query = dbQuery($sql, $params)->fetch();
    if ($query === false) $query = null;
    return  $query;
}

function addArticle(string $title, string $content, int $id_cat): PDOStatement
{

    $sql = "INSERT articles (title, content, id_cat) VALUES (:title, :content, :id_cat)";
    $fields = ["title" => $title, "content" => $content, "id_cat" => $id_cat];
    return dbQuery($sql, $fields);

}

function removeArticle(int $id): bool
{
    $sql = "DELETE FROM articles WHERE id_article= :id";
    $params = ['id' => $id];
    dbQuery($sql, $params);
    return true;
}

function editArticle(int $id, string $title, string $content, $id_cat): bool
{
    $sql = "UPDATE articles SET title = :title, content = :content, id_cat = :id_cat WHERE id_article = :id_article";
    $fields = ["title" => $title, "content" => $content, "id_cat" => $id_cat, "id_article" => $id];
    dbQuery($sql, $fields);
    return true;
}

function hasArticle($article): bool
{
    if ($article === null) {
        header("Location: 404.php");
        exit();
    }
    return true;
}





