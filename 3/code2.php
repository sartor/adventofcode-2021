<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$len = strlen(reset($lines));
$g = str_repeat('0', $len);

$oxy = [];
$co2 = [];

function filter(array $lines, int $i, bool $mostOrLeast) {
    $ones = 0;
    $zeroes = 0;
    foreach ($lines as $l) {
        if (str_split($l)[$i] === '0') {
            $zeroes++;
        } else {
            $ones++;
        }
    }

    $most = (string) (int) ($ones >= $zeroes xor $mostOrLeast);

    return array_filter($lines, static fn($l) => str_split($l)[$i] === $most);
}

$oxyLines = $lines;
foreach (range(0, $len) as $i) {
    $oxyLines = filter($oxyLines, $i, true);

    echo count($oxyLines) . "\n";

    if (count($oxyLines) === 1) {
        $oxyLines = reset($oxyLines);
        break;
    }
}

$co2Lines = $lines;
foreach (range(0, $len) as $i) {
    $co2Lines = filter($co2Lines, $i, false);

    if (count($co2Lines) === 1) {
        $co2Lines = reset($co2Lines);
        break;
    }
}

echo $co2Lines . "\n";
echo $oxyLines . "\n";

echo bindec($co2Lines) * bindec($oxyLines) . "\n";
