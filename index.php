<?php

/*

Function for just sorting arrays. As of now, it only accepts arrays of either
numbers (ints, floats, etc.) or strings and returns the sorted, json-encoded
array.

## Parameters
- **a**
  - the json encoded array to sort
  - `http://array-sorter.appspot.com/?a=[1,3,2,10,11,9]` returns `[1,2,3,9,10,11]`
- **t**
  - the sorting type (numeric, alphabetic, etc.); numeric is the default
  - options: n (numeric), a (alphabetic + case-insensitive)
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=n` returns `["1","2","B","a","c","d",1,2]`
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=a` returns `[1,"1",2,"2","a","B","c","d"]`
- **d**
  - the direction to sort (ascending or descending); ascending is the default
  - options: a (ascending), d (descending)
  - `http://array-sorter.appspot.com/?a=["a","B","d","c",1,2,"1","2"]&t=a&d=d` returns `[2,1,"d","c","a","B","2","1"]`

## Exit codes
0 - success
1 - array not provided
2 - array is null and not a valid array

*/

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

header('Content-type: application/json');

$types = ["n","a"];
$directions = ["a","d"];

$t = "n";
if (isset($_REQUEST["t"]) && in_array($_REQUEST["t"], $directions)){
    $t = $_REQUEST["t"];
}

$d = "a";
if (isset($_REQUEST["d"]) && in_array($_REQUEST["d"], $directions)){
    $d = $_REQUEST["d"];
}

// Get the array to sort
// If not available, return empty array
if (isset($_REQUEST["a"])) {
    $a = json_decode($_REQUEST["a"]);
    if ($a === null)
        exit(2);
}
else {
    exit(1);
}

if ($t === "n"){
    asort($a);
    if ($d === "d"){
        $a = array_reverse($a);
    }
}
else if ($t === "a"){
    natcasesort($a);
    if ($d === "d"){
        $a = array_reverse($a);
    }
}

echo json_encode(array_values($a));

?>
