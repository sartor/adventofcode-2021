<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$prev = reset($lines);
$result = 0;

foreach (array_slice($lines, 1) as $cur) {
    if ($cur > $prev) {
        $result++;
    }

    $prev = $cur;
}

echo $result;
