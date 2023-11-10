<?php

function groupNumbers($numbersString) {
    if (!is_string($numbersString)) {
        return "Error: Input must be a string of numbers separated by spaces.";
    }

    $numbers = explode(' ', $numbersString);
    if (count($numbers) < 2) return $numbersString;

    sort($numbers, SORT_NUMERIC);

    $result = [];
    $rangeStart = $numbers[0];
    $rangeEnd =  $rangeStart;

    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] == $rangeEnd + 1) {
            $rangeEnd = $numbers[$i];
            continue;
        }
        
        if ($rangeStart == $rangeEnd) {
            $result[] = $rangeStart;
        } else {
            $result[] = "$rangeStart-$rangeEnd";
        }

        $rangeStart = $numbers[$i];
        $rangeEnd = $rangeStart;
    }

    if ($rangeStart == $rangeEnd) {
        $result[] = $rangeStart;
    } else {
        $result[] = "$rangeStart-$rangeEnd";
    }

    return implode(", ", $result);
}

// Sample numbers array
$inputString = '1 2 3 5 7 8 10 11 12';

// Call the function and print the output
echo groupNumbers($inputString);

?>

<div>
    <a href="/">Back</a>  
</div>
