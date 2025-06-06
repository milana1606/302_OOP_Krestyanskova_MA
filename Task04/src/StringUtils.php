<?php

namespace App;

function compareStrings(string $str1, string $str2): bool
{
    $stack1 = processStringWithBackspaces($str1);
    $stack2 = processStringWithBackspaces($str2);

    if (count($stack1) !== count($stack2)) {
        return false;
    }

    while (!empty($stack1) && !empty($stack2)) {
        if (array_pop($stack1) !== array_pop($stack2)) {
            return false;
        }
    }

    return true;
}

function processStringWithBackspaces(string $str): array
{
    $stack = [];

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if ($char === '#') {
            if (!empty($stack)) {
                array_pop($stack);
            }
        } else {
            $stack[] = $char;
        }
    }

    return $stack;
}