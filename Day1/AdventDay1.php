<?php
//part 1
$input = 'AdventDay1Input.txt';
$sum =  0;

$file=fopen($input, 'r');
while (($line = fgets($file)) !== false){

    preg_match_all('/\d/', $line, $matches);

    $firstNumber = $matches[0][0];
    $lastNumber = end($matches[0]);
    $combinedNumber = $firstNumber . $lastNumber;
    $sum +=(int)$combinedNumber;
}
fclose($file);
echo "Total Sum Part1: $sum\n";

//part 2
$path = 'testinput.txt';
$totsum = 0;
$filep2 = fopen($path,'r');

function TexttoNum($text){

    $text = strtolower($text);

    $numMap = [
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5,
        'six' => 6,
        'seven' => 7,
        'eight' => 8,
        'nine' => 9,

    ];

    return isset($numMap[$text]) ? $numMap[$text] : $text;
}

while(($line = fgets($filep2)) !== false){

    //convert to actual numbers here?
    $line = preg_replace_callback('/[a-zA-Z]+/', function($match){
        return TexttoNum($match[0]);
    }, $line);
    //then do the basic preg match?


    preg_match_all('/d+/', $line, $matches);

    $firstnum = reset($matches[0]);
    $secondnum = end($matches[0]);
    $combinednum = $firstnum . $secondnum;
    $totsum += (int)$combinednum;
}
fclose($filep2);
echo "Total Sum Part2: $totsum\n";
echo "MAX SUM IS 99,000";