<?php

/*
Function for just sorting arrays. As of now, it only accepts arrays of either
numbers (ints, floats, etc.) or strings and returns the sorted, json-encoded
array.


*/

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

header('Content-type: application/json');

$types = ["n","a"];
$directions = ["a","d"];

// Sort type (numeric, alphabetic, etc.)
// Numeric by default
$t = "n";
if (isset($_REQUEST["t"]) && in_array($_REQUEST["t"], $directions)){
    $t = $_REQUEST["t"];
}

// Direction to sort (ascending or descending)
// Ascending by default
$d = "a";
if (isset($_REQUEST["d"]) && in_array($_REQUEST["d"], $directions)){
    $d = $_REQUEST["d"];
}

// Get the array to sort
// If not available, return empty array
if (isset($_REQUEST["a"])) {
    $a = json_decode($_REQUEST["a"]);
}
else {
    echo "{}";
    return;
}

if ($d === "a"){
    asort($a);
    echo json_encode(array_values($a));
    return;
}
else if ($d === "d"){
    arsort($a);
    echo json_encode(array_values($a));
    return;
}

?>
