<?php

	// your functions may be here


	function getArticles() : array{
		return json_decode(file_get_contents('db/articles.json'), true);
	}

	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}

	function editArticle(int $id, string $title, string $content): bool
    {
        $articles = getArticles();
        if(isset($articles[$id])){
            $articles[$id] = [
                'id' => $id,
                'title' => $title,
                'content' => $content
            ];
            saveArticles($articles);
            return true;
        }
        return true;
    }

    function addLog()
    {
        $time = date("H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $_SERVER['REQUEST_URI'];
        $refUrl = $_SERVER['HTTP_REFERER']??"direct";
        $logName = "logs/" . date("Y-m-d"). ".txt";
        $str = "$time | $ip |  $url | $refUrl\n";
        file_put_contents($logName,$str,FILE_APPEND);
    }

    function getLogList():array
    {
        $list = scandir("logs");
        return  array_filter($list, callback: fn($file) => is_file("logs/$file"));
    }

