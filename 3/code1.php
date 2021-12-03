<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$len = strlen(reset($lines));
$g = str_repeat('0', $len);
$depth = 0;
$ones = array_fill(0, $len, 0);
$zeros = $ones;

foreach ($lines as $l) {
    foreach (str_split($l) as $i => $v) {
        if ($v === '0') {
            $zeros[$i]++;
        } else {
            $ones[$i]++;
        }
    }
}

$gamma = array_fill(0, $len, 0);
$eps = $gamma;
foreach ($ones as $i => $o) {
    $gamma[$i] = $ones[$i] > $zeros[$i] ? 1 : 0;
    $eps[$i] = $ones[$i] < $zeros[$i] ? 1 : 0;
}

$gamma = implode('', $gamma);
$eps = implode('', $eps);

echo $gamma . "\n";
echo $eps . "\n";

echo bindec($gamma) * bindec($eps) . "\n";
