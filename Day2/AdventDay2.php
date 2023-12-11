<?php
// max number at any given  time is 12 REd 13 Green 14 Blue
//have to parse the data for each game
// $input = file_get_contents('testinputday2.txt');

// $games = explode("\n", trim($input));

// $possibleGames = array_filter($games, function ($game) {
//     preg_match_all('/(((?<count>\d+) (?<color>\w+)+),?);?/', $game, $matches);
//     foreach($matches['color'] as $index => $color) {
//         if ($matches['count'][$index] > match ($color) {
//             'red' => 12,
//             'green' => 13,
//             'blue' => 14,
//         }) {
//             return false;
//         }
//     }
//     return true;
// });

// $sumOfIds = array_reduce($possibleGames, function ($carry, $game) {
//     preg_match('/^Game (?<id>\d+)/', $game, $matches);
//     return $carry + $matches['id'];
// });

// echo $sumOfIds;
$lines = explode("\r\n", trim(file_get_contents('day2input.txt')));

//print_r($lines);

$maximums = array ( 'red'=>12, 'green'=>13,'blue'=>14);

$sum1 = 0;
$sum2= 0;
foreach ($lines as $line) {
	$line = trim(substr($line,5));
	$line = str_replace([',',';',':'],['','',''],$line);
	$maxline = array ( 'red'=>0, 'green'=>0,'blue'=>0);
	$valid=true;
	$parts = explode(' ',$line);
	$number = intval($parts[0]);
	foreach ($parts as $idx=>$part) {
		if (($part=='red') || ($part=='green') || ($part=='blue')) {
			$value = intval($parts[$idx-1]);
			if ($value>$maximums[$part]) $valid=false;
			if ($value>$maxline[$part]) $maxline[$part]=$value;
		}
	}
	//echo $number."::".$line."::".( $valid==true ? "true" : "false" ).":: maxs= ".serialize($maxline)."\n";
	if ($valid==true) $sum1 += $number;
	$sum2 += $maxline['red']*$maxline['green']*$maxline['blue'];
}
echo "part 1 = $sum1\n";
echo "part 2 = $sum2\n";