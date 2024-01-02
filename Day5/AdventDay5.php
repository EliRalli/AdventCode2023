<?php
//list fo seeds soil/water/fertilizer.. numbers not reused
$lines = file_get_contents("day5input.txt");
$lines = explode("\n", trim($lines));

$seeds = explode(" ", explode(": ", $lines[0])[1]);
$seeds = array_map("intval", $seeds);
$maps = array_fill(0, 7, []);
$i = 3;

foreach ($maps as &$map) while ($i < count($lines)){

    if ($lines[$i] == "") { $i += 2; break; }
    $map[] = explode(" ", $lines[$i]);
    $i++;
}
