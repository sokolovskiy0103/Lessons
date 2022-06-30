<?php

function dbConnect()
{
    static $db;
    if ($db === null)
    {
        $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "root",[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    return $db;

}

function dbQuery(string $sql, array $params = []) : PDOStatement{
    $db = dbConnect();
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $query;
}

function dbCheckError(PDOStatement $query) : bool{
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }

    return true;
}

function dbLastId(): string
{
    $db = dbConnect();
    return $db->lastInsertId();
}


