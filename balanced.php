<?php

// function push($array, $in){
//     if($in === '{' || $in === '[' || $in === '('){
//         $array[] = $in;
//         return true;
//     }
//     else return false;

// }

function pop($array, $out){
    $last = array_pop($array);

    if( ($last === '{' && $out === '}') ||
        ($last === '[' && $out === ']') ||
        ($last === '(' && $out === ')') )
        {
            return true;
        }

    else return false;
}

function balanced_string($string){
    $array = str_split($string);
    $stack = [];

    foreach ($array as $char) {
        if($char == '{' || $char == '[' || $char == '(')
            array_push($stack, $char);
        else if($char == '}' || $char == ']' || $char == ')'){
            if( !pop($stack, $char) )
                return 'false';
        }
    }
    return 'true';
}

$test_cases = [
    '(a[0]+b[2c[6]]) {24 + 53}',
    'f(e(d))',
    '[()]{}([])',
    '((b)',
    '(c]',
    '{(a[])',
    '([)]',
    ')(',
    ''
];

foreach ($test_cases as $test) {
    echo balanced_string($test);
    echo "<br>";
}