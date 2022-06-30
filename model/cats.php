<?php
function getCats(): array
{
    $sql = "SELECT * FROM cats";
    return dbQuery($sql)->fetchAll();
}