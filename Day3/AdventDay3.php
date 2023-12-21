<?php
//day3 tip pad dataset with extra periods. up down left right. 
function isSymbol($char) {

    $symbols = ['*', '#', '+', '$'];
    return in_array($char, $symbols);
}

function calculatePartNumberSum($engineSchematic) {
    $rows = count($engineSchematic);
    $cols = strlen($engineSchematic[0]);
    $partNumberSum = 0;

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $char = $engineSchematic[$i][$j];

            if (is_numeric($char) || (ctype_space($char) && isAdjacentToSymbol($i, $j, $engineSchematic))) {
                $partNumberSum += intval($char);
            }
        }
    }

    return $partNumberSum;
}

function isAdjacentToSymbol($row, $col, $engineSchematic) {
    $symbols = ['*', '#', '+', '$'];

    // Check for symbols in the neighboring cells (including diagonals)
    for ($i = $row - 1; $i <= $row + 1; $i++) {
        for ($j = $col - 1; $j <= $col + 1; $j++) {
            if ($i >= 0 && $i < count($engineSchematic) && $j >= 0 && $j < strlen($engineSchematic[0]) && in_array($engineSchematic[$i][$j], $symbols)) {
                return true;
            }
        }
    }

    return false;
}

$filename = "day3input.txt";
$engineSchematic = file($filename, FILE_IGNORE_NEW_LINES);
$sum = calculatePartNumberSum($engineSchematic);
echo "The sum of all part numbers is: " . $sum . PHP_EOL;