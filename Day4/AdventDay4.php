<?php

$_fp = fopen( $argv[1] ?? "day4input.txt", "r");

$card = $part1 = $part2 = 0;
$counts = [];

while (!feof($_fp))
{
    $line = preg_replace("/\s{2,}/", " ", trim(fgets($_fp)));
    $line = explode(": ", $line)[1];

    list($nums, $play) = explode(" | ", $line);
    $wins = array_intersect(explode(" ", $play), explode(" ", $nums));

    $card++;
    $counts[$card] = ($counts[$card] ?? 0) + 1;

    if (!empty($wins))
    {
        $part1 += pow(2,count($wins)-1);
        for ($i = $card+1; $i <= $card+count($wins); $i++)
            $counts[$i] = ($counts[$i] ?? 0) + $counts[$card];
    }
}
$part2 = array_sum($counts);

echo "part 1: {$part1}\n";
echo "part 2: {$part2}\n";