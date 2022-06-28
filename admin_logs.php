<?php


$list = scandir("logs");
$files = array_filter($list, callback: fn($file) => is_file("logs/$file"));


foreach ($files as $file)
    echo "<a href='?log=$file'>$file</a><br>";

echo "<hr>";



$file = $_GET['log']??"";
if ($file) {
$file=file("logs/$file");
    echo "<pre>";
    foreach ($file as $line) {
        if (preg_match("#[']|%27#",$line))
        {
            echo "<b style='color: red'>$line</b>";
        }
            else
            {
                echo "$line";
            }


    }


}


