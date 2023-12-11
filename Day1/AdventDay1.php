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
//$totsum = 0;
//$filep2 = fopen($path,'r');
$input = file_get_contents($path);
$lines = explode("\n", trim($input));

$lines = str_replace(
    ['one','two','three','four','five','six','seven','eight','nine',],
    ['o1ne','t2wo','thr3ee','fo4ur','fi5ve','s6ix','sev7en','eig8ht','ni9ne',],
    $lines
);

$numbers = array_map(
    function($line) {
        $digits = preg_replace('/\D/', '', $line);
        return $digits[0].$digits[-1];
    },
    $lines
);

echo array_sum($numbers);


// $numMap = [
//     'one' => 1,
//     'two' => 2,
//     'three' => 3,
//     'four' => 4,
//     'five' => 5,
//     'six' => 6,
//     'seven' => 7,
//     'eight' => 8,
//     'nine' => 9,
// ];

// $numbers = array_map(
//     function($line){
//         $digits= preg_replace('/\D/', '', $line);
//         $return $digits[0].$digits[-1];
//     }
// );


// while(($line = fgets($filep2)) !== false){

//     //convert to actual numbers here?
//     $line = textNum($line, $numMap);
//     //then do the basic preg match?


//     preg_match_all('/d+/', $line, $matches);

//     $firstnum = reset($matches[0]);
//     $secondnum = end($matches[0]);
//     $combinednum = $firstnum . $secondnum;
//     $totsum += (int)$combinednum;
// }
// fclose($filep2);
// echo "Total Sum Part2: $totsum\n";
// echo "MAX SUM IS 99,000";