<?php
function make_file()
{
    $urls = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
    $num = count($urls);
    $file = fopen('data.txt', "w");
    for ($i = 0; $i < 1000; $i++) {
        fwrite($file, $urls[rand(0, $num - 1)] . "\n");
    }
    fclose($file);
}

//make_file();

function get_result($filename, $num)
{
    $arr = [];
    $file = fopen($filename, 'r');
    while (!feof($file)) {
        $key = fgets($file);
        if ($key != "") {
            array_push($arr, $key);
        }
    }
    fclose($file);
    $counts = array_count_values($arr);
    $results = [];
    $keys = array_keys($counts);
    print_r($keys);
    for ($i = 0; $i < $num; $i++) {
        $key = $keys[0];
        foreach ($keys  as $k) {
            if ($counts["$k"] > $counts["$key"]) {
                $key = $k;
            }
        }
        $results["$key"] = $counts["$key"];
        unset($counts["$key"]);
    }
    print_r($results);
}

get_result('data.txt', 5);