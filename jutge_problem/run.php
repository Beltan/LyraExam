<?php

$save_inputs = [];

function init() {

    global $save_inputs;

    while($line = readline()) {
        $trimmed = preg_replace('/\s+/', ' ', $line);
        $readed = explode(" ", $trimmed);
        $save_inputs = array_merge($save_inputs, $readed);
    }
}

function read_word() {
    global $save_inputs;

    if(count($save_inputs) > 0) {
        return array_shift($save_inputs);
    }
    
    return false;
}

init();

$sample = read_word();
$first = read_word();
$array = [];
$result = 0;

while ($first !== false) {
  $array[$first] = read_word();
  $first = read_word();
}

for ($j = 0; $j < $sample; $j++) {
  for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == 0 || $array[$i] == -1) {
      continue;
    } else if ($array[$i] == $i) {
      $array[$i] = -1;
    } else {
      $array[$i] = $array[$array[$i]];
    }
  }
}

for ($i = 0; $i < count($array); $i++) {
  if ($array[$i] == 0) {
    $result++;
  }
}

echo $result;